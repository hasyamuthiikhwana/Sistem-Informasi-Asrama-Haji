<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Biodata Heldi - Creative Profile</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
	
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			font-family: 'Poppins', sans-serif;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #333;
		}

		#container {
			background: rgba(255, 255, 255, 0.9);
			backdrop-filter: blur(10px);
			width: 90%;
			max-width: 500px;
			padding: 40px;
			border-radius: 20px;
			box-shadow: 0 15px 35px rgba(0,0,0,0.2);
			text-align: center;
			transition: transform 0.3s ease;
		}

		#container:hover {
			transform: translateY(-10px);
		}

		.profile-img {
			width: 120px;
			height: 120px;
			background: #764ba2;
			border-radius: 50%;
			margin: 0 auto 20px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: white;
			font-size: 50px;
			font-weight: bold;
			border: 5px solid #fff;
			box-shadow: 0 5px 15px rgba(0,0,0,0.1);
		}

		h1 {
			font-size: 28px;
			color: #2d3436;
			margin-bottom: 10px;
			letter-spacing: 1px;
		}

		.title-line {
			width: 50px;
			height: 4px;
			background: #764ba2;
			margin: 0 auto 20px;
			border-radius: 2px;
		}

		#body p {
			font-size: 18px;
			line-height: 1.6;
			color: #636e72;
		}

		.highlight {
			color: #764ba2;
			font-weight: 700;
		}

		.social-links {
			margin-top: 25px;
		}

		.btn {
			display: inline-block;
			padding: 10px 25px;
			background: #764ba2;
			color: white;
			text-decoration: none;
			border-radius: 25px;
			font-size: 14px;
			transition: 0.3s;
		}

		.btn:hover {
			background: #667eea;
			box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
		}

		p.footer {
			margin-top: 30px;
			font-size: 10px;
			color: #b2bec3;
			text-transform: uppercase;
		}

		strong {
			color: #764ba2;
		}
	</style>
</head>
<body>

<div id="container">
	<div class="profile-img">H</div>
	<h1>BIODATA</h1>
	<div class="title-line"></div>

	<div id="body">
		<p>Halo! Perkenalkan,<br>nama saya <span class="highlight">Heldi</span></p>
		<p style="font-size: 14px; margin-top: 10px;">Web Developer | Creative Thinker | Tech Enthusiast</p>
	</div>

	<div class="social-links">
		<a href="#" class="btn">Hubungi Saya</a>
	</div>

	<p class="footer">
		Rendered in <strong>{elapsed_time}</strong>s <br>
		<?php echo (ENVIRONMENT === 'development') ? 'CI Version ' . CI_VERSION : '' ?>
	</p>
</div>

</body>
</html>