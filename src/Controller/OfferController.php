<?php


namespace App\Controller;

use App\Form\OfferType;
use App\Entity\OfferApplications;
use App\Entity\ProductApplications;
use App\Service\ResponseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\Mailer\MailerServiceInterface;
use Doctrine\DBAL\Types\DateTimeType as TypesDateTimeType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Controller\AllOffersController;
use App\Entity\OfferStatus;
use App\Repository\OfferStatusRepository;
use App\Entity\User;

class OfferController extends AbstractController
{   

    /**
     * @Route("/offer/{id}", name="offer")
     */
    public function form(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(ProductApplications::class)
            ->find($id);

         $ofs = $this->getDoctrine()
         ->getRepository(OfferApplications::class)
         ->findBy(array('product_id' => $id) );   
         
        return $this->render('form/offer-form.html.twig', ['product' => $product, 'ofs' => $ofs ]);

    }
     /**
     * @Route("/offer/send/{id}", methods={"POST"})
     */
    public function create($id, EntityManagerInterface $em, Request $request,MailerServiceInterface $mailerServiceInterface){
        
        if(!$request->get('offer')){
           
            $this->addFlash('offer','Offer field must be filled!');
        }else{

            $user_id = $this->getUser();
            $email = $user_id->getEmail();
            $offer = $request->get('offer')*100;
            $time = new \DateTime();
            $status = $this->getDoctrine()
            ->getRepository(OfferStatus::class)
            ->findOneBy(array('offer_status' => 'Open'));
            $product_id = $this->getDoctrine()
            ->getRepository(ProductApplications::class)
            ->find($id);
            $currency = $product_id->getCurrency();
            $starting_price = $product_id->getStartingPrice();
            $currency_name = $currency->getCurrency();
                if (!$offer) {
                    $this->addFlash('offer','Offer field must be filled!');
                } 
                else if($offer < $starting_price){
                    $this->addFlash('offer','Offer must be greater that the starting price!');
                }
                else {
                             
                    $of = new OfferApplications();
                    $of->setUser($user_id);
                    $of->setOffer($offer);
                    $of->setTime($time);
                    $of->setCurrency($currency);
                    $of->setStatus($status);
                    $of->setProduct($product_id);
                    $em->persist($of);
                    $em->flush();


                    $mailerServiceInterface->send(
                        "auctions@mail.com",
                        $email,
                        'Offer submitted!',
                        "email/offer_response.html.twig",["offer" => $offer, "currency_name" => $currency_name]
                    );

                    //$responseService->responseCode(Response::HTTP_OK, 'Success!');
                    $this->addFlash('offer-sent','Offer successfuly sent!');

                }
                
            } 
                
        }

    }
