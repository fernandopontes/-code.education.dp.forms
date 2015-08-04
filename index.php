<?php
/*ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);*/

define('CLASS_DIR', 'src/');
set_include_path((get_include_path().PATH_SEPARATOR.CLASS_DIR));
spl_autoload_register();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Design Patterns - Formulários - Code.education</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site para code.education">
    <meta name="author" content="Fernando Pontes">

</head>

<body>
    <?php
    $form = new \Form\Form('form_modelo');

    // Cria os campos do formulário
    $nome = new \Form\Text('nome');
    $nome->setPropriedade('placeholder', 'Nome');

    $cidade = new \Form\Combo('cidade');

    $itens = array();
    $itens['1'] = 'Imperatriz';
    $itens['2'] = 'São Luís';

    $cidade->addItens($itens);

    $senha = new \Form\Password('senha');
    $senha->setPropriedade('placeholder', 'Senha');

    $mensagem = new \Form\Textarea('mensagem');
    $mensagem->setPropriedade('placeholder', 'Mensagem');

    $submit = new \Form\Button('Enviar');
    $submit->setAction('#', 'Enviar');

    $form->adicionar($nome);
    $form->adicionar($cidade);
    $form->adicionar($senha);
    $form->adicionar($mensagem);
    $form->adicionar($submit);

    $form->render();

    ?>
</body>
</html>