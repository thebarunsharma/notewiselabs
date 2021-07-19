<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="icon" href="images/logo.svg">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity= "sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymos">
<style>

		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

		* {
			overflow:hidden;
			box-sizing: border-box;
		}

		body {
			background:  #2598D5;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			font-family: 'Montserrat', sans-serif;
			height: 100vh;
			margin: -20px 0 50px;
		}

		h1 {
			font-weight: bold;
			margin: 0;
		}

		h2 {
			text-align: center;
		}

		p {
			font-size: 14px;
			font-weight: 100;
			line-height: 20px;
			letter-spacing: 0.5px;
			margin: 20px 0 30px;
		}

		span {
			font-size: 12px;
		}

		a {
			color: #333;
			font-size: 14px;
			text-decoration: none;
			margin: 15px 0;
		}

		.button input {
			cursor: pointer;
			border-radius: 20px;
			border: 1px solid grey;
			background-color: black;
			color: #FFFFFF;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		.button:active {
			transform: scale(0.95);
		}

		.button:focus {
			outline: none;
		}



		form {
			background-color: #FFFFFF;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		input {
			background-color: #eee;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0,0,0,0.25),
					0 10px 10px rgba(0,0,0,0.22);
			position: relative;
			overflow: hidden;
			width: 768px;
			max-width: 100%;
			min-height: 480px;
		}

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
		}

		.container.right-panel-active .sign-in-container {
			transform: translateX(100%);
		}

		.sign-up-container {
			left: 0;
			width: 50%;
			opacity: 0;
			z-index: 1;
		}

		.container.right-panel-active .sign-up-container {
			transform: translateX(100%);
			opacity: 1;
			z-index: 5;
			animation: show 0.6s;
		}

		.error {
		background: #F2DEDE;
		color: #A94442;
		padding: 10px;
		width: 95%;
		border-radius: 5px;
		margin: 20px auto;
		}

		.success {
		background: #D4EDDA;
		color: #40754C;
		padding: 10px;
		width: 95%;
		border-radius: 5px;
		margin: 20px auto;
		}


		.overlay-container {
			position: absolute;
			top: 0;
			left: 50%;
			width: 50%;
			height: 100%;
			overflow: hidden;
			transition: transform 0.6s ease-in-out;
			z-index: 100;
		}

		.container.right-panel-active .overlay-container{
			transform: translateX(-100%);
		}


		.overlay {


			background: linear-gradient(to right, black
			, black);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 0 0;
			color: #FFFFFF;
			position: relative;
			left: -100%;
			height: 100%;
			width: 200%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.container.right-panel-active .overlay {
			transform: translateX(50%);
		}

		.overlay-panel {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 40px;
			text-align: center;
			top: 0;
			height: 100%;
			width: 50%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}


		.container.right-panel-active .overlay-left {
			transform: translateX(0);
		}

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.box-area {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			overflow: hidden;
		}
		.box-area li {
			position: absolute;
			display: block;
			list-style: none;
			width: 25px;
			height: 25px;
			background: rgba(255, 255, 255, 0.2);
			animation: animate 20s linear infinite;
			bottom: -100px;
		}
		.box-area li:nth-child(1) {
			left: 86%;
			width: 80px;
			height: 80px;
			animation-delay: 0s;
		}
		.box-area li:nth-child(2) {
			left: 12%;
			width: 30px;
			height: 30px;
			animation-delay: 1.5s;
			animation-duration: 10s;
		}
		.box-area li:nth-child(3) {
			left: 70%;
			width: 100px;
			height: 100px;
			animation-delay: 5.5s;
		}
		.box-area li:nth-child(4) {
			left: 42%;
			width: 150px;
			height: 150px;
			animation-delay: 0s;
			animation-duration: 10s;
		}
		.box-area li:nth-child(5) {
			left: 65%;
			width: 40px;
			height: 40px;
			animation-delay: 0s;
		}
		.box-area li:nth-child(6) {
			left: 15%;
			width: 110px;
			height: 110px;
			animation-delay: 0.5s;
		}
		@keyframes animate {
			0% {
				transform: translateY(0) rotate(0deg);
				opacity: 1;
			}
			100% {
				transform: translateY(-800px) rotate(360deg);
				opacity: 0;
			}
		}

</style>



    <title>Document</title>

    </head>

<body>

<div class="container" id="container">

	<div class="form-container sign-in-container">
    <form action="logindb.php" method="post">

			<h1>Sign in</h1>
			<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
			<input type="text" name="uname" placeholder="User Name" required>
			<input type="password" name="password" placeholder="Password" required><br>

			<div class="button">
                <input type="submit" name="login_user">
        </div>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
		<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start your journey with us</p>
                <div class="signup-link"> Not yet Registered? <a href="signup.php">Sign Up</a></div>
			</div>
		</div>
	</div>
</div>


		<ul class="box-area">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

</body>
</html>
