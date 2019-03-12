<!DOCTYPE html>
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

    <title>PFCバランス計算app -新規登録-</title>
  </head>


  <body>

    <div class="container">

      <!--navbar-->
      <header>
        <div class="navbar navbar-default pt-4">
          <div class="container d-flex justify-content-between">
            <div class="d-flex align-items-center text-black-50">
              <a href="../index.php" class="toppage-link text-black-50 font-weight-light">
                <i class="fas fa-carrot fa-lg"></i> PFC バランス計算 app
              </a>
            </div>
            <div class="cjustify-content-end">
              <div class="container top-btn d-none d-sm-block">
                  <p>
                    <a href="#" class="btn btn-success">新規登録</a>
                    <a href="../login/index.php" class="btn btn-secondary">ログイン</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </header>


      <main>
        <!--タイトル-->
        <div class="titles text-center text-black-50">
          <h2>新規登録</h2>
          <p>アカウントを作成します。</p>
        </div>


        <!--入力フォーム-->
        <div class="contents text-muted bg-light">
          <div class="container">
            <form class="needs-validation" action="register.php" method="post" novalidate>


              <!--名前-->
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="labels">名前</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                    <div class="invalid-feedback" style="width: 100%;">
                      名前を入力してください。
                    </div>
                  </div>
                </div>
              </div>


              <!--メールアドレス-->
              <div class="mb-4">
                <label class="labels">メールアドレス</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <div class="invalid-feedback">
                  メールアドレスを入力してください。
                </div>
              </div>


              <!--パスワード-->
              <div class="mb-4">
                <label class="labels">パスワード</label>
                <input type="text" class="form-control" name="pass1" placeholder="Password" required>
                <div class="invalid-feedback">
                  パスワードを入力してください。
                </div>
              </div>


              <!--パスワード（確認用）-->
              <div class="mb-4">
                <label class="labels">パスワード（確認用）</label>
                <input type="text" class="form-control" name="pass2" placeholder="Password" required>
                <div class="invalid-feedback">
                  パスワードを入力してください。
                </div>
              </div>


              <!--年齢、身長、体重-->
              <div class="row">
                <div class="col-md-4 mb-4">
                  <label class="labels">年齢（5〜120歳まで）</label>
                  <input type="text" maxlength="3" class="form-control" name="age" placeholder="Age" required>
                  <div class="invalid-feedback">
                    年齢を入力してください。
                  </div>
                </div>

                <div class="col-md-4 mb-4">
                  <label class="labels">身長（100.0〜200.0cmまで）</label>
                  <input type="text" maxlength="5" class="form-control" name="height" placeholder="Height(cm)" required>
                  <div class="invalid-feedback">
                    身長を入力してください。
                  </div>
                </div>

                <div class="col-md-4 mb-4">
                  <label class="labels">体重（15.0〜500.0kgまで）</label>
                  <input type="text" maxlength="5" class="form-control" name="weight" placeholder="Weight(kg)" required>
                  <div class="invalid-feedback">
                    体重を入力してください。
                  </div>
                </div>
              </div>


              <hr class="mb-4">


              <!--性別-->
              <label for="male" class="labels">性別</label>
              <div class="mb-4">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="male" name="gender" value="0" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="male">男性</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="female" name="gender" value="1" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="female">女性</label>
                </div>
              </div>


              <hr class="mb-4">


              <!--活動レベル-->
              <label for="level" class="labels">１日の活動レベル</label>
              <div class="mb-4">
                <div class="custom-control custom-radio">
                  <input type="radio" id="0" name="level" value="0" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="0">低い（ほとんど体を動かさない、安静にしている）</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="1" name="level" value="1" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="1">やや低い（座位が中心、通勤や家事で少し体を動かしている）</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="2" name="level" value="2" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="2">適度（立ち仕事や軽いスポーツをしている）</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="3" name="level" value="3" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="3">高い（肉体労働や本格的なスポーツをしている）</label>
                </div>
              </div>


              <hr class="mb-4">


              <!--目標-->
              <label for="purpose" class="labels">目的</label>
              <div class="mb-4">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="lose" name="purpose" value="0" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="lose">減量</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="maintain" name="purpose" value="1" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="maintain">維持</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="gain" name="purpose" value="2" class="custom-control-input" required>
                  <label class="labels custom-control-label" for="gain">増量</label>
                </div>
              </div>


              <hr class="mb-4">


              <!--登録ボタン-->
              <p class="text-center bottom-btn">
                <button class="btn btn-success btn-lg" type="submit">確認する</button>
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
      <div class="container">
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
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
