<?php

namespace kbk;


class ProductsController
{
    function productsAction(Request $request, Application $app){
        $products = new Products();
        $content = $products->getCategories();
        $argsArray = array('products' => $content,);
        return $app['twig']->render('products.html.twig', $argsArray);
    }

    function catAction(Request $request, Application $app, $cat){
        $products = new Products();
        $escapedNumber = $app->escape($cat);
        $content = $products->getItems($escapedNumber);
        $argsArray = array('products' => $content,);
        return $app['twig']->render('items.html.twig', $argsArray);
    }

    function itemAction(Request $request, Application $app, $itemId){
        $products = new Products();
        $escapedNumber = $app->escape($itemId);
        $content = $products->getItem($escapedNumber);
        $argsArray = array('item' => $content,);
        return $app['twig']->render('item.html.twig', $argsArray);
    }
}