<?php

$fp = fopen("data/data.csv", "r");
// while文でCSVファイルのデータを1つずつ繰り返し読み込む
while ($data = fgetcsv($fp)) {
    $humenname[] = $data[0];
    $horcename[] = $data[1];
    $reasontxt[] = $data[2];
    $hyou = count($humenname);
}
// 開いたファイルを閉じる
fclose($fp);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>最強3冠馬アンケート</title>
</head>

<body>
    <form action="create.php" method="POST">
        <fieldset>
            <legend>最強3冠馬アンケート</legend>
            <div>
                お名前: <input type="text" name="todo" placeholder="例）山田太郎">
            </div>
            <div>
                <p>あなたが選ぶ最強の3冠馬は？</p>
                <input id="check-a" type="radio" name="horce" value="セントライト"><label for="check-a">セントライト</label><br>
                <input id="check-b" type="radio" name="horce" value="シンザン" checked><label for="check-b">シンザン</label><br>
                <input id="check-c" type="radio" name="horce" value="ミスターシービー"><label for="check-c">ミスターシービー</label><br>
                <input id="check-d" type="radio" name="horce" value="シンボリルドルフ"><label for="check-d">シンボリルドルフ</label><br>
                <input id="check-e" type="radio" name="horce" value="ナリタブライアン"><label for="check-e">ナリタブライアン</label><br>
                <input id="check-f" type="radio" name="horce" value="ディープインパクト"><label for="check-f">ディープインパクト</label><br>
                <input id="check-g" type="radio" name="horce" value="オルフェーヴル"><label for="check-g">オルフェーヴル</label><br>
                <input id="check-h" type="radio" name="horce" value="コントレイル"><label for="check-h">コントレイル</label><br>
            </div>
            <div>
                <p>理由をお答えください</p>
                <textarea name="reason_txt" placeholder="理由を入力" cols="50" rows="4"></textarea>
            </div>
            <div>
                <button>submit</button>
            </div>
        </fieldset>
    </form>
    <div class="main_readphp">
        <div class="left">
            <div class="l-wrapper_02 card-radius_02">
                <article class="card_02">
                    <div class="card__header_02">
                        <p class="card__text2_01" id="humenname"></p>
                        <figure class="card__thumbnail_02">
                            <img alt="サムネイル" class="card__image_02" id="uma_gazo">
                        </figure>
                        <p class="card__title_02" id="horcename"></p>
                    </div>
                    <div class="card__body_02">
                        <p class="card__text2_02" id="reasontxt"></p>
                    </div>
                </article>
            </div>
            <div class="click_area">
                <button id="click" class="click">他の人の意見も見る</button>
            </div>
        </div>
        <div class="right">
            <p class="tohyo">投票結果</p>
            <canvas id="mycanvas" class="gurafu"></canvas>
            <p class="tohyo">全<?= $hyou ?>票</p>
        </div>
    </div>
    <a href="read.php">理由一覧</a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script>
        const humenArray = <?= json_encode($humenname) ?>;
        const umaArray = <?= json_encode($horcename) ?>;
        const reasonArray = <?= json_encode($reasontxt) ?>;
        /////////////グラフ作成////////////
        let count0 = umaArray.filter(function(x) {
            return x === 'セントライト'
        }).length;
        let count1 = umaArray.filter(function(x) {
            return x === 'シンザン'
        }).length;
        let count2 = umaArray.filter(function(x) {
            return x === 'ミスターシービー'
        }).length;
        let count3 = umaArray.filter(function(x) {
            return x === 'シンボリルドルフ'
        }).length;
        let count4 = umaArray.filter(function(x) {
            return x === 'ナリタブライアン'
        }).length;
        let count5 = umaArray.filter(function(x) {
            return x === 'ディープインパクト'
        }).length;
        let count6 = umaArray.filter(function(x) {
            return x === 'オルフェーヴル'
        }).length;
        let count7 = umaArray.filter(function(x) {
            return x === 'コントレイル'
        }).length;
        var data = [{
                value: count0,
                color: "#f0f8ff",
                label: "セントライト"
            },
            {
                value: count1,
                color: "#444444",
                label: "シンザン"
            },
            {
                value: count2,
                color: "#e95556",
                label: "ミスターシービー"
            },
            {
                value: count3,
                color: "#416cba",
                label: "シンボリルドルフ"
            },
            {
                value: count4,
                color: "#e7c52c",
                label: "ナリタブライアン"
            },
            {
                value: count5,
                color: "#45af4c",
                label: "ディープインパクト"
            },
            {
                value: count6,
                color: "#ee9738",
                label: "オルフェーヴル"
            },
            {
                value: count7,
                color: "#ef8fa0",
                label: "コントレイル"
            },
        ];
        var myChart = new Chart(document.getElementById("mycanvas").getContext("2d")).Doughnut(data);
        /////////////画面読み込み時、カードの内容表示////////////
        window.onload = function() {
            var w = Math.floor(Math.random() * humenArray.length);
            $("#humenname").html(humenArray[w] + "が選んだ最強3冠馬は…");
            $("#horcename").html(umaArray[w]);
            $("#reasontxt").html(reasonArray[w]);
            if ($("#horcename").html() === "セントライト") {
                $("#uma_gazo").attr('src', "img/" + "uma0.png");
            } else if ($("#horcename").html() === "シンザン") {
                $("#uma_gazo").attr('src', "img/" + "uma1.png");
            } else if ($("#horcename").html() === "ミスターシービー") {
                $("#uma_gazo").attr('src', "img/" + "uma2.png");
            } else if ($("#horcename").html() === "シンボリルドルフ") {
                $("#uma_gazo").attr('src', "img/" + "uma3.png");
            } else if ($("#horcename").html() === "ナリタブライアン") {
                $("#uma_gazo").attr('src', "img/" + "uma4.png");
            } else if ($("#horcename").html() === "ディープインパクト") {
                $("#uma_gazo").attr('src', "img/" + "uma5.png");
            } else if ($("#horcename").html() === "オルフェーヴル") {
                $("#uma_gazo").attr('src', "img/" + "uma6.png");
            } else if ($("#horcename").html() === "コントレイル") {
                $("#uma_gazo").attr('src', "img/" + "uma7.png");
            } else {
                alert("エラー");
            }
        };
        /////////////ボタンクリック時、カードの内容表示////////////
        $("#click").on("click", function() {
            var a = Math.floor(Math.random() * humenArray.length);
            $("#humenname").html(humenArray[a] + "が選んだ最強3冠馬は…");
            $("#horcename").html(umaArray[a]);
            $("#reasontxt").html(reasonArray[a]);
            if ($("#horcename").html() === "セントライト") {
                $("#uma_gazo").attr('src', "img/" + "uma0.png");
            } else if ($("#horcename").html() === "シンザン") {
                $("#uma_gazo").attr('src', "img/" + "uma1.png");
            } else if ($("#horcename").html() === "ミスターシービー") {
                $("#uma_gazo").attr('src', "img/" + "uma2.png");
            } else if ($("#horcename").html() === "シンボリルドルフ") {
                $("#uma_gazo").attr('src', "img/" + "uma3.png");
            } else if ($("#horcename").html() === "ナリタブライアン") {
                $("#uma_gazo").attr('src', "img/" + "uma4.png");
            } else if ($("#horcename").html() === "ディープインパクト") {
                $("#uma_gazo").attr('src', "img/" + "uma5.png");
            } else if ($("#horcename").html() === "オルフェーヴル") {
                $("#uma_gazo").attr('src', "img/" + "uma6.png");
            } else if ($("#horcename").html() === "コントレイル") {
                $("#uma_gazo").attr('src', "img/" + "uma7.png");
            } else {
                alert("エラー");
            }
        })
    </script>
</body>

</html>