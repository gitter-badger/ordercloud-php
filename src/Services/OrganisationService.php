<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Entities\Organisations\Organisation;
use Ordercloud\Entities\Organisations\OrganisationAccessToken;
use Ordercloud\Entities\Organisations\OrganisationAddress;
use Ordercloud\Entities\Settings\SettingsCollection;
use Ordercloud\Requests\Auth\Entities\Authorisation;
use Ordercloud\Requests\Organisations\Criteria\ConnectionsByTypeCriteria;
use Ordercloud\Requests\Organisations\GetOrganisationAccessTokenRequest;
use Ordercloud\Requests\Organisations\GetOrganisationAddressRequest;
use Ordercloud\Requests\Organisations\GetOrganisationConnectionsByTypeRequest;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;
use Ordercloud\Requests\Organisations\GetSettingsByOrganisationRequest;

class OrganisationService extends OrdercloudService
{
    /**
     * @param $organisationId
     *
     * @return SettingsCollection
     */
    public function getSettings($organisationId)
    {
        return $this->request(
            new GetSettingsByOrganisationRequest($organisationId)
        );
    }

    /**
     * @param int           $organisationId
     * @param Authorisation $authorisation
     *
     * @return OrganisationAccessToken
     */
    public function getAccessToken($organisationId, Authorisation $authorisation)
    {
        return $this->request(
            new GetOrganisationAccessTokenRequest($organisationId, $authorisation)
        );
    }

    /**
     * @param $organisationId
     *
     * @return OrganisationAddress
     */
    public function getAddress($organisationId)
    {
        return $this->request(
            new GetOrganisationAddressRequest($organisationId)
        );
    }

    /**
     * @param $organisationId
     *
     * @return Organisation
     */
    public function getOrganisation($organisationId)
    {
        return $this->request(
            new GetOrganisationRequest($organisationId)
        );
    }

    /**
     * @param int                            $typeCode
     * @param int|null                       $organisationId
     * @param ConnectionsByTypeCriteria|null $criteria
     *
     * @return array|Connection[]
     */
    public function getConnectionsByType($typeCode, $organisationId = null, ConnectionsByTypeCriteria $criteria = null)
    {
        $criteria = $criteria ?: ConnectionsByTypeCriteria::create();

        return $this->request(
            new GetOrganisationConnectionsByTypeRequest($typeCode, $organisationId, $criteria)
        );
    }

    /**
     * @param int|null    $organisationId
     * @param ConnectionsByTypeCriteria|null $criteria
     *
     * @return array|Connection[]
     */
    public function getChildConnections($organisationId = null, ConnectionsByTypeCriteria $criteria = null)
    {
        return $this->getConnectionsByType(ConnectionType::CHILD, $organisationId, $criteria);
    }

    /**
     * @param int|null    $organisationId
     * @param ConnectionsByTypeCriteria|null $criteria
     *
     * @return array|Connection[]
     */
    public function getMarketplaceConnections($organisationId = null, ConnectionsByTypeCriteria $criteria = null)
    {
        return $this->getConnectionsByType(ConnectionType::MARKETPLACE, $organisationId, $criteria);
    }
}
