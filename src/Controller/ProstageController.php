<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;



//use Doctrine\ORM\EntityRepository;

class ProstageController extends AbstractController
{
    /**
     * @Route("/", name="prostage-acceuil")
     */



    public function index()
    {
        $repositoryRessources = $this->getDoctrine()->getRepository(stage::class) ;

        $stages = $repositoryRessources->findAll() ;
        return $this->render('prostage/index.html.twig', [
            'stages' => $stages ]);
        
    }

        /**
     * @Route("/entreprise/{id2}", name="entreprise")
     */
    public function afficherEntreprise($id2)
    {
        
        $repositoryRessources = $this->getDoctrine()->getRepository(stage::class) ;
        $repositoryEntreprise = $this->getDoctrine()->getRepository(entreprise::class) ;


        $stagesE = $repositoryRessources->findStageForEntreprise($id2) ;
        $entreprise = $repositoryEntreprise->findOneByNom($id2) ;

        return $this->render('prostage/affichageEntreprise.html.twig', [
            'identifiant' => $id2 , 'stagesE' => $stagesE , 'entreprise' => $entreprise]);

    }
	
	
	        /**
     * @Route("/formation", name="formation")
     */
    public function afficherFormation()
    {
        return $this->render('prostage/affichageFormation.html.twig', [
            'controller_name' => 'Cette page affichera la liste des formation de l \'iut',
        ]);
    }
	
	
		        /**
     * @Route("/stage/{id}", name="stage")
     */
    public function afficherStage($id)
    {
        $repositoryRessources = $this->getDoctrine()->getRepository(stage::class) ;

        $stage = $repositoryRessources->find($id) ;
        return $this->render('prostage/affichageStage.html.twig', [
            'identifiant' => $id ,'stage' => $stage ,] );
    }
	
	
	
	


}
