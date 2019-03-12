<?php

  //セッションの開始
  if(!isset($_SESSION)){
    session_start();
  }


  if(isset($_POST["logout"])){
    //戻る → セッションの初期化、削除、登録ページへリダイレクト
    $_SESSION = array();
    session_destroy();  //var_dump($_SESSION["name"]);
    header('location:../index.php');
    exit;
  }



?>
