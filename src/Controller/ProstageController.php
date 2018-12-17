<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProstageController extends AbstractController
{
    /**
     * @Route("/", name="prostage-acceuil")
     */
    public function index()
    {
        return $this->render('prostage/index.html.twig', [
            'controller_name' => 'Bienvenue sur Prostage',
        ]);
    }

        /**
     * @Route("/entreprise", name="entreprise")
     */
    public function afficherEntreprise()
    {
        return $this->render('prostage/affichageEntreprise.html.twig', [
            'controller_name' => 'Cette page affichera la liste des entreprises',
        ]);
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
        return $this->render('prostage/affichageStage.html.twig', [
            'identifiant' => $id ,
        ]);
    }
	
	
	
	


}
