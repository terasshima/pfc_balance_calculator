<?php

  //セッション開始
  if(!isset($_SESSION)){
    session_start();
  }


  //XSS対策
  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
  }


  //表示のため言葉に変換
  //性別
  if($_SESSION["gender"]==0){
    $genderWord = "男性";
  }else{
    $genderWord = "女性";
  }

  //生活レベル
  if($_SESSION["level"]==0){
    $levelWord = "低い";
  }elseif($_SESSION["level"]==1){
    $levelWord = "やや低い";
  }elseif($_SESSION["level"]==2){
    $levelWord = "適度";
  }else{
    $levelWord = "高い";
  }

  //目的
  if($_SESSION["purpose"]==0){
    $purposeWord = "減量";
  }elseif($_SESSION["purpose"]==1){
    $purposeWord = "維持";
  }else{
    $purposeWord = "増量";
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

  <title>PFCバランス計算app -登録内容確認-</title>
</head>


<body>

  <div class="container">

    <!--navbar-->
    <header>
      <div class="navbar navbar-default pt-3 mt-4">
        <div class="container d-flex justify-content-between">
          <div class="d-flex align-items-center text-black-50">
            <a href="../index.php" class="toppage-link text-black-50 font-weight-light">
              <i class="fas fa-carrot fa-lg"></i> PFC バランス計算 app
            </a>
          </div>
        </div>
      </div>
    </header>


    <main>
      <!--タイトル-->
      <div class="titles text-center text-black-50">
        <h2>内容確認</h2>
        <p>以下の内容でよろしければ<br class="br2">登録するボタンを押してください。</p>
      </div>


      <!--確認-->
      <div class="contents text-muted bg-light">
        <div class="container">

          <div class="row">
            <p class="col text-right">名前：</p>
            <p class="col text-left"><?php echo h($_SESSION["name"]); ?> 様</p>
          </div>
          <div class="row">
            <p class="col text-right">メールアドレス：</p>
            <p class="col text-left"><?php echo h($_SESSION["email"]); ?></p>
          </div>
          <div class="row">
            <p class="col text-right">パスワード：</p>
            <p class="col text-left"><?php echo h($_SESSION["pass"]); ?></p>
          </div>
          <div class="row">
            <p class="col text-right">年齢：</p>
            <p class="col text-left"><?php echo $_SESSION["age"]; ?> 歳</p>
          </div>
          <div class="row">
            <p class="col text-right">身長：</p>
            <p class="col text-left"><?php echo $_SESSION["height"]; ?> cm</p>
          </div>
          <div class="row">
            <p class="col text-right">体重：</p>
            <p class="col text-left"><?php echo $_SESSION["weight"]; ?> kg</p>
          </div>
          <div class="row">
            <p class="col text-right">性別：</p>
            <p class="col text-left"><?php echo $genderWord; ?></p>
          </div>
          <div class="row">
            <p class="col text-right">１日の活動レベル：</p>
            <p class="col text-left"><?php echo $levelWord; ?></p>
          </div>
          <div class="row">
            <p class="col text-right">目的：</p>
            <p class="col text-left"><?php echo $purposeWord; ?></p>
          </div>


          <hr>


          <!--計算結果-->
          <p class="text-center mb-4">入力された内容から<br class="br2">あなたについて計算しました。</p>
          <div class="row">
            <p class="col text-right">BMI値：</p>
            <p class="col text-left"><?php echo $_SESSION["bmi"]; ?></p>
          </div>
          <div class="row">
            <p class="col text-right">基礎代謝量：</p>
            <p class="col text-left"><?php echo $_SESSION["basal"]; ?> kcal／日</p>
          </div>
          <div class="row">
            <p class="col text-right">消費エネルギー量：</p>
            <p class="col text-left"><?php echo $_SESSION["burn"]; ?> kcal／日</p>
          </div>


          <hr>


          <!--目標値-->
          <p class="text-center mb-4">そして、以下があなたの摂取目標となる<br class="br2">エネルギー量、PFCバランスです。</p>

          <div class="row">
            <p class="col text-right">摂取エネルギー量：</p>
            <p class="col text-left"><?php echo $_SESSION["targetCal"]; ?> kcal／日</p>
          </div>
          <div class="row">
            <p class="col text-right">タンパク質：</p>
            <p class="col text-left"><?php echo $_SESSION["targetP"]; ?> g／日</p>
          </div>
          <div class="row">
            <p class="col text-right">脂質：</p>
            <p class="col text-left"><?php echo $_SESSION["targetF"]; ?> g／日</p>
          </div>
          <div class="row">
            <p class="col text-right">炭水化物（糖質）：</p>
            <p class="col text-left"><?php echo $_SESSION["targetC"]; ?> g／日</p>
          </div>


          <p class="text-center mt-5 mb-5">数値だけでは分かりにくいので<br class="br2">グラフをご用意しました。</p>


          <!--グラフ-->
          <div class="chart-container" style="position: relative; width:60%; height:60%; margin: 0 auto;">
            <canvas id="targetChart"></canvas>
          </div>


          <!--登録ボタン-->
          <form action = "check.php" method="post">
            <p class="text-center bottom-btn my-5">
              <button class="btn btn-secondary btn-lg mx-5 my-2" type="submit" name="back" value="戻る">　戻る　</button>
              <button class="btn btn-success btn-lg mx-5 my-2" type="submit" name="next" value="登録する">登録する</button>
            </p>
          </form>


          <hr>


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

    //目標摂取(kcal) と PFC量(g)
    var targetCal = <?php echo $_SESSION["targetCal"]?>;
    var targetP = <?php echo $_SESSION["targetP"]?>;
    var targetF = <?php echo $_SESSION["targetF"]?>;
    var targetC = <?php echo $_SESSION["targetC"]?>;

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
  </script>


<!--
  BMI,(g) は小数点第一位以下四捨五入
  (kcal),% は小数点以下四捨五入
-->

</body>

</html>
