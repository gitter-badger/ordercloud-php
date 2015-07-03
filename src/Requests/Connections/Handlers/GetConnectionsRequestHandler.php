<?php namespace Ordercloud\Requests\Connections\Handlers;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Connections\GetConnectionsRequest;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class GetConnectionsRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetConnectionsRequest $request
     *
     * @return array|Connection[]
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_GET,
                sprintf('resource/organisations/%d/connections', $organisationID),
                [
                    'lat' => $request->lat,
                    'long' => $request->long,
                    'radius' => $request->radius,
                    'type' => $request->type
                ]
            )
        );

        return EntityReflector::parseAll('Ordercloud\Entities\Connections\Connection', $response->getData('results'));
    }
}