<?php

namespace Car\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="car_modifications")
 */
class Modification
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
     * @var \Car\Entity\Generation
     * @ORM\ManyToOne(targetEntity="\Car\Entity\Generation", fetch="LAZY")
     * @ORM\JoinColumn(name="generation_id", referencedColumnName="id")
     */
    private $generation;

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
     * @return Generation
     */
    public function getGeneration()
    {
        return $this->generation;
    }

    /**
     * @param Generation $generation
     */
    public function setGeneration($generation)
    {
        $this->generation = $generation;
    }
}