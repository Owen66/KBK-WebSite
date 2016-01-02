<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $Category = $categoryRepository->find($request->get('category'));
        $newItem->setCategory($Category);

        $file = $request->files->get('photo');
        $newItem->setPhoto($file->getClientOriginalName());
        $file = $request->files->get('photo');
        $file->move(__DIR__.'/../public/img',$file->getClientOriginalName());

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
        $categoryRepository = $em->getRepository('Category');
        $categories = $categoryRepository->findAll();

        $argsArray = array('items'=>$items, 'categories'=>$categories);
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

        $categoryRepository = $em->getRepository('Category');
        $Category = $categoryRepository->find($request->get('category'));
        $item->setCategory($Category);

        $file = $request->files->get('photo');
        $item->setPhoto($file->getClientOriginalName());
        $file = $request->files->get('photo');
        $file->move(__DIR__.'/../public/img',$file->getClientOriginalName());

        $em->flush();

        return $app->redirect('/itemAdmin');
    }
}