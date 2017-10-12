<?php


/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 12/10/2017
 * Time: 08:12
 */

namespace AppBundle\Security;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;
    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(FormFactoryInterface $formFactory, EntityManagerInterface $entityManager, RouterInterface $router, UserPasswordEncoder $userPasswordEncoder)
    {
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('login');
    }
    public function getCredentials(\Symfony\Component\HttpFoundation\Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');
        if (!$isLoginSubmit) {
            return;
        }
        $form = $this->formFactory->create(\AppBundle\Form\LoginFormType::class);
        $form->handleRequest($request);
        $data = $form->getData();
        $request->getSession()->set(Security::LAST_USERNAME, $data['_username']);
        return $data;
    }

    public function getUser($credentials, \Symfony\Component\Security\Core\User\UserProviderInterface $userProvider)
    {
        $username = $credentials['_username'];
        return $this->entityManager->getRepository('AppBundle:User')->findOneBy(['username' => $username]);
    }

    public function checkCredentials($credentials, \Symfony\Component\Security\Core\User\UserInterface $user)
    {
        $password = $credentials['_password'];

       // if ($this->userPasswordEncoder->isPasswordValid($user, $password)){

            return true;
       // }

        return false;
    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // if the user hits a secure page and start() was called, this was
        // the URL they were on, and probably where you want to redirect to
        $targetPath = $this->getTargetPath($request->getSession(), $providerKey);
        if (!$targetPath) {
            $targetPath = $this->router->generate('homepage');
        }
        return new RedirectResponse($targetPath);
    }
}
