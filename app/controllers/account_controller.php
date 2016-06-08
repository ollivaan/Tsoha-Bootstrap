<?php

class AccountController extends BaseController{

      public static function index(){
    
    $vendors = Vendor::all();
    
    View::make('accounts/index.html', array('vendors' => $vendors));
  
    
  }
  public static function show($id){

      View::make('accounts/show.html', array('vendor' => Vendor::find($id)));
  }
                  
        
    }