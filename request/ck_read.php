<?php
require_once('../db/db.php');
session_start();

$idx = $_GET['idx'];
$sql = $db -> prepare("SELECT * FROM request WHERE idx=:idx");
$sql -> bindParam("idx",$idx);
$sql -> execute();
$request = $sql -> fetch();

?>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function(){
		$("#writepass").dialog({
		 	modal:true,
		 	title:'비밀글입니다.',
		 	width:400,
	 	});
	});
</script>
<div id='writepass'>
	<form action="" method="post">
 		<p>비밀번호<input type="password" name="pw_chk" /> <input type="submit" value="확인" /></p>
 	</form>
</div>
	 <?php
	 	$bpw = $request['pw'];
		echo '<div>'. $request['pw'] .'</div>';
	 	if(isset($_POST['pw_chk'])) //만약 pw_chk POST값이 있다면
	 	{
	 		$pwk = $_POST['pw_chk']; // $pwk변수에 POST값으로 받은 pw_chk를 넣습니다.
			if($pwk == $bpw) //다시 if문으로 DB의 pw와 입력하여 받아온 bpw와 값이 같은지 비교를 하고
			{
			?>
				<script type="text/javascript">location.replace("read.php?idx=<?php echo $request["idx"]; ?>");</script><!-- pwk와 bpw값이 같으면 read.php로 보내고 -->
			<?php 
			}else{ ?>
				<script type="text/javascript">alert('비밀번호가 틀립니다'); </script>- 아니면 비밀번호가 틀리다는 메시지를 보여줍니다
			<?php } } ?>