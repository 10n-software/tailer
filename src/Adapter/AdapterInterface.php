<?php

namespace TenN\Tailer\Adapter;

use TenN\Tailer\Result;

interface AdapterInterface
{

    public function parse(string $string): Result;

}
