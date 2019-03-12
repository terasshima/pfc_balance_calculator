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
    echo '<script type="text/javascript">alert("データベースに接続できませんでした");</script>';
    require_index();
  }else{
    mysqli_set_charset($link, 'utf8');
  }

  //セッションの開始
  if(!isset($_SESSION)){
    session_start();
  }



  //名前の変更
  if($_POST["name"]){
    $name = mysqli_real_escape_string($link, $_POST["name"]);
    $query = "UPDATE `users` SET `name` = '".$name."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);
    if($result){
      //セッションを更新
      $_SESSION["name"] = $name;
      echo '<script type="text/javascript">alert("名前を変更しました");</script>';
    }else{
      echo '<script type="text/javascript">alert("名前を変更できませんでした");</script>';
      require_index();
    }
  }



  //メールアドレスの変更
  if($_POST["email"]){
    $email = mysqli_real_escape_string($link, $_POST["email"]);
    //emailがすでに登録されていないか
    $query = "SELECT `id` FROM `users` WHERE `email` = '".$email."'";
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) > 0){
      echo '<script type="text/javascript">alert("入力されたメールアドレスはすでに登録されています");</script>';
      require_index();
    }else{
      $query = "UPDATE `users` SET `email` = '".$email."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
      $result = mysqli_query($link, $query);

      if($result){
        //セッションを更新
        $_SESSION["email"] = $email;
        echo '<script type="text/javascript">alert("メールアドレスを変更しました");</script>';

      }else{
      echo '<script type="text/javascript">alert("メールアドレスを変更できませんでした");</script>';
      require_index();
      }
    }
  }



  //パスワードの変更
  if($_POST["pass1"]){
    if($_POST["pass1"] == $_POST["pass2"]){
      //パスワードのハッシュ化
      $pass = mysqli_real_escape_string($link, password_hash($_POST["pass1"],PASSWORD_DEFAULT));
      $query = "UPDATE `users` SET `pass` = '".$pass."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
      $result = mysqli_query($link, $query);

      if($result){
        echo '<script type="text/javascript">alert("パスワードを変更しました");</script>';

      }else{
      echo '<script type="text/javascript">alert("パスワードを変更できませんでした");</script>';
      require_index();
      }

    }else{
      echo '<script type="text/javascript">alert("パスワードが一致していません");</script>';
      require_index();
    }
  }





  //年齢
  if($_POST["age"]){
    //数値か,5~120歳か
    if(!is_numeric($_POST["age"]) || $_POST["age"] < 5 || $_POST["age"] > 120){
      echo '<script type="text/javascript">alert("年齢を正しく入力してください");</script>';
      require_index();
    }else{
      $query = "UPDATE `users` SET `age` = '".$_POST["age"]."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
      $result = mysqli_query($link, $query);

      if($result){
        echo '<script type="text/javascript">alert("年齢を変更しました");</script>';

      }else{
        echo '<script type="text/javascript">alert("年齢を変更できませんでした");</script>';
        require_index();
      }
    }
  }



  //身長
  if($_POST["height"]){
    //数値か,100.0~200.0cmか
    if(!is_numeric($_POST["height"]) || $_POST["height"] < 100.0 || $_POST["height"] >200.0){
      echo '<script type="text/javascript">alert("身長を正しく入力してください");</script>';
      require_index();
    }else{
      $query = "UPDATE `users` SET `height` = '".$_POST["height"]."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
      $result = mysqli_query($link, $query);

      if($result){
        echo '<script type="text/javascript">alert("身長を変更しました");</script>';

      }else{
        echo '<script type="text/javascript">alert("身長を変更できませんでした");</script>';
        require_index();
      }
    }
  }



  //体重
  if($_POST["weight"]){
    //数値か,15.0~500.0kgか
    if(!is_numeric($_POST["weight"]) || $_POST["weight"] < 15.0 || $_POST["weight"] >500.0){
      echo '<script type="text/javascript">alert("体重を正しく入力してください");</script>';
      require_index();
    }else{
      $query = "UPDATE `users` SET `weight` = '".$_POST["weight"]."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
      $result = mysqli_query($link, $query);

      if($result){
        echo '<script type="text/javascript">alert("体重を変更しました");</script>';

      }else{
        echo '<script type="text/javascript">alert("体重を変更できませんでした");</script>';
        require_index();
      }
    }
  }



  //性別
  if(isset($_POST["gender"])){
    $query = "UPDATE `users` SET `gender` = '".$_POST["gender"]."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);

    if($result){
      echo '<script type="text/javascript">alert("性別を変更しました");</script>';

    }else{
      echo '<script type="text/javascript">alert("性別を変更できませんでした");</script>';
      require_index();
    }
  }


  //活動レベル
  if(isset($_POST["level"])){
    $query = "UPDATE `users` SET `level` = '".$_POST["level"]."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);

    if($result){
      echo '<script type="text/javascript">alert("活動レベルを変更しました");</script>';

    }else{
      echo '<script type="text/javascript">alert("活動レベルを変更できませんでした");</script>';
      require_index();
    }
  }


  //目的
  if(isset($_POST["purpose"])){
    $query = "UPDATE `users` SET `purpose` = '".$_POST["purpose"]."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);

    if($result){
      echo '<script type="text/javascript">alert("目的を変更しました");</script>';

    }else{
      echo '<script type="text/javascript">alert("目的を変更できませんでした");</script>';
      require_index();
    }
  }






  $query = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);


  $height = $row["height"];
  $weight = $row["weight"];


  //bmi
  if($_POST["height"] || $_POST["weight"]){
    $heightMeter = $height / 100;
    $bmi = round($weight / ($heightMeter * $heightMeter),1);

    //コメント付け足し
    if($bmi < 18.5){
      $bmi = $bmi."（痩せすぎ）";
    }elseif($bmi >= 18.5 && $bmi < 25){
      $bmi = $bmi."（標準）";
    }elseif($bmi >= 25 && $bmi < 30){
      $bmi = $bmi."（肥満I度）";
    }elseif($bmi >= 30 && $bmi < 35){
      $bmi = $bmi."（肥満Ⅱ度）";
    }elseif($bmi >= 35 && $bmi < 40){
      $bmi = $bmi."（肥満Ⅲ度）";
    }elseif($bmi >= 40){
      $bmi = $bmi."（肥満Ⅳ度）";
    }

    $query = "UPDATE `users` SET `bmi` = '".mysqli_real_escape_string($link, $bmi)."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);

    if($result){
      echo '<script type="text/javascript">alert("BMI値を変更しました");</script>';

    }else{
      echo '<script type="text/javascript">alert("BMI値を変更できませんでした");</script>';
      require_index();
    }
  }



  $age = $row["age"];
  $gender = $row["gender"];


  //基礎代謝
  if($_POST["height"] || $_POST["weight"] || $_POST["age"] || isset($_POST["gender"])){
    if($gender == 0){
      //男性
      $basal = round(66 + 13.7 * $weight + 5 * $height - 6.8 * $age);
    }else{
      //女性
      $basal = round(665 + 9.6 * $weight + 1.7 *$height - 7 * $age);
    }

    $query = "UPDATE `users` SET `basal` = '".$basal."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);

    if($result){
      echo '<script type="text/javascript">alert("基礎代謝量を変更しました");</script>';

    }else{
      echo '<script type="text/javascript">alert("基礎代謝量を変更できませんでした");</script>';
      require_index();
    }
  }else{
    $basal = $row["basal"];
  }



  $level = $row["level"];


  //消費エネルギー
  if($_POST["height"] || $_POST["weight"] || $_POST["age"] || isset($_POST["gender"])){
    if($level == 0){
      $burn = round($basal * 1.3);
    }elseif($level == 1){
      $burn = round($basal * 1.5);
    }elseif($level == 2){
      $burn = round($basal * 1.7);
    }else{
      $burn = round($basal * 1.9);
    }
    $query = "UPDATE `users` SET `burn` = '".$burn."' WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);

    if($result){
      echo '<script type="text/javascript">alert("消費エネルギー量を変更しました");</script>';

    }else{
      echo '<script type="text/javascript">alert("消費エネルギー量を変更できませんでした");</script>';
      require_index();
    }
  }else{
    $burn = $row["burn"];
  }



  $purpose = $row["purpose"];


  //cal
  if($_POST["height"] || $_POST["weight"] || $_POST["age"] || isset($_POST["gender"]) || isset($_POST["purpose"])){
    if($purpose == 0){
      $cal = round($burn * 0.8);
    }elseif($purpose == 1){
      $cal = round($burn * 1);
    }else{
      $cal = round($burn * 1.2);
    }


    //protein
    $pCal = $cal * 0.2;
    $protein = round($pCal / 4, 1);

    //fat
    $fCal = $cal * 0.3;
    $fat = round($fCal / 9, 1);

    //carb
    $cCal = $cal * 0.5;
    $carb = round($cCal / 4, 1);


    $query = "UPDATE `users` SET `cal` = '".$cal."', `protein` = '".$protein."', `fat` = '".$fat."', `carb` = '".$carb."'
                WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION["email"])."'";
    $result = mysqli_query($link, $query);

    if($result){
      echo '<script type="text/javascript">alert("目標摂取エネルギー量、PFCバランスを変更しました");</script>';

    }else{
      echo '<script type="text/javascript">alert("目標摂取エネルギー量、PFCバランスを変更できませんでした");</script>';
      require_index();
    }
  }



  require_index();


?>
