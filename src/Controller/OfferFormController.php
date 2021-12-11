<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class OfferFormController extends AbstractController
{
    /**
     * @Route("/form", name="offer-form")
     */
    public function form(): Response
    {
        return $this->render('form/offer-form.html.twig');

    }
}
