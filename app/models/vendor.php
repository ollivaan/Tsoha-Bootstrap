<?php

class Vendor extends BaseModel{
    public $id, $name, $password, $invitation;
    //invitation on randomluku, joka saadaan ylläpidolta jotta jonnet eivät menisi
    // sotkemaan sivustoa olemattomilla kaupoilla
    
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->vendorTesti = array('id'=> 3, 'name'=> 'JouninKauppa', 'password' => 'äkäslompo', 'invitation'=> '3');
    }

        public static function all() {
      
      $query = DB::connection()->prepare('SELECT * FROM Vendor');
      
      $query->execute();
      $rows = $query->fetchAll();
      $account = array();
      
      foreach ($rows as $row){
          $account[] = new Customer(array('id' => $row['id'],
              'name'=> $row['name'],
              'password'=>$row['password'],
              'invitation'=>$row['invitation']
                  ));
                  
      }
      return $account;
     
  }
   public static function find($id){
    $query = DB::connection()->prepare('SELECT * FROM Vendor WHERE id = :id LIMIT 1');
    $query->execute(array('id' => $id));
    $row = $query->fetch();

    if($row){
      $vendor = new Vendor(array(
        'id' => $row['id'],
        'name' => $row['name']
      ));

      return $vendor;
    }

    return null;
  }

    public function save() {
        $statement = 'INSERT INTO Vendor (name, password) VALUES (:name, :password)';
        $query = DB::connection()->prepare($statement);
        
        $query->execute(array('name' => $this->name, 'password' => $this->password));
    }
    
    public function errors($password_verification) {
        $errors = array_merge($this->validate_name(), $this->validate_password($password_verification), $this->validate_invitation($invitation_verification));
        
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
    public function validate_invitation($verification) {
        if($this->invitation != $verification){
            $errors[] = 'Invalid invitation';
    }
    return $errors;
    }
}

