<?php

namespace App\DataFixtures;

use App\Entity\OfferStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OfferStatusFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $ost = new OfferStatus();
		$ost->setOfferStatus('Open');
        $manager->persist($ost);
         
        $ost1 = new OfferStatus();
		$ost1->setOfferStatus('Accepted');
        $manager->persist($ost1);

        $ost2 = new OfferStatus();
		$ost2->setOfferStatus('Rejected');
        $manager->persist($ost2);
		
        $manager->flush(); 
    }
}