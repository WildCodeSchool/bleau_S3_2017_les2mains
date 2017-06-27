<?php

namespace CommerceBundle\Entity;

/**
 * Product
 */
class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;


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
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Product
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @var \CommerceBundle\Entity\Category
     */
    private $categories;


    /**
     * Set categories
     *
     * @param \CommerceBundle\Entity\Category $categories
     *
     * @return Product
     */
    public function setCategories(\CommerceBundle\Entity\Category $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \CommerceBundle\Entity\Category
     */
    public function getCategories()
    {
        return $this->categories;
    }
    /**
     * @var \CoreBundle\Entity\Picture
     */
    private $picture;


    /**
     * Set picture
     *
     * @param \CoreBundle\Entity\Picture $picture
     *
     * @return Product
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
}
