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
        $this->target_hostname = $array['target'];
        $this->target_port = $array['port'];

        $array = $this->dns_lookup_a($this->target_hostname);
        $this->target_ip = $array['ip'];
    }

    /**
     * Return Hostname
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Return Target Hostname
     * @return string
     */
    public function getTargetHostname()
    {
        return $this->target_hostname;
    }

    /**
     * Return Target IP
     * @return string
     */
    public function getTargetIp()
    {
        return $this->target_ip;
    }

    /**
     * Return Target Port
     * @return int
     */
    public function getTargetPort()
    {
        return $this->target_port;
    }

}