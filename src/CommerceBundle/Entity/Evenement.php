<?php

namespace CommerceBundle\Entity;

/**
 * Evenement
 */
class Evenement
{

    public function __toString()
    {
        $date = $this->date->format('Y-m-d');
        return $date;
    }

    //

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $marchandises;

    /**
     * @var \CommerceBundle\Entity\Lieu
     */
    private $lieu;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->marchandises = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Evenement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Add marchandise
     *
     * @param \CommerceBundle\Entity\Marchandise $marchandise
     *
     * @return Evenement
     */
    public function addMarchandise(\CommerceBundle\Entity\Marchandise $marchandise)
    {
        $this->marchandises[] = $marchandise;

        return $this;
    }

    /**
     * Remove marchandise
     *
     * @param \CommerceBundle\Entity\Marchandise $marchandise
     */
    public function removeMarchandise(\CommerceBundle\Entity\Marchandise $marchandise)
    {
        $this->marchandises->removeElement($marchandise);
    }

    /**
     * Get marchandises
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarchandises()
    {
        return $this->marchandises;
    }

    /**
     * Set lieu
     *
     * @param \CommerceBundle\Entity\Lieu $lieu
     *
     * @return Evenement
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
