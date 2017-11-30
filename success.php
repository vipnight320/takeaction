<?php
include "random.php";
	$any = "";
	$events = "";
	if (isset($_POST['regist'])) {
		$events = $_POST['events'];		//行事の内容
		$any = $_POST['anyaction'];		//ユーザー記入の行事
	}
	
//	$random = isset($_POST['random']);
//	var_dump($random,$event);
?>
<!DOCTYPE html>
<html>
<head>
	<title>登録確認</title>
<body>
</head>
	<?php
		if(isset($_POST['random']) && $random!=""){							//ランダムに値が入ってたら
			echo "明日の運命は、".$random."でございます。";//ランダムを出す
		}elseif($any==""){							//ユーザーがなにも打ってないなら
			echo "明日の予定は、".$events." です。";		//行事を表示
		}else{
			echo "明日の予定は、".$any." です。";		//記入内容を表示
		}
	?>
	<br><br><a href="schedule.php">登録しなおす</a>	<!--内容を消して戻る-->
	<br><br><a href = "Anydays.php">予定の一覧はこちら！</a>
</body>
</html>