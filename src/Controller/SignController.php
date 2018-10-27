<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\PersonType;
use App\Message\Inscription;
use App\Message\Notification;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class SignController extends AbstractController
{
    /**
     * @Route("/sign", name="sign")
     * @Method({"GET"})
     */
    public function index(Request $request, MessageBusInterface $bus)
    {
        $user = new User();

//        $form = $this->createForm(PersonType::class, $user);
//
//        if($form->handleRequest($request) && $form->isSubmitted()) {
//            if($form->isValid()) {
//                $person->setAuthor($user);
//                $bus->dispatch(new Inscription($person));
//                //$bus->dispatch(new Notification(sprintf('Bonjour, nous avons un nouvel inscrit sur l\'application %s %s par %s', $person->getFirstName(), $person->getLastName(), $person->getAuthor()->getLogin()), ['admin@webnet.fr']));
//
//                return $this->redirectToRoute('sign');
//            }
//        }

        return $this->render('sign/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
