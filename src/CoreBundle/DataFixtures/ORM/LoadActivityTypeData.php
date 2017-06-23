<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\ActiviteType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadActivityTypeData extends AbstractFixture implements FixtureInterface
{
    /**
     * Load ActivityType
     */

    public function load(ObjectManager $manager)
    {
        $activity = array(
            'La Bouche',
            "L'humain",
            'La Terre',
            'Les Mains',

        );

        foreach ($activity as $activities)
        {
            $type = new ActiviteType();
            $type->setNom($activities);
            $manager->persist($type);
            $manager->flush();
        }
    }
}



