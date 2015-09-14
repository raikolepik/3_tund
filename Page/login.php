<?php

		// user_form.php
		// jutumärkide vahele input elemendi väärtus
		
		//echo $_POST["email"];
		
		//echo $_POST["password"];
		
		// Errorid
		$email_error = "";
		$password_error = "";
		$id_number_error ="";
		
		// Muutujad väärtustega
		$email = "";
		$id_number = "";
		
		
		//$password_len_error = "";
		
		//kontrolli ainult siis, kui kasutaja vajutab logi sisse nuppu
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// kontrollin, kas muutuja $_POST["Login"], ehk login nupp
			if(isset($_POST["login"])){
				
			
				// kontrollime kasutaja eposti, et see ei ole tyhi
				if(empty($_POST["login"]))	{
					$email_error = "ei saa olla tyhi";
				}	else {
					// annan v22rtuse
							$email = test_input($_POST["email"]);
				
				}
			
			
				// kontrollime parooli
				if(empty($_POST["password"])) {
					$password_error = "Teie parooli lünk on tühi";
				} else {
					$password = test_input($_POST["password"]);
				}
				
				if($password_error == "" && $email_error == "" ){
						// erroreid ei olnud
						echo "Kontrollin". $email." ".$password;
					
				}	
			
			} elseif(isset($_POST["sign_up"])){
				
				if(empty($_POST["id_number"])) {
					$id_number_error = "Teie isikukoodi lünk on tühi";
				} else {
					$id_number = test_input($_POST["id_number"]);
				}
				
				
				
			}
		}
?>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	<?php
		// lehe nimi (muutuja)
		$page_title = "EvoGlass login";
			// faili nimi
		$page_file_name = "login.php";
		
?>		
	<?php require_once("../header.php"); ?>
		<h4>See veebileht on loodud selleks, et tellida endale omapärased prillid, mis sobiksid vastavalt inimese peakujuga ja oleksid sobiva hinnaga.</h4>
		<h4>Lähemalt tutvimiseks minge sellele leheküljele : http://evoklaas.blogspot.com.ee/ </h4>
		<h4>Facebookist leiate meid leheküljelt : https://www.facebook.com/EVOGlasses?fref=ts </h4>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
		<input name="email" type="email" placeholder="E-post" value="<?php echo $email; ?>">* <?php echo $email_error; ?> <br> <br> 
		<input name="password" type="password" placeholder="Password"> <?php echo $password_error; ?>	<br> <br>	
		<input name="login" type="submit" value="log in">
		</form>
		<h2>Sign up</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
		<input name="id_number" type="text" placeholder="personal code" value="<?php echo $id_number; ?>">* <?php echo $id_number_error; ?> <br> <br> 
		<input name="test" type="text" placeholder="age"> <br> <br>
			Gender:
			<input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="female") echo "checked";?>
			value="female">Female
			<input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="male") echo "checked";?>
			value="male">Male	<br> <br>
		
		<input name="sign_up" type="submit" value="sign up">	
			</form>
	<?php require_once("../footer.php"); ?>