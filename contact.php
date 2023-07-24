<?php include('partials-front/menu.php'); ?>

<!-- 
<main>
    <section class="section1">
      <h2>Get in Touch</h2>
      <form action="#" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="Submit">
      </form>
    </section>
  </main> -->


  <!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<style>
		/* body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		header {
			background-color: #f8f8f8;
			padding: 20px;
			text-align: center;
		}
		h1 {
			margin: 0;
			font-size: 36px;
		}
		main {
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: center;
			align-items: flex-start;
			margin: 20px;
		}
		form {
			background-color: #f8f8f8;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
			width: 100%;
			max-width: 500px;
			margin: 20px;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-size: 18px;
			font-weight: bold;
		}
		input, textarea {
			display: block;
			margin-bottom: 20px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
			width: 100%;
		}
		button[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		button[type="submit"]:hover {
			background-color: #3e8e41;
		} */

    ody {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		header {
			background-color: #f8f8f8;
			padding: 20px;
			text-align: center;
		}
		h1 {
			margin: 0;
			font-size: 36px;
		}
		main {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: horizontal;
			-webkit-box-direction: normal;
			    -ms-flex-direction: row;
			        flex-direction: row;
			-ms-flex-wrap: wrap;
			    flex-wrap: wrap;
			-webkit-box-pack: center;
			    -ms-flex-pack: center;
			        justify-content: center;
			-webkit-box-align: start;
			    -ms-flex-align: start;
			        align-items: flex-start;
			margin: 20px;
		}
		form {
			background-color: #f8f8f8;
			padding: 20px;
			border-radius: 5px;
			-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
			        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
			width: 100%;
			max-width: 500px;
			margin: 20px;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-size: 18px;
			font-weight: bold;
		}
		input, textarea {
			display: block;
			margin-bottom: 20px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
			        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
			width: 100%;
		}
		button[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		button[type="submit"]:hover {
			background-color: #3e8e41;
		}
		
	</style>
</head>
<body>
	<header>
		<h1>Contact Us</h1>
	</header>
	<main>
		<form>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<label for="phone Number">phone:</label>
			<input type="tel" id="phone" name="phone" required>
			<label for="message">Message:</label>
			<textarea id="message" name="message" rows="5" required></textarea>
			<button type="submit">Send Message</button>
		</form>
  </main>
		
  

  
<?php include('partials-front/footer.php'); ?>