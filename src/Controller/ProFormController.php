<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\CurrencyRepository;

class ProFormController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function form(CurrencyRepository $currencyRepository): Response
    {
        $curs = $currencyRepository->findAll();
        return $this->render('form/product-form.html.twig', array('curs' => $curs));

    }

    /**
     * @Route("/welcome/editproduct/{id}", name="edit_product")
     */
    public function curs(CurrencyRepository $currencyRepository): Response
    {
        $curs = $currencyRepository->findAll();
        return $this->render('form/edit-form.html.twig', array('curs' => $curs));

    }
}
