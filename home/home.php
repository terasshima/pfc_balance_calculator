<?php


  //ユーザ関数読み込み
  require("../function.php");


  //セッションの開始
  if(!isset($_SESSION)){
    session_start();
  }



  //計算方法
  $calculationMethod = $_POST["calculationMethod"];


  if($calculationMethod == "byCarb"){ //P F C で計算する
    $protein = $_POST["PbyCarb"];
    $fat = $_POST["FbyCarb"];
    $carb = $_POST["CbyCarb"];


    //入力漏れがないか
    if(!$protein || !$fat || !$carb){
      alert("数値を入力してください");
      goto jump;
    }


    //数値か
    if(!is_numeric($protein) || !is_numeric($fat) || !is_numeric($carb)){
      alert("数値を正しく入力してください");
      goto jump;
    }


    //有効な数値か
    if($protein < 0 || $fat < 0 || $carb < 0){
      alert("数値を正しく入力してください");
      goto jump;
    }


    //総摂取カロリー
    $kcal = round(($protein * 4) + ($fat * 9) + ($carb * 4));




  }elseif($calculationMethod == "byCal"){ //P F kcal で計算する
    $protein = $_POST["PbyCal"];
    $fat = $_POST["FbyCal"];
    $kcal = round($_POST["kcal"]);


    //入力漏れがないか
    if(!$protein || !$fat || !$kcal){
      alert("数値を入力してください");
      goto jump;
    }


    //数値か
    if(!is_numeric($protein) || !is_numeric($fat) || !is_numeric($kcal)){
      alert("数値を正しく入力してください");
      goto jump;
    }


    //有効な数値か
    if($protein < 0 || $fat < 0 || $kcal < ($protein * 4) + ($fat * 9)){
      alert("数値を正しく入力してください");
      goto jump;
    }


    //糖質量
    $carbCal = $kcal - ($protein * 4 + $fat * 9);
    $carb = round($carbCal / 4, 1);


  }else{
    //計算方法不明
    alert("計算方法の取得に失敗しました");
    goto jump;
  }




  $_SESSION["kcal"] = $kcal;
  $_SESSION["protein"] = $protein;
  $_SESSION["fat"] = $fat;
  $_SESSION["carb"] = $carb;


  //計算結果ページへ
  header('location:../result/index.php');
  exit;



  //ジャンプ先
  jump:
  require_once("index.php");
  exit;



 ?>
