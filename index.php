<!DOCTYPE html>
<html>


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="./css/common.css" type="text/css">
    <link rel="stylesheet" href="./css/top.css" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>PFCバランス計算app</title>
  </head>


  <body>

    <div class="container">

      <!--navbar-->
      <header>
        <div class="navbar navbar-default pt-4">
          <div class="container d-flex justify-content-between">
            <div class="d-flex align-items-center text-black-50">
              <a href="#" class="toppage-link text-black-50 font-weight-light">
                <i class="fas fa-carrot fa-lg"></i> PFC バランス計算 app
              </a>
            </div>
            <div class="cjustify-content-end">
              <div class="container top-btn d-none d-sm-block">
                  <p>
                    <a href="./register/index.php" class="btn btn-success">新規登録</a>
                    <a href="./login/index.php" class="btn btn-secondary">ログイン</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </header>




      <main class="text-center">

        <div id="title">
          <h1 class="text-black-50 font-weight-light">PFC バランス計算 app</h1>
        </div>



        <div id="summary" class="text-muted bg-light">
          <div id="aboutPfc">
            <h4>PFC バランスとは？</h4>
            <p>まず、 PFC というのは<br class="br2">三大栄養素である<br>タンパク質（Protein） <br class="br2">脂質（Fat） <br class="br2">炭水化物（Carbohydrate）<br>から頭文字を取ったものです。</p>
            <p>さらに、炭水化物は<br class="br2">糖質と食物繊維に分けることができ、<br class="br1">この PFC の C はそのうちの糖質を指します。</p>
            <p>そして実は様々な栄養素のうち、<br class="br2">エネルギーが含まれるのはこの PFC のみです。</p>
            <p>タンパク質と炭水化物は 4kcal/1g 、<br class="br2">脂質は 9kcal/1g のエネルギーが含まれており、<br>1日のエネルギー摂取量のうち、<br class="br2">これらの各栄養素から得たエネルギーの割合を<br class="br1">PFC バランスと言います。</p>
            <p>このバランスは減量期や維持期、増量期など<br class="br2">あなたの状況により目標値も変化します。<br>大切なのは、どのような状況であっても<br class="br2">極端に栄養素を増減せず、<br class="br1">バランス良く摂取することです。</p>
            <p>1日の総摂取エネルギーや PFC バランスを<br class="br2">把握することはダイエットだけでなく、<br class="br1">日々の健康的な食生活にも繋がります。</p>
            <p>是非このアプリを使って<br class="br2">あなたの食生活を見直してみませんか？</p>
          </div>


          <div id="aboutApp" class="container">
            <h4>このアプリについて</h4>

            <div class="aboutApp-content row">
              <div class="image col-md">
                <div class="shadow-sm">
                  <img src="./img/top-1.jpg" height="400" width="400" alt="image cap" class="img-fluid">
                </div>
              </div>
              <div class="content-text d-flex align-items-center justify-content-center col-md">
                <p>簡単な登録をするだけで<br class="br1">あなたのBMI値や基礎代謝量、<br>1日あたりの目標摂取エネルギー量等の<br class="br1">計算をします。</p>
              </div>
            </div>

            <div class="aboutApp-content row">
              <div class="image col-md">
                <div class="shadow-sm">
                  <img src="./img/top-2.jpg" height="400" width="550" alt="image cap" class="img-fluid">
                </div>
              </div>
              <div class="content-text d-flex align-items-center justify-content-center col-md mb-5">
                <p>PFC バランスの計算も簡単な入力のみ。</p>
              </div>
            </div>

            <div class="aboutApp-content row">
              <div class="image col-md">
                <div class="shadow-sm">
                  <img src="./img/top-3.jpg" height="400" width="500" alt="image cap" class="img-fluid">
                </div>
              </div>
              <div class="content-text d-flex align-items-center justify-content-center col-md">
                <p>入力された内容からグラフを作成し、<br>シンプルでわかりやすく<br>あなたの今日のPFCバランスを<br class="br1">お知らせします。</p>
              </div>
            </div>

          </div>

          <p class="bottom-btn">
            <a href="./register/index.php" class="btn btn-success btn-lg my-2 mx-5">　登録する　</a>
            <a href="./login/index.php" class="btn btn-secondary btn-lg my-2 mx-5">ログインする</a>
          </p>

        </div>
      </main>
    </div>



   <footer class="text-black-50">
     <div class="container">
       <p class="float-left">
         <small>作成者：テラシマ【<i class="fab fa-twitter"></i><a href="https://twitter.com/ssssssspgg" class="text-success">@ssssssspgg</a>】</small>
       </p>
     </div>

     <div class="container">
       <p class="float-right">
         <a href="#" class="text-success">Back to top</a>
       </p>
     </div>
     <br>
     <br>
     <br>
   </footer>
  </body>
</html>
