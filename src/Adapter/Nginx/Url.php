<?php

namespace TenN\Tailer\Adapter\Nginx;

use TenN\Tailer\Adapter\AdapterInterface;
use TenN\Tailer\Result;

class Url implements AdapterInterface
{

    public function parse(string $string): Result
    {
        $matches = null;
        if (preg_match('/"[A-Z]+ ([\S]+)/', $string, $matches)) {
            return new Result($matches[1]);
        }
        return new Result(null, false);
    }

}
