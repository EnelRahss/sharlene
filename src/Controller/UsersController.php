<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


class UsersController extends AbstractController
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hash,
        private readonly EntityManagerInterface $em,
        private readonly UserRepository $repo
    ){}

    #[Route('/users', name: 'app_users')]
    public function index(): Response
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    #[Route('/register', name: 'app_register_create')]
    public function create(
        Request $request
    ): Response {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()
    ) {
            $user->setStatus(false);
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->hash->hashPassword($user, $user->getPassword()));

            $this->em->persist($user);
            $this->em->flush();
            // try {
            //     //ajout du compte utilisateur
            //     $this->usersService->create($user);
                
            //     //construction du corp du mail  
            //     $body = $this->render('email/activation.html.twig', ["id" => $user->getId()]);
            //     ////envoi du mail
            //     //$this->emailService->sendEmail($user->getEmail(), "Activation du compte", $body->getContent());
            //     $type = 'success';
            //     $msg = 'Le compte a ete ajoute';
      
            // } catch (\Throwable $th) {
            //     $msg = $th->getMessage();
            //     $type = "danger";
            // }
            
            //affichage du message
            $this->addFlash('success','user bien créé');
         }
        return $this->render('users/index.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }
}
