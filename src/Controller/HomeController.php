<?php 

namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;


class HomeController extends AbstractController{

    #[Route('/home', name: 'app_home', methods: 'GET')]
    public function home() : Response
    {
        $user = $this->getUser();
        if ($user != null) {
            return $this->render('home/home.html.twig');
        }
        else{
            return $this->redirect('/');
        }
    }

    #[Route('/mail/test/notification/send', name: 'app_tests_mail_notification', methods: 'GET')]
    public function sendMail(MailerInterface $mailer) : Response
    {
        $email = (new Email())
            ->from('emanuel.castillo0118@outlook.es')
            ->to('user@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        $mailer->send($email);
        return new Response('done');
    }
}


?>