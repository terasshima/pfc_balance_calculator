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
      input_error("数値を入力してください");
    }


    //数値か
    if(!is_numeric($protein) || !is_numeric($fat) || !is_numeric($carb)){
      input_error("数値を正しく入力してください");
    }


    //有効な数値か
    if($protein < 0 || $fat < 0 || $carb < 0){
      input_error("数値を正しく入力してください");
    }


    //総摂取カロリー
    $kcal = round(($protein * 4) + ($fat * 9) + ($carb * 4));




  }elseif($calculationMethod == "byCal"){ //P F kcal で計算する
    $protein = $_POST["PbyCal"];
    $fat = $_POST["FbyCal"];
    $kcal = round($_POST["kcal"]);


    //入力漏れがないか
    if(!$protein || !$fat || !$kcal){
      input_error("数値を入力してください");
    }


    //数値か
    if(!is_numeric($protein) || !is_numeric($fat) || !is_numeric($kcal)){
      input_error("数値を正しく入力してください");
    }


    //有効な数値か
    if($protein < 0 || $fat < 0 || $kcal < ($protein * 4) + ($fat * 9)){
      input_error("数値を正しく入力してください");
    }


    //糖質量
    $carbCal = $kcal - ($protein * 4 + $fat * 9);
    $carb = round($carbCal / 4, 1);


  }else{
    //計算方法不明
    input_error("計算方法の取得に失敗しました");
  }




  $_SESSION["kcal"] = $kcal;
  $_SESSION["protein"] = $protein;
  $_SESSION["fat"] = $fat;
  $_SESSION["carb"] = $carb;


  //計算結果ページへ
  header('location:../result/index.php');
  exit;




 ?>
