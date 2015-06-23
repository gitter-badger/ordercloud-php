<?php namespace Ordercloud\Requests\Connections;

use Ordercloud\Support\CommandBus\Command;

class GetConnectionsRequest implements Command
{
    /** @var int */
    private $organisationID;
    /** @var $lat */
    public $lat;
    /** @var string */
    public $long;
    /** @var string */
    public $radius;
    /** @var string */
    public $type;

    public function __construct($organisationID, $lat = null, $long = null, $radius = null, $type = null)
    {
        $this->organisationID = $organisationID;
        $this->lat = $lat;
        $this->long = $long;
        $this->radius = $radius;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return string
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @return string
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
