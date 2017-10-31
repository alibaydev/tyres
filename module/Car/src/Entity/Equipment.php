<?php

namespace Car\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="car_equipments")
 */
class Equipment
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var \Car\Entity\Modification
     * @ORM\ManyToOne(targetEntity="\Car\Entity\Modification", fetch="LAZY")
     * @ORM\JoinColumn(name="modification_id", referencedColumnName="id")
     */
    private $modification;

    /**
     * @var \Car\Entity\Rim
     * @ORM\ManyToOne(targetEntity="\Car\Entity\Rim", fetch="LAZY")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    private $rim;

    /**
     * @var \Car\Entity\Tire
     * @ORM\ManyToOne(targetEntity="\Car\Entity\Tire", fetch="LAZY")
     * @ORM\JoinColumn(name="tire_id", referencedColumnName="id")
     */
    private $tire;

    /**
     * @var boolean
     * @ORM\Column(name="is_factory")
     */
    private $isFactory;

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

    /**
     * @return Rim
     */
    public function getRim()
    {
        return $this->rim;
    }

    /**
     * @param Rim $rim
     */
    public function setRim($rim)
    {
        $this->rim = $rim;
    }

    /**
     * @return Tire
     */
    public function getTire()
    {
        return $this->tire;
    }

    /**
     * @param Tire $tire
     */
    public function setTire($tire)
    {
        $this->tire = $tire;
    }

    /**
     * @return boolean
     */
    public function isFactory()
    {
        return $this->isFactory;
    }

    /**
     * @param boolean $isFactory
     */
    public function setFactory($isFactory)
    {
        $this->isFactory = $isFactory;
    }

}