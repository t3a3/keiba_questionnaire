# 最強3冠馬アンケート
## 内容
歴代クラシック三冠馬の中でどの馬が1番強いのかを決めるアンケート
## できたこと
### index.php
- 「名前」「馬名」「理由」の情報をcreate.phpに送る。
- 上記情報をcreate.phpから取得し、そのまま下エリアに反映。ランダムで誰がどの馬を選んだのかをカードで表示(左側)。どの馬に票が集まっているのかグラフを生成(右側)
### create.php
- index.phpからPOSTされた「名前」「馬名」「理由」の情報をdataファイルにdata.csvとして保存。
### read.php
- data.csvをテーブルにして読み込み。
## 苦戦したこと
- csvファイルから配列を取り出し、それぞれをjavascriptで扱えるようにする。そしてそこから馬の名前をカウントし、グラフにしたこと。
