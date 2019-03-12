<?php

  //ユーザ関数読み込み
  require("../function.php");

  //データベース
  require("../db.php");


  //データベース接続,接続確認,文字化け防止
  $link = mysqli_connect($db["host"],$db["username"],$db["password"],$db["dbname"]);

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




  if(isset($_POST["back"])){
    //戻る → セッションの初期化,削除,登録ページへリダイレクト
    $_SESSION = array();
    session_destroy();  //var_dump($_SESSION["name"]);
    header('location:../register/index.php');
    exit;

  }elseif(isset($_POST["next"])){
    //登録 → パスワードをハッシュ化,データベース登録
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
      //登録成功 → ホームへ
      header('location:../home/index.php');
      exit;
    }else{
      //登録失敗
      echo '<script type="text/javascript">alert("登録に失敗しました");</script>';
      require_index();
    }
  }else{
    echo '<script type="text/javascript">alert("登録に失敗しました");</script>';
    require_index();
  }



 ?>
