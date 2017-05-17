<?php

namespace CoreBundle\Entity;

/**
 * Our
 */
class Our
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre1;

    /**
     * @var string
     */
    private $contenu1;

    /**
     * @var string
     */
    private $titre2;

    /**
     * @var string
     */
    private $contenu2;

    /**
     * @var string
     */
    private $titre3;

    /**
     * @var string
     */
    private $contenu3;


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
     * Set titre1
     *
     * @param string $titre1
     *
     * @return Our
     */
    public function setTitre1($titre1)
    {
        $this->titre1 = $titre1;

        return $this;
    }

    /**
     * Get titre1
     *
     * @return string
     */
    public function getTitre1()
    {
        return $this->titre1;
    }

    /**
     * Set contenu1
     *
     * @param string $contenu1
     *
     * @return Our
     */
    public function setContenu1($contenu1)
    {
        $this->contenu1 = $contenu1;

        return $this;
    }

    /**
     * Get contenu1
     *
     * @return string
     */
    public function getContenu1()
    {
        return $this->contenu1;
    }

    /**
     * Set titre2
     *
     * @param string $titre2
     *
     * @return Our
     */
    public function setTitre2($titre2)
    {
        $this->titre2 = $titre2;

        return $this;
    }

    /**
     * Get titre2
     *
     * @return string
     */
    public function getTitre2()
    {
        return $this->titre2;
    }

    /**
     * Set contenu2
     *
     * @param string $contenu2
     *
     * @return Our
     */
    public function setContenu2($contenu2)
    {
        $this->contenu2 = $contenu2;

        return $this;
    }

    /**
     * Get contenu2
     *
     * @return string
     */
    public function getContenu2()
    {
        return $this->contenu2;
    }

    /**
     * Set titre3
     *
     * @param string $titre3
     *
     * @return Our
     */
    public function setTitre3($titre3)
    {
        $this->titre3 = $titre3;

        return $this;
    }

    /**
     * Get titre3
     *
     * @return string
     */
    public function getTitre3()
    {
        return $this->titre3;
    }

    /**
     * Set contenu3
     *
     * @param string $contenu3
     *
     * @return Our
     */
    public function setContenu3($contenu3)
    {
        $this->contenu3 = $contenu3;

        return $this;
    }

    /**
     * Get contenu3
     *
     * @return string
     */
    public function getContenu3()
    {
        return $this->contenu3;
    }
}
