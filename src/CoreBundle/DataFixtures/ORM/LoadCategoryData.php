<?php

namespace CoreBundle\DataFixtures\ORM;

use CommerceBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadCategoryData extends AbstractFixture implements FixtureInterface
{
    /**
     * Load Category
     */

    public function load(ObjectManager $manager)
    {
        $category = array(
            "La Boulangerie",
            "La Viennoiserie",
            "Le Jardin",
            "L'apiculture",
        );

        foreach ($category as $categories)
        {
            $type = new Category();
            $type->setType($categories);
            $manager->persist($type);
        }
        $manager->flush();
    }
}


