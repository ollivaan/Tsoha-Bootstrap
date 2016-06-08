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
//$routes->get('/grocery', function() {
//  HelloWorldController::grocery_show();
//});

$routes->get('/login', function() {
  HelloWorldController::login();
});
$routes->get('/frontpage', function() {
  HelloWorldController::frontpage();
});

$routes->get('/new', function() {
  HelloWorldController::new_review();
});

$routes->get('/products', function(){
    ProductController::index();
});
$routes->get('/groceries', function(){
    GroceryController::index();
});


$routes->get('/accounts', function(){
    AccountController::index();
});
$routes->post('/products', function(){
  ProductController::store();
});
// Pelin lisäyslomakkeen näyttäminen
$routes->get('/products/new', function(){
  ProductController::create();
});

$routes->get('/account/:id', function($id){
    AccountController::show($id);
});
$routes->get('/product/:id', function($id){
    ProductController::show($id);
});
$routes->get('/grocery/:id', function($id){
    GroceryController::show($id);
});
