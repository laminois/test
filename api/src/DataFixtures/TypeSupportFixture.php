<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TypeSupport;

class TypeSupportFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1 ; $i <= 20; ++$i){
            $manager->persist((new TypeSupport())->setLibelle('type'.$i));
        }

        $manager->flush();
    }
}
