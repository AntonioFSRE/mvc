<?php

namespace App\Controller;

use App\Entity\OfferApplications;
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
use App\Repository\OfferApplicationsRepository;
use App\Repository\ProductApplicationsRepository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\EntityManagerInterface;


class AllOffersController extends AbstractController
{
    /**
     * @Route("/alloffers", name="alloffers")
     */
    public function alloffers(ResponseService $responseService, OfferApplicationsRepository $offerApplicationsrepository)
    {
        //   $cvs = $this->getDoctrine()
        //       ->getRepository(OfferApplications::class)->getAllOffers();
        $my_user = $this->getUser();
        $cvs = $offerApplicationsrepository->findAll();

        return $this->render('default/alloffers.html.twig', array('cvs' => $cvs,'my_user' => $my_user));
         
    }
}
