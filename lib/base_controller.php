<?php

  class BaseController{

    public static function get_user_logged_in(){
//        $user = Customer::find($id);
      // Toteuta kirjautuneen käyttäjän haku tähän
         if(isset($_SESSION['user'])){
//      $user_id = $_SESSION['user'];
      
      return Customer::find($_SESSION['user']);

//      return $user;
    }
//
//        public static function get_user_logged_in() {
//        if (isset($_SESSION['user'])) {
//            return User::find($_SESSION['user']);
//            ;
//        } else {
//            return null;
//        }
//    }
//    public static function check_logged_in() {
//        if (!isset($_SESSION['user'])) {
//            Redirect::to('/login', array('error' => 'Kirjaudu ensin sisään!'));
//        }
//    }
   
      return null;
    }

    public static function check_logged_in(){
      if(!isset($_SESSION['user'])){
        Redirect::to('/login', array('message' => 'Kirjaudu sisään!'));
      }
    }

  }
