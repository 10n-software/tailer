<?php

namespace TenN\Tailer;

use TenN\Tailer\Adapters\AdapterInterface;

class Tailer
{

    public function run()
    {
        $options = getopt('', ['adapter:']);
        if (empty($options['adapter'])) {
            throw new \Exception('"adapter" is required');
        }
        $adapterClass = $options['adapter'];
        $collector = new Collector();
        if ($adapterClass[0] !== '\\') {
            $adapterClass = __NAMESPACE__ . '\Adapters\\' . $adapterClass;
        }
        $adapter = new $adapterClass();
        if ($adapter instanceof AdapterInterface) {
            while (($line = readline())) {
                $result = $adapter->parse($line);
                if ($result->isMatches()) {
                    $match = $result->getResult();
                    $collector->add($match);
                }
            }
        }
    }

}
