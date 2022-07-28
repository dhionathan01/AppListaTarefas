function editar(id, conteudo_tarefa) {
    // Criar um form de edicao
    let form = document.createElement('form');
    form.action = 'controller/tarefa_controller.php?acao=atualizar';
    form.method = 'POST';
    form.className = 'row';


    // criar um input para entrada do texto
    let inputTarefa = document.createElement('input');
    inputTarefa.type = 'text';
    inputTarefa.name = 'tarefa';
    inputTarefa.className = 'col-9 form-control';
    inputTarefa.value = conteudo_tarefa;

    // Criar um input hidden para guardar o id da tarefa
    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;


    // criar um button para envio do form
    let button = document.createElement('button');
    button.type = 'submit';
    button.className = 'col-3 btn btn-info';
    button.innerHTML = 'Atualizar';

    // incluir o inputTarefa no form
    form.appendChild(inputTarefa);

    // incluir button no form
    form.appendChild(button);

    // incluir o inputId no form
    form.appendChild(inputId);

    //selecoanr a div tarefa
    let tarefa = document.getElementById('tarefa_' + id);

    // limpar o texto da tarefa para inclusão do form
    tarefa.innerHTML = '';

    // incluir form na página
    // A função insertBefore() permite fazer a inserção de uma árvore de elementos dentro de um elemento já redenizado.
    tarefa.insertBefore(form, tarefa[0]); // incluir form no primeiro elemento filho de tarefa
}

function remover(id) {
    location.href = 'todas_tarefas.php?acao=remover&id=' + id;
    
}

function concluirTarefa(id) {
    location.href = 'todas_tarefas.php?acao=concluir_tarefa&id=' + id;
}