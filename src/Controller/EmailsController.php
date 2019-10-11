<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;


   class EmailsController extends AppController{
      public function index(){
         $email = new Email('default');
         $email->to('1737439@cmontmorency.qc.ca')->subject('Voici votre confirmation pour votre compte
         d\'adresse')->send('Vous pourriez construire un lien de confirmation ici');
      }
   }
?>

