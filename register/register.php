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
    input_error("入力されたメールアドレスはすでに登録されています");
  }


  //2つのpassが一致しているか
  if($pass1 != $pass2){
    input_error("パスワードが一致していません");
  }


  //年齢に数値が入力されているか,5~120歳か
  if(!is_numeric($age) || $age < 5 || $age > 120){
    input_error("年齢を正しく入力してください");
  }


  //身長に数値が入力されているか,100.0~200.0cmか
  if(!is_numeric($height) || $height < 100.0 || $height >200.0){
    input_error("身長を正しく入力してください");
  }


  //体重に数値が入力されているか,15.0~500.0kgか
  if(!is_numeric($weight) || $weight < 15.0 || $weight >500.0){
    input_error("体重を正しく入力してください");
  }



  //入力成功



  //BMI値 + コメント
  $heightMeter = $height / 100;
  $bmi = round($weight / ($heightMeter * $heightMeter),1);

  switch($bmi){
    case $bmi < 18.5;
      $bmi = $bmi."（痩せすぎ）";
      break;

    case $bmi >= 18.5 && $bmi < 25;
      $bmi = $bmi."（標準）";
      break;

    case $bmi >= 25 && $bmi < 30;
      $bmi = $bmi."（肥満I度）";
      break;

    case $bmi >= 30 && $bmi < 35;
      $bmi = $bmi."（肥満Ⅱ度）";
      break;

    case $bmi >= 35 && $bmi < 40;
      $bmi = $bmi."（肥満Ⅲ度）";
      break;

    case $bmi >= 40;
      $bmi = $bmi."（肥満Ⅳ度）";
      break;
  }



  //基礎代謝量／日
  if($gender == 0){
    $basal = round(66 + 13.7 * $weight + 5 * $height - 6.8 * $age); //男性
  }else{
    $basal = round(665 + 9.6 * $weight + 1.7 *$height - 7 * $age); //女性
  }



  //消費カロリー／日
  if($level == 0){
    $burn = round($basal * 1.3); //低い
  }elseif($level == 1){
    $burn = round($basal * 1.5); //やや低い
  }elseif($level == 2){
    $burn = round($basal * 1.7); //適度
  }else{
    $burn = round($basal * 1.9); //高い
  }



  //目標摂取カロリー／日
  if($purpose == 0){
    $targetCal = round($burn * 0.8); //減量
  }elseif($purpose == 1){
    $targetCal = round($burn * 1); //維持
  }else{
    $targetCal = round($burn * 1.2); //増量
  }



  //目標摂取タンパク質量／日
  $targetPCal = $targetCal * 0.2;
  $targetP = round($targetPCal / 4, 1);

  //目標摂取脂質量／日
  $targetFCal = $targetCal * 0.3;
  $targetF = round($targetFCal / 9, 1);

  //目標摂取糖質量／日
  $targetCCal = $targetCal * 0.5;
  $targetC = round($targetCCal / 4, 1);



  //セッションの初期化,格納
  $_SESSION = array();

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
