<?php
declare(strict_types=1);

namespace Exewen\Sellfox\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;
use Exewen\Sellfox\Constants\SellfoxEnum;
use Exewen\Sellfox\Contract\AdInterface;

class AdService extends BaseService implements AdInterface
{
    private $httpClient;
    private $driver;

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('sellfox.' . SellfoxEnum::CHANNEL_API);
    }


    public function createAdTask(array $params, array $header = []): array
    {
        $response = $this->httpClient->post($this->driver, '/api/cpc/download/createTask.json', $params);
        $result   = json_decode($response->getBody()->getContents(), true);
        $this->checkResponse($result);
        return $result['data'] ?? [];
    }

    public function getAdReport(array $params, array $header = []): array
    {
        $response = $this->httpClient->post($this->driver, '/api/cpc/download/pageList.json', $params);
        $result   = json_decode($response->getBody()->getContents(), true);
        $this->checkResponse($result);
        return $result['data'] ?? [];
    }

    public function getAdSpGroup(array $params, array $header = []): array
    {
        $response = $this->httpClient->post($this->driver, '/api/cpc/hourData/spGroup.json', $params);
        $result   = json_decode($response->getBody()->getContents(), true);
        $this->checkResponse($result);
        return $result['data'] ?? [];
    }
}