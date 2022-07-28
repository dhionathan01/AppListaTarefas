<?php 

   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/model/tarefa.php";
   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/service/tarefaService.php";
   require "/xampp/htdocs/git/Projetos/AppListaTarefas/private/model/conexao.php";

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

   // Se a ação inserir for disparada pelo get faça:
   if($acao == 'inserir'){
   $tarefa = new Tarefa();
   $tarefa->__set('tarefa', $_POST['nova_tarefa']);

   $conexao = new Conexao();

   $tarefaService = new TarefaService($conexao, $tarefa); // Passando o banco de dados e a tarefa a ser inserida
   $tarefaService->inserir();

   header('Location: ../nova_tarefa.php?inclusao=1');// Inserindo redirecionamento
   }else if($acao == 'recuperar'){
      // Para trabalhar com o tarefaService o contrutor exige a passagem de um objeto tarefa e conexao, por isso vamos inicializa-los aqui
      $tarefa = new Tarefa();
      $conexao = new Conexao();

      $tarefaService = new TarefaService($conexao, $tarefa);
      $tarefas = $tarefaService->recuperar();

   }else if($acao == 'atualizar'){
      $tarefa = new Tarefa();

      $tarefa
            ->__set('id', $_POST['id'])
            ->__set('tarefa', $_POST['tarefa']); //setters encadeados
      
      $conexao = new Conexao();
      $tarefaService = new TarefaService($conexao, $tarefa);
      if($tarefaService->atualizar()){
         if($_GET['pag'] == 'todas_tarefas');
            header('location: ../todas_tarefas.php');
         if($_GET['pag'] == 'index');
            header('location: ../index.php');
      };

   }else if($acao == 'remover'){
      $tarefa = new Tarefa();
      $tarefa->__set('id', $_GET['id']);

      $conexao = new Conexao();

      $tarefaService = new TarefaService($conexao, $tarefa);
      $tarefaService->remover();
      if($_GET['pag'] == 'todas_tarefas');
         header('location: todas_tarefas.php');
      if($_GET['pag'] == 'index');
         header('location: index.php');
   }else if($acao == 'concluir_tarefa'){
      $tarefa = new Tarefa();
      $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

      $conexao = new Conexao();
      $tarefaService = new TarefaService($conexao, $tarefa);
      $tarefaService->concluirTarefa();
      
      if($_GET['pag'] == 'todas_tarefas')
         header('location: todas_tarefas.php');
      if($_GET['pag'] == 'index');
         header('location: index.php');
   }else if($acao == 'recuperarPendentes'){
     
      $tarefa = new Tarefa();
      $conexao = new Conexao();

      $tarefaService = new TarefaService($conexao, $tarefa);
      $tarefas = $tarefaService->recuperarPendentes();
   }

   
?>