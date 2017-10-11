<?php

namespace AppBundle\Controller;

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
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',
            ['title'=>'Home']);
    }

    /**
     * @Route("/inbox", name="inbox")
     */
    public function inboxAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/inbox.html.twig', [
            'title' => 'Inbox']);
    }
}
