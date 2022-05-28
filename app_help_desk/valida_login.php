<?php
    //como sempre iniciar a sessão para garantir a segurança das paginas restritas à AUTENTICAÇÂO
    session_start();
    //Inicia-se false para que qualquer usuario não possa ter acesso a esta pagina
    $usuario_autenticado = false;
    $user_id = null;
    $usuario_perfil_id = null;
    // relação de usuarios autorizados
    $usuarios_app = [
        ['ID' => '1', 'email' => 'aa@aa', 'senha' => '123', 'perfil_id' => 1],
        ['ID' => '2', 'email' => 'adm@teste.com', 'senha' => '123', 'perfil_id' => 1],
        ['ID' => '3', 'email' => 'user1@teste.com', 'senha' => '123', 'perfil_id' => 2],
        ['ID' => '4', 'email' => 'user2@teste.com', 'senha' => '123', 'perfil_id' => 2]
    ];
    //varredura dos usuarios autorizados para separar os vetores e verificar se o usuário corresponde
    foreach($usuarios_app as $user) {
        if($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha']) {
            $usuario_autenticado = true;
            $usuario = $user['email'];
            $user_id = $user['ID'];
            $usuario_perfil_id = $user['perfil_id'];
        }       
    } 
    //direcionamento para home se autenticado e constantes GLOBAIS para autenticação
    if($usuario_autenticado) {
        $_SESSION['autenticado'] = 'Y';
        $_SESSION['ID'] = $user_id;
        $_SESSION['perfil'] = $usuario_perfil_id;
        header( 'Location: home.php' );
        // direcionamento para o index se usuário não autenticado
    } else {
        $_SESSION['autenticado'] = 'N';
        header('Location: index.php?login=erro');
    }
?>

