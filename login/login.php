<?php

  //ユーザ関数読み込み
  require("../function.php");

  //データベース
  require("../db.php");


  //データベース接続,接続確認,文字化け防止
  $link = mysqli_connect($db['host'],$db["username"],$db["password"],$db["dbname"]);

  if(mysqli_connect_error()){
    echo '<script type="text/javascript">alert("データベースに接続できませんでした");</script>';
    require_index();
  }else{
    mysqli_set_charset($link, 'utf8');
  }


  //セッション開始
  if(!isset($_SESSION)){
    session_start();
  }




  $email = $_POST["email"];
  $pass = $_POST["pass"];



  //email,pass照合
  $query = "SELECT `pass` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";
  $result = mysqli_query($link, $query);

  if(mysqli_num_rows($result) > 0){
    //email ◯
    $row = mysqli_fetch_array($result);
  }else{
    //email ×
    echo '<script type="text/javascript">alert("入力されたメールアドレスは登録されていません");</script>';
    require_index();
  }


  if(password_verify($pass, $row["pass"])){
    //pass ◯
    $query = "SELECT `name` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $_SESSION["name"] = $row["name"];
    $_SESSION["email"] = $email;

    header('location:../home/index.php');
    exit;
  }else{
    //pass ×
    echo '<script type="text/javascript">alert("パスワードが間違っています");</script>';
    require_index();
  }




?>
