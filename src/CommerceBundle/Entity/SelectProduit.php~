<?php

namespace CommerceBundle\Entity;

/**
 * Panier
 */
class SelectProduit
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $quantiteCommande;

    /**
     * @var integer
     */
    private $prixTotal;

    /**
     * @var \CommerceBundle\Entity\User
     */
    private $user;

    /**
     * @var \CommerceBundle\Entity\Marchandise
     */
    private $marchandise;


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
     * @param integer $quantiteCommande
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
     * @return integer
     */
    public function getQuantiteCommande()
    {
        return $this->quantiteCommande;
    }

    /**
     * Set prixTotal
     *
     * @param integer $prixTotal
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
     * @return integer
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
     * Set marchandise
     *
     * @param \CommerceBundle\Entity\Marchandise $marchandise
     *
     * @return SelectProduit
     */
    public function setMarchandise(\CommerceBundle\Entity\Marchandise $marchandise = null)
    {
        $this->marchandise = $marchandise;

        return $this;
    }

    /**
     * Get marchandise
     *
     * @return \CommerceBundle\Entity\Marchandise
     */
    public function getMarchandise()
    {
        return $this->marchandise;
    }
}
