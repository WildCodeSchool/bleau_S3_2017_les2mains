<?php

namespace CommerceBundle\Entity;

/**
 * Marchandise
 */
class Marchandise
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $prix;

    /**
     * @var int
     */
    private $quantite;


    /**
     * Get id
     *
     * @return int
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
     * @return int
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
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    /**
     * @var \CommerceBundle\Entity\Evenement
     */
    private $evenements;

    /**
     * @var \CommerceBundle\Entity\Product
     */
    private $products;


    /**
     * Set evenements
     *
     * @param \CommerceBundle\Entity\Evenement $evenements
     *
     * @return Marchandise
     */
    public function setEvenements(\CommerceBundle\Entity\Evenement $evenements = null)
    {
        $this->evenements = $evenements;

        return $this;
    }

    /**
     * Get evenements
     *
     * @return \CommerceBundle\Entity\Evenement
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

    /**
     * Set products
     *
     * @param \CommerceBundle\Entity\Product $products
     *
     * @return Marchandise
     */
    public function setProducts(\CommerceBundle\Entity\Product $products = null)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return \CommerceBundle\Entity\Product
     */
    public function getProducts()
    {
        return $this->products;
    }
    /**
     * @var \CommerceBundle\Entity\Lieu
     */
    private $lieu;


    /**
     * Set lieu
     *
     * @param \CommerceBundle\Entity\Lieu $lieu
     *
     * @return Marchandise
     */
    public function setLieu(\CommerceBundle\Entity\Lieu $lieu = null)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return \CommerceBundle\Entity\Lieu
     */
    public function getLieu()
    {
        return $this->lieu;
    }
}
