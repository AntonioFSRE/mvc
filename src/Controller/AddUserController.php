<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Form\UserType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AddUserController extends AbstractController
{
    /**
     * @Route("/addUser", name="adding_user")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, MailerInterface $mailer): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $pass = random_int(10000000, 1000000000);
           // $user->setPlainPassword($pass)
            $password = $passwordEncoder->encodePassword($user, $pass);
            $user->setPassword($password);
            $user->setIsActive(1);
            $user->setRoles(["ROLE_ADMIN"]);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            
            $email = (new Email())
                ->from('auctionswebapp@example.com')
                ->to($user->getEmail())
                ->subject($user->getUsername())
                ->text((string)$pass);

            $mailer->send($email);

           // $this->addFlash('success', 'Email sent!');

            return $this->redirectToRoute('listuser');
        }

        return $this->render(
            'form/addUser.html.twig',
            ['form' => $form->createView()]);
    }

}