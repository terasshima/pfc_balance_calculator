<?php



  //入力エラーの際 アラート出力＆index読み込み
  function input_error($alertMessage){
    echo '<script type="text/javascript">alert("'.$alertMessage.'");</script>';
    require_once("index.php");
    exit;
  }




















?>
