<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class CategoryController
{
    function createAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $newCategory = new Category();
        $newCategory->setTitle($request->get('title'));
        $newCategory->setSummary($request->get('summary'));

        $em = $app['orm.em'];
        $em->persist($newCategory);
        $em->flush();

        return $app->redirect('/categoryAdmin');
    }

    function readAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $categories = $categoryRepository->findAll();
        $argsArray = array('categories'=>$categories);
        return $app['twig']->render('category.html.twig', $argsArray);
    }

    function hasItemsAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $Category = $categoryRepository->find($request->get('id'));
        $numItems = $Category->getItems()->count();
        return $numItems;

        //return $app->redirect('/categoryAdmin');

    }

    function deleteAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $Category = $categoryRepository->find($request->get('id'));
        $em->remove($Category);
        $em->flush();

        return $app->redirect('/categoryAdmin');

    }

    function updateAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $Category = $categoryRepository->find($request->get('id'));
        $Category->setTitle($request->get('title'));
        $Category->setSummary($request->get('summary'));
        $em->flush();

        return $app->redirect('/categoryAdmin');
    }
}