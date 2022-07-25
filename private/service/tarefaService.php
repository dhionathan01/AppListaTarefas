<?php 
// CRUD
class TarefaService{

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa)
    {
        $this->conexao = $conexao->conectar();// Recuperando um PDO
        $this->tarefa = $tarefa;
    }

    public function inserir()   // Create
    {
        $query = 'insert into tb_tarefas(tarefa) values(:tarefa)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->execute();
    }

    public function recuperar()   // Read
    {

    }

    public function atualizar()   // Update
    {

    }

    public function remover() // delete
    {
        
    }
}
?>  