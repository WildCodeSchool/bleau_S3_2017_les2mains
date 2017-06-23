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
     * @var \CoreBundle\Entity\Picture
     */
    private $picture1;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture2;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture3;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture4;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture5;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture6;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture7;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture8;

    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture9;


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

    /**
     * Set picture1
     *
     * @param \CoreBundle\Entity\Picture $picture1
     *
     * @return Our
     */
    public function setPicture1(\CoreBundle\Entity\Picture $picture1 = null)
    {
        $this->picture1 = $picture1;

        return $this;
    }

    /**
     * Get picture1
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture1()
    {
        return $this->picture1;
    }

    /**
     * Set picture2
     *
     * @param \CoreBundle\Entity\Picture $picture2
     *
     * @return Our
     */
    public function setPicture2(\CoreBundle\Entity\Picture $picture2 = null)
    {
        $this->picture2 = $picture2;

        return $this;
    }

    /**
     * Get picture2
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture2()
    {
        return $this->picture2;
    }

    /**
     * Set picture3
     *
     * @param \CoreBundle\Entity\Picture $picture3
     *
     * @return Our
     */
    public function setPicture3(\CoreBundle\Entity\Picture $picture3 = null)
    {
        $this->picture3 = $picture3;

        return $this;
    }

    /**
     * Get picture3
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture3()
    {
        return $this->picture3;
    }

    /**
     * Set picture4
     *
     * @param \CoreBundle\Entity\Picture $picture4
     *
     * @return Our
     */
    public function setPicture4(\CoreBundle\Entity\Picture $picture4 = null)
    {
        $this->picture4 = $picture4;

        return $this;
    }

    /**
     * Get picture4
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture4()
    {
        return $this->picture4;
    }

    /**
     * Set picture5
     *
     * @param \CoreBundle\Entity\Picture $picture5
     *
     * @return Our
     */
    public function setPicture5(\CoreBundle\Entity\Picture $picture5 = null)
    {
        $this->picture5 = $picture5;

        return $this;
    }

    /**
     * Get picture5
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture5()
    {
        return $this->picture5;
    }

    /**
     * Set picture6
     *
     * @param \CoreBundle\Entity\Picture $picture6
     *
     * @return Our
     */
    public function setPicture6(\CoreBundle\Entity\Picture $picture6 = null)
    {
        $this->picture6 = $picture6;

        return $this;
    }

    /**
     * Get picture6
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture6()
    {
        return $this->picture6;
    }

    /**
     * Set picture7
     *
     * @param \CoreBundle\Entity\Picture $picture7
     *
     * @return Our
     */
    public function setPicture7(\CoreBundle\Entity\Picture $picture7 = null)
    {
        $this->picture7 = $picture7;

        return $this;
    }

    /**
     * Get picture7
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture7()
    {
        return $this->picture7;
    }

    /**
     * Set picture8
     *
     * @param \CoreBundle\Entity\Picture $picture8
     *
     * @return Our
     */
    public function setPicture8(\CoreBundle\Entity\Picture $picture8 = null)
    {
        $this->picture8 = $picture8;

        return $this;
    }

    /**
     * Get picture8
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture8()
    {
        return $this->picture8;
    }

    /**
     * Set picture9
     *
     * @param \CoreBundle\Entity\Picture $picture9
     *
     * @return Our
     */
    public function setPicture9(\CoreBundle\Entity\Picture $picture9 = null)
    {
        $this->picture9 = $picture9;

        return $this;
    }

    /**
     * Get picture9
     *
     * @return \CoreBundle\Entity\Picture
     */
    public function getPicture9()
    {
        return $this->picture9;
    }
}
