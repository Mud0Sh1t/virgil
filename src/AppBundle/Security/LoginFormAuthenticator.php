<?php


namespace AppBundle\Security;


use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    private $entityManager;
    private $router;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $entityManager, RouterInterface $router, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function supports(Request $request)
    {
        return $request->attributes->get('_route') === "login"
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        $credentials = [
          'username' => $request->request->get('username'),
          'password' => $request->request->get('password'),
        ];

        $request->getSession()->set(Security::LAST_USERNAME, $credentials['username']);

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(
            ['username' => $credentials['username']]
        );
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);

        $request->getSession()->set(Security::ACCESS_DENIED_ERROR, $exception);

        return new RedirectResponse($this->router->generate('login'));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse($this->router->generate('admin'));
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('login');
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        // TODO: Implement start() method.
    }

    public function supportsRememberMe()
    {
        return false;
    }
}