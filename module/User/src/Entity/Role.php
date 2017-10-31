<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * This class represents a role.
 * @ORM\Entity()
 * @ORM\Table(name="user_roles")
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /** 
     * @ORM\Column(name="name")  
     */
    private $name;
    
    /** 
     * @ORM\Column(name="description")  
     */
    private $description;

    /** 
     * @ORM\Column(name="date_created")  
     */
    private $dateCreated;

    /**
     * @ORM\ManyToMany(targetEntity="User\Entity\Role")
     * @ORM\JoinTable(name="user_roles_hierarchy",
     *      joinColumns={@ORM\JoinColumn(name="child_role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="parent_role_id", referencedColumnName="id")}
     *      )
     */
    private $parentRoles;
    
    /**
     * @ORM\ManyToMany(targetEntity="User\Entity\Role")
     * @ORM\JoinTable(name="user_roles_hierarchy",
     *      joinColumns={@ORM\JoinColumn(name="parent_role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="child_role_id", referencedColumnName="id")}
     *      )
     */
    private $childRoles;
    
    /**
     * @ORM\ManyToMany(targetEntity="User\Entity\Permission")
     * @ORM\JoinTable(name="user_roles_permissions",
     *      joinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="permission_id", referencedColumnName="id")}
     *      )
     */
    private $permissions;
    
    /**
     * Constructor.
     */
    public function __construct() 
    {
        $this->parentRoles = new ArrayCollection();
        $this->childRoles = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }
    
    /**
     * Returns role ID.
     * @return integer
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * Sets role ID. 
     * @param int $id    
     */
    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
    
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }
    
    public function getParentRoles()
    {
        return $this->parentRoles;
    }
    
    public function getChildRoles()
    {
        return $this->childRoles;
    }
    
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param mixed $parentRoles
     */
    public function setParentRoles($parentRoles)
    {
        $this->parentRoles = $parentRoles;
    }

    /**
     * @param mixed $childRoles
     */
    public function setChildRoles($childRoles)
    {
        $this->childRoles = $childRoles;
    }

    /**
     * @param mixed $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }
}



