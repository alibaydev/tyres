<?php

namespace Car\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="car_tires")
 */
class Tire
{
    const SEASON_SUMMER = 'SUMMER';
    const SEASON_WINTER = 'WINTER';
    const SEASON_ALL = 'ALL';

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="width")
     */
    private $width;

    /**
     * @ORM\Column(name="height")
     */
    private $height;

    /**
     * @ORM\Column(name="radius")
     */
    private $radius;

    /**
     * @ORM\Column(name="season")
     */
    private $season;

    /**
     * @var boolean
     * @ORM\Column(name="is_xl")
     */
    private $isXl;

    /**
     * @var boolean
     * @ORM\Column(name="is_fr")
     */
    private $isFr;

    /**
     * @var boolean
     * @ORM\Column(name="is_zr")
     */
    private $isZr;

    /**
     * @var boolean
     * @ORM\Column(name="is_run_flat")
     */
    private $isRunFlat;

    /**
     * @var boolean
     * @ORM\Column(name="has_thorns")
     */
    private $hasThorns;

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
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param mixed $radius
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param mixed $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * @return boolean
     */
    public function isXl()
    {
        return $this->isXl;
    }

    /**
     * @param boolean $isXl
     */
    public function setXl($isXl)
    {
        $this->isXl = $isXl;
    }

    /**
     * @return boolean
     */
    public function isFr()
    {
        return $this->isFr;
    }

    /**
     * @param boolean $isFr
     */
    public function setFr($isFr)
    {
        $this->isFr = $isFr;
    }

    /**
     * @return boolean
     */
    public function isZr()
    {
        return $this->isZr;
    }

    /**
     * @param boolean $isZr
     */
    public function setZr($isZr)
    {
        $this->isZr = $isZr;
    }

    /**
     * @return boolean
     */
    public function isRunFlat()
    {
        return $this->isRunFlat;
    }

    /**
     * @param boolean $isRunFlat
     */
    public function setRunFlat($isRunFlat)
    {
        $this->isRunFlat = $isRunFlat;
    }

    /**
     * @return boolean
     */
    public function ihasThorns()
    {
        return $this->hasThorns;
    }

    /**
     * @param boolean $hasThorns
     */
    public function setHasThorns($hasThorns)
    {
        $this->hasThorns = $hasThorns;
    }


}