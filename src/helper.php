<?php

if ( !function_exists('envconsul')) {
    function is_envconsul()
    {
        return tpenv('APP_CONSUL', false);
    }

    function envconsul_hostname($value, $default='')
    {
        if (is_envconsul()) {

        } else {
            return tpenv($value, $default);
        }
    }
}