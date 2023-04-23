<?php

class Model
{
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'identifica';
    private $port = '3306';
    private $user = 'root';
    private $password=  null;
    protected $table;
    protected $conex;

    public function __construct(){
        //descobre o nome da table
        $tbl = strtolower(get_class($this));
        $tbl .= 's';
        $this->table = $tbl;
   
   
    

    $this->conex = new PDO("{$this->driver}:host={$this->host};port={$this->port};dbname={$this->dbname}",$this->user,$this->password);

}


public function getById($id)
{
    $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE idAluno = :idAluno");
    $sql->bindValue(':idAluno', $id);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_ASSOC);
   
}

public function getByname($nome){
    $sql=$this->conex->prepare("SELECT * FROM {$this->table} WHERE nome = :nome ");
    $sql->bindValue(':nome' , $nome);
    $sql->execute();
     
    return $sql->fetchAll(PDO::FETCH_ASSOC);}

 
    public function getone(){
        $sql=$this->conex->query("SELECT * FROM {$this->table} where nome = '{$_SESSION['nome']}'");  
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
        


    
}

    public function getAll(){
        $sql=$this->conex->query("SELECT * FROM {$this->table} ");   
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }



public function create($data) {
   
    $sql = "INSERT INTO {$this->table}";
//prepara os campos e place holder
   
$sql_fields = $this->sql_fields($data);

$sql .= " SET {$sql_fields}";
//prepara e roda no banco
$insert = $this->conex->prepare($sql);

    $insert->execute($data);

 
}


 
public function update($data, $id)
{
    // Remove índice 'id' do $data
    unset($data['id']);

    $sql = "UPDATE {$this->table}";
    $sql.= ' SET ' . $this->sql_fields($data);
    $sql.= ' WHERE id = :id';

    $data['id'] = $id;

    $upd = $this->conex->prepare($sql);
    $upd->execute($data);

    var_dump($data);
}


private function sql_fields($data){

    foreach (array_keys($data)as $field){
        $sql_fields[] = "{$field} = :{$field}";

    }
return implode(',', $sql_fields);
}

public function verifica_turma($usr)
{
    switch ($usr->turma) {
        case 1:
            $turma = "eno";
            break;
        case 2:
            $turma = "portugues";
            break;
        case 3:
            $turma = "artes";
            break;
        case 4:
            $turma = "fisica";
            break;
        default:
            $turma = null; // ou alguma mensagem de erro
            break;
    }
    
    return $turma;
}


}







//querry = executa
//fetch = pega o primeiro
//fetchall = pega todos  

//fazer o admin