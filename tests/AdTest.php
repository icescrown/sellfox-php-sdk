<?php
declare(strict_types=1);

namespace ExewenTest\Sellfox;

use Exewen\Sellfox\Facade\AdFacade;

class AdTest extends Base
{


    public function testCreateAdTask()
    {
        $params = [
            'adTypeCode' => "sp",
            "timeUnit"=>"daily",
            "reportTypeCode"=>"adSpaceReport",
            "reportStartDate"=>"2025-09-01",
            "reportEndDate"=>"2025-09-30",
        ];
        $response = AdFacade::createAdTask($params);
        var_dump($response);
        $this->assertNotEmpty($response);
    }

    public function testGetAdReport()
    {
        $params = [
            'taskIds' => ["12899"],
        ];
        $response = AdFacade::getAdReport($params);
        var_dump($response);
        $this->assertNotEmpty($response);
    }

    public function testGetAdSpGroup()
    {
        $params = [
            'taskIds' => ["12899"],
        ];
        $response = AdFacade::getAdSpGroup($params);
        var_dump($response);
        $this->assertNotEmpty($response);
    }
}