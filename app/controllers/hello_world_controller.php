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
          $doom = new Product(array(
    'name' => '',
    'published' => '',
    'publisher' => '',
    'description' => ''
  ));
  $errors = $doom->errors();

  Kint::dump($errors);
}
////  View::make('helloworld.html');
//        $tuote = Product::find(1);
////        $tuote99 = Product::find(99);
//
////        $tuote3 = Product::save();
////        $tuote4 = Product::find(9);
////        $Sinappi = Product::find(7);
//        $products = Product::all();
//        
//        $groceries = Grocery::all();
//        $grocerieshaku = Grocery::find(2);
////        $accountTesti = Customer::save();
////        $accountTesti2 = Customer::all();
//        $vendorTesti = vendor::all();
//        
////        Kint::dump($tuote4);
//        Kint::dump($grocerieshaku);
//        Kint::dump($products);
//        Kint::dump($groceries);
////        Kint::dump($accountTesti);
////        Kint::dump($accountTesti2);
//        Kint::dump($vendorTesti);
//        Kint::dump($tuote);
////        Kint::dump($tuote3);
        



    public static function groceries_list(){
    View::make('suunnitelmat/groceries_list.html');
  }
    public static function new_review(){
    View::make('products/new.html');
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
