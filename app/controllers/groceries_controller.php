<?php

class GroceriesController extends BaseController{
  public static function index(){
    // Haetaan kaikki pelit tietokannasta
    $groceries = Grocery::all();
    // Renderöidään views/game kansiossa sijaitseva tiedosto index.html muuttujan $games datalla
    View::make('grocery/index.html', array('groceries' => $groceries));
  }

}
