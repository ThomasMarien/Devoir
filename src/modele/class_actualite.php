<?php

class Actualite{
    private $db;
    private $insert; // Étape 1
    private $connect;
    private $select;

  public function __construct($db){  
    $this->db = $db;
    $this->insert = $db->prepare("insert into actualite (id, titre, contenu) values(:id, :titre, :contenu)");   // Étape 2 
    $this->select = $db->prepare("select id, titre, contenu from actualite a");
  }
  
  public function insert($id, $titre, $contenu){ // Étape 3
    $a = true;
    $this->insert->execute(array(':id'=>$id, ':titre'=>$titre, ':contenu'=>$contenu));
    
  if ($this->insert->errorCode()!=0){
      print_t($this->insert->errorInfo());  
      $a=false;
  }
    return $a;
    }
   
   public function select(){
        $liste = $this->select->execute();
    if ($this->select->errorCode()!=0){
            print_t($this->select->errorInfo());
    }
     return $this->select->fetchAll();
   }

}

?>

