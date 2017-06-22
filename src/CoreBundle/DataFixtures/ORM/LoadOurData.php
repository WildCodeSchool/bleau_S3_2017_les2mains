<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Our;
use CoreBundle\Entity\Picture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadOurData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $our = new Our();
        $our->setTitre1('Nous')
            ->setContenu1('fkdbvfjehvbdjh')
            ->setTitre2('Nous')
            ->setContenu2('fkdbvfjehvbdjh')
            ->setTitre3('Nous')
            ->setContenu3('fkdbvfjehvbdjh');

        $manager->persist($our);
        $manager->flush();

        $pic = new Our();
        $pic->setPicture1('http://img08.deviantart.net/2c6f/i/2013/082/a/c/png_grass_by_moonglowlilly-d5z1o5t.png');
        /*  ->setPicture2('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3')
          ->setPicture3('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3')
          ->setPicture4('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3')
          ->setPicture5('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3')
          ->setPicture6('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3')
          ->setPicture7('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3')
          ->setPicture8('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3')
          ->setPicture9('https://www.timeshighereducation.com/sites/default/files/styles/the_breaking_news_image_style/public/plant-shoot-being-watered-with-watering-can.jpg?itok=LJpuDrF3');*/

        $manager->persist($pic);
        $manager->flush();

    }


}