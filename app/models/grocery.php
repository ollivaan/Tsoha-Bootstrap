<?php

class Grocery extends BaseModel{
    // attribuutit
    public $id, $customer_id, $name, $purchased, $description, $published, $publisher, $price;
  // konstruktori
    
    public function __construct($attributes){      
    parent::__construct($attributes);
    $this->tuote = array('id'=> 1, 'name'=> 'Scriracha');

    
    }
  
  public static function all() {
      
      $query = DB::connection()->prepare('SELECT * FROM Grocery');
      
      $query->execute();
      
      $rows = $query->fetchAll();
      $groceries = array();
      
      foreach ($rows as $row){
          $groceries[] = new Grocery(array('id' => $row['id'],
              'customer_id' => $row['customer_id'],
              'name'=> $row['name'],
              'purchased'=>$row['purchased'],
              'description'=>$row['description'],
              'published'=>$row['published'],
              'publisher'=>$row['publisher'],
              'price'=>$row['price']
                  ));
                  
      }
      return $groceries;
     
  }
  
 public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Grocery WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $grocery = new Grocery(array(
        'id' => $row['id'],
        'customer_id' => $row['customer_id'],
        'name' => $row['name'],
        'purchased' => $row['purchased'],
        'description' => $row['description'],
        'published' => $row['published'],
        'publisher' => $row['publisher'],
        'price' => $row['price']
      ));

      return $grocery;
    }

    return null;
  }
}
              
             
  


