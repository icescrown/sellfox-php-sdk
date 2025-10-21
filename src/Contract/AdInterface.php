<?php
declare(strict_types=1);

namespace Exewen\Sellfox\Contract;

interface AdInterface
{
    public function createAdTask(array $params, array $header = []);

    public function getAdReport(array $params, array $header = []);

    public function getAdSpGroup(array $params, array $header = []);

}
