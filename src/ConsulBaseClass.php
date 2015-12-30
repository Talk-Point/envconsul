<?php

namespace TPConsul;

class ConsulBaseClass
{
    public function __construct()
    {

    }

    protected function dns_lookup_srv($hostname)
    {
        $service_array = dns_get_record($hostname, DNS_SRV);

        if (count($service_array) < 1) {
            throw new Exception('No Services Found'); // @todo Update
        }

        $service_array = $service_array[0];

        if (! array_has_keys(['type', 'weight', 'port', 'target'], $service_array)) {
            throw new Exception('Wrong Keys'); // @todo Update
        }

        return $service_array;
    }
}