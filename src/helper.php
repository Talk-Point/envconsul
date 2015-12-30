<?php

if ( !function_exists('envconsul')) {
    function envconsul()
    {

        $value = dns_get_record('consul.service.consul', DNS_SRV);

        var_dump($value);

        return 'test';
    }
}