<?php 

   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/model/tarefa.php";
   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/service/tarefaService.php";
   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/model/conexao.php";

   $tarefa = new Tarefa();
   $tarefa->__set('tarefa', $_POST['nova_tarefa']);

   $conexao = new Conexao();

   $tarefaService = new TarefaService($conexao, $tarefa); // Passando o banco de dados e a tarefa a ser inserida
   $tarefaService->inserir();

   header('Location: ../nova_tarefa.php?inclusao=1');// Inserindo redirecionamento

?>