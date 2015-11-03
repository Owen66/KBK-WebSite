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
}