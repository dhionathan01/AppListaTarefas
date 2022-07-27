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
        $query = '
                select
                    lista_tarefas.id, lista_status.status, lista_tarefas.tarefa 
                from
                    tb_tarefas as lista_tarefas
                    left join tb_status as lista_status on(lista_tarefas.id_status = lista_status.id)';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    public function atualizar()   // Update
    {
        $query = "update tb_tarefas set tarefa = :tarefa where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }

    public function remover() // delete
    {
        
    }
}
?>  