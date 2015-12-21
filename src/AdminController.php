<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AdminController
{
    function adminAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }
        $argsArray = array('content'=>'test');
        return $app['twig']->render('admin.html.twig', $argsArray);
    }

    function createUserAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $newUser = new User();
        $newUser->setName($request->get('username'));
        $newUser->setPassword($request->get('password'));

        $em = $app['orm.em'];
        $em->persist($newUser);
        $em->flush();

        $argsArray = array('content'=>'test');
        return $app['twig']->render('admin.html.twig', $argsArray);
    }
}