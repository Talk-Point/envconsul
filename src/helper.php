<?php

if ( !function_exists('envconsul')) {
    function is_envconsul()
    {
        return tpenv('APP_CONSUL', false);
    }

    function envconsul_target_ip($value, $default='')
    {
        if (is_envconsul()) {
            $m = \TPConsul\ConsulManager::getInstance();
            $s = $m->getService($value);
            return $s->getTargetHostname();
        } else {
            return tpenv($value, $default);
        }
    }

    function envconsul_target_port($value, $default='')
    {
        if (is_envconsul()) {
            $m = \TPConsul\ConsulManager::getInstance();
            $s = $m->getService($value);
            return $s->getTargetPort();
        } else {
            return tpenv($value, $default);
        }
    }
}