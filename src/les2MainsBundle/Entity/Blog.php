<?php

namespace les2MainsBundle\Entity;

/**
 * Blog
 */
class Blog
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
     * @var \DateTime
     */
    private $dates;

    /**
     * @var string
     */
    private $contenu;


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
     * @return Blog
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
     * Set dates
     *
     * @param \DateTime $dates
     *
     * @return Blog
     */
    public function setDates($dates)
    {
        $this->dates = $dates;

        return $this;
    }

    /**
     * Get dates
     *
     * @return \DateTime
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Blog
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
}
