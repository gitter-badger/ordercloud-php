<?php namespace Ordercloud\Requests;

use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Ordercloud;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class GetChildConnectionsHandler implements CommandHandler
{
    /** @var Parser */
    private $parser;
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->parser = $parser;
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param GetChildConnections $request
     *
     * @return array|Connection[]
     */
    public function handle($request)
    {
        $organisationID = $request->getOrganisationID();
        $accessToken = $request->getAccessToken();
        $connectionType = ConnectionType::CHILD;

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                'GET',
                sprintf('resource/organisations/%d/connections/type/%s', $organisationID, $connectionType),
                [ 'access_token' => $accessToken ]
            )
        );

        return $this->parser->parseConnections($response->getData('results'));
    }
}