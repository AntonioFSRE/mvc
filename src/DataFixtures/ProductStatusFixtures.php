<?php

namespace App\DataFixtures;

use App\Entity\ProductStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductStatusFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $sts = new ProductStatus();
		$sts->setProductStatus('Active');
        $manager->persist($sts);
         
        $sts1 = new ProductStatus();
		$sts1->setProductStatus('Sold');
        $manager->persist($sts1);
		
        $manager->flush(); 
    }
}