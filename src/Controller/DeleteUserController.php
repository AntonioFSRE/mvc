<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;


class DeleteUserController extends AbstractController
{
    /**
     * @Route("/listuser", name="listuser")
     */
    public function listuser(ResponseService $responseService)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $usrs = $this->getDoctrine()
            ->getRepository(User::class)->findAll();

        return $this->render('default/user.html.twig', array('usrs' => $usrs));
    }

    /**
     * @Route("/listuser/deleteuser/{id}", methods={"POST"})
     *
     */
    public function deleteuser(Request $request, $id) {
    $entityManager = $this->getDoctrine()->getManager();
    $usr = $this->getDoctrine()->getRepository(User::class)->find($id);
    $usr->setRoles(["ROLE_USER"]);
    $entityManager->persist($usr);
    $entityManager->flush();

    }
}



