<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    function createAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $newUser = new User();
        $newUser->setName($request->get('username'));
        $newUser->setPassword($request->get('password'));

        $em = $app['orm.em'];
        $em->persist($newUser);
        $em->flush();

        return $app->redirect('/userAdmin');
    }

    function readAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $userRepository = $em->getRepository('User');
        $users = $userRepository->findAll();

        $argsArray = array('users'=>$users);
        return $app['twig']->render('user.html.twig', $argsArray);
    }

    function deleteAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $userRepository = $em->getRepository('User');
        $user = $userRepository->find($request->get('id'));
        $em->remove($user);
        $em->flush();

        return $app->redirect('/userAdmin');

    }

    function updateAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $userRepository = $em->getRepository('User');
        $user = $userRepository->find($request->get('id'));
        $user->setName($request->get('username'));
        $user->setPassword($request->get('password'));
        $em->flush();

        return $app->redirect('/userAdmin');
    }
}