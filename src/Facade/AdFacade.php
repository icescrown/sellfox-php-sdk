<?php
declare(strict_types=1);

namespace Exewen\Sellfox\Facade;

use Exewen\Facades\AppFacade;
use Exewen\Facades\Facade;
use Exewen\Http\HttpProvider;
use Exewen\Logger\LoggerProvider;
use Exewen\Sellfox\Contract\AdInterface;

/**
 * @method static array createAdTask(array $params, array $header = [])
 * @method static array getAdReport(array $params, array $header = [])
 * @method static array getAdSpGroup(array $params, array $header = [])
 */
class AdFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return AdInterface::class;
    }

    public static function getProviders(): array
    {
        AppFacade::getContainer()->singleton(AdInterface::class);

        return [
            LoggerProvider::class,
            HttpProvider::class,
        ];
    }
}