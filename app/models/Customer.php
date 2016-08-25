<?php

class Customer extends BaseModel{
    public $id, $name, $password;
    
    
    public function __construct($attributes) {
        parent::__construct($attributes);  
        $this->accountTesti = array('id'=> 2, 'name'=> 'RedBUll', 'password' =>'REDBULL');
        $this->accountTesti2 = array('id'=> 5, 'name'=> 'RedBUll', 'password' =>'REDBULL');
    }
    
    public static function all() {
      
      $query = DB::connection()->prepare('SELECT * FROM Customer');
      
      $query->execute();
      $rows = $query->fetchAll();
      $account = array();
      
      foreach ($rows as $row){
          $account[] = new Customer(array('id' => $row['id'],
              'name'=> $row['name'],
              'password'=>$row['password']
                  ));
                  
      }
      return $account;
     
  }
   public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Customer WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $account = new Customer(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'password' => $row['password']
      ));

      return $account;
    }

    return null;
  }
  public static function authenticate($name, $password) {
      $query = DB::connection()->prepare('SELECT * FROM Customer WHERE name = :name AND password = :password LIMIT 1');

      $query->execute(array('name' => $name, 'password' => $password));

$row = $query->fetch();
if($row){

    return new Customer(array('id' => $row['id'], 'name' => $row['name']));

}else{

  return null;
}
      
  }
    
    public function errors($password_verification) {
        $errors = array_merge($this->validate_name(), $this->validate_password($password_verification));
        
        return $errors;
    }
    
    public function validate_name() {
        $errors = array();
        
        if ($this->validate_is_string_empty($this->name)) {
            $errors[] = 'Username can not be empty';
        }
        if ($this->validate_is_string_short($this->name, 4)) {
            $errors[] = 'Username has to be at least 4 letters long';
        }
        if ($this->validate_is_string_long($this->name, 12)) {
            $errors[] = 'Username can not be longer than 12 characters';
        }
        return $errors;
    }
    
    public function validate_password($verification) {
        $errors = array();
        
        if($this->empty_string($this->password)) {
            $errors[] = 'Please set your password';
        }
        if ($this->short_string($this->password, 4)) {
            $errors[] = 'Password has to be at least 4 letters';
        }
        if ($this->validate_is_string_long($this->password, 12)) {
            $errors[] = 'Password can not be longer than 12 letters';
        }
        if ($this->password != $verification) {
            $errors[] = 'Please check that your password matches';
        }
        
        return $errors;
    }
}