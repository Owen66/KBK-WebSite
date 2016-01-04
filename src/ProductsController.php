<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ProductsController
{
    function productsAction(Request $request, Application $app){
        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $categories = $categoryRepository->findAll();
        $categoriesPresentation = array();
        foreach($categories as $category){
            $keys = $category->getItems()->getKeys();
            array_push($categoriesPresentation,array(
                    'id' => $category->getId(),
                    'title' => $category->getTitle(),
                    'summary' => $category->getSummary(),
                    'photo' => $category->getItems()->get(array_rand($keys))->getPhoto(),
                )
            );
        }
        $argsArray = array('products' => $categoriesPresentation,);
        return $app['twig']->render('products.html.twig', $argsArray);
    }

    function productsUpdateAction(Request $request, Application $app){
        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $categories = $categoryRepository->findAll();
        $categoriesPresentation = array();
        foreach($categories as $category){
            $keys = $category->getItems()->getKeys();
            array_push($categoriesPresentation,array(
                    'id' => $category->getId(),
                    'title' => $category->getTitle(),
                    'summary' => $category->getSummary(),
                    'photo' => $category->getItems()->get(array_rand($keys))->getPhoto(),
                )
            );
        }
        return JSON_ENCODE($categoriesPresentation);
    }

    function catAction(Request $request, Application $app, $cat){
        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $category = $categoryRepository->find($cat);
        $items = $category->getItems();
        $argsArray = array('products' => $items,);
        return $app['twig']->render('items.html.twig', $argsArray);
    }

    function itemAction(Request $request, Application $app, $itemId){
        $em = $app['orm.em'];
        $itemRepository = $em->getRepository('Item');
        $item = $itemRepository->find($itemId);
        $argsArray = array('item' => $item,);
        return $app['twig']->render('item.html.twig', $argsArray);
    }
}