<?php

namespace Shop\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shop_products")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="price")
     */
    private $price;

    /**
     * @ORM\Column(name="date_created")
     */
    private $dateCreated;

    /**
     * @ORM\Column(name="date_updated")
     */
    private $dateUpdated;

    /**
     * @ORM\Column(name="detail_id")
     */
    private $detailId;

    /**
     * @var \Car\Entity\DetailBrand
     * @ORM\ManyToOne(targetEntity="\Car\Entity\DetailModel", fetch="LAZY")
     * @ORM\JoinColumn(name="detail_model_id", referencedColumnName="id")
     */
    private $detailModel;

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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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
     * @return mixed
     */
    public function getDetailId()
    {
        return $this->detailId;
    }

    /**
     * @param mixed $detailId
     */
    public function setDetailId($detailId)
    {
        $this->detailId = $detailId;
    }

    /**
     * @return \Car\Entity\DetailBrand
     */
    public function getDetailModel()
    {
        return $this->detailModel;
    }

    /**
     * @param \Car\Entity\DetailBrand $detailModel
     */
    public function setDetailModel($detailModel)
    {
        $this->detailModel = $detailModel;
    }
}