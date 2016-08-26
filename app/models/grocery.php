<?php

class Grocery extends BaseModel{
    // attribuutit
    public $id, $customer_id, $name, $address, $phone, $mail, $openinhours, $reviews;
  // konstruktori


 
    
    public function __construct($attributes){      
    parent::__construct($attributes);
    $this->groceries = array('id'=> 1, 'name'=> 'Alepa', 'address'=>'syrjätie 3', 'phone'=>'0141024', 'mail'=>'alepa.@.fi', 'openinhours'=>'06:00-23:00','reviews'=>'5');
    $this->tuote2 = array('id'=> 2, 'name'=> 'K-market', 'address'=>'Tirinläntie', 'phone'=>'0141045', 'mail'=>'kmarket.@.fi', 'openinhours'=>'06:00-23:00','reviews'=>'1');
//    $this->tuote2 = array('id'=> 6, 'name'=> 'Maito', 'purchased'=>'11-11-1900', 'description'=>'mieto', 'published'=>'12-11-1993', 'publisher'=>'unknow', 'price'=>1);
//    $skyrim = new Grocery(array('id' => 9, 'name' => 'The Elder Scrolls V: Skyrim', 'description' => 'Arrow to the knee'));
    
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
              'address'=>$row['address'],
              'phone'=>$row['phone'],
              'mail'=>$row['mail'],
              'openinhours'=>$row['openinhours']
//              'reviews'=>$row['reviews']
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
        'address'=>$row['address'],
        'phone'=>$row['phone'],
        'mail'=>$row['mail'],
        'openinhours'=>$row['openinhours']
//        'reviews'=>$row['reviews']
      ));

      return $grocery;
    }

    return null;
  }
  public static function count($id){
    $query = DB::connection()->prepare('SELECT count(*) AS maara FROM Grocery');
    $query->execute((array('id' => $id)));
    $row = $query->fetch();

    if($row){
      $amount = $row['maara'];
      return $amount;
    }
    return null;
  }



}
              
             
  


