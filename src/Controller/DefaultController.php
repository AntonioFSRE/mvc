<?php

namespace App\Controller;

use App\Entity\OfferApplications;
use App\Entity\OfferStatus;
use App\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OfferApplicationsRepository;
use App\Service\Mailer\MailerServiceInterface;

/**
 * Default controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/home", defaults={}, name="homepage")
     */
    public function index(ResponseService $responseService,OfferApplicationsRepository $offerApplicationsrepository )
    {
 
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $cvs = $offerApplicationsrepository->findAll();

        return $this->render('default/index.html.twig', array('cvs' => $cvs));
        
    }

    /**
     * @Route("/home/reject/{id}", methods={"POST"})
     *
     */
    public function reject($id, ResponseService $responseService) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $entityManager = $this->getDoctrine()->getManager();
        $rejected = $entityManager->getRepository(OfferApplications::class)->find($id);

        if (!$rejected) {
            $responseService->responseCode(Response::HTTP_NOT_FOUND, 'Application Not Found');
        }

        $status = $this->getDoctrine()
            ->getRepository(OfferStatus::class)
            ->findOneBy(array('offer_status' => 'Rejected'));
        $rejected->setStatus($status);
        $entityManager->persist($rejected);
        $entityManager->flush();    
        return $responseService->responseCode(Response::HTTP_OK, 'Offer rejected!');

    }

    /**
     * @Route("/home/accept/{id}", methods={"POST"})
     */
    public function archive($id, ResponseService $responseService,MailerServiceInterface $mailerServiceInterface) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $entityManager = $this->getDoctrine()->getManager();
        $active = $entityManager->getRepository(OfferApplications::class)->find($id);

        if (!$active) {
            $responseService->responseCode(Response::HTTP_NOT_FOUND, 'Application Not Found');
        }
        $email = $active->getUser()->getEmail();
        $first_name = $active->getUser()->getFirstName();
        $offer = $active->getOffer();
        $currency_name = $active->getCurrency()->getCurrency();
        $status = $this->getDoctrine()
        ->getRepository(OfferStatus::class)
        ->findOneBy(array('offer_status' => 'Accepted'));
        $active->setStatus($status);
        $entityManager->flush();    

        $mailerServiceInterface->send(
            "auctions@mail.com",
            $email,
            'Offer Accepted!',
            "email/offer_accepted.html.twig",["first_name" => $first_name, "offer" => $offer, "currency_name" => $currency_name]
        );
        return $responseService->responseCode(Response::HTTP_OK, 'Accepted Successful');
    }

    /**
     * @Route("/home/active/{id}", methods={"POST"})
     */
    public function active($id, ResponseService $responseService) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $entityManager = $this->getDoctrine()->getManager();
        $accepted = $entityManager->getRepository(OfferApplications::class)->find($id);

        if (!$accepted) {
            $responseService->responseCode(Response::HTTP_NOT_FOUND, 'Application Not Found');
        }

        $status = $this->getDoctrine()
        ->getRepository(OfferStatus::class)
        ->findOneBy(array('offer_status' => 'Open'));
        $accepted->setStatus($status);
        $entityManager->flush();

        return $responseService->responseCode(Response::HTTP_OK, 'Activation Successful');
    }
}
