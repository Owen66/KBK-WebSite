<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ProductsController
{
    function productsAction(Request $request, Application $app){
        $em = $app['orm.em'];
        $categoryRepository = $em->getRepository('Category');
        $categories = $categoryRepository->findAll();
        $argsArray = array('products' => $categories,);
        return $app['twig']->render('products.html.twig', $argsArray);
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