<?php

class GroceryController extends BaseController{
  public static function index(){
    
    $groceries = Grocery::all();
    
    View::make('grocery/index.html', array('groceries' => $groceries));
  
    
  }
    public static function review(){
    View::make('grocery/review.html');
  }

//ei toimi jostain syystä?  
  public static function show($id){
        $grocery = Grocery::find($id);         
        View::make('grocery/show.html', array('grocery' => $grocery));
    }
    	
}