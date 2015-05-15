<?php namespace Ordercloud\Entities\Settings;

use Ordercloud\Entities\Organisations\OrganisationShort;

class Setting
{
    /** @var integer */
    private $id;
    /** @var string */
    private $value;
    /** @var SettingKey */
    private $key;
    /** @var string */
    private $startDate;
    /** @var string */
    private $endDate;
    /** @var string */
    private $dateCreated;
    /** @var string */
    private $lastUpdated;
    /** @var OrganisationShort */
    private $organisation;

    function __construct($id, $value, SettingKey $key, $startDate, $endDate, $dateCreated, $lastUpdated, OrganisationShort $organisation)
    {
        $this->id = $id;
        $this->value = $value;
        $this->key = $key;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->dateCreated = $dateCreated;
        $this->lastUpdated = $lastUpdated;
        $this->organisation = $organisation;
    }
}