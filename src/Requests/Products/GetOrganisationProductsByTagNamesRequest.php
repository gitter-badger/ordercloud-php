<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationProductsByTagNamesRequest implements Command
{
    /** @var array|int[] */
    private $organisationIDs;
    /** @var string|string */
    private $accessToken;
    /** @var array|string[] */
    private $tagNames;

    /**
     * @param int         $organisationIDs
     * @param array       $tagNames
     * @param string|null $accessToken
     */
    public function __construct(array $organisationIDs, array $tagNames, $accessToken = null) // TODO: ProductCriteria
    {
        $this->organisationIDs = $organisationIDs;
        $this->tagNames = $tagNames;
        $this->accessToken = $accessToken;
    }

    /**
     * @return int
     */
    public function getOrganisationIDs()
    {
        return $this->organisationIDs;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return array|string[]
     */
    public function getTagNames()
    {
        return $this->tagNames;
    }
}