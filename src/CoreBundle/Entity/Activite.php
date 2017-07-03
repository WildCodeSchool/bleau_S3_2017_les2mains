<?php

namespace CoreBundle\Entity;

/**
 * Activite
 */
class Activite
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var string
     */
    private $lien;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $event;

    /**
     * @var \CoreBundle\Entity\ActiviteType
     */
    private $activiteType;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Activite
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Activite
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Activite
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set picture
     *
     * @param \CoreBundle\Entity\Picture $picture
     *
     * @return Activite
     */
    public function setPicture(\CoreBundle\Entity\Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Add event
     *
     * @param \CommerceBundle\Entity\Event $event
     *
     * @return Activite
     */
    public function addEvent(\CommerceBundle\Entity\Event $event)
    {
        $this->event[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \CommerceBundle\Entity\Event $event
     */
    public function removeEvent(\CommerceBundle\Entity\Event $event)
    {
        $this->event->removeElement($event);
    }

    /**
     * Get event
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set activiteType
     *
     * @param \CoreBundle\Entity\ActiviteType $activiteType
     *
     * @return Activite
     */
    public function setActiviteType(\CoreBundle\Entity\ActiviteType $activiteType = null)
    {
        $this->activiteType = $activiteType;

        return $this;
    }

    /**
     * Get activiteType
     *
     * @return \CoreBundle\Entity\ActiviteType
     */
    public function getActiviteType()
    {
        return $this->activiteType;
    }
}
