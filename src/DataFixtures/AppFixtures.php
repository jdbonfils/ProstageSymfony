<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
		//Création d'un générateur de données faker
		
		$faker = \Faker\Factory::create('fr_FR') ;
		
         $DutInformatique = new Formation();
		 $DutInformatique->setNom("DutInformatique") ;
		 $DutInformatique->setNomComplet("Diplome Universitaire et technologique d'Informatique") ;
		 $DutInformatique->addStage($stage1);
		 $DutInformatique->addStage($stage4);
		  $manager->persist($DutInformatique);
		  
		 $DuTic = new Formation();
		 $DuTic->setNom("DU TIC") ;
		 $DuTic->setNomComplet("Diplome universitaire de TIC") ;
		 $DuTic->addStage($stage3) ;
		 $DuTic->addStage($stage5) ;
		  $manager->persist($DuTic);
		 
		 $LpMultimedia = new Formation();
		 $LpMultimedia->setNom("Lp Multimedia") ;
		 $LpMultimedia->setNomComplet("License professionel multimedia") ;
		 $LpMultimedia->addStage($stage2) ;
		  $manager->persist($LpMultimedia);
		  
		  
		  
		 $stage1 = new Stage() ;
		 $stage1-> setTitre("Developpement d'un sharepoint") ;
		 $stage1-> setDescription(faker->realText($maxNbChars = 100, $indexSize = 2)) ;
	   	 $stage1-> setContact(faker->email());
		 $stage1-> addFormation($DutInformatique) ;
		 $stage1-> setEntreprise($Safran) ;
		 $manager->persist($stage1);


		 $stage2 = new Stage() ;
		 $stage2-> setTitre("Developpement d'un jeux video") ;
		 $stage2-> setDescription(faker->realText($maxNbChars = 100, $indexSize = 2)) ;
	   	 $stage2-> setContact(faker->email());
		 $stage2-> addFormation($LpMultimedia) ;
		 $stage2-> setEntreprise($Ubisoft) ;
		 $manager->persist($stage2);


		 $stage3 = new Stage() ;
		 $stage3-> setTitre("Creation d'un site web eco responsable") ;
		 $stage3-> setDescription(faker->realText($maxNbChars = 100, $indexSize = 2)) ;
	   	 $stage3-> setContact(faker->email());
		 $stage3-> addFormation($DuTic) ;
		 $stage3-> setEntreprise($Bizi) ;
		 $manager->persist($stage3);


		 $stage4 = new Stage() ;
		 $stage4-> setTitre("Mettre à jour un site web et une BD") ;
		 $stage4-> setDescription(faker->realText($maxNbChars = 100, $indexSize = 2)) ;
	   	 $stage4-> setContact(faker->email());
		 $stage4-> addFormation($DutInformatique) ;
		 $stage4-> setEntreprise($ScopeBidegorry) ;
		 $manager->persist($stage4);



		 $stage5 = new Stage() ;
		 $stage5-> setTitre("Developpement d'une application") ;
		 $stage5-> setDescription(faker->realText($maxNbChars = 100, $indexSize = 2)) ;
	   	 $stage5-> setContact(faker->email());
		 $stage5-> addFormation($DuTic) ;
		 $stage5-> setEntreprise($Safran) ;
		 $manager->persist($stage5);






		 $Safran = new Entreprise();
		 $Safran->setNom("Safran") ;
		 $Safran->setActivite(faker->bs()) ;
		 $Safran->setAdresse(faker->address());
		 $Safran->addStage($stage1) ;
		 $Safran->addStage($stage5) ;
		  $manager->persist($Safran);



		 $Ubisoft = new Entreprise();
		 $Ubisoft->setNom("Ubisoft") ;
		 $Ubisoft->setActivite(faker->bs()) ;
		 $Ubisoft->setAdresse(faker->address());
		 $Ubisoft->addStage($stage2);
		 $manager->persist($Ubisoft);


		 $Bizi = new Entreprise();
		 $Bizi->setNom("Bizi") ;
		 $Bizi->setActivite(faker->bs()) ;
		 $Bizi->setAdresse(faker->address());
		 $Bizi->addStage($stage3);
		 $manager->persist($Bizi);


		 $ScopeBidegorry = new Entreprise();
		 $ScopeBidegorry->setNom("ScopeBidegorry") ;
		 $ScopeBidegorry->setActivite(faker->bs()) ;
		 $ScopeBidegorry->setAdresse(faker->address());
		 $ScopeBidegorry->addStage($stage4);
		 $manager->persist($ScopeBidegorry);




		 
        

        $manager->flush();
    }
}
