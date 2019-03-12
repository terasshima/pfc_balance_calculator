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

    <title>PFCバランス計算app -ログイン-</title>
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
                    <a href="../register/index.php" class="btn btn-success">新規登録</a>
                    <a href="#" class="btn btn-secondary">ログイン</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </header>


      <main>
        <!--タイトル-->
        <div class="titles text-center text-black-50">
          <h2>ログイン</h2>
          <p>登録しているメールアドレスと<br class="br2">パスワードを入力してください。</p>
        </div>


        <!--入力フォーム-->
        <div class="contents text-muted bg-light">
          <div class="container">
            <form class="needs-validation" action="login.php" method="post" novalidate>


              <!--メールアドレス-->
              <div class="mb-4">
                <label for="email" class="labels">メールアドレス</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <div class="invalid-feedback">
                  メールアドレスを入力してください。
                </div>
              </div>


              <!--パスワード-->
              <div class="mb-4">
                <label for="pass" class="labels">パスワード</label>
                <input type="text" class="form-control" name="pass" placeholder="Password" required>
                <div class="invalid-feedback">
                  パスワードを入力してください。
                </div>
              </div>


              <!--ログインボタン-->
              <p class="text-center bottom-btn">
                <button class="btn btn-success btn-lg" type="submit">ログインする</button>
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
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
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
