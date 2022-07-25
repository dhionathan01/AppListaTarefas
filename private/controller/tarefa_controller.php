<?php 

   require "../model/tarefa.php";
   require "../service/tarefaService.php";
   require "../model/conexao.php";

   $tarefa = new Tarefa();
   $tarefa->__set('tarefa', $_POST['tarefa']);

   $conexao = new Conexao();

   $tarefaService = new TarefaService();

?>