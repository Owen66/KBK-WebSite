<?php

namespace kbk;


use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    function indexAction(Request $request, Application $app){
        $content = 'Hello World!';
        $argsArray = array('content' => $content,);
        return $app['twig']->render('index.html.twig', $argsArray);
    }

    function aboutAction(Request $request, Application $app){
        $content = 'About Page!';
        $argsArray = array('content' => $content,);
        return $app['twig']->render('about.html.twig', $argsArray);
    }

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
        //var_dump($argsArray['content']);
        return $app['twig']->render('items.html.twig', $argsArray);
    }

    function itemAction(Request $request, Application $app, $itemId){
        $products = new Products();
        $escapedNumber = $app->escape($itemId);
        $content = $products->getItem($escapedNumber);
        $argsArray = array('item' => $content,);
        return $app['twig']->render('item.html.twig', $argsArray);
    }

    function contactAction(Request $request, Application $app){
        $content = 'Contact Page!';
        $argsArray = array('content' => $content,);
        return $app['twig']->render('contact.html.twig', $argsArray);
    }
}