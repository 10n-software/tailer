<?php

namespace TenN\Tailer;

class Result
{

    protected $matches = true;
    protected $result = null;

    public function __construct($result, $matches = true)
    {
        $this->matches = $matches;
        $this->result = $result;
    }

    /**
     * @return bool
     */
    public function isMatches(): bool
    {
        return $this->matches;
    }

    /**
     * @return null
     */
    public function getResult()
    {
        return $this->result;
    }



}
