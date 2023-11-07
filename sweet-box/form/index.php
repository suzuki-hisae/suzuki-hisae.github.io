<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Box｜お申し込み入力ページ</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body id="top">
    <header>
        <h1><a href="../index.html">Sweet Box</a></h1>
        <nav id="g-nav">
            <ul>
                <li><a href="../index.html">トップ</a></li><!-- idでトップページの指定場所に移動 -->
                <li><a href="../index.html#item">商品紹介</a></li>
                <li><a href="../index.html#service">サービス紹介</a></li>
                <li><a href="../index.html#shop">お店紹介</a></li>
                <li><a href="#">お申込みページ</a></li><!-- 他のページに飛ぶリンク -->
            </ul>
        </nav>
    </header>
    <main>
        <section>
<!--             <div class="chip"></div> -->
            <h2>お申し込み入力ページ</h2>
            <ul class="form-step">
                <li class="current"><span>Step1</span>お申込内容</li>
                <li><span>Step2</span>入力内容の確認</li>
                <li><span>Step3</span>お申込み完了</li>
            </ul>
            <form id="g-form" action="confirm.php" method="post" class="h-adr">
                <span class="p-country-name" style="display:none;">Japan</span>
                <dl class="form-list">
                    <dt>お名前</dt><!-- 項目名 -->
                    <dd><input type="text" name="onamae" required placeholder="お名前を入れてください" autocomplete="name"></dd><!-- パーツいろいろ -->
                    <dt>メールアドレス</dt>
                    <dd><input type="email" name="email" required placeholder="example@gmail.com" autocomplete="email"></dd>
                    <dt>お電話番号<span>任意</span></dt>
                    <dd><input type="tel" name="tel" placeholder="09011112222" autocomplete="tel"></dd>
                    <dt>郵便番号</dt>
                    <dd>〒<input type="text" name="zip" required class="p-postal-code" size="8" maxlength="8"></dd><!-- name属性,requiredはあとで自分で入れる -->
                    <dt>住所1</dt>
                    <dd><input type="text" name="address1" required class="p-region p-locality p-street-address p-extended-address" /></dd><!-- name属性,requiredはあとで自分で入れる -->
                    <dt>住所2</dt>
                    <dd><input type="text" name="address2" required placeholder="以降を入力して下さい"></dd>
                    <dt>マンション/ビル名<span>任意</span></dt>
                    <dd><input type="text" name="address3"></dd>
                    <dt>コースの選択</dt>
                    <dd class="course-list">
                        <label for="three"><input type="radio" name="course" value="3ヶ月コース" required id="three">3ヶ月コース</label><!-- inputのidはforと同じ名前にする -->
                        <label for="year"><input type="radio" name="course" value="12ヶ月コース" required id="year">12ヶ月コース</label>
                    </dd>
                    <dt>ご希望の配送時間<span>複数選択可</span></dt>
                    <dd class="delivery-list">
                        <label for="list-1"><input type="checkbox" name="delivery[]" value="午前中" id="list-1">午前中</label>
                        <label for="list-2"><input type="checkbox" name="delivery[]" value="12:00~16:00"  id="list-2">12:00~16:00</label><br>
                        <label for="list-3"><input type="checkbox" name="delivery[]" value="16:00~20:00"  id="list-3">16:00~20:00</label>
                        <label for="list-4"><input type="checkbox" name="delivery[]" value="20:00以降"  id="list-4">20:00以降</label>
                    </dd>
                    <dt>備考欄</dt>
                    <dd><textarea name="message" placeholder="ご質問がありましたらこちらにお願いします"></textarea></dd>

                    <input type="submit" value="確認画面へ"><!-- 確認画面へ行くボタン -->
                </dl>
            </form>
        </section>
    </main>
    <footer>
        <p class="copy"><small>&copy; 2020-2023 </small></p>
        <p class="policy"><a href="#">プライバシーポリシー</a></p>
    </footer>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js'></script>
    <script src="../js/yubinbango.js"></script>
    <script>
        $(function(){
            $('#g-form').submit(function(){
                if($('input[name="delivery[]"]:checked').length === 0){
                alert('1つ以上選択してください。');
                //submitイベントを止める
                return false;
                }
            });
        });
    </script>
</body>
</html>