<?php
require("header.php");
$fulltimenow = date("H:i:s");
$currentyear = date("Y");
$currentdate = date("d");
$hournow = date("H");
$partofday = "";
$weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
$monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
//echo $weekdaynameset[1];
$weekdaynow = date("N");
$monthnamenow = date("n");
if($hournow <= 7 and $hournow >= 24){
    $partofday = "uneaeg";
}
if($hournow >= 8 and $hournow <= 18){
    $partofday = "akadeemiline aeg";
}
if($hournow > 18 and $hournow <= 20){
    $partofday = "trenni aeg";
}
if($hournow > 20 and $hournow < 22){
    $partofday = "pela aeg";
}
if($hournow >= 22 and $hournow < 24){
    $partofday = "ettevalmistus järgnevaks päevaks";
}
//semestri kulg
$semesterstart = new DateTime("2020-8-31");
$semesterend = new DateTime("2020-12-13");
$semesterduration = $semesterstart->diff($semesterend);
$semesterdurationdays = $semesterduration->format("%r%a");
$today = new DateTime("now");
$unidays = "";
if($semesterstart <= $today and $semesterend >= $today){
    $unidays = "Semester on täies hoos.";
}
else{
    $unidays = "Praegu semester ei käi.";
}
$semesterdurationdaysfromnow = $today->diff($semesterend);
$semesterdurationdaysfromnowdays = $semesterdurationdaysfromnow->format("%r%a");
$completedsemester = $semesterstart->diff($today);
$dayscompletedsemester = $completedsemester->format("%r%a");
$semestercompletion = round(($dayscompletedsemester / $semesterdurationdays) * 100, 2);
if($semestercompletion >= 100){
    $semestercompletion = 100;
}
elseif ($semestercompletion <= 0){
    $semestercompletion = 0;
}

//loeme kataloogist piltide nimekirja
  $allfiles = scandir("img/vp_pics/");
  //echo $allfiles;
  //var_dump($allfiles);
  $picfiles = array_slice($allfiles, 2);
  //var_dump($picfiles);
  $imghtml = "";
  $piccount = count($picfiles);
  //$i = $i + 1;
  //$i ++;
  //$i += 3
 /*// koik 4 pilti korraga *for($i = 0;$i < $piccount; $i ++){
	  //<img src="../img/pildifail" alt="tekst">
	  $imghtml .= '<img src="img/vp_pics/' .$picfiles[$i] .'" alt="Tallinna Ülikool">';
  }*/
$picnum = mt_rand(0, ($piccount - 1));
$imghtml ='<img src="img/vp_pics/'. $picfiles[$picnum] .'" alt="pildid TLUst" class="center">';

   
   


?>
    .welcome {
        float: none;
        color: whitesmoke;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 18px;
    }
    .time {
        float: none;
        color: whitesmoke;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 20px;
    }

    </style>
    </head>
<body>
    <img src="img/vp_banner.png" alt="Veebiproge kursuse logo." class="center">
    <hr> 
    <div class="topnav">
        <a class="active" href="home.php">Kodu</a>
        <a href="writethoughts.php">Kirjuta mõtteid</a>
        <a href="thoughts.php">Loe mõtteid</a>
        <a href='listfilms.php'>Filmide nimekiri</a>
        <a href="addfilms.php">Lisa filme</a>
        <a href="account.php">Kasutaja</a>
        <a href="https://github.com/AnPet11/veebiprogrammeerimine">GitHubi link</a>
        
    </div>
    <hr>
    <div class="welcome">
        <h1><?php echo $username; ?>  proooooovib </h1>
        <p>Tegeleda veebiga raske vaid põnev!</p>
        <p>Leht loodud veebiproge kursuse raames <a href="https://www.tlu.ee/dt" style="color:yellow">TLU Digitehnoloogiate Instituudis.</a></p>
    </div>
    <hr>
    <div class="time">
        <p>Leht avati: <?php echo $weekdaynameset[$weekdaynow-1].", ". $currentdate.'. '.$monthnameset[$monthnamenow-1].' '.$currentyear.', kell '. $fulltimenow; ?></p>
        <p><?php echo "Parajasti on ".$partofday."."; ?></p>
        <p><?php echo $unidays." Läbitud on ".$semestercompletion."% semestrist.";?></p>
        <p><?php echo "Semester kestab kokku ".$semesterdurationdays." päeva.";?></p>
        <p><?php echo "Semestri lõpuni on ".$semesterdurationdaysfromnowdays." päeva.";?></p>
        <p><?php echo "Praeguseks on semestris kestnud ".$dayscompletedsemester." päeva.";?></p>
    </div>
    <hr>
    <?php echo $imghtml; ?>
    <hr>
     <div style="width:50%;height:0px;position:relative;padding-bottom:75.000%;"><iframe src="https://streamable.com/e/4jljlx?loop=0" frameborder="0" width="100%" height="100%" allowfullscreen style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;"></iframe></div>
</body>
</html>