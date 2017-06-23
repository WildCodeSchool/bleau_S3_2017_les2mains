<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\ActiviteType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;



class LoadActivityTypeData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $activity= new ActiviteType();
        $activity
    }
}