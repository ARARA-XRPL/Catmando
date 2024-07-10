<?php
$op=fopen("sendcatlog.txt","r+");
$i=0;
$documents = array();
while(!feof($op)){
$e=fgets($op);
// echo $e.'<br>';
$documents[$i]=$e;
//echo 'enregistrement '.$i.' '.$documents[$i].'<br>';
$i++;
}
fclose($op);
// on trie le tableau documents par ordre coissant
rsort($documents);
/*//On récupère la taille du tableau et on la stocke dans $taille
            $taille = count($documents);
            echo 'taille : '.$taille.'<br>';
            //On peut soit parcourir le tableau et afficher les valeurs une à une
            for($i = 0; $i < $taille; $i++){
                echo $documents[$i]. ', ';
            }
            
            echo '<br><br>';
            
            //...soit les stocker dans une autre variable et echo cette variable
            $d="";
			for($i = 0; $i < $taille; $i++){
                $d .= '<br>'.$documents[$i]. ', ';
            }
            echo $d.'<br>';*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Download COS</title>
  </head>
  <body>
  <a href="indexquart.html"> <strong>Click here to return to CatManDo control panel !</strong></a> 
 <!-- <p>start download COS</p>
<p>on remplit la table avec les noms fichier suivants</p>
<?php
 echo $d;
?>
<p>Ici je liste les fichiers avec une ancre url</></br>
<?php
$k=0;
$taille = count($documents);
	while ($k < $taille) {
	echo '<a href=titi.php?no='.$documents[$k].'>'.$documents[$k].'</a></br>';
	$k++;
	}
?>
-->

<p></br>Catalogues list : click on the filename to get it from web server</br></p>
	
	<table border="2" cellpadding ="10" cellspacing ="0"><tr align="center"> <th> catalogues of Service</th></tr>
<?php
	$k=0;
	while ($k < $taille) {
	// echo '<tr><td>'.$documents[$k].'</td></tr>';
	echo '<tr><td><a href=titi.php?no='.$documents[$k].'>'.$documents[$k].'</a></td></tr>';
	$k++;
	}
?>
    </table>
<a href="indexquart.html"> <strong>Click here to return to CatManDo control panel !</strong></a> 
</body>
</html>
	
	