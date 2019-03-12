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



  //戻る → セッションの初期化,削除,登録ページへリダイレクト
  if(isset($_POST["back"])){
    $_SESSION = array();
    session_destroy();  //var_dump($_SESSION["name"]);
    header('location:../register/index.php');
    exit;
  }


  //登録 → パスワードをハッシュ化,データベース登録
  if(isset($_POST["next"])){
    $pass = password_hash($_SESSION["pass"],PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`name`, `email`, `pass`, `age`, `height`, `weight`, `gender`, `level`, `purpose`,
                                    `bmi`, `basal`, `burn`, `cal`, `protein`, `fat`, `carb`)
              VALUES ('".mysqli_real_escape_string($link, $_SESSION["name"])."',
                       '".mysqli_real_escape_string($link, $_SESSION["email"])."',
                       '".mysqli_real_escape_string($link, $pass)."',
                       '".$_SESSION["age"]."',
                       '".$_SESSION["height"]."',
                       '".$_SESSION["weight"]."',
                       '".$_SESSION["gender"]."',
                       '".$_SESSION["level"]."',
                       '".$_SESSION["purpose"]."',
                       '".mysqli_real_escape_string($link, $_SESSION["bmi"])."',
                       '".$_SESSION["basal"]."',
                       '".$_SESSION["burn"]."',
                       '".$_SESSION["targetCal"]."',
                       '".$_SESSION["targetP"]."',
                       '".$_SESSION["targetF"]."',
                       '".$_SESSION["targetC"]."')";
    $result = mysqli_query($link, $query);

    if($result){
      header('location:../home/index.php'); //登録成功 → ホームへ
      exit;

    }else{
      input_error("登録に失敗しました"); //登録失敗
    }

  }


 ?>
