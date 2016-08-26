<?php
class Review extends BaseModel{
    public $id, $reviewC_id, $reviewP_id, $reviewG_id, $name, $description, $shop, $grade;
    
    
        public function __construct($attributes){      
    parent::__construct($attributes);
   
    
    }
    
     public static function all() {
      
      $query = DB::connection()->prepare('SELECT * FROM Reviews');
      
      $query->execute();
      
      $rows = $query->fetchAll();
      $groceries = array();
      
      foreach ($rows as $row){
          $groceries[] = new Grocery(array('id' => $row['id'],
              'review_id' => $row['customer_id'],
              'name'=> $row['name'],
              'address'=>$row['address'],
              'phone'=>$row['phone'],
              'mail'=>$row['mail'],
              'openinhours'=>$row['openinhours'],
              'reviews'=>$row['reviews']
                  ));
                  
      }
      return $groceries;
     
  }
  
 public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Grocery WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $reviews = new Review(array(
        'id' => $row['id'],
        'reviewC_id' => $row['reviewC_id'],
        'reviewP_id' => $row['reviewP_id'],
        'reviewG_id'=>$row['reviewG_id'],
        'name'=>$row['name'],
        'description'=>$row['description'],
        'shop'=>$row['shop'],
        'grade'=>$row['grade']
      ));

      return $reviews;
    }
//    $id, $reviewC_id, $reviewP_id, $reviewG_id, $name, $description, $shop, $grade

    return null;
  }
  public static function count($id){
    $query = DB::connection()->prepare('SELECT count(*) AS maara FROM Reviews');
    $query->execute((array('id' => $id)));
    $row = $query->fetch();

    if($row){
      $amount = $row['maara'];
      return $amount;
    }
    return null;
  }
}


