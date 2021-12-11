<?php

namespace App\Controller;

use App\Entity\ProductApplications;
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
use App\Repository\ProductApplicationsRepository;

class FrontPageController extends AbstractController
{
    /**
     * @Route("/", name="frontpage")
     */
    public function frontpage()
    {
        $now = new \DateTime();
        $fps = $this->getDoctrine()
            ->getRepository(ProductApplications::class)->findAllActive($now);

        return $this->render('default/frontpage.html.twig', array('fps' => $fps));
    }
}