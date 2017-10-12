<?php

namespace AppBundle\Controller;

use AppBundle\Form\MessageType;
use AppBundle\Manager\MessageManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RobDocController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig',
            ['title'=>'Home']);
    }

    /**
     * @Route("/inbox/{page}", name="inbox", requirements={"page": "\d+"})
     */
    public function inboxAction(Request $request, MessageManager $messageManager, $page = 1)
    {
        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);

        if($form->isValid() && $request->isMethod('POST')){
            $message = $form->getData();
            $messageManager->saveMessage($message);
            $this->addFlash('notice','You message was successfully sent !');
        }
        return $this->render('default/inbox.html.twig', [
            'title' => 'Inbox',
            'form' => $form->createView()
        ]);
    }
}
