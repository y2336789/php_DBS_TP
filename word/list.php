<!DOCTYPE html>
<html lang="en">
<?php
require_once("../db/db.php");
session_start();

$sql = $db->prepare("SELECT * FROM word_sentence order by rand() limit 5");
$sql->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="../css/swipe.css">	
	<script src="https://kit.fontawesome.com/c47106c6a7.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Word list</title>
</head>

<body>	
    <?php include("../header.php");?>
	<div class="wrap">

		<ul class="auto">
			<li class="btnStart"><i class="fas fa-play"></i></li>
			<li class="btnStop"><i class="fas fa-pause"></i></li>
		</ul>

<div class="swiper-wrapper">
	<?php
		$sql2 = $db->prepare("SELECT * FROM word WHERE idx=:idx");
		while ($request = $sql->fetch()) {
			$sql2 -> bindParam(':idx',$request['w_idx']);
			$sql2 -> execute();
			$result = $sql2->fetch();
	?>
	<div class="swiper-slide">
		<div class="inner">
			<div class="con">
				<h2><?= $result['wn_kor'] ?></h2>
				<p><?= $request['example'] ?></p>
			</div>
		</div>
	</div>
	
	<?php } ?>
</div>

		<!-- 좌우버튼 -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		
		<!-- 페이징 버튼 -->
		<div class="swiper-pagination"></div>
	</div>

	<script>
		const swiper = new Swiper('.wrap',{	
			direction: "horizontal",
			loop: true,						
			pagination: {
				el: '.swiper-pagination',
				type: 'fraction'
			},	
			navigation : {				
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',			
			},
			spaceBetween: 0,
			slidesPerView: "auto",
			grabCursor: true,
			centeredSlides :true,
			speed:1000,
			effect:"coverflow",	
			coverflowEffect: {
				rotate: 50,
				stretch: -100,
				depth: 400,
				modifier: 1,
				slideShadows: false,
			},
			autoplay: {
				delay:1000,		
				disableOnInteraction : true
			}	
		});

		// .btnStart 요소를 찾아서 btnStart에 저장
		const btnStart = document.querySelector(".btnStart");
		// .btnStop 요소를 찾아서 btnStop에 저장
		const btnStop = document.querySelector(".btnStop");

		//btnStart버튼을 클릭시 자동롤링 시작
		btnStart.addEventListener("click",()=>{
			swiper.autoplay.start();
		});

		//btnStart버튼을 클릭시 자동롤링 정지
		btnStop.addEventListener("click",()=>{
			swiper.autoplay.stop();
		});
	</script>	
</body>
</html>