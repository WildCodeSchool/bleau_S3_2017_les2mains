<?php

namespace CoreBundle\DataFixtures\ORM;

use CommerceBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadProductData extends AbstractFixture implements FixtureInterface
{
    /**
     * Load Product
     */

    public function load(ObjectManager $manager)
    {
        $product = array(
            "La Boulangerie",
            "La Viennoiserie",
            "Le Jardin",
            "L'apiculture",
        );

        foreach ($product as $products)
        {
            $type = new Product();
            $type->setName($products);
            $manager->persist($type);
        }
        $manager->flush();
    }
}