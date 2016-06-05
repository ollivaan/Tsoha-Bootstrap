<?php
//  require 'app/models/grocery.php';
//  require 'app/models/Customer.php';
  require 'app/models/vendor.php';
  //composeri siirtää muut mutta ei vendoria? mahtaa johtua nimestä?
  
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
//   	  View::make('home.html');
   	  View::make('suunnitelmat/frontpage.html');
//        echo 'Tämä on etusivu!';
    }
    public static function sandbox(){
//  View::make('helloworld.html');
        $tuote = Grocery::find(1);
        $groceries = Grocery::all();
        $accountTesti = Customer::find(2);
        $accountTesti2 = Customer::all();
        $vendorTesti = vendor::all();
        
        Kint::dump($groceries);
        Kint::dump($accountTesti);
        Kint::dump($accountTesti2);
        Kint::dump($vendorTesti);
        Kint::dump($tuote);
        
}

    public static function groceries_list(){
    View::make('suunnitelmat/groceries_list.html');
  }
      public static function new_product(){
    View::make('Grocery/new_product.html');
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

  }
