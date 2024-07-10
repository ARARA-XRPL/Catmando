
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta charset="utf-8">
	<title>upload catalogue</title>
</head>
<body>
<?php
// Inclusion du fichier qui contient les fonctions générales.
// include('../include/fonctions.inc.php');
// Initialisation de la variable de message.
echo '<br> <strong>File tranfert process</strong> : <br> <br>';
$message = '';
// $affichage = '<pre>'.print_r($_POST, true).'</pre> <br/>';
// affichage variable
// echo '<br> <strong>En debut de procedure la variable $POST contient</strong> : '.$affichage;
// Traitement du formulaire.
// if (isset($_POST['OK'])) {
  // Récupérer les informations sur le fichier.
  $informations = $_FILES['CatalogueName'];
  // En extraire :
  //    - son nom
  $nom = $informations['name'];
  //    - son type MIME
  $type_mime = $informations['type'];
  //    - sa taille
  $taille = $informations['size'];
  //    - l'emplacement du fichier temporaire
  $fichier_temporaire = $informations['tmp_name'];
  //    - le code d'erreur
  $code_erreur = $informations['error'];
  if ($nom =="") {
	  echo "No file selected !";
				}
	  else {
	// echo 'Contrôles et traitement'.$nom.'<br>'; 
	// echo 'code erreur avant le switch '. $code_erreur.'<br>';
  switch ($code_erreur) {
  case UPLOAD_ERR_OK :
  // echo 'on traite le code erreur : '.$code_erreur.'<br>';
    // Fichier bien reçu.
    // Déterminer sa destination finale
    $destination = $nom;
	//echo 'Destination : '.$destination.'<br>';
    // Copier le fichier temporaire (tester le résultat).
    // echo 'temporaire : '.$fichier_temporaire.'<br>';
	if (copy($fichier_temporaire,$nom)) {
      // Copie OK => mettre un message de confirmation.
      $message  = "Catalogue Transfert done  - <br> File = $nom - ";
      $message1 = "Size = $taille Bytes - ";
      $message2 = "Type MIME = $type_mime.";
	  $messagefinal=$message.'<br>'.$message1.'<br>'.$message2.'<br>';
	  echo $messagefinal.'<br>';
    } else {
      // Problème de copie => mettre un message d'erreur.
      $message = 'Problème de copie sur le serveur.';
    }
    break;
  case UPLOAD_ERR_NO_FILE :
    // Pas de fichier saisi.
    $message = 'Pas de fichier saisi.';
    break;
  case UPLOAD_ERR_INI_SIZE :
    // Taille fichier > upload_max_filesize.
    $message  = "Fichier '$nom' non transféré ";
    $message .= ' (taille > upload_max_filesize).';
    break;
  case UPLOAD_ERR_FORM_SIZE :
    // Taille fichier > MAX_FILE_SIZE.
    $message  = "Fichier '$nom' non transféré ";
    $message .= ' (taille > MAX_FILE_SIZE).';
    break;
  case UPLOAD_ERR_PARTIAL :
    // Fichier partiellement transféré.
    $message  = "Fichier '$nom' non transféré ";
    $message .= ' (problème lors du tranfert).';
    break;
  case UPLOAD_ERR_NO_TMP_DIR :
    // Pas de répertoire temporaire.
    $message  = "Fichier '$nom' non transféré ";
    $message .= ' (pas de répertoire temporaire).';
    break;
  case UPLOAD_ERR_CANT_WRITE :
    // Erreur lors de l'écriture du fichier sur disque.
    $message  = "Fichier '$nom' non transféré ";
    $message .= ' (erreur lors de l\'écriture du fichier sur disque).';
    break;
  case UPLOAD_ERR_EXTENSION :
    // Transfert stoppé par l'extension.
    $message  = "Fichier '$nom' non transféré ";
    $message .= ' (transfert stoppé par l\'extension).';
    break;
  default :
    // Erreur non prévue !
    $message  = "Fichier non transféré ";
    $message .= " (erreur inconnue : $code_erreur ).";
  }
	  }
//}
// $affichage = '<pre>'.print_r($_FILES, true).'</pre> <br/>';
// affichage variable
//echo '<br> <strong>La variable $_FILES contient</strong> : '.$affichage;
// retour dans le paneau de controle catmando
//header('Location: indexbis.html');
// ici on dispsoe du nom du fichier uploade et de la date et heure

$date = date('d.m.Y.H.i.s');
// on va placer ces informations dans le fichier log sendcatlog
$df = fopen("sendcatlog.txt","a+");
// fwrite($df,$nom.'->'.$date.chr(13).chr(10));
fwrite($df,$nom.chr(13).chr(10));
fclose($df);

// echo 'file name '.$nom. ' and delivery date '.$date. ' recorded in sendcatlog.txt file !'.'<br>';
// echo $nom.'<br>';
// echo $date.'<br>';
echo 'catalogue name : '.$nom. ' has been recorded in sendcatlog.txt file !'.'<br>';
?>



 <a href="indexquart.html"> <strong>Click here to return to CatManDo control panel !</strong></a> 
</body>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
</html>

