<?php

namespace CommerceBundle\Entity;

/**
 * Marchandise
 */
class Marchandise
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $prix;

    /**
     * @var integer
     */
    private $quantite;

    /**
     * @var \CommerceBundle\Entity\Evenement
     */
    private $evenement;

    /**
     * @var \CommerceBundle\Entity\Product
     */
    private $product;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Marchandise
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Marchandise
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set evenement
     *
     * @param \CommerceBundle\Entity\Evenement $evenement
     *
     * @return Marchandise
     */
    public function setEvenement(\CommerceBundle\Entity\Evenement $evenement = null)
    {
        $this->evenement = $evenement;

        return $this;
    }

    /**
     * Get evenement
     *
     * @return \CommerceBundle\Entity\Evenement
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * Set product
     *
     * @param \CommerceBundle\Entity\Product $product
     *
     * @return Marchandise
     */
    public function setProduct(\CommerceBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \CommerceBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * @var string
     */
    private $unite;


    /**
     * Set unite
     *
     * @param string $unite
     *
     * @return Marchandise
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * Get unite
     *
     * @return string
     */
    public function getUnite()
    {
        return $this->unite;
    }
}
