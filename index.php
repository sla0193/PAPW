<!DOCTYPE html>
<html dir="ltr" lang="">	<!-- left to right -->
  <head>  
    <title>LOL</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="robots" content="index, follow">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />        
</head>
<body style="text-align: left; background-color: #112244; color: #FFFFFF; font-family: Arial; font-size: 14px;">
<div style="position: relative;
  top: 0px;
  width: 900px;
  left: 50%;
  margin-left: -450px;
  margin-top: 0px;
  background: transparent url('https://s-media-cache-ak0.pinimg.com/originals/7f/81/ce/7f81ce29a09f47eb1dcf030dbafa317f.jpg') repeat scroll center top;
  padding: 20px;">

<form>
	<p>Číslo: <input name="pocet" value="10" /></p>
	<p>Text: <input name="pismeno" value="Žjůůůva drak!"/></p>
	<p>Si vyber:
		<select name="typSeznamu">
			<option value="odr">odrážky</option>
			<option value="cs" selected="selected">číselný</option>
		</select>
	</p>	
	
	<p>
		<textarea name="policko" rows="10" cols="50">Funguje to, i když je Ostrava napsána na konci věty a za ní je tečka. Tady je pokus. Město Ostrava.</textarea>
	</p>
	<p><input type="submit" /></p>
</form>


<?php
	$cislo = $_REQUEST["pocet"];
	$text = $_REQUEST["pismeno"];
/*	echo "Zadane cislo: " . $cislo . "<br />Zadany text: " . $text . "<br />";	//cteni z formulare
	echo "<br />Ale Lala mě pěkně nasrala. Utrhla Dipsimu anténku.";	*/				/*print - to same co echo*/
	
	$string = $_REQUEST["policko"];
	echo "<p>".$string."</p>";
	echo "<p>Počet znaků: ".strlen($string)."</p>";
	
	$pieces = explode(" ", $string);
	
		
	echo "<p>";
		for ($i = 0; $i < count($pieces); $i++){		//OR foreach ($pieces as $piece){
			if(strcmp($pieces[$i],"Ostrava") == 0){
				echo "<b>".$pieces[$i]." </b>";
			}if(strcmp($pieces[$i],"Ostrava.") == 0){
				$last = explode(".", $pieces[$i]);
				if($last[0] == "Ostrava"){
					echo "<b>".$last[0]."</b>. ";
				}
			}/*if(strcmp($pieces[$i],"Ostrava!") == 0){
				$last = explode("!", $pieces[$i]);
				if($last[0] == "Ostrava"){
					echo "<b>".$last[0]."!</b> ";
				}
			}if(strcmp($pieces[$i],"Ostrava?") == 0){
				$last = explode("?", $pieces[$i]);
				if($last[0] == "Ostrava"){
					echo "<b>".$last[0]."?</b> ";
				}
			}*/else{
				echo $pieces[$i]." ";
			}
			
		}
	echo "<p>";
	
	/*
	if($_REQUEST["typSeznamu"] == "cs"){
		echo "<ol>";	
		for ($i = 0; $i < $cislo; $i++){
			echo "<li>" . $text . "</li>";
		}
		echo "</ol>";
	}else{
		echo "<ul>";
		for ($i = 0; $i < $cislo; $i++){
			echo "<li>" . $text . "</li>";
		}
		echo "</ul>";
	}*/
?>
<p><img src="http://49.media.tumblr.com/7a92cb88e907df06e0569ab884d4067c/tumblr_nzek8grXXU1smshebo1_500.gif" /></p>
</div>

</body>
</html>