<?php


class GroceriesController extends BaseController{
      public static function index(){
    // Haetaan kaikki pelit tietokannasta
    $groceries = Grocery::all();
    // Renderöidään views/game kansiossa sijaitseva tiedosto index.html muuttujan $games datalla
    View::make('suunnitelmat/groceries_list.html', array('groceries' => $groceries));
  }

}


