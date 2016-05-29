<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
//   	  View::make('home.html');
        echo 'Tämä on etusivu!';
    }
      public static function groceries_list(){
    View::make('suunnitelmat/groceries_list.html');
  }

  public static function grocery_show(){
    View::make('suunnitelmat/grocery_show.html');
  }

  public static function login(){
    View::make('suunnitelmat/login.html');
  }
    public static function frontpage(){
    View::make('suunnitelmat/frontpage.html');
  }

//    public static function sandbox(){
//      // Testaa koodiasi täällä
//      echo 'Hello World!';
//    }
    public static function sandbox(){
  View::make('helloworld.html');
}
  }
