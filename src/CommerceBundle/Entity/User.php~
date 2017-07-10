<?php

namespace CommerceBundle\Entity;

/**
 * User
 */
class User
{


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $selectProduits;

    /**
     * @var \CommerceBundle\Entity\Evenement
     */
    private $evenement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->selectProduits = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Add selectProduit
     *
     * @param \CommerceBundle\Entity\SelectProduit $selectProduit
     *
     * @return User
     */
    public function addSelectProduit(\CommerceBundle\Entity\SelectProduit $selectProduit)
    {
        $this->selectProduits[] = $selectProduit;

        return $this;
    }

    /**
     * Remove selectProduit
     *
     * @param \CommerceBundle\Entity\SelectProduit $selectProduit
     */
    public function removeSelectProduit(\CommerceBundle\Entity\SelectProduit $selectProduit)
    {
        $this->selectProduits->removeElement($selectProduit);
    }

    /**
     * Get selectProduits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSelectProduits()
    {
        return $this->selectProduits;
    }

    /**
     * Set evenement
     *
     * @param \CommerceBundle\Entity\Evenement $evenement
     *
     * @return User
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
}
