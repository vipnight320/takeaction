<?php
//	$user = $_POST{new_user};
//	echo $user"さんこんにちは！"; //(ここはユーザーの名前。 完成図➡　○○さんこんにちは!\n)
	echo date('明日(n月j日)の予定はどうしますか？',strtotime('+1 day'));
?> 

<!DOCTYPE html>
<html lang='ja'>
<head>
	<meta charset="UTF-8">
	<title>スケスケジュール</title>
</head>
<body>
<form action="success.php" method="post">
    <?php $events = ""; ?>
	<select name="events">
		<option value=お仕事 <?= $events === '' ? 'selected':''; ?>>お仕事</option>
		<option value=スポーツ <?= $events === '' ? 'selected':''; ?>>スポーツ</option>
		<option value=イベント <?= $events === '' ? 'selected':''; ?>>イベント</option>
		<option value=旅行 <?= $events === '' ? 'selected':''; ?>>旅行</option>
		<option value=休み <?= $events === '' ? 'selected':''; ?>>休み</option>
	</select>
	その他<input type="text" name=anyaction>
    <input type="submit" name="regist" value="登録">
</form>
<form action="success.php" method="post">
    <input type="submit" name="random" value="ランダム">
</form>
    <br><br><a href = "Anydays.php">予定の一覧はこちら！</a>
</body>
</html>
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