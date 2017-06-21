<?php

namespace CoreBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Picture
 */
class Picture
{

    private $tempName;


    private $file;

    /**
     * @param mixed $file
     */
    public function setFile(UploadedFile $file)
    {
        if($this->src != null)
        {
         $this->tempName = $this->src;

         $this->url=null;
         $this->alt=null;
        }

        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    public function preUpload()
    {
        if($this->tempName != null)
        {
            unlink($this->getUploadDir() . $this->tempName);
        }

        $this->src = uniqid() . '.' . $this->file->guessExtension();
        $this->alt = $this->file->getClientOriginalName();



    }

    /**
     * @ORM\PostPersist
     */
    public function postUpload()
    {
      $this->file->move($this->getUploadDir(), $this->src);
    }

    /**
     * @ORM\PreRemove
     */
    public function preRemove()
    {
        $this->tempName = $this->src;
    }

    /**
     * @ORM\PostRemove
     */
    public function remove()
    {
        unlink($this->getUploadDir() . $this->src);
    }

    private function getUploadDir()
    {
        return __DIR__ . '/../../../web/uploads/images/';
    }


    //generate code
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $alt;


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
     * Set url
     *
     * @param string $url
     *
     * @return Picture
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Picture
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @ORM\PrePersist
     */
    /**
     * @var string
     */
    private $src;


    /**
     * Set src
     *
     * @param string $src
     *
     * @return Picture
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }
}
