<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ItemController
{
    function createAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $newItem = new Item();
        $newItem->setName($request->get('name'));
        $newItem->setDescription($request->get('description'));
        $newItem->setPrice($request->get('price'));
        $newItem->setCalories($request->get('calories'));
        $newItem->setAllergyInformation($request->get('allergyInformation'));
        $newItem->setCategory($request->get('category'));
        $newItem->setPhoto($request->get('photo'));

        $em = $app['orm.em'];
        $em->persist($newItem);
        $em->flush();

        return $app->redirect('/itemAdmin');
    }

    function readAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $itemRepository = $em->getRepository('Item');
        $items = $itemRepository->findAll();

        $argsArray = array('items'=>$items);
        return $app['twig']->render('itemAdmin.html.twig', $argsArray);
    }

    function deleteAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $itemRepository = $em->getRepository('Item');
        $item = $itemRepository->find($request->get('id'));
        $em->remove($item);
        $em->flush();

        return $app->redirect('/itemAdmin');

    }

    function updateAction (Request $request, Application $app) {
        if (null === $user = $app['session']->get('user')) {
            return $app->redirect('/login');
        }

        $em = $app['orm.em'];
        $itemRepository = $em->getRepository('Item');
        $item = $itemRepository->find($request->get('id'));

        $item->setName($request->get('name'));
        $item->setDescription($request->get('description'));
        $item->setPrice($request->get('price'));
        $item->setCalories($request->get('calories'));
        $item->setAllergyInformation($request->get('allergyInformation'));
        $item->setCategory($request->get('category'));
        $item->setPhoto($request->get('photo'));

        $em->flush();

        return $app->redirect('/itemAdmin');
    }
}