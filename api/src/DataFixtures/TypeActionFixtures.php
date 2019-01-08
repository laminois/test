<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TypeAction;

class TypeActionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1 ; $i <= 20; ++$i){
            $manager->persist((new TypeAction())->setLibelle('type'.$i));
        }

        $manager->flush();
    }

}