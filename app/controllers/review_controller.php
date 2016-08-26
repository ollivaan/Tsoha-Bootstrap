<?php

class ReviewsController extends BaseController{
  public static function index(){
    
    $reviews = Reviews::all();
    
    View::make('grocery/:id', array('reviews' => $reviews));
  
    
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
