<?php

namespace TenN\Tailer;

class Collector
{
    protected $past = [];
    protected $current = [];
    protected $currentTimestamp = 0;
    protected $timeLimit = 30;

    public function add($data)
    {
        $currentTimestamp = time();
        if ($currentTimestamp !== $this->currentTimestamp) {
            $this->past[$this->currentTimestamp] = $this->current;
            $this->current = [];
            $minTime = $currentTimestamp - $this->timeLimit;
            foreach (array_keys($this->past) as $time) {
                if ($time < $minTime) {
                    unset($this->past[$time]);
                }
            }
        }
        $this->current[$data] = $this->current[$data]??0 + 1;

    }

}
