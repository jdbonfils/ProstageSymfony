<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response ;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType ;
use App\Form\EntrepriseType ;
use App\Form\StageType ;
use App\Form\FormationType ;

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
     * @Route("/admin/ajouterEntreprise", name="ajouterEntreprise")
     */
    public function ajouterEntrepriseRequest(Request $request, ObjectManager $manager)
    {
        //Création d'une entreprise
        $entreprise = new Entreprise() ;
        //Création d'un objet formulaire
        $formulaireEntreprise = $this->createForm(EntrepriseType::class, $entreprise);

        $vueFormulaire = $formulaireEntreprise->createView() ;


        $formulaireEntreprise->handleRequest($request);
         if ($formulaireEntreprise->isSubmitted() )
         {
          
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($entreprise);
            $manager->flush();
            // Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('prostage-acceuil');
         }

        return $this->render('prostage/ajouterEntreprise.html.twig',['vueFormulaire'=> $vueFormulaire, 'action'=>"ajouter"]);
        
    }

     /**
     * @Route("/entreprise/admin/modifier/{id}", name="modifEntreprise")
     */
    public function modifierEntreprise(Request $request, ObjectManager $manager, Entreprise $entreprise)
    {
        // Création du formulaire permettant de saisir une ressource
        $formulaireEntreprise = $this -> createFormBuilder($entreprise)
                                      -> add('nom',TextType::class , ['constraints' => new NotBlank()])
                                      -> add('activite')
                                      -> add('adresse')
                                      -> getForm();
        
        $formulaireEntreprise->handleRequest($request);

         if ($formulaireEntreprise->isSubmitted() )
         {
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($entreprise);
            $manager->flush();
            // Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('prostage-acceuil');
         }
        // Afficher la page présentant le formulaire d'ajout d'une ressource
        return $this->render('prostage/ajouterEntreprise.html.twig',['vueFormulaire' => $formulaireEntreprise->createView(), 'action'=>"modifier"]);
    }

    /**
     * @Route("/AjouterStage", name="ajouterStage")
     */
    public function ajouterStageRequest(Request $request, ObjectManager $manager)
    {
        //Création d'une entreprise
        $stage = new Stage() ;
        //Création d'un objet formulaire
        $formulaireStage = $this->createForm(StageType::class, $stage);

        $vueFormulaire = $formulaireStage->createView() ;


        $formulaireStage->handleRequest($request);
         if ($formulaireStage->isSubmitted() )
         {
          
            // Enregistrer la ressource en base de donnéelse
            $manager->persist($entreprise);
            $manager->flush();
            // Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('prostage-acceuil');
         }

        return $this->render('prostage/AjouterStage.html.twig',['vueFormulaire'=> $vueFormulaire]);
        
    }
	


}
