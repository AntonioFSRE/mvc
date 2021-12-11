<?php


namespace App\Controller;


use App\Entity\ProductApplications;
use App\Entity\Currency;
use App\Entity\ProductStatus;
use App\Service\ResponseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends AbstractController
{

    public function product(EntityManagerInterface $em, Request $request,ResponseService $responseService){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if(!$request->get('product_name') || !$request->get('description') || !$request->get('deliverytime') || !$request->get('expires_at') || !$request->get('starting_price') || !$request->get('currency') || !$request->files->get('photoName')){
            $responseService->responseCode(Response::HTTP_BAD_REQUEST, 'Bad Request!');
            $this->addFlash('warning','All fields must be filled!');
        }else{
            $product_name = $request->get('product_name');
            $description = $request->get('description');
            $deliverytime = $request->get('deliverytime');
            $expires_at = $request->get('expires_at');
            $starting_price = $request->get('starting_price')*100;
            $currency = $request->get('currency');
            $uploadedPhoto = $request->files->get('photoName');
            $status = $this->getDoctrine()
            ->getRepository(ProductStatus::class)
            ->findOneBy(array('product_status' => 'Active'));
            if($uploadedPhoto->getClientOriginalExtension() === "png" || $uploadedPhoto->getClientOriginalExtension() === "jpg" || $uploadedPhoto->getClientOriginalExtension() === "jpeg"){
                if (!$product_name || !$description || !$deliverytime || !$expires_at || !$starting_price || !$currency || !$uploadedPhoto) {
                    $this->addFlash('warning','All fields must be filled!');
                } else {
                    $destination = $this->getParameter('kernel.project_dir') . '/public/images';
                    $originalPhotoname = pathinfo($uploadedPhoto->getClientOriginalName(), PATHINFO_FILENAME);
                    $newPhotoname = $originalPhotoname .'.'. $uploadedPhoto->getClientOriginalExtension();
                    try {
                        $uploadedPhoto->move(
                            $destination,
                            $newPhotoname
                        );
                    } catch (Exception $e) {
                        $this->addFlash('error','Internal server error!');

                    }
                    $cur = $this->getDoctrine()->getRepository(Currency::class)->find($currency);

                    $pro = new ProductApplications();
                    $pro->setProductName($product_name);
                    $pro->setDescription($description);
                    $pro->setDeliveryTime($deliverytime);
                    $pro->setExpiresAt( new \DateTime ($expires_at));
                    $pro->setStartingPrice($starting_price);
                    $pro->setCurrency($cur);
                    $pro->setphotoname($newPhotoname);
                    $pro->setStatus($status);
                    $em->persist($pro);
                    $em->flush();
            
                    $this->addFlash('success','New product added!');
                    $responseService->responseCode(Response::HTTP_OK, 'Success!');
                }
            } else {
                $responseService->responseCode(Response::HTTP_BAD_REQUEST, 'File format is not supported');
                $this->addFlash('error','File format is not supported');
            }

        }

    }
}