<?php

namespace App\DataFixtures;

use App\Entity\Currency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CurrencyFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $cur = new Currency();
		$cur->setCurrency('EUR');
        $manager->persist($cur);
         
        $cur1 = new Currency();
		$cur1->setCurrency('USD');
        $manager->persist($cur1);

        $cur2 = new Currency();
		$cur2->setCurrency('GBP');
        $manager->persist($cur2);

        $cur3 = new Currency();
		$cur3->setCurrency('BAM');
        $manager->persist($cur3);

        $cur4 = new Currency();
		$cur4->setCurrency('HRK');
        $manager->persist($cur4);

        $cur5 = new Currency();
		$cur5->setCurrency('CHF');
        $manager->persist($cur5);
		
        $manager->flush(); 
    }
}