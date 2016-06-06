<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
//  $routes->get('/groceries', function() {
//  HelloWorldController::groceries_list();
//});
$routes->get('/grocery', function() {
  HelloWorldController::grocery_show();
});

$routes->get('/login', function() {
  HelloWorldController::login();
});
$routes->get('/frontpage', function() {
  HelloWorldController::frontpage();
});

$routes->get('/groceries', function(){
  GroceriesController::index();
});

