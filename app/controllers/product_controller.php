<?php

class ProductController extends BaseController{
  public static function index(){
    
    $products = Product::all();
    
    View::make('products/index.html', array('products' => $products));
  
    
  }

  public static function show($id){
        $product = Product::find($id);         
        View::make('products/show.html', array('product' => $product));
    }
public static function edit($id) {
    $product = Product::find($id);

    View::make('products/edit.html', array('product' => $product));
    
}

public static function update($id){
  $params = $_POST;
  $attributes = array(
        $id = isset($_POST["id"]) ? $_POST["id"] : 0, 
        $name = isset($_POST["name"]) ? $_POST["name"] : 0,
//        $purchased = isset($_POST["purchased"]) ? $_POST["purchased"] : 0,
        $description = isset($_POST["description"]) ? $_POST["description"] : 0,
        $publisher = isset($_POST["publisher"]) ? $_POST["publisher"] : 0,
        $category = isset($_POST["category"]) ? $_POST["category"] : 0,
        $price = isset($_POST["price"]) ? $_POST["price"] : 0
  );

  // Tulostetaan $params-muuttujan arvo
//  Kint::dump($params);

  $product = new Product($attributes);
  $errors = $product->errors();

  if(count($errors) > 0){
    View::make('products/edit.html', array('errors' => $errors, 'attributes' => $attributes));
  }else{
    $product->update();

    Redirect::to('/product/' . $product->id, array('message' => 'Tuotetta on muokattu onnistuneesti!'));
  }
}
    
//    public static function update($id){
//    $params = $_POST;
//
//    $attributes = array(
//        $id = isset($_POST["id"]) ? $_POST["id"] : 0, 
//        $name = isset($_POST["name"]) ? $_POST["name"] : 0,
//        $purchased = isset($_POST["purchased"]) ? $_POST["purchased"] : 0,
//        $id = isset($_POST["description"]) ? $_POST["description"] : 0,
//        $id = isset($_POST["publisher"]) ? $_POST["publisher"] : 0,
//        $id = isset($_POST["category"]) ? $_POST["category"] : 0,
//        $id = isset($_POST["price"]) ? $_POST["price"] : 0
//    );
//
//    // Alustetaan Game-olio käyttäjän syöttämillä tiedoilla
//    $product = new Product($attributes);
//    $errors = $product->errors();
//
//    if(count($errors) > 0){
//      View::make('product/edit' . $product->id, array('errors' => $errors, 'attributes' => $attributes));
//    }else{
//      // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
//      $product->update();
//
//      Redirect::to('/product/' . $product->id, array('message' => 'Peliä on muokattu onnistuneesti!'));
//    }
//  }
   public static function store(){
   
    $params = $_POST;
    
    $attributes = array(
      'name' => $params['name'],
               'publisher'=>$params['publisher'],
                'category'=>$params['category'],
                 'published'=>$params['published'],
                    'description'=>$params['description'],
                      'price'=>$params['price']

    );   
  $product = new Product($attributes);
  $errors = $product->errors();

  if(count($errors) == 0){
   $product->save();
   Redirect::to('/product/' . $product->id, array('message' => 'tuote on lisätty kirjastoosi!'));
      

  
  }else{
  
View::make('products/new.html', array('errors' => $errors, 'attributes' => $attributes, 'message' => 'Pahoittelumme virhe tapahtui!'));
    
  }
}



    public static function destroy($id){
    
    $product = Product::find($id);
    $product_name = $product->name . " ";
        $onnistui = $product->delete();
                if ($onnistui) {
            Redirect::to('/products', array('success' => 'Tuote ' . $product_name . ' on nyt poistettu tietokannasta'));
        } else {
            Redirect::to('/product/' . $id, array('error' => 'Tuotteen poistaminen epäonnistui.'));
        }

  }
    
}

  
  
    


  