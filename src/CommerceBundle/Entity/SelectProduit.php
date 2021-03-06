<?php

namespace CommerceBundle\Entity;

/**
 * Panier
 */
class SelectProduit
{
    // Generated code


    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $quantiteCommande;

    /**
     * @var float
     */
    private $prixTotal;

    /**
     * @var \CommerceBundle\Entity\User
     */
    private $user;

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
     * Set quantiteCommande
     *
     * @param float $quantiteCommande
     *
     * @return SelectProduit
     */
    public function setQuantiteCommande($quantiteCommande)
    {
        $this->quantiteCommande = $quantiteCommande;

        return $this;
    }

    /**
     * Get quantiteCommande
     *
     * @return float
     */
    public function getQuantiteCommande()
    {
        return $this->quantiteCommande;
    }

    /**
     * Set prixTotal
     *
     * @param float $prixTotal
     *
     * @return SelectProduit
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /**
     * Get prixTotal
     *
     * @return float
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Set user
     *
     * @param \CommerceBundle\Entity\User $user
     *
     * @return SelectProduit
     */
    public function setUser(\CommerceBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CommerceBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set product
     *
     * @param \CommerceBundle\Entity\Product $product
     *
     * @return SelectProduit
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
}
