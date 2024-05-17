<?php

namespace App\Controller;

use App\Entity\Followup;
use App\Form\FollowupType;
use App\Repository\FollowupRepository;
use App\Repository\HousingRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Service\FollowupService;


class FollowupController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $em, 
        private readonly FollowupRepository $repo,
        private readonly FollowupService $followupService){

    }

    #[Route('/followup', name: 'app_followup')]

    #[IsGranted('ROLE_ADMIN')]
    public function index(Request $request): Response
    {
        $follow=new Followup();
        $form=$this->createForm(FollowupType::class, $follow);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            //Nettoyage des données 

            try {
                $verifDoublon = $this->repo->findOneBy(['title' => $follow->getTitle(), 'createAt' => $follow->getCreateAt()]);

                if(!$verifDoublon){
                    $follow->setStatus(true);
                    //ajout du compte via le service
                    $this->followupService->create($follow);
                    $type = 'success';
                    $message = 'Bien enregistré';
                }
                else{
                    $type = 'warning';
                    $message = 'Attention ce suivi existe déjà pour la même horaire';
                }            
            } catch (\Throwable $th) {
                $type = 'danger';
            $message = $th->getMessage();           
            }

            $this->addFlash($type, $message);

        }

        return $this->render('followup/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
