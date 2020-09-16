
<?php
$username = "AP";
$fulltimenow = date("d.m.Y H:i:s");
$hournow=date("H");
$partofday="lihtsalt aeg";
$weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"]; 
$monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
if($hournow < 7){
	$partofday="uneaeg";
}
if($hournow >= 8 and $hournow <18){
	$partofday="Peoaeg!";
}
//vaatame semestri kulgemist.
$semesterstart = new DateTime("2020-8-31");
$semesterend = new DateTime("2020-12-13");
//Selgitame välja nende vahe ehk erinevuse
$semesterduration = $semesterstart->diff($semesterend);
//leiame selle päevade arvuna 
$semesterdurationdays = $semesterduration->format("%r%a");
//leiame tänase päevaga samamoodi saad kasutada et semester polegi peale hakanud.
$today = new DateTime("now");
// Leia tänase päevaga pikkus, seejärel if fromsemesterstartdays < 0{siis pole semester veel peale hakanud}
$durationday = $semesterstart->diff($today);

// Kui päevad on läbi siis ütle et õppetöö on läbi ja pane echo käsuga välja kuskile 
//samuti leia protsent palju jäänud on oh boy dis gon be fun
//loeme kataloogist piltide nimekirja
$allfiles = scandir("../vp_pics/");
$piccount = count($picfiles);
for($i = 0;$i < $piccount; $i ++){
	//
	$imghtml .=
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title><?php echo $username; ?> Progeb Veebilehte</title>
</head>
<body>
<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
<h1><?php echo $hournow; ?> </h1>
  <h1 style="color:red;"> Autobiograafia </h1>
  <p>Tänapäeval on autod liigselt lihtsasti kasutatavad. Loodan samuti, et keegi ei näe mind ja sind ja teisi jne </p>
  <h2><?php echo $username ." Minu lemmik mees"; ?> </h2>
  <p>See on tõepoolest vaid õppimise jaoks loodud, eks ole nii!</p>
  <a href="https://www.tlu.ee">Tallinna Ülikooli</a>
  <p>SIIN VEEBILEHEKÜLJEL PUUDUB PÄRIS SISU, LOODUD VAID ÕPPE EESMÄRGIL</p>
  <p>Lehe avamise hetkel oli kellaaeg meie serveris:<?php echo $weekdaynameset[$weekdaynow -1] .", " .$fulltimenow; ?>.</p>
  <p><?php echo "Parajasti on ". $partofday. ".";?></p>
</body>
</html>
