<?php
include('holyday.php');

// 月末日を取得
$fir_weekday = date('w', mktime(0, 0, 0, $month , 1, $year));
//日を取得。時と分と秒は取得しないので０、「前年末」からの取得だから＋1、日はあらかじめ取得してるので0



echo "<font color = 'deeppink'><br><h2><CENTER>$year / $month</font></center></h2>\n";
echo "<br><h3>今日の日付は$month 月$today 日です</h3>\n";
?>
<!--祝日の読み込み
<script src="js/UltraDate.js">
    $fuck = UltraDate.getDefaultFormat();
    $holiday = UltraDate.setFormatOption(locale, options);    
</script>
-->
<title>今月の予定</title>
    <table>
    <tr>

    <?php 
    //曜日を配列に入れる
    $weekday = array("日","月","火","水","木","金","土");
    echo '<table border="2" cellspacing="1.3" cellpadding="11" style="text-align:center;">';


    // 曜日セル<th>タグ設定
    echo "<tr>\n";
    $i = 0;    
    while( $i <= 6 ){ // 曜日分ループ
        //色付け
        if($i == 0){
            $style = "crimson";
        }
        else $style = "black";
        if ($i == 6) { //土曜日なら
            $style = "skyblue";
        }



        // <th>タグにスタイルシートを挿入して出力
        echo "\t<th style=\"color:".$style."\">".$weekday[$i]."</th>\n";
        $i++; //カウント値+1
    }
    echo "</tr><tr>\n\n";

    $i = 0; //カウント値リセット（曜日カウンター）
    if ( $i==$fir_weekday )$style = "black"; //これがないと1日が日曜日の時に色がblueになる
    while( $i != $fir_weekday ){ //１日の曜日まで空白（&nbsp;）で埋める
        echo "\t<td>&nbsp;</td>\n";
        $i ++; 
    }
 
    // 今月の日付が存在している間ループする
    for( $day=1; checkdate( $month, $day, $year ); $day++ ){
        //曜日の最後まできたらカウント値（曜日カウンター）を戻して行を変える
        if( $i > 6 ){
            $i = 0;
            echo "</tr>\n";
            echo "<tr>\n";
        }
    ?>
<!--    <div class="anydays" value = $day>
    <span>
        今日の予定
    <br />
        ・入力した内容
    </span>
    </div>-->    
    <?php
//        echo "<div class=anydays><span>今日の予定・入力した内容/span></div>";
        //色付け
        if($i == 0){    //日曜日なら
            $style = $style."; background:lightpink";
        }else $style = "black";
        if ($i == 6) { //土曜日なら
            $style = $style."; background:skyblue";
        }
/*        if( $day == $holyday){
            $style = $style."; background:lightcoral";
        }*/
        // 今日の日付の場合、背景色追加
        if( $day == $today ){
            $style = $style."; background:limegreen";
        }
        
        // 祝日の場合、背景色追加
         if( $day == $holydays ){
            $style = $style."; background:crimson";
            echo "$title";
        }
        
        // 日付セル作成とスタイルシートの挿入
        echo "\t<td style=\"color:".$style.";\">".$day."</td>\n"; 
        $i++; //カウント値（曜日カウンター）+1
    }
        while( $i < 7 ){ //残りの曜日分空白（&nbsp;）で埋める
            echo "\t<td>&nbsp;</td>\n";
            $i++;
        }
    ?>
    </tr>
    </table>

  <?php
 
?>
<br><a href = "schedule.php">登録画面に戻る</a>
<!--カレンダーの枠組み-->
<style type="text/css">
body {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url("monokuro.png");
    background-size: cover;
}    
table {
    background-color: white;
    width: 100%;
}
table th {
    background: #EEEEEE;
}
table th,
table td {
    border: 1px solid #CCCCCC;
    text-align: center;
    padding: 5px;
}
</style>

<!--ポップアップのcss-->
<style type="text/css">
    /* 表示文字の装飾 */
div.anydays{
    color: #555;
    display: inline-block;                        /* インライン要素化 */
    border-bottom:dashed 1px #555;    /* 下線を引く */
}
 
/* ツールチップ部分を隠す */
div.anydays span {
    display: none;
}
 
/* マウスオーバー */
div.anydays:hover {
    position: relative;
    color: #333;
}
 
/* マウスオーバー時にツールチップを表示 */
div.anydays:hover span {
    display: block;                  /* ボックス要素にする */
    position: absolute;            /* relativeからの絶対位置 */
    top: 25px;
    font-size: 90%;
    color: #fff;
    background-color: #51A2C1;
    width: 205px;
    padding: 5px;
    border-radius:3px;
    z-index:100;
}
 
/* フキダシ部分を作成 */
div.anydays span:before{
    content:''; 
    display:block; 
    position:absolute;                         /* relativeからの絶対位置 */
    height:0; 
    width:0; 
    top:-13px; 
    left:15px;
    border:13px transparent solid; 
    border-right-width:0; 
    border-left-color:#51A2C1; 
    transform:rotate(270deg);            /* 傾きをつける */
    -webkit-transform:rotate(270deg);
    -o-transform:rotate(270deg);
    z-index:100;
}
</style>