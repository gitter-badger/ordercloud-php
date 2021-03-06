<?php namespace Ordercloud\Requests\Products;

use Ordercloud\Requests\Products\Criteria\ProductCriteria;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class FindProductsRequest
 *
 * @see Ordercloud\Requests\Products\Handlers\FindProductsRequestHandler
 */
class FindProductsRequest implements Command
{
    /**
     * @var ProductCriteria
     */
    private $criteria;

    /**
     * @param ProductCriteria $criteria
     */
    public function __construct(ProductCriteria $criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @return ProductCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
