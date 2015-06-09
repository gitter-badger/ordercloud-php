<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Support\CommandBus\Command;

class GetProductRequest implements Command
{
    /** @var int */
    protected $productID;
    /** @var string|null */
    protected $accessToken;

    public function __construct($productID, $accessToken = null)
    {
        $this->productID = $productID;
        $this->accessToken = $accessToken;
    }

    /**
     * @return int
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}