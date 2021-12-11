<?php

namespace App\Controller;

use App\Entity\ProductApplications;
use App\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\EditType;
use App\Entity\ProductStatus;




class ListProductsController extends AbstractController
{
    /**
     * @Route("/listproducts", name="listproducts")
     */
    public function listproducts(ResponseService $responseService)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $wls = $this->getDoctrine()
             ->getRepository(ProductApplications::class)->findAll();
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($wls as $wl) {
            $now = new \DateTime();
            $expires_at = $wl->getExpiresAt();
            if ($expires_at->getTimestamp() < $now->getTimestamp()) {
                $status = $this->getDoctrine()
            ->getRepository(ProductStatus::class)
            ->findOneBy(array('product_status' => 'Sold'));
            $wl->setStatus($status);
            $entityManager->flush();
            }
        }
        return $this->render('default/listproducts.html.twig', array('wls' => $wls));
    }

    /**
     * @Route("/welcome/soldproduct/{id}", methods={"POST"})
     */
    public function sold($id)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $entityManager = $this->getDoctrine()->getManager();
        $active = $entityManager->getRepository(ProductApplications::class)->find($id);

        if (!$active) {
            // $responseService->responseCode(Response::HTTP_NOT_FOUND, 'Application Not Found');
        }

        $status = $this->getDoctrine()
        ->getRepository(ProductStatus::class)
        ->findOneBy(array('product_status' => 'Sold'));
         $active->setStatus($status);
         $entityManager->persist($active);
         $entityManager->flush();

        //  return $responseService->responseCode(Response::HTTP_OK, 'Product sold');
    }

    /**
     * @Route("/welcome/editproduct/{id}", name="edit_product")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id, EntityManagerInterface $em)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $product = $this->getDoctrine()->getRepository(ProductApplications::class)->find($id);

        $form = $this->createForm(EditType::class, $product);
       
        $oldFileName = $product->getphotoname();
       /* $oldFileNamePath = $this->getParameter('kernel.project_dir') . '/public/images'.$product->getphotoname();
        $pictureFile = pathinfo($oldFileName->getClientOriginalName(), PATHINFO_FILENAME);
        $product->setphotoname($pictureFile);*/

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //if($product->getphotoname()!=null){
                $newLogoFile = $form["photoName"]->getData();
                if($newLogoFile!=null){
                $destination = $this->getParameter('kernel.project_dir') . '/public/images';
                $originalPhotoname = pathinfo($newLogoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newPhotoname = $originalPhotoname . $newLogoFile->getClientOriginalExtension();
                try {
                    $newLogoFile->move(
                        $destination,
                        $newPhotoname
                    );
                } catch (Exception $e) {
                    $this->addFlash('error','Internal server error!');

                }
                $product->setphotoname($newPhotoname);
            }
            else{
                $product->setphotoname($oldFileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('listproducts');
        }
        return $this->render('form/edit-form.html.twig', array(
          'form' => $form->createView()
        ));
    }
}    