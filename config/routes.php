<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });


//$routes->get('/login', function() {
//  HelloWorldController::login();
//});
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

$routes->get('/products/new', function(){
  ProductController::store();
//   ProductController::create();
});

$routes->get('/account/:id', function($id){
    AccountController::show($id);
});
$routes->get('/product/:id', function($id){
    ProductController::show($id);
});
$routes->post('/product/destroy/:id', function($id){
   ProductController::destroy($id);
});

$routes->get('/product/edit/:id', function($id){
    ProductController::edit($id);
});

$routes->post('/product/edit/:id', function($id){
  
  ProductController::update($id);
});




$routes->get('/grocery/:id', function($id){
    GroceryController::show($id);
});






$routes->get('/login', function(){
  // Kirjautumislomakkeen esittäminen kato myös et pitkääkö olla suunnitelmat edes
  UserController::login();
});
$routes->post('/login', function(){
  // Kirjautumisen käsittely
  UserController::handle_login();
});

function check_logged_in(){
  BaseController::check_logged_in();
}
$routes->get('/products/new', 'check_logged_in', function(){
  ProductController::store();
});

$routes->get('/product/destroy/:id', 'check_logged_in', function($id){
  ProductController::destroy($id);
});
$routes->get('/product/edit/:id', 'check_logged_in', function($id){
  ProductController::update($id);
});
$routes->post('/logout', function(){
  UserController::logout();
});
$routes->get('/review/:id', function() {
    GroceryController::review();
});

