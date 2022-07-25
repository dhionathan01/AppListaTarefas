<?php 
// CRUD
class TarefaService{

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa)
    {
        $this->conexao = $conexao;
        $this->tarefa = $tarefa;
    }

    public function inserir()   // Create
    {

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