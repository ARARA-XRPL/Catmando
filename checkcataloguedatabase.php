<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Check DATABASE COS</title>
  </head>
  <body>
  <a href="indexquart27082020.html"> <strong>Click here to return to CatManDo control panel !</strong></a> 

<?php

$server ='192.168.1.15:3306';
$login ='root';
$pwd='';
$db='Test';

if(isset($_POST['insert']))
{
$db=$_POST['catname'];
} else {
	echo '$_post issue';
	// do nothing
}

// table msa checking
$tab ='msa';
try {
$tabco = new PDO('mysql:host = $server; dbname='.$db,$login,$pwd);
$tabco-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo '</br>'.'server DB connexion to data base '.$db. ' has been done'.'</br>';
// recuperation du nombre de lignes de la table MSA
$resultat = $tabco -> query('SELECT * FROM msa');
echo 'Number of rows in MSA table: '.$resultat -> rowcount().'</br>';
$resultat->closeCursor(); //fermeture de la requete
$sqltab = 'SHOW columns FROM '.$tab;
//echo $sqltab.'</br>';
$msarow = $tabco -> query($sqltab);
//affichage de chaque ligne de la table $msarow
echo 'Fields of Service Catalogue table '.$tab.' in Data Base '.$db.'</br>';
while ($donnees = $msarow->fetch())
{
// print_r( $donnees); cree une erreur
echo $donnees[0].'</br>';
}
// print_r($msarow);
$msarow->closeCursor(); //fermeture de la requete
echo 'Check '.$tab.' table done'.'</br>';
} // fin du try
catch (PDOException $e) {
echo' error while checking table '.$tab.' '.$e -> getMessage();
}
finally {
	$db = null; // fermeture de la connexion à la base
}


?>
<a href="indexquart.html"> <strong>Click here to return to CatManDo control panel !</strong></a> 
</body>
</html>

