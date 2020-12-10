<?php

// src/Service/gestionContact.php

namespace App\Service;

use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ContactRepository;
use App\Repository\MessageRepository;
use \Mailjet\Resources;

/**
 * Description of GestionContact
 *
 * @author charles.valentin
 */
class GestionContact {

//documentation : https://swiftmailer.symfony.com/docs/sending.html
    private \Swift_Mailer $mail;
    private Environment $environnementTwig;
    private ManagerRegistry $doctrine;
    private MessageRepository $repo;

    function __construct(\Swift_Mailer $mail, Environment $environnementTwig, ManagerRegistry $doctrine, MessageRepository $repo) {
        $this->mail = $mail;
        $this->environnementTwig = $environnementTwig;
        $this->doctrine = $doctrine;
        $this->repo = $repo;
    }

    public function envoiMailContact(Message $message) {
//        //$titre = ($contact->getTitre() == 'M') ? ('Monsieur') : ('Madame');
//        $email = (new \Swift_Message('Demande de renseignement'))
//                ->setFrom([$message->getMail()=>'Nouvelle demande'])
//                //->setTo(['contact@valentincharlesbtssio@gmail.com'=> 'Valentin Charles Symfony'])
//                ->setTo(['contact@valentincharlesbtssio@gmail.com'=> 'Valentin Charles Symfony']) ;
//           //$img=  $email->embed(\Swift_Image::fromPath('build/images/symfony.png'));
//           $email->setBody(
//                        $this->environnementTwig->render(
//                                // templates/emails/registration.html.twig
//                                'mail/mail.html.twig',
//                                ['message' => $message]
//                        ),
//                        'text/html'
//                );
//            $email->attach(\Swift_Attachment::fromPath('documents/presentation.pdf'));
//        $this->mail->send($email);
        $mj = new \Mailjet\Client('7c8e25e953430df0c75141807244589e', '143de01db818386225f123223736428f', true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "valentincharlesbtssio@gmail.com",
                        'Name' => "Valentin"
                    ],
                    'To' => [
                        [
                            'Email' => "valentincharlesbtssio@gmail.com",
                            'Name' => "Valentin"
                        ]
                    ],
                    'Subject' => "Greetings from Mailjet.",
                    'TextPart' => "My first Mailjet email",
                    'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());
    }

}






























































