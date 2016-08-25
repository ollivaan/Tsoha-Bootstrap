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
    self::check_logged_in();
    $product = Product::find($id);

    View::make('products/edit.html', array('attributes' => $product));
    
}

public static function update($id){
    self::check_logged_in();
    
    $params = $_POST;
    

    Kint::dump($id);
    //die();
        $attributes = array(
            'id' => $id,
            'name' => $params['name'],
            'publisher' => $params['publisher'],
            'category' => $params['category'],
            'published' => $params['published'],
            'description' => $params['description'],
            'price' => $params['price']
        );
        
        $product = new Product($attributes);
        $errors = $product->errors();

  if(count($errors) > 0){
    View::make('products/edit.html', array('errors' => $errors, 'attributes' => $attributes));
  }else{
    $product->update();

    Redirect::to('/product/' . $product->id, array('message' => 'Tuotetta on muokattu onnistuneesti!'));
  }
}
    

   public static function store(){
   self::check_logged_in();
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
    self::check_logged_in();
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

  
  
    


  