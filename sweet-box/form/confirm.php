<?php 
//万が一、確認画面からアクセスしてしまった際にそのままではpostで値が送られていない為エラーになってしまうので、それを回避するために値が空だったら入力画面にリダイレクトさせる処理を行います。
//$_POST["onamae"]の値が空だったらLocationで指定しているファイルに強制移動（リダイレクト）させる
//issetを使う事で変数がセットされているか確認する事が出来ます。
//あたまに「!」を付ける事で逆の意味になるので、以下の記述で「$_POST['name']」に値がセットされていなかったら、という意味になります。
if(!(isset($_POST['onamae']))){
    header('Location:index.php');
    exit;
   }


//name属性の値を取得し変数に代入
$name = htmlspecialchars($_POST["onamae"],ENT_QUOTES);
$email = htmlspecialchars($_POST["email"],ENT_QUOTES);
$tel = htmlspecialchars($_POST["tel"],ENT_QUOTES);
$zip = htmlspecialchars($_POST["zip"],ENT_QUOTES);
$address1 = htmlspecialchars($_POST["address1"],ENT_QUOTES);
$address2 = htmlspecialchars($_POST["address2"],ENT_QUOTES);
$address3 = htmlspecialchars($_POST["address3"],ENT_QUOTES);
$course = $_POST["course"];
$delivery = implode("、",$_POST["delivery"]);
$message = htmlspecialchars($_POST["message"],ENT_QUOTES);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Box｜確認ページ</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body id="top">
    <header>
        <h1><a href="../">Sweet Box</a></h1>
        <nav id="g-nav">
            <ul>
                <li><a href="../">トップ</a></li><!-- idでトップページの指定場所に移動 -->
                <li><a href="../index.html#item">商品紹介</a></li>
                <li><a href="../index.html#service">サービス紹介</a></li>
                <li><a href="../index.html#shop">お店紹介</a></li>
                <li><a href="index.php">お申込みページ</a></li><!-- 他のページに飛ぶリンク -->
            </ul>
        </nav>
    </header>
    <main>
        <section>
<!--             <div class="chip"></div> -->
            <h2>入力内容の確認</h2>
            <ul class="form-step">
                <li><span>Step1</span>お申込内容</li>
                <li class="current"><span>Step2</span>入力内容の確認</li>
                <li><span>Step3</span>お申込み完了</li>
            </ul>
            <form id="g-form" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSdsCKV4hjckQU18ahP-XCpvKT9uL3Ijy2oqLMu625o-3nalcw/formResponse" method="post" class="h-adr"><!-- actionの中にGoogleフォームのアドレスを入れる -->
                <dl class="form-list">
                    <dt>お名前</dt><!-- 項目名 -->
                    <dd><?php echo $name; ?></dd><!-- パーツいろいろ -->
                    <dt>メールアドレス</dt>
                    <dd><?php echo $email; ?></dd>
                    <dt>お電話番号<span>任意</span></dt>
                    <dd><?php echo $tel; ?></dd>
                    <dt>郵便番号</dt>
                    <dd>〒<?php echo $zip; ?></dd><!-- name属性,requiredはあとで自分で入れる -->
                    <dt>住所1</dt>
                    <dd><?php echo $address1; ?></dd><!-- name属性,requiredはあとで自分で入れる -->
                    <dt>住所2</dt>
                    <dd><?php echo $address2; ?></dd>
                    <dt>マンション/ビル名<span>任意</span></dt>
                    <dd><?php echo $address3; ?></dd>
                    <dt>コースの選択</dt>
                    <dd class="course-list"><?php echo $course; ?>
                    </dd>
                    <dt>ご希望の配送時間<span>複数選択可</span></dt>
                    <dd class="delivery-list"><?php echo $delivery; ?>
                    </dd>
                    <dt>備考欄</dt>
                    <dd><?php echo $message; ?></dd>
                    </dl>
                    <!-- googleフォームにデータを送る -->
                    <input type="hidden" name="entry.1117661270" value="<?php echo $name; ?>"><!-- valueの中は送りたいものつまり上の表示させているものをphpタグごと入れる -->
                    <input type="hidden" name="entry.1710972938" value="<?php echo $email; ?>">
                    <input type="hidden" name="entry.769575599" value="<?php echo $tel; ?>">
                    <input type="hidden" name="entry.1487455017" value="<?php echo $zip; ?>">
                    <input type="hidden" name="entry.1618447135" value="<?php echo $address1; ?>">
                    <input type="hidden" name="entry.251375895" value="<?php echo $address2; ?>">
                    <input type="hidden" name="entry.1556875632" value="<?php echo $address3; ?>">
                    <input type="hidden" name="entry.660277569" value="<?php echo $course; ?>">
                    <input type="hidden" name="entry.1635564081" value="<?php echo $delivery; ?>">
                    <input type="hidden" name="entry.514220912" value="<?php echo $message; ?>">
                    
                    <input type="submit" value="送信"><!-- 送信へ行くボタン -->
                    <button class="back" onclick="history.back();">入力画面に戻る</button>

            </form>
        </section>
    </main>
    <footer>
        <p class="copy"><small>&copy; 2020-2023 </small></p>
        <p class="policy"><a href="#">プライバシーポリシー</a></p>
    </footer>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js'></script>
    <script>
        $(function(){
            $('#g-form').submit(function (event) {/* #の指定をする */
    var formData = $('#g-form').serialize();
    $.ajax({/* データの送り先を指定 */
    url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSdsCKV4hjckQU18ahP-XCpvKT9uL3Ijy2oqLMu625o-3nalcw/formResponse",/* google FormのURLを貼り付ける 上のformタグの中にも入れている */
    data: formData,
    type: "POST",
    dataType: "xml",
    statusCode: {
        0: function(){
            window.location.href = "thanks.html";/* 飛ばしたいパスを入れる たまたま同じフォルダの中なのでファイル名のみ */
        },
        200: function(){
     //失敗したときの処理
      }
    }
  });
//googleformへのページ遷移をキャンセル
event.preventDefault();
});
        });
    </script>
</body>
</html>