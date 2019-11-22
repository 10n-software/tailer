<?php

namespace TenN\Tailer\Adapter\Nginx;

use TenN\Tailer\Adapter\AdapterInterface;
use TenN\Tailer\Result;

class IpAddress implements AdapterInterface
{

    public function parse(string $string): Result
    {
        $parts = explode(' ', $string);
        if ($parts) {
            $ipAddress = array_shift($parts);
            if (filter_var($ipAddress, FILTER_VALIDATE_IP)) {
                return new Result(array_shift($parts));
            }
        }
        return new Result(null, false);
    }

}
