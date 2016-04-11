<?php

namespace AnimalBundle\DataFixtures\ORM;

use AnimalBundle\Entity\Color;
use AnimalBundle\Entity\Species;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BaseFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->loadColors($manager);
        $this->loadSpecieses($manager);
    }

    private function loadColors(ObjectManager $em)
    {
        $colors = [['Зелёный', 'green'], ['Оранжевый', 'orange'], ['Фиолетовый', 'magenta']];
        foreach ($colors as $c) {
            $color = new Color();
            $color->setTitle($c[0]);
            $color->setCode($c[1]);
            $em->persist($color);
        }
        $em->flush();
    }

    private function loadSpecieses(ObjectManager $em)
    {
        $specieses = [['Кошка', 'https://pp.vk.me/c615727/v615727050/5a59/w77Fa4TBDXY.jpg'],
            ['Собака', 'http://boobooka.com/wp-content/uploads/2014/02/phoca_thumb_l_dog-pooping.gif'],
            ['Поняша', 'https://pp.vk.me/c630021/v630021663/23dc2/MMg3_-enAQY.jpg']];
        foreach ($specieses as $s) {
            $species = new Species();
            $species->setTitle($s[0]);
            $species->setImage($s[1]);
            $em->persist($species);
        }
        $em->flush();
    }
}
