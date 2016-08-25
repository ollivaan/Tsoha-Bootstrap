<?php

class UserController extends BaseController{
    
//    public static function index() {
//        Redirect::to('/login');
//    }
  public static function login(){
      View::make('accounts/login.html');
  }
  public static function handle_login(){
//    $params = isset($_POST);
    $params = $_POST;
//    $name = isset($_POST["name"]) ? $_POST["name"] : NULL;
//   if(isset($_POST["password"]) ? $_POST["password"] : NULL){
    
    
     $user = Customer::authenticate($params['username'], $params['password']);

    if(!$user){
      View::make('accounts/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'name' => $params['username']));
          
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }
    public static function logout(){
    $_SESSION['user'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }
}
