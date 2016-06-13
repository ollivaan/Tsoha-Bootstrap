<?php

class UserController extends BaseController{
  public static function login(){
      View::make('accounts/login.html');
  }
  public static function handle_login(){
    $params = $_POST;
    
    
     $user = Customer::authenticate($params['name'], $params['password']);

    if(!$user){
      View::make('account/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'name' => $params['name']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }
}
//        $name = isset($_POST["name"]) ? $_POST["name"] : 0;
//        $password = isset($_POST["password"]) ? $_POST["password"] : 0;
//    $user = Customer::authenticate($name, $password);
////    $user = Customer::authenticate($params['name'], $params['password']);
//
//    if(!$user){
//      View::make('accounts/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', $name));
//    }else{
//      $_SESSION['name'] = $user->id;
//
//      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
//    }
//  }
//}