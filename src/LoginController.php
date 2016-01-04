<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController
{
    function loginAction (Request $request, Application $app) {
        $username = $app['request']->server->get('PHP_AUTH_USER', false);
        $password = $app['request']->server->get('PHP_AUTH_PW');

        $em = $app['orm.em'];
        $userRepository = $em->getRepository('User');
        $users = $userRepository->findAll();

        foreach($users as $user){
            if ($user->getUsername() === $username && $user->getPassword() === $password) {
                $app['session']->set('user', array('username' => $username));
                return $app->redirect('/admin');
            }
        }

        $response = new Response();
        $response->headers->set('WWW-Authenticate', sprintf('Basic realm="%s"', 'site_login'));
        $response->setStatusCode(401, 'Please sign in.');
        return $response;

    }

    function logoutAction (Request $request, Application $app) {

        $app['session']->set('user',array('username' => null));
        return $app->redirect('/');

    }
}

