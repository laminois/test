<?php

namespace App\DataFixtures;

use App\Entity\Support;
use App\Entity\TypeSupport;
use App\Repository\TypeSupportRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SupportFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        for($i = 1 ; $i <= 20; ++$i){
//            $support = new Support();
//            $support->setLibelle("support" . $i);
//            $support->setTypeSupport('{"id" : 0}');
//            $manager->persist($support);
//            $this->addReference('typeSupport'.$i, $support);
//        }

        $manager->flush();
    }

}
