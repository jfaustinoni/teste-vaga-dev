<?php



Flight::route('/', function(){
    //header.php value is $contHeader varriable
//    Flight::render('header', array(
//        'title' => 'Test title'
//    ), 'contHeader');
    //modals.php value is $contModals varriable
//    Flight::render('modals', array(), 'contModals');
    //body.end.php value is $contBodyEnd varriable
//    Flight::render('body.end', array(), 'contBodyEnd');
    //nav.menu.php value is $contNavMenu varriable
//    Flight::render('nav.menu', array(), 'contNavMenu');
    //You must all varriable define in "layout.homepage.php", you can write it with echo statement
    Flight::render('layout.php'); //you forget this one
});