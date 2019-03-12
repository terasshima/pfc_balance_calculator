<?php

  //データベース
  require("../db.php");


  //データベース接続,接続確認,文字化け防止
  $link = mysqli_connect($db['host'],$db["username"],$db["password"],$db["dbname"]);

  if(mysqli_connect_error()){
    echo '<script type="text/javascript">alert("データベースに接続できませんでした");</script>';
    require_once("../home/index.php");
    exit;
  }else{
    mysqli_set_charset($link, 'utf8');
  }


  //セッション開始
  if(!isset($_SESSION)){
    session_start();
  }




  //目標摂取エネルギー、PFC の値をデータベースより取得
  $query = "SELECT `cal`,`protein`,`fat`,`carb` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_SESSION['email'])."'";
  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_array($result);

  $targetCal = $row["cal"];
  $targetP = $row["protein"];
  $targetF = $row["fat"];
  $targetC = $row["carb"];

  $kcal = $_SESSION["kcal"];
  $protein = $_SESSION["protein"];
  $fat = $_SESSION["fat"];
  $carb = $_SESSION["carb"];


  //摂取エネルギーについてのコメント
  if($kcal < $targetCal - 200){
    $comment = "今日は摂取エネルギーが少なかったようです。<br>なるべく基礎代謝量以上は<br class='br2'>エネルギーを摂るように意識しましょう！";
  }elseif($kcal > $targetCal - 200 && $kcal < $targetCal + 200){
    $comment = "素晴らしい！カロリーコントロールは完璧ですね。<br class='br1'>明日もこの調子で頑張りましょう！";
  }elseif($kcal > $targetCal + 200){
    $comment = "今日は摂取エネルギーが多かったようです。<br>でも、明日以降でセーブすれば大丈夫です。
                <br class='br1'>一日単位より一週間単位で目標値に近づけましょう！";
  }else{
    echo '<script type="text/javascript">alert("コメントの取得に失敗しました");</script>';
  }


  //タンパク質についてのコメント
  if($protein < $targetP - 20){
    $comment1 = "摂取量が少なかったようです。<br>タンパク質は筋肉や臓器、肌、髪、爪など<br class='br1'>体を作るのに大切な栄養素です。
                <br>大豆製品や卵、肉類、魚介類などから<br class='br2'>積極的に摂りましょう！";
  }elseif($protein > $targetP - 20 && $protein < $targetP + 30){
    $comment1 = "素晴らしい！十分に摂れています。<br class='br1'>明日もこの調子で頑張りましょう！";
  }elseif($protein > $targetP + 30){
    $comment1 = "摂取量が多かったようです。<br>タンパク質は体に必要な栄養素ですが、<br class='br1'>過剰な摂取は思わぬ病気に繋がることもあります。
                <br>多くても【体重 × 2g／日】以内で摂取しましょう。";
  }else{
    echo '<script type="text/javascript">alert("コメントの取得に失敗しました");</script>';
  }


  //脂質についてのコメント
  if($fat < $targetF - 15){
    $comment2 = "摂取量が少なかったようです。<br>脂質はホルモンや細胞膜、核膜などを作り、<br class='br1'>また、脂溶性ビタミンの吸収にも<br class='br2'>
                大切な栄養素です。<br>できれば飽和脂肪酸と不飽和脂肪酸の<br class='br1'>バランスにも気をつけて摂りましょう！";
  }elseif($fat > $targetF - 15 && $fat < $targetF + 15){
    $comment2 = "素晴らしい！十分に、必要なだけ摂れています。<br class='br1'>明日もこの調子で頑張りましょう！";
  }elseif($fat > $targetF + 15){
    $comment2 = "摂取量が多かったようです。<br>脂質は他の栄養素よりエネルギーが高く、<br class='br1'>摂りすぎは肥満や糖尿病などの原因となります。
                <br>なるべく目標の数値に近づけるよう意識しましょう。";
  }else{
    echo '<script type="text/javascript">alert("コメントの取得に失敗しました");</script>';
  }


  //糖質についてのコメント
  if($carb < $targetC - 50){
    $comment3 = "摂取量が少なかったようです。<br>糖質は体の主要なエネルギー源で、制限は<br class='br1'>日々のパフォーマンスの低下に繋がります。
                <br>少なくても【100g／日】以上は摂りましょう！";
  }elseif($carb > $targetC - 50 && $carb < $targetC + 50){
    $comment3 = "素晴らしい！十分に、必要なだけ摂れています。<br class='br1'>明日もこの調子で頑張りましょう！";
  }elseif($carb > $targetC + 50){
    $comment3 = "摂取量が多かったようです。<br>糖質の摂りすぎは<br class='br2'>動脈硬化や糖尿病などの原因となります。<br>
                なるべく目標の数値に近づけるよう意識しましょう。";
  }else{
    echo '<script type="text/javascript">alert("コメントの取得に失敗しました");</script>';
  }


 ?>


 <html>

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- bootstrap -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <!-- css -->
   <link rel="stylesheet" href="../css/common.css" type="text/css">
   <!-- font awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

   <title>PFCバランス計算app -計算結果-</title>
 </head>


 <body>

   <div class="container">

     <!--navbar-->
     <header>
       <div class="navbar navbar-default pt-2 mt-4">
         <div class="container d-flex justify-content-between">
           <div class="d-flex align-items-center text-black-50">
             <a href="../index.php" class="toppage-link text-black-50 font-weight-light">
               <i class="fas fa-carrot fa-lg"></i> PFC バランス計算 app
             </a>
           </div>
           <div class="dropdown">
             <button class="btn dropdown-toggle text-black-50" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-circle fa-lg"></i>
             </button>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
               <a class="dropdown-item text-black-50" href="../profile/index.php">プロフィール</a>
               <a class="dropdown-item text-black-50" href="../modify/index.php">登録内容の変更</a>
               <form name="logoutA" method="post" action="../logout/logout.php">
                 <a class="dropdown-item text-black-50" href="javascript:void(0)" onclick="document.logoutA.submit(); return false;">ログアウト</a>
                 <input type=hidden name="logout" value="value">
               </form>
             </div>
           </div>
         </div>
       </div>
     </header>


     <main class="container">
       <!--タイトル-->
       <div class="titles text-center text-black-50">
         <h2>計算結果</h2>
         <p>入力された内容により計算した<br class="br2">今日のあなたのPFCバランスです。<br>グラフにカーソルを合わせると<br class="br2">各栄養素のパーセンテージが表示されます。</p>
       </div>



       <div class="contents text-muted bg-light row">
         <!--目標値-->
         <div class="col-md container">


           <h6 class="text-center">あなたの目標値</h6>


           <div class="row pt-3">
             <p class="col text-right">総摂取エネルギー：</p>
             <p class="col text-left"><?php echo $targetCal; ?> kcal／日</p>
           </div>
           <div class="row">
             <p class="col text-right">タンパク質：</p>
             <p class="col text-left"><?php echo $targetP; ?> g／日</p>
           </div>
           <div class="row">
             <p class="col text-right">脂質：</p>
             <p class="col text-left"><?php echo $targetF; ?> g／日</p>
           </div>
           <div class="row">
             <p class="col text-right">炭水化物（糖質）：</p>
             <p class="col text-left"><?php echo $targetC; ?> g／日</p>
           </div>


           <hr>


           <!--グラフ-->
           <div class="chart-container" style="position: relative; width:60%; height:60%; margin: 0 auto;">
             <canvas id="targetChart"></canvas>
           </div>


           <hr class="pb-5">


         </div>



         <!--結果-->
         <div class = "col-md container">
           <h6 class="text-center">今日の食事内容</h6>


           <div class="row pt-3">
             <p class="col text-right">総摂取エネルギー：</p>
             <p class="col text-left"><?php echo $_SESSION["kcal"]; ?> kcal</p>
           </div>
           <div class="row">
             <p class="col text-right">タンパク質：</p>
             <p class="col text-left"><?php echo $_SESSION["protein"]; ?> g</p>
           </div>
           <div class="row">
             <p class="col text-right">脂質：</p>
             <p class="col text-left"><?php echo $_SESSION["fat"]; ?> g</p>
           </div>
           <div class="row">
             <p class="col text-right">炭水化物（糖質）：</p>
             <p class="col text-left"><?php echo $_SESSION["carb"]; ?> g</p>
           </div>


           <hr>


           <!--グラフ-->
           <div class="chart-container" style="position: relative; width:60%; height:60%; margin: 0 auto;">
             <canvas id="todayChart"></canvas>
           </div>


           <hr class="pb-5">


         </div>



         <div class="container">
           <div class="text-center">

             <!--コメント-->
             <h6 class="mb-4">今日のアドバイス</h6>
             <p>【摂取エネルギー】</p>
             <p class="mb-4"><?php echo $comment; ?></p>
             <p>【タンパク質】</p>
             <p class="mb-4"><?php echo $comment1; ?></p>
             <p>【脂質】</p>
             <p class="mb-4"><?php echo $comment2; ?></p>
             <p>【糖質】</p>
             <p><?php echo $comment3; ?></p>


             <!--ホームへ戻る-->
             <p class="bottom-btn">
               <a href="../home/index.php" class="btn btn-success btn-lg my-2 mx-5">ホームへ戻る</a>
             </p>


             <hr>

           </div>


           <!--注意-->
           <div class="notice text-left">
             <p>
               ※計算結果はあくまで目安です。<br class="br2">無理なく続けられる範囲でバランスのとれた食事を<br class="br2">心がけましょう。
               <br>※BMI値 ＝【体重(kg) ÷ 身長(m)の二乗】
               <br>※基礎代謝量 ＝<br class="br2">『ハリス・ベネディクトの式（日本人用）』
               <br>※消費エネルギー量 ＝<br class="br2">【基礎代謝量(kcal) × 1日の活動レベル<br class="br2">（低：1.3　やや低：1.5　適度：1.7　高：1.9）】
               <br>※目標摂取エネルギー量 ＝<br class="br2">【消費エネルギー(kcal) × 目的<br class="br2">（減量：0.8　維持：1　増量：1.2）】
               <br>※目標摂取pfcバランス ＝<br class="br1">【消費エネルギー(kcal) × 各栄養素バランス(%)<br class="br2">（P：20%　F：30%　C：50%）】
               <br>（厚生労働省 日本人の食事摂取基準(2015年版)より）
             </p>
           </div>

          </div>


         </div>


       </div>

     </main>

   </div>



   <footer class="text-black-50">
     <!--作成者-->
     <div class="container">
       <p class="float-left">
         <small>作成者：テラシマ【<i class="fab fa-twitter"></i><a href="https://twitter.com/ssssssspgg" class="text-success">@ssssssspgg</a>】</small>
       </p>
     </div>

     <!--トップへ-->
     <div class="container">
       <p class="float-right">
         <a href="#" class="text-success">Back to top</a>
       </p>
     </div>

     <br>
     <br>
     <br>
   </footer>


   <!--chart.js CDN（グラフ）-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
   <script>


    /*目標確認用グラフ*/
     //目標摂取(kcal) と PFC量(g)
     var targetCal = <?php echo $targetCal ?>;
     var targetP = <?php echo $targetP ?>;
     var targetF = <?php echo $targetF ?>;
     var targetC = <?php echo $targetC ?>;

     //PFC を (g)から(kcal)へ
     var targetPcal = targetP * 4;
     var targetFcal = targetF * 9;
     var targetCcal = targetC * 4;

     //PFC のカロリーにおける割合の算出
     var targetPper = Math.round(targetPcal / targetCal * 100);
     var targetFper = Math.round(targetFcal / targetCal * 100);
     var targetCper = Math.round(targetCcal / targetCal * 100);


     //パイチャート
     var ctx = document.getElementById("targetChart");
     var myChart = new Chart(ctx, {
         type: 'pie',
         data: {
             labels: ["P（タンパク質）", "F（脂質）", "C（炭水化物）"],
             datasets: [{
                 data: [targetPper, targetFper, targetCper],//割合
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255,99,132,1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)'
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             maintainAspectRatio: false,
             tooltips:{
                 callbacks:{
                     label: function (tooltipItem, data) {
                         //栄養素により1gあたりのkcalが違うので振り分け（小数点以下四捨五入されてる）
                         if(data.datasets[0].data[tooltipItem.index] == targetPper){
                           var targetGram = targetP;
                         }else if(data.datasets[0].data[tooltipItem.index] == targetFper){
                           var targetGram = targetF;
                         }else if(data.datasets[0].data[tooltipItem.index] == targetCper){
                           var targetGram = targetC;
                         }

                         //データ値の %〜g までを付け足す
                         return data.labels[tooltipItem.index]
                             + ": "
                             + data.datasets[0].data[tooltipItem.index]
                             + " %"
                             + " "
                             + targetGram
                             + " g";
                     }
                 }
             }
         }
     });





     /*今日の計算結果グラフ*/
      //摂取(kcal) と PFC量(g)
      var kcal = <?php echo $_SESSION["kcal"]?>;
      var protein = <?php echo $_SESSION["protein"]?>;
      var fat = <?php echo $_SESSION["fat"]?>;
      var carb = <?php echo $_SESSION["carb"]?>;

      //PFC を (g)から(kcal)へ
      var pCal = protein * 4;
      var fCal = fat * 9;
      var cCal = carb * 4;

      //PFC のカロリーにおける割合の算出
      var pPer = Math.round(pCal / kcal * 100);
      var fPer = Math.round(fCal / kcal * 100);
      var cPer = Math.round(cCal / kcal * 100);


      //パイチャート
      var ctx = document.getElementById("todayChart");
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ["P（タンパク質）", "F（脂質）", "C（炭水化物）"],
              datasets: [{
                  data: [pPer, fPer, cPer],//割合
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              maintainAspectRatio: false,
              tooltips:{
                  callbacks:{
                      label: function (tooltipItem, data) {
                          //栄養素により1gあたりのkcalが違うので振り分け（小数点以下四捨五入されてる）
                          if(data.datasets[0].data[tooltipItem.index] == pPer){
                            var targetGram = protein;
                          }else if(data.datasets[0].data[tooltipItem.index] == fPer){
                            var targetGram = fat;
                          }else if(data.datasets[0].data[tooltipItem.index] == cPer){
                            var targetGram = carb;
                          }

                          //データ値の %〜g までを付け足す
                          return data.labels[tooltipItem.index]
                              + ": "
                              + data.datasets[0].data[tooltipItem.index]
                              + " %"
                              + " "
                              + targetGram
                              + " g";
                      }
                  }
              }
          }
      });





















   </script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


 <!--
   BMI,(g) は小数点第一位以下四捨五入
   (kcal),% は小数点以下四捨五入
 -->

 </body>

 </html>
