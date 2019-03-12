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
                <a class="dropdown-item text-black-50" href="#">登録内容の変更</a>
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
          <h2>登録内容の変更</h2>
          <p>変更後の基礎代謝量や目標摂取量などは<br class="br1">画面右上の <i class="fas fa-user-circle fa-lg"></i> → プロフィール より確認できます。
            <br>メールアドレスやパスワードを変更した場合は<br class="br1">新しく登録した内容で再ログインして下さい。</p>
        </div>


        <!--入力フォーム-->
        <div class="contents text-muted bg-light">
          <div class="container">
            <form class="needs-validation" action="modify.php" method="post">

              <p class="mb-4">※変更するもののみ入力して下さい。</p>

              <!--名前-->
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-4">
                    <label class="labels">名前</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                  </div>
                </div>
              </div>


              <!--メールアドレス-->
              <div class="mb-4">
                <label class="labels">メールアドレス</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>


              <!--パスワード-->
              <div class="mb-4">
                <label class="labels">パスワード</label>
                <input type="text" class="form-control" name="pass1" placeholder="Password">
              </div>


              <!--パスワード（確認用）-->
              <div class="mb-4">
                <label class="labels">パスワード（確認用）</label>
                <input type="text" class="form-control" name="pass2" placeholder="Password">
              </div>


              <!--年齢、身長、体重-->
              <div class="row">
                <div class="col-md-4 mb-4">
                  <label class="labels">年齢（5〜120歳まで）</label>
                  <input type="text" maxlength="3" class="form-control" name="age" placeholder="Age">
                </div>

                <div class="col-md-4 mb-4">
                  <label class="labels">身長（100.0〜200.0cmまで）</label>
                  <input type="text" maxlength="5" class="form-control" name="height" placeholder="Height(cm)">
                </div>

                <div class="col-md-4 mb-4">
                  <label class="labels">体重（15.0〜500.0kgまで）</label>
                  <input type="text" maxlength="5" class="form-control" name="weight" placeholder="Weight(kg)">
                </div>
              </div>


              <hr>


              <!--性別-->
              <label for="male" class="labels">性別</label>
              <div class="mb-4">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="male" name="gender" value="0" class="custom-control-input">
                  <label class="labels custom-control-label" for="male">男性</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="female" name="gender" value="1" class="custom-control-input">
                  <label class="labels custom-control-label" for="female">女性</label>
                </div>
              </div>


              <hr>


              <!--活動レベル-->
              <label for="level" class="labels">１日の活動レベル</label>
              <div class="mb-4">
                <div class="custom-control custom-radio">
                  <input type="radio" id="0" name="level" value="0" class="custom-control-input">
                  <label class="labels custom-control-label" for="0">低い（ほとんど体を動かさない、安静にしている）</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="1" name="level" value="1" class="custom-control-input">
                  <label class="labels custom-control-label" for="1">やや低い（座位が中心、通勤や家事で少し体を動かしている）</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="2" name="level" value="2" class="custom-control-input">
                  <label class="labels custom-control-label" for="2">適度（立ち仕事や軽いスポーツをしている）</label></label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="3" name="level" value="3" class="custom-control-input">
                  <label class="labels custom-control-label" for="3">高い（肉体労働や本格的なスポーツをしている）</label>
                </div>
              </div>


              <hr>


              <!--目標-->
              <label for="purpose" class="labels">目的</label>
              <div class="mb-4">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="lose" name="purpose" value="0" class="custom-control-input">
                  <label class="labels custom-control-label" for="lose">減量</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="maintain" name="purpose" value="1" class="custom-control-input">
                  <label class="labels custom-control-label" for="maintain">維持</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="gain" name="purpose" value="2" class="custom-control-input">
                  <label class="labels custom-control-label" for="gain">増量</label>
                </div>
              </div>


              <hr>


              <!--登録ボタン-->
              <p class="text-center bottom-btn">
                <button class="btn btn-success btn-lg" type="submit">　変更する　</button>
                <a href="../home/index.php" class="btn btn-secondary btn-lg my-2 mx-5">ホームへ戻る</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
