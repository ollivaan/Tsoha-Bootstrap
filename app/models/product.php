<?php

class Product extends BaseModel{
    // attribuutit
    public $id, $product_id, $name, $purchased, $description, $expirationdate, $published, $publisher, $category, $price;
  // konstruktori
 
    
    public function __construct($attributes){      
    parent::__construct($attributes);
    $this->tuote = array('id'=> 1, 'name'=> 'Suomenlinnna panimo');
    $this->tuote2 = array('id'=> 6, 'name'=> 'Maito', 'purchased'=>'11-11-1900', 'description'=>'mieto', 'published'=>'12-11-1993', 'publisher'=>'unknow', 'price'=>1);
      $this->tuote3 = array('id'=> 7, 'name'=> 'Maito', 'purchased'=>'11-11-1900', 'description'=>'mieto','expirationdate'=>'11-22-3100'  , 'published'=>'12-11-1993', 'publisher'=>'unknow','category'=>'juoma' ,'price'=>1);
//    $skyrim = new Grocery(array('id' => 9, 'name' => 'The Elder Scrolls V: Skyrim', 'description' => 'Arrow to the knee'));
    
    }
  
  public static function all() {
      
      $query = DB::connection()->prepare('SELECT * FROM Product');
      
      $query->execute();
      
      $rows = $query->fetchAll();
      $products = array();
      
      foreach ($rows as $row){
          $products[] = new Product(array('id' => $row['id'],
              'product_id' => $row['product_id'],
              'name'=> $row['name'],
              'purchased'=>$row['purchased'],
              'description'=>$row['description'],
              'expirationdate'=>$row['expirationdate'],
              'published'=>$row['published'],
              'publisher'=>$row['publisher'],
              'category'=>$row['category'],
              'price'=>$row['price']
                  ));
                  
      }
      return $products;
     
  }
  
 public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Product WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $product = new Product(array(
        'id' => $row['id'],
        'product_id' => $row['product_id'],
        'name' => $row['name'],
        'purchased' => $row['purchased'],
        'description' => $row['description'],
        'expirationdate'=>$row['expirationdate'],
        'published' => $row['published'],
        'publisher' => $row['publisher'],
        'category'=>$row['category'],
        'price' => $row['price']
      ));

      return $product;
    }

    return null;
  }
//   $id, $product_id, $name, $purchased, $description, $expirationdate, $published, $publisher, $category, $price;
//        public function save() {
//        $statement = 'INSERT INTO Product (product_id ,name, purchased, description, expirationdate, published, publisher, category, price) VALUES (:product_id, :name, :purchased, :description, :expirationdate, :published, :publisher, :category, :price)';
//        $query = DB::connection()->prepare($statement);
//        
//        $query->execute(array('product_id' => $this->product_id,'name' => $this->name, 'purchased' => $this->purchased, 'description' => $this->description, 'expirationdate' => $this->expirationdate, 'published' => $this->published, 'publisher' => $this->publisher, 'category' => $this->category, 'price' => $this->price));
//    }
       public function save(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
    $query = DB::connection()->prepare('INSERT INTO Product (name, publisher, category, published ,description, price) VALUES (:name, :publisher, :category, :published , :description , :price) RETURNING id');
    // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    $query->execute(array('name' => $this->name, 'publisher' => $this->publisher, 'category' => $this->category , 'published' => $this->published,'description' => $this->description, 'price' => $this->price));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    $this->id = $row['id'];
  }
}
              
             
  


