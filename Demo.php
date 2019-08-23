<?php
	//Baraa khateeb 1:27:AM
	function validate($str) {

		$str=trim($str);
		$str=stripcslashes($str);
		return trim(htmlspecialchars($str));
	}
	$phone='';$name='';$email='';$password='';$website='';$gender='';

	if(isset($_POST['sbtn']))
	{
		$name = validate($_POST['Name']);
		if(!preg_match("/^[a-zA-Z0-9]+$/",$name)){
			$nameError = 'UserName can only contain letters, numbers !';
		}

		$email = validate($_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailError = 'Invalid Email !';
		}

		$password = validate($_POST['psw']);
		if (strlen($password) < 6) {
			$passwordError = 'Please enter a long password !';
		}

		$website = validate($_POST['website']);
		if (!filter_var($website, FILTER_VALIDATE_URL)) {
			$websiteError = 'Invalid URL !';
		}

		$phone=validate($_POST['phone']);
		if(!strlen($phone)==10 || !is_numeric($phone))
		{
			$phoneError='Please enter valid phone number !';
		}
		if(isset($_POST['gender']))$gender=$_POST['gender'];
	}
?>
<html>
<head>
	<title>Home work Baraa khateeb</title>
	<style type="text/css">
		*{
			font-family: ubuntu;
			font-size: 16px;
		}
		div.d1
		{
		  margin: auto;
		  margin-top: 15%;
		  width: 340px;
		  border: 3px solid lightgreen;
		  padding: 10px;
		}
		.button {
		  margin: 10px;
		  background-color: white;
		  color: black;
		  border: 2px solid lightgreen;
		  border-radius: 3px;
		}
		.button:hover {
		  background-color: lightgreen;
		}
		span#error
		{
			color: red;
		}
	</style>
</head>
<body>
	<div class="d1">
	 <form method="post" action="hwk.php">
	 	<table>
	 		<th colspan="2"><h1>Baraa khateeb</h1></th>
	 		<tr>
	 			<td>name:</td>
	 			<td>
	 				<input type="text" name="Name" maxlength="50" value="<?php echo $name;?>">
	 				<span id="error"> 
	 				<?php
	 					if(isset($name_error))
	 					{
	 						echo $name_error;
	 					}
	 				?>
	 				</span>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>Telephone:</td>
	 			<td>
	 				<input type="tel" name="phone" value="<?php echo $phone;?>">
	 				
	 				<span id="error"> 
	 				<?php
	 					if(isset($phoneError))
	 					{
	 						echo $phoneError;
	 					}
	 				?>
	 				</span>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>E-mail:</td>
	 			<td>
	 				<input type="email" name="email" placeholder="Email@Example.net" maxlength="35" value="<?php echo $email;?>">
	 				<span id="error"> 
	 				<?php
	 					if(isset($emailError))
	 					{
	 						echo $emailError;
	 					}
	 				?>
	 				</span>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>password:</td>
	 			<td>
	 				<input type="password" name="psw" maxlength="50" value="<?php echo $password;?>">
	 				<span id="error"> 
	 				<?php
	 					if(isset($passwordError))
	 					{
	 						echo $passwordError;
	 					}
	 				?>
	 				</span>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>URL:</td>
	 			<td>
	 				<input type="url" name="website" value="<?php echo $website;?>">
	 				<span id="error"> 
	 				<?php
	 					if(isset($websiteError))
	 					{
	 						echo $websiteError;
	 					}
	 				?>
	 				</span>
	 			</td>
	 		</tr>
	 		<tr align="center">
	 			<td></td>
	 			<td>
	 				<?php
	 					if($gender=='male')
	 						{
	 							echo '<input type="radio" name="gender" value="male" checked> Male';
	 							echo '<input type="radio" name="gender" value="female"> Female';
	 						}
	 					else
	 						{ 
	 							echo '<input type="radio" name="gender" value="male"> Male';
	 							echo '<input type="radio" name="gender" value="female" checked> Female';
	 						}
	 				?>
	 			</td>
	 		</tr>
	 		<tr align="center">
	 			<td colspan="2">
	 				<input type="submit" name="sbtn" class="button" value="Validate">
	 				<input type="reset" name="sbtn" class="button" value="Clear">
	 			</td>
	 		</tr>
	 	</table>
	</form>
	</div>
</body>
</html>
