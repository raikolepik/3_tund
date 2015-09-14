<?php

		// user_form.php
		// jutumärkide vahele input elemendi väärtus
		
		//echo $_POST["email"];
		
		//echo $_POST["password"];
		
		$email_error = "";
		$password_error = "";
		//$password_len_error = "";
		
		//kontrolli ainult siis, kui kasutaja vajutab logi sisse nuppu
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["email"]))	{
				$email_error = "viga";
			}	
			if(empty($_POST["password"])) {
				$password_error = "Teie parooli lünk on tühi";
			}else {
				//parool ei saa olla tühi, kontrollime pikkust
				if(strlen($_POST["password"]) < 8 ) {
					$password_error = "Peab olema vähemalt 8 sümbolit pikk";
				}
				
			}
			
		}
?>

	<?php
		// lehe nimi (muutuja)
		$page_title = "EvoGlass";
			// faili nimi
		$page_file_name = "home.php";
		
?>		
	<?php require_once("../header.php"); ?>
		<h4>See veebileht on loodud selleks, et tellida endale omapärased prillid, mis sobiksid vastavalt inimese peakujuga ja oleksid sobiva hinnaga.</h4>
		<h4>Lähemalt tutvimiseks minge sellele leheküljele : http://evoklaas.blogspot.com.ee/ </h4>
		<h4>Facebookist leiate meid leheküljelt : https://www.facebook.com/EVOGlasses?fref=ts </h4>
		
		<form action="User_form.php" method="post">
		
		<input name="email" type="email" placeholder="E-post">* <?php echo $email_error; ?> <br> <br> 
		<input name="password" type="password" placeholder="Password">	<br> <br>	
		<input type="submit" value="log in">
		</form>
		<h2>Sign up</h2>
		<form action="User_form.php" method="post">
		
		<input name="isikukood" type="text" placeholder="personal code">* <?php echo $email_error; ?> <br> <br> 
		<input name="test" type="text" placeholder="age"> <br> <br>
			Gender:
			<input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="female") echo "checked";?>
			value="female">Female
			<input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="male") echo "checked";?>
			value="male">Male	<br> <br>
		
		<input type="submit" value="log in">	
			</form>
	<?php require_once("../footer.php"); ?>