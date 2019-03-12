<?php

  //ユーザ関数読み込み
  require("../function.php");


  $db_hostname = getenv("DB_HOSTNAME");
  $db_username = getenv("DB_USERNAME");
  $db_password = getenv("DB_PASSWORD");
  $db_name = getenv("DB_NAME");




  //データベース接続,接続確認,文字化け防止
  $link = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

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


  /* index.phpで入力されていない時進めないようにしてあるのでエラー回避なし */



  $email = $_POST["email"];
  $pass1 = $_POST["pass1"];
  $pass2 = $_POST["pass2"];
  $age = $_POST["age"];
  $height = $_POST["height"];
  $weight = $_POST["weight"];
  $gender = $_POST["gender"];
  $level = $_POST["level"];
  $purpose = $_POST["purpose"];




  //emailがすでに登録されていないか
  $query = "SELECT `id` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";
  $result = mysqli_query($link, $query);
  if(mysqli_num_rows($result) > 0){
    echo '<script type="text/javascript">alert("入力されたメールアドレスはすでに登録されています");</script>';
    require_index();
  }


  //2つのpassが一致しているか
  if($pass1 != $pass2){
    echo '<script type="text/javascript">alert("パスワードが一致していません");</script>';
    require_index();
  }


  //年齢に数値が入力されているか,5~120歳か
  if(!is_numeric($age) || $age < 5 || $age > 120){
    echo '<script type="text/javascript">alert("年齢を正しく入力してください");</script>';
    require_index();
  }


  //身長に数値が入力されているか,100.0~200.0cmか
  if(!is_numeric($height) || $height < 100.0 || $height >200.0){
    echo '<script type="text/javascript">alert("身長を正しく入力してください");</script>';
    require_index();
  }


  //体重に数値が入力されているか,15.0~500.0kgか
  if(!is_numeric($weight) || $weight < 15.0 || $weight >500.0){
    echo '<script type="text/javascript">alert("体重を正しく入力してください");</script>';
    require_index();
  }



  //入力成功



  //BMI値 function
  $heightMeter = $height / 100;
  $bmi = round($weight / ($heightMeter * $heightMeter),1);
  //コメント付け足し case
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



  //基礎代謝量／日
  if($gender == 0){
    //男性
    $basal = round(66 + 13.7 * $weight + 5 * $height - 6.8 * $age);
  }else{
    //女性
    $basal = round(665 + 9.6 * $weight + 1.7 *$height - 7 * $age);
  }



  //消費カロリー／日
  if($level == 0){
    //低い
    $burn = round($basal * 1.3);
  }elseif($level == 1){
    //やや低い
    $burn = round($basal * 1.5);
  }elseif($level == 2){
    //適度
    $burn = round($basal * 1.7);
  }else{
    //高い
    $burn = round($basal * 1.9);
  }



  //目標摂取カロリー／日
  if($purpose == 0){
    //減量
    $targetCal = round($burn * 0.8);
  }elseif($purpose == 1){
    //維持
    $targetCal = round($burn * 1);
  }else{
    //増量
    $targetCal = round($burn * 1.2);
  }



  //目標摂取タンパク質量／日
  $targetPCal = $targetCal * 0.2;
  $targetP = round($targetPCal / 4, 1); //function

  //目標摂取脂質量／日
  $targetFCal = $targetCal * 0.3;
  $targetF = round($targetFCal / 9, 1);

  //目標摂取糖質量／日
  $targetCCal = $targetCal * 0.5;
  $targetC = round($targetCCal / 4, 1);



  //セッションの初期化

  //入力内容,計算結果をセッションに代入
  $_SESSION["name"] = $_POST["name"];
  $_SESSION["email"] = $email;
  $_SESSION["pass"] = $pass1;
  $_SESSION["age"] = $age;
  $_SESSION["height"] = $height;
  $_SESSION["weight"] = $weight;
  $_SESSION["gender"] = $gender;
  $_SESSION["level"] = $level;
  $_SESSION["purpose"] = $purpose;
  $_SESSION["bmi"] = $bmi;
  $_SESSION["basal"] = $basal;
  $_SESSION["burn"] = $burn;
  $_SESSION["targetCal"] = $targetCal;
  $_SESSION["targetP"] = $targetP;
  $_SESSION["targetF"] = $targetF;
  $_SESSION["targetC"] = $targetC;



  //確認ページへ
  header('location:../check/index.php');
  exit;



/*
  BMI,(g)は小数点第一位以下四捨五入
  (kcal)は小数点以下四捨五入
*/

?>
