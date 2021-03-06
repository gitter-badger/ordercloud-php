<?php namespace Ordercloud\Entities\Users;

class UserGroup
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /**
     * @var array|UserRole[]
     * @reflectType Ordercloud\Entities\Users\UserRole
     */
    private $roles;

    public function __construct($id, $name, $description, array $roles)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->roles = $roles;
    }
}
