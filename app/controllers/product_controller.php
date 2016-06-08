<?php

class ProductController extends BaseController{
  public static function index(){
    
    $products = Product::all();
    
    View::make('products/index.html', array('products' => $products));
  
    
  }
//ei toimi jostain syystä?  
  public static function show($id){
        $product = Product::find($id);         
        View::make('products/show.html', array('product' => $product));
    }

    
    
   public static function store(){
    // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
    $params = $_POST;
    // Alustetaan uusi Game-luokan olion käyttäjän syöttämillä arvoilla
    $product = new Product(array(
      'name' => $params['name'],
               'publisher'=>$params['publisher'],
                'category'=>$params['category'],
                 'published'=>$params['published'],
//              'purchased'=>$params['purchased'],
              'description'=>$params['description'],
//              'expirationdate'=>$params['expirationdate'],
                      'price'=>$params['price']
//              


//              'price'=>$params['price']
    ));
    

    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
    $product->save();

    // Ohjataan käyttäjä lisäyksen jälkeen pelin esittelysivulle
    Redirect::to('/product/' . $product->id, array('message' => 'Tuote on lisätty tuotevalikoimaasi'));
  }
  
   
  
    	
}