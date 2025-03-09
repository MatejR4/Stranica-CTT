<?php
$file=fopen("podatci.txt", "a");

$ok=true;
$poruke=array();

if(strlen($_POST["ime"])<2)
{
	array_push($poruke,"prekratno ime");
	$ok=false;
}
else
	fwrite($file,"\n \n Ime: ".$_POST["ime"]."\n");
if(strlen($_POST["prezime"])<2)
{
	array_push($poruke,"prekratno prezime");
	$ok=false;
}
else
	fwrite($file,"Prezime: ".$_POST["prezime"]."\n");

fwrite($file,"Mail: ".$_POST["email"]."\n");

if (isset($_POST["datum"]))
	fwrite($file,"Datum: ".$_POST["datum"]."\n");

if (isset($_POST["spol"]))
{
if($_POST["spol"]=="Musko")
	fwrite($file,"Spol: Muski \n");
else if($_POST["spol"]=="Zensko")
	fwrite($file,"Spol: Zenski");
else
	fwrite($file,"Nije odabran spol\n");
}

if (isset($_POST["sport"])) {
    fwrite($file, "Bazni sport: " . $_POST["sport"] . "\n");
}

fwrite($file,"Poruka: ".$_POST["textarea"]);

if($ok==true)
	echo"HVALA NA REGISTRACIJI";
else
{
	foreach ($poruke as $p)
		echo "$p <br>";
}

fclose($file);
?>