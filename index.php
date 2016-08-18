<!doctype html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="glide.core.css">
		<link rel="stylesheet" href="glide.theme.css">

		<style>
			body, html {
				margin:0; padding:0; 
				background:#365473; 
				color:#FFFFFF;
				font-family:sans-serif;
			}
			header {
				height:100px;
			}
			header h1 {
				margin:0; line-height: 100px; text-indent:50px;
			}
			.glide__track {
				margin:0; padding:0;
			}
			.box {
				background-position:center center;
				background-repeat:no-repeat; 
				background-size:cover; 
				width:100%;
				height: 100vh;
				margin-top: -100px;
				padding-top: 100px;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}

			/* figure out if the image is taller or wider and apply this when you know */
			.box.taller {
				background-size:contain;
			}

		</style>

	</head>
	<body>

		<header>
			<h1>Maritime</h1>
		</header>
		
		<div id="slider" class="glide">

			<div class="glide__arrows">
				<button class="glide__arrow prev" data-glide-dir="<">prev</button>
				<button class="glide__arrow next" data-glide-dir=">">next</button>
			</div>

			<div class="glide__wrapper">
				<ul class="glide__track">
					<li class="glide__slide">
						<div class="box" style="background-image:url('1.jpg');"></div>
					</li>

					<!-- method 1: server side (recommended) -->
					<? $image = (object)['url'=>'2.jpg', 'width'=>2200, 'height'=>3020]; ?>
	
					<li class="glide__slide">
						<div class="box method-1 <?=($image->height < $image->width)?:'taller'?>" style="background-image:url('<?=$image->url?>');"></div>
					</li>

					<li class="glide__slide"><div class="box" style="background-image:url('3.jpg');"></div></li>

					<!-- method 2: javascript + known dimensions -->
					<li class="glide__slide">
						<div class="box method-2" style="background-image:url('2.jpg');" data-width="2200" data-height="3020"></div>
					</li>

					<li class="glide__slide"><div class="box" style="background-image:url('1.jpg');"></div></li>

					<!-- method 3: client-side -->
					<li class="glide__slide">
						<div class="box method-3" style="background-image:url('2.jpg');"></div>
					</li>

					<li class="glide__slide"><div class="box" style="background-image:url('3.jpg');"></div></li>
				
				</ul>
			</div>

			<div class="glide__bullets"></div>

		</div>

		<script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
		<script src="glide.js"></script>

		<script>
			
			$('#slider').glide({type: 'slider'});

			//method 2: javascript + known dimensions
			$('.box.method-2').each(function(){
				if (this.dataset.height > this.dataset.width) $(this).addClass('taller');
			});

			//method 3: client-side
			$('.box.method-3').each(function(){
				var $box = $(this);
				var img = new Image();
				img.src = this.style.backgroundImage.replace(/url\((['"])?(.*?)\1\)/gi, '$2').split(',')[0];
				img.onload = function() {
					if (this.height > this.width) $box.addClass('taller');
				}
			});
			
		</script>

	</body>
</html>