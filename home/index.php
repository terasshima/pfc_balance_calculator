<?php

  //セッションの開始
  if(!isset($_SESSION)){
    session_start();
  }


  //XSS対策
  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
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
  <link rel="stylesheet" href="../css/home.css" type="text/css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <title>PFCバランス計算app -ホーム-</title>
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
            <button class="btn dropdown-toggle text-black-50" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-lg"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
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


    <main>

      <!--タイトル-->
      <div class="titles text-center text-black-50">
        <h2>こんにちは、<?php echo h($_SESSION["name"]); ?>さん！</h2>
        <p>今日のPFCバランスを計算しましょう。</p>
      </div>


      <!--入力フォーム-->
      <div class="contents text-muted bg-light">
        <div class="container">



          <!--入力欄-->
          <p>▼ 計算方法を選択してから数値を入力してください。</p>
          <form action="home.php" method="post">
            <div class="row">


              <!--P F C で計算-->
              <!--ラジオボタン-->
              <div class="mb-4 col-md">
                <div class="custom-control custom-radio">
                  <input type="radio" id="radio0" name="calculationMethod" value="byCarb" class="custom-control-input" onclick="byCarb();" required>
                  <label class="labels custom-control-label" for="radio0">糖質の量が分かっている場合</label>
                </div>


                <!--値の入力（kcalで計算の時消える）-->
                <div id="byCarb">
                  <div class="row">
                    <label class="labels col-5 col-form-label text-right">タンパク質：</label>
                    <input type="text" maxlength="6" class="col-4 form-control" name="PbyCarb">
                    <label class="labels col-3 col-form-label text-left">g</label>
                  </div>

                  <div class="row">
                    <label class="labels col-5 col-form-label text-right">脂質：</label>
                    <input type="text" maxlength="6" class="col-4 form-control" name="FbyCarb">
                    <label class="labels col-3 col-form-label text-left">g</label>
                  </div>

                  <div class="row">
                    <label class="labels col-5 col-form-label text-right">糖質：</label>
                    <input type="text" maxlength="6" class="col-4 form-control" name="CbyCarb">
                    <label class="labels col-3 col-form-label text-left">g</label>
                  </div>
                </div>

              </div>



              <!--P F kcal で計算-->
              <!--ラジオボタン-->
              <div class="mb-4 col-md">
                <div class="custom-control custom-radio">
                  <input type="radio" id="radio1" name="calculationMethod" value="byCal" class="custom-control-input" onclick="byCal();" required>
                  <label class="labels custom-control-label" for="radio1">糖質の量が不明で、<br class="br1">総摂取エネルギーが分かっている場合</label>
                </div>


                <!--値の入力（Cで計算の時消える）-->
                <div id="byCal">
                  <div class="row">
                    <label class="labels col-5 col-form-label text-right">タンパク質：</label>
                    <input type="text" maxlength="6" class="col-4 form-control" name="PbyCal">
                    <label class="labels col-3 col-form-label text-left">g</label>
                  </div>

                  <div class="row">
                    <label class="labels col-5 col-form-label text-right">脂質：</label>
                    <input type="text" maxlength="6" class="col-4 form-control" name="FbyCal">
                    <label class="labels col-3 col-form-label text-left">g</label>
                  </div>

                  <div class="row">
                    <label class="labels col-5 col-form-label text-right">エネルギー：</label>
                    <input type="text" maxlength="6" class="col-4 form-control" name="kcal">
                    <label class="labels col-3 col-form-label text-left">kcal</label>
                  </div>
                </div>

              </div>

            </div>



            <!--登録ボタン-->
            <p class="text-center bottom-btn">
              <button class="btn btn-secondary btn-lg  mx-5 my-2" type="reset">リセット</button>
              <button class="btn btn-success btn-lg  mx-5 my-2" type="submit">計算する</button>
            </p>


          </form>
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
    <div class="container back-to-top">
      <p class="float-right">
        <a href="#" class="text-success">Back to top</a>
      </p>
    </div>

    <br>
    <br>
    <br>
  </footer>



  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

  <script>



    //選択されたラジオボタンによる入力欄の表示/非表示
    function byCarb(){
      document.getElementById('byCal').style.display='none';
      document.getElementById('byCarb').style.display='inline';
    }

    function byCal(){
      document.getElementById('byCarb').style.display='none';
      document.getElementById('byCal').style.display='inline';
    }




  </script>


</body>
</html>
