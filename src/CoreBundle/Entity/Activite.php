<?php

namespace CoreBundle\Entity;

/**
 * Activite
 */
class Activite
{
    /**
     * @var int
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
     * Get id
     *
     * @return int
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
     * @var \CoreBundle\Entity\ActiviteType
     */
    private $activiteType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pictures;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add picture
     *
     * @param \CoreBundle\Entity\Picture $picture
     *
     * @return Activite
     */
    public function addPicture(\CoreBundle\Entity\Picture $picture)
    {
        $this->pictures[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \CoreBundle\Entity\Picture $picture
     */
    public function removePicture(\CoreBundle\Entity\Picture $picture)
    {
        $this->pictures->removeElement($picture);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}
