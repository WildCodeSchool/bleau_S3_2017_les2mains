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

    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;


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
     * @var \CommerceBundle\Entity\Lieu
     */
    private $lieu;


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
