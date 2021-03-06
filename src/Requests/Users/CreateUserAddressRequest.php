<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Users\NewUserAddress;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class CreateUserAddressRequest
 *
 * @see Ordercloud\Requests\Users\Handlers\CreateUserAddressRequestHandler
 */
class CreateUserAddressRequest implements Command
{
    /** @var int */
    private $userID;
    /** @var NewUserAddress */
    private $address;

    /**
     * @param int            $userID
     * @param NewUserAddress $address
     */
    public function __construct($userID, NewUserAddress $address)
    {
        $this->userID = $userID;
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return NewUserAddress
     */
    public function getAddress()
    {
        return $this->address;
    }
}
