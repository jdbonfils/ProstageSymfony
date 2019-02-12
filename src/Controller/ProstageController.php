<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\constraints\NotBlank;
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
     * @Route("/formation/{idFormation}", name="formation")
     */
    public function afficherFormation($idFormation)
    {

        $repositoryRessources = $this->getDoctrine()->getRepository(stage::class) ;
       // $repositoryFormation = $this->getDoctrine()->getRepository(formation::class) ;


        $stageF = $repositoryRessources->findStageForFormation($idFormation) ;
       //$formation = $repositoryFormation->findOneByNom($idFormation) ;
        return $this->render('prostage/affichageFormation.html.twig', [
            'controller_name' => 'Cette page affichera la liste des formation de l \'iut','identifiant' => $idFormation , 'stageF' => $stageF ]);
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
	
	
	/**
     * @Route("/ajouterEntreprise", name="ajouterEntreprise")
     */
    public function ajouterEntrepriseRequest( /*$request, ObjectManager $manager*/)
    {
        //Création d'une entreprise
        $entreprise = new Entreprise() ;
        //Création d'un objet formulaire
        $formulaireEntreprise = $this -> createFormBuilder($entreprise)
                                      -> add('nom',TextType::class , ['constraints' => new NotBlank()])
                                      -> add('activite')
                                      -> add('adresse', ['constraints' => new NotBlank()])
                                      -> getForm();

        $vueFormulaire = $formulaireEntreprise->createView() ;


      /*  $formulaireEntreprise->handleRequest($request);
         if ($formulaireEntreprise->isSubmitted() )
         {
            // Mémoriser la date d'ajout de la ressources
            $entreprise->setDateAjout(new \dateTime());
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($entreprise);
            $manager->flush();
            // Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('openclassdut_accueil');
         }*/

        return $this->render('prostage/ajouterEntreprise.html.twig',['vueFormulaire'=> $vueFormulaire]);
        
    }
	


}
