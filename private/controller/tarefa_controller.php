<?php 

   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/model/tarefa.php";
   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/service/tarefaService.php";
   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/model/conexao.php";

   echo '<pre>';
   print_r($_POST);
   echo '</pre>';

   $tarefa = new Tarefa();
   $tarefa->__set('tarefa', $_POST['nova_tarefa']);

   $conexao = new Conexao();

   $tarefaService = new TarefaService($conexao, $tarefa);
   $tarefaService->inserir();

   echo '<pre>';
   print_r($tarefaService);
   echo '</pre>';
 
?>