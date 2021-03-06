<?php

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

    function contactAction(Request $request, Application $app){
        $content = 'Contact Page!';
        $argsArray = array('content' => $content,);
        return $app['twig']->render('contact.html.twig', $argsArray);
    }
}