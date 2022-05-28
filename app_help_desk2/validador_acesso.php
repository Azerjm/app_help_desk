<?php
session_start();
// verifica se a constante global autenticado !NOT estiver SETADA
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'N'){
  header('Location: index.php?login=erro2');
}
?>