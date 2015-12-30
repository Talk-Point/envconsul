<?php

namespace TPConsul;

class Service extends ConsulBaseClass
{
    protected $hostname;

    protected $target_hostname;
    protected $target_ip;
    protected $target_port;

    public static function getFirst($hostname)
    {
        $s = new Service($hostname);
        $s->querry();
        return $s;
    }

    public function __construct($hostname)
    {
        parent::__construct();
        $this->hostname = $hostname;
    }

    public function querry()
    {
        $array = $this->dns_lookup_srv($this->hostname);
    }
}