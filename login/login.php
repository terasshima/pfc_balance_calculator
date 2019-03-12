<?php


  //ユーザ関数読み込み
  require("../function.php");


  //データベース接続,確認,文字化け防止
  $db_hostname = getenv("DB_HOSTNAME");
  $db_username = getenv("DB_USERNAME");
  $db_password = getenv("DB_PASSWORD");
  $db_name = getenv("DB_NAME");

  $link = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

  if(mysqli_connect_error()){
    input_error("データベースに接続できませんでした");
  }else{
    mysqli_set_charset($link, 'utf8');
  }


  //セッション開始
  if(!isset($_SESSION)){
    session_start();
  }




  $email = $_POST["email"];
  $pass = $_POST["pass"];



  //email照合
  $query = "SELECT `pass` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";
  $result = mysqli_query($link, $query);

  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result); //email ◯
  }else{
    input_error("入力されたメールアドレスは登録されていません"); //email ×
  }


  //pass照合
  if(password_verify($pass, $row["pass"])){
    $query = "SELECT `name` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'"; //pass ◯
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $_SESSION["name"] = $row["name"];
    $_SESSION["email"] = $email;

    header('location:../home/index.php');
    exit;
  }else{
    input_error("パスワードが間違っています"); //pass ×
  }




?>
