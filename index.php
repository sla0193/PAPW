<!DOCTYPE html>
<html dir="ltr" lang="">	<!-- left to right -->
  <head>  
    <title>LOL</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="robots" content="index, follow">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
<script src="http://gisak.vsb.cz/ruzicka/lib/leaflet/showplace.js"></script>
<script>
	$(document).ready(function(){
/*		$("#s1").click(function(){
			$(this).hide();
		});
		$("#show").click(function(){
			$("#s1").show();
		});*/
		$("#par").hide();
		$("#show").click(function(){
			$("#par").show();
		});
		$("#s1").click(function(){
			$("#par").show();
		});
	});
</script>
<script>
	$(document).ready(function(){
		
		setMap('mapid');	//rekne, kde se bude mapa zobrazovat... v jakem divu
		$("#mapid").hide();
		
		$("strong").click(function(){
			
			$("#mapid").show();
			
			var lat = $(this).attr("lat");	//this je to, na co jsem klikla
			var lon = $(this).attr("lon");
			var zoom = $(this).attr("zoom");
			var text = $(this).attr("text");
			
			showPlace(lat, lon, zoom, text);
		});
	});
	</script>	
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
	//Z nejakeho duvodu mi muj kod vypisuje Ostrava 2x ... jednou tucne a jednou normalne.
	/*	for ($i = 0; $i < count($pieces); $i++){		//OR foreach ($pieces as $piece){
			if(strcmp($pieces[$i],"Ostrava") == 0){
				echo "<b>".$pieces[$i]." </b>";
			}if(strcmp($pieces[$i],"Ostrava.") == 0){
				$last = explode(".", $pieces[$i]);
				if($last[0] == "Ostrava"){
					echo "<b>".$last[0]."</b>. ";
					$last[0] = "neni";
				}
			}if(strcmp($pieces[$i],"Ostrava!") == 0){
				$last = explode("!", $pieces[$i]);
				if($last[0] == "Ostrava"){
					echo "<b>".$last[0]."!</b> ";
				}
			}if(strcmp($pieces[$i],"Ostrava?") == 0){
				$last = explode("?", $pieces[$i]);
				if($last[0] == "Ostrava"){
					echo "<b>".$last[0]."?</b> ";
				}
			}else{
				echo $pieces[$i]." ";
			}
			
		}*/
		$ostrava = array("Ostrava", "Ostravě", "Ostravou"); 
	
	$j = 1;	//ve for se to stale nastavovalo na 1
	for ($i=0; $i < count($pieces); $i++) {
		$word = trim($pieces[$i], ". \t\n");
		$word = str_replace(".", "", $word);
		//nebo jen definovat nejake cislo, ktere se bude zvysovat o jedna a vzit jenom to prvni
		//$cislo++ a misto id="s1" dát id="s $cislo "
		
		if (in_array($word, $ostrava)) {
			$pieces[$i] = "<strong id=\"s".$j."\" lat=\"49.83\" lon=\"18.17\" zoom=\"15\" text=\"Zde je <strong>Ostrava ".$j."</strong>\">".$pieces[$i]."</strong>";
			$j++;
		}
		
/*		if (in_array($word, $ostrava)) {
			if($j == 1){
				$pieces[$i] = "<strong id=\"s1\">".$pieces[$i]."</strong>";
				$j++;
			}else{
				$pieces[$i] = "<strong>".$pieces[$i]."</strong>";
			}*/
			
		
	}
	echo "Počet Ostrav ".($j-1);
	$text1_strong_ostrava = implode(" ", $pieces);
	echo "<p>".$text1_strong_ostrava."</p>";
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
<div id="par"><p>A tenhle text se objeví, ehehehe pokud kliknes na první tučnou Ostravu. Kapiš?</p></div>

<button id="show">Ukaž to, co právě zmizlo.</button>

<div id="mapid" style="width: 600px; height: 400px;"></div>

<p><img src="http://49.media.tumblr.com/7a92cb88e907df06e0569ab884d4067c/tumblr_nzek8grXXU1smshebo1_500.gif" /></p>



</div>
<!--
Zkusit dodelat, že když kliknu na jakoukoliv Ostravu, tak se objeví její div.
-->
</body>
</html>
