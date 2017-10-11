<?php

namespace AppBundle\Controller;

use AppBundle\Form\MessageType;
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
     * @Route("/inbox", name="inbox")
     */
    public function inboxAction(Request $request)
    {
        $form = $this->createForm(MessageType::class);

        return $this->render('default/inbox.html.twig', [
            'title' => 'Inbox',
            'form' => $form->createView()
        ]);
    }
}
