<?php 
class Database{
  
    public $connection;
  

    public function __construct()
    {
       try {
            $this->connection = new mysqli('localhost','root','','phpapp'); 
             
       }catch(Throwable $e){
            echo"erro".$e;
       }
       
    }
    
    public function create($nome,$link){
        $query = "INSERT INTO shootener (nome,link,visitas) VALUES ('$nome','$link','0')";
        $result = $this->connection->query($query);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
    public function findLink($nome){
        $query = "select id,link from shootener where nome='$nome';";
        $result = $this->connection->query($query);
        if($result){
        
            return $result->fetch_all();
        }else{
            return 0;
        }
    }
    public function addView($id){
        $query = "UPDATE shootener SET visitas = visitas + 1 WHERE id = '$id'";
        $result = $this->connection->query($query);
        if($result){
            return 1;
        }else{
            return 0;
        }

    }
}
?>