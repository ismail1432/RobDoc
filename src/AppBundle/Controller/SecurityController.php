<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 12/10/2017
 * Time: 08:31
 */

namespace AppBundle\Controller;


use AppBundle\Form\LoginForm;
use AppBundle\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;


class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();
        $form = $this->createForm(LoginFormType::class,
            [
                '_username' => $lastUsername
            ]);
        return $this->render('security/login.html.twig', array(
            'error' => $error,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }
}