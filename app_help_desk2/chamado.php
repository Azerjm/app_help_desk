<?php
    session_start();
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $msg = str_replace('#', '-', $_POST['descricao']);
    $id = $_SESSION['ID'];
    $jump = PHP_EOL;

    if(strlen($titulo) == 0 && strlen($msg) == 0){
        $texto = $id . '#' . 'n/a' . '#' . $categoria . '#' . 'n/a';
    } else if (strlen($titulo) > 0 && strlen($msg) == 0){
        $texto = $id . '#' . $titulo . '#' . $categoria . '#' . 'n/a';
    } else if(strlen($titulo) == 0 && strlen($msg) > 0){
        $texto = $id . '#' . 'n/a' . '#' . $categoria . '#' . $msg;
    } else {
        $texto = $id . '#' . $titulo . '#' . $categoria . '#' . $msg;
    }

    //abrir arquivo.txt (ou cria-lo)
    $arquivo = fopen('../../app_help_desk/arquivo.txt', 'a');
    //escrever no arquivo.txt o conteudo de $texto
    fwrite($arquivo, $jump);
    fwrite($arquivo, $texto);
    //fechar o arquivo de texto
    fclose($arquivo);
    //redirecionar para pagina anterior
    header('Location: abrir_chamado.php');

?>