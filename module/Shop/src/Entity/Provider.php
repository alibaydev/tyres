<?php

namespace Shop\Entity;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shop_locations")
 */
class Provider
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
     * @ORM\Column(name="date_created")
     */
    private $dateCreated;

    /**
     * @ORM\Column(name="date_updated")
     */
    private $dateUpdated;

    /**
     * @var \Location\Entity\Location
     * @ORM\ManyToOne(targetEntity="\Location\Entity\Location", fetch="LAZY")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param mixed $dateUpdated
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }

    /**
     * @return \Location\Entity\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param \Location\Entity\Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}