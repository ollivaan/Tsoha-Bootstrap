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

  if(count($errors) >= 1){
   
      View::make('products/new.html', array('errors' => $errors, 'attributes' => $attributes, 'message' => 'Pahoittelumme virhe tapahtui!'));

  
  }else{
  $product->save();

    Redirect::to('/product/' . $product->id, array('message' => 'tuote on lisätty kirjastoosi!'));
  }
}
public static function edit($id) {
    $product = Product::find($id);
    View::make('products/edit.html', array('attributes' => $product));
}

public static function update($id) {
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

    if(count($errors) > 0){
      View::make('product/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
      $product->update();
//'products/show.html'
      Redirect::to('/product/' . $product->id, array('message' => 'Peliä on muokattu onnistuneesti!'));
    }
  }
    public static function destroy($id){
    // Alustetaan Game-olio annetulla id:llä
    $product = Product::find($id);
    $product_name = $product->name . " ";
        $onnistui = $product->delete();
                if ($onnistui) {
            Redirect::to('/products', array('success' => 'Tuote ' . $product_name . ' on nyt poistettu tietokannasta'));
        } else {
            Redirect::to('/product/' . $id, array('error' => 'Tuotteen poistaminen epäonnistui.'));
        }
//    $product = new Product(array('id' => $id));
    // Kutsutaan Game-malliluokan metodia destroy, joka poistaa pelin sen id:llä
//    $product->destroy();

    // Ohjataan käyttäjä pelien listaussivulle ilmoituksen kera
//    Redirect::to('/products', array('message' => 'Peli on poistettu onnistuneesti!'));
  }
    
}

  
  
    


  