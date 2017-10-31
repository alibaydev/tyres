<?php

namespace Car\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="car_cars")
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var boolean
     * @ORM\Column(name="is_verified")
     */
    protected $isVerified;

    /**
     * @ORM\Column(name="date_created")
     */
    private $dateCreated;

    /**
     * @ORM\Column(name="date_updated")
     */
    private $dateUpdated;

    /**
     * @var \User\Entity\User
     * @ORM\ManyToOne(targetEntity="\User\Entity\User", fetch="LAZY")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    private $owner;

    /**
     * @var \Car\Entity\Modification
     * @ORM\ManyToOne(targetEntity="\Car\Entity\Modification", fetch="LAZY")
     * @ORM\JoinColumn(name="modification_id", referencedColumnName="id")
     */
    private $modification;

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
     * @return boolean
     */
    public function isVerified()
    {
        return $this->isVerified;
    }

    /**
     * @param boolean $isVerified
     */
    public function setVerified($isVerified)
    {
        $this->isVerified = $isVerified;
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
     * @return \User\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param \User\Entity\User $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return Modification
     */
    public function getModification()
    {
        return $this->modification;
    }

    /**
     * @param Modification $modification
     */
    public function setModification($modification)
    {
        $this->modification = $modification;
    }
}