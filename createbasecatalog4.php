<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Create COS</title>
  </head>
  <body>
  <a href="indexquart.html"> <strong>Click here to return to CatManDo control panel !</strong></a> 

<?php
echo '</br>'.'server DB connexion'.'</br>';
$server ='192.168.1.15:3306';
$login ='root';
$pwd=''; 
$db='Test';
echo 'loading data into data base'.'</br>';
if(isset($_POST['insert']))
{
$db=$_POST['catname'];
} else {
	echo '$_post issue';
	// do nothing
}
// database creation
try {
$dbco = new PDO('mysql:host = $server',$login,$pwd);
$dbco-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'CREATE DATABASE '. $db;
$dbco -> exec($sql);
echo 'Database '.$db.' creation done'.'</br>';
} // fin du try
catch (PDOException $e) {
echo' error in database creation '.$e -> getMessage();
}



// table creation
$tab ='msa';
try {
$tabco = new PDO('mysql:host = $server; dbname='.$db,$login,$pwd);
$tabco-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// INSERER ICI JUSQU AU COMMENTAIRE SUIVANT
// LE CONTENU DE CREATE TABLE EXCEL
//echo ' on commence la creation de la table ';
$sqltab = 'CREATE TABLE '.$tab.' (
id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Catalogue_Version VARCHAR (260),
CR_number VARCHAR (261),
Release_Date VARCHAR (266),
Contract VARCHAR (279),
Appendix VARCHAR (290),
WebSource_Catalogue_name VARCHAR (292),
Country VARCHAR (258),
Service_Category_Code VARCHAR (259),
Service_Category_Label VARCHAR (269),
Service_Class_Code VARCHAR (259),
Service_Class_Label VARCHAR (268),
Service_Code VARCHAR (277),
Service_Label VARCHAR (281),
Service_Description VARCHAR (754),
Service_Element_Code VARCHAR (275),
Service_Element_Label VARCHAR (273),
Type_of_element VARCHAR (261),
Site_Scope VARCHAR (272),
Country_Site_ VARCHAR (258),
Supply_category VARCHAR (259),
Cost_Element_Code VARCHAR (275),
Cost_Element_Name VARCHAR (280),
Cost_element_type VARCHAR (260),
Amount_type VARCHAR (264),
Amount VARCHAR (260),
Currency VARCHAR (260),
Pricing_informations VARCHAR (256),
Commentaire VARCHAR (256),
Technical_annex_code VARCHAR (256),
Technical_annex_label VARCHAR (256),
Order_by_customer VARCHAR (259),
Order_by_OTC_Orange VARCHAR (259),
Billable VARCHAR (259),
Lead_Time_To_Deliver VARCHAR (258),
Delivred_Service VARCHAR (283)
)';
// FIN DE LA ZONE INSERTION CREATE TABLE EXCEL
$tabco -> exec($sqltab);
echo 'Table '.$tab.' creation done'.'</br>';
} // fin du try
catch (PDOException $e) {
echo' erreur table creation '.$tab.' '.$e -> getMessage();
}
// lecture des donneées dans le fichier catalogue
// document[] contient un enregistrement de catalogue
$op=fopen("SampleCatalog.csv","r+");
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
$NbreDeligne=$i-1;
$tableau = array();
// alimentation de la table apres creation
try {
$dataco = new PDO('mysql:host = $server; dbname='.$db,$login,$pwd);
$dataco -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// INSERT TABLE
// INSERER ICI JUSQU AU COMMENTAIRE SUIVANT
// LE CONTENU DE INSERT TABLE EXCEL
$sqldata = "INSERT INTO ".$tab." (
Catalogue_Version,
CR_number,
Release_Date,
Contract,
Appendix,
WebSource_Catalogue_name,
Country,
Service_Category_Code,
Service_Category_Label,
Service_Class_Code,
Service_Class_Label,
Service_Code,
Service_Label,
Service_Description,
Service_Element_Code,
Service_Element_Label,
Type_of_element,
Site_Scope,
Country_Site_,
Supply_category,
Cost_Element_Code,
Cost_Element_Name,
Cost_element_type,
Amount_type,
Amount,
Currency,
Pricing_informations,
Commentaire,
Technical_annex_code,
Technical_annex_label,
Order_by_customer,
Order_by_OTC_Orange,
Billable,
Lead_Time_To_Deliver,
Delivred_Service
)
VALUES (
:Catalogue_Version,
:CR_number,
:Release_Date,
:Contract,
:Appendix,
:WebSource_Catalogue_name,
:Country,
:Service_Category_Code,
:Service_Category_Label,
:Service_Class_Code,
:Service_Class_Label,
:Service_Code,
:Service_Label,
:Service_Description,
:Service_Element_Code,
:Service_Element_Label,
:Type_of_element,
:Site_Scope,
:Country_Site_,
:Supply_category,
:Cost_Element_Code,
:Cost_Element_Name,
:Cost_element_type,
:Amount_type,
:Amount,
:Currency,
:Pricing_informations,
:Commentaire,
:Technical_annex_code,
:Technical_annex_label,
:Order_by_customer,
:Order_by_OTC_Orange,
:Billable,
:Lead_Time_To_Deliver,
:Delivred_Service
)";
// FIN DE LA ZONE INSERTION INSERT TABLE EXCEL
// preparation de la requete
$j=1;

while($j < $NbreDeligne) {
// echo 'passage '.$j.' dans execute(array... '.'</br>';
$EnregCat = $documents[$j];
// echo $EnregCat;
// on recupere nom et prenom dans document[]
// INSERER ICI JUSQU AU COMMENTAIRE SUIVANT
// LE CONTENU DE DISPLAY TABLE EXCEL
$tableau = explode(";",$EnregCat);
$Catalogue_Version= $tableau[0];
$CR_number= $tableau[1];
$Release_Date= $tableau[2];
$Contract= $tableau[3];
$Appendix= $tableau[4];
$WebSource_Catalogue_name= $tableau[5];
$Country= $tableau[6];
$Service_Category_Code= $tableau[7];
$Service_Category_Label= $tableau[8];
$Service_Class_Code= $tableau[9];
$Service_Class_Label= $tableau[10];
$Service_Code= $tableau[11];
$Service_Label= $tableau[12];
$Service_Description= $tableau[13];
$Service_Element_Code= $tableau[14];
$Service_Element_Label= $tableau[15];
$Type_of_element= $tableau[16];
$Site_Scope= $tableau[17];
$Country_Site_= $tableau[18];
$Supply_category= $tableau[19];
$Cost_Element_Code= $tableau[20];
$Cost_Element_Name= $tableau[21];
$Cost_element_type= $tableau[22];
$Amount_type= $tableau[23];
$Amount= $tableau[24];
$Currency= $tableau[25];
$Pricing_informations= $tableau[26];
$Commentaire= $tableau[27];
$Technical_annex_code= $tableau[28];
$Technical_annex_label= $tableau[29];
$Order_by_customer= $tableau[30];
$Order_by_OTC_Orange= $tableau[31];
$Billable= $tableau[32];
$Lead_Time_To_Deliver= $tableau[33];
$Delivred_Service= $tableau[34];
$resultat = $dataco -> prepare($sqldata);
$exec = $resultat -> execute(array(
 ':Catalogue_Version'=>$Catalogue_Version,
 ':CR_number'=>$CR_number,
 ':Release_Date'=>$Release_Date,
 ':Contract'=>$Contract,
 ':Appendix'=>$Appendix,
 ':WebSource_Catalogue_name'=>$WebSource_Catalogue_name,
 ':Country'=>$Country,
 ':Service_Category_Code'=>$Service_Category_Code,
 ':Service_Category_Label'=>$Service_Category_Label,
 ':Service_Class_Code'=>$Service_Class_Code,
 ':Service_Class_Label'=>$Service_Class_Label,
 ':Service_Code'=>$Service_Code,
 ':Service_Label'=>$Service_Label,
 ':Service_Description'=>$Service_Description,
 ':Service_Element_Code'=>$Service_Element_Code,
 ':Service_Element_Label'=>$Service_Element_Label,
 ':Type_of_element'=>$Type_of_element,
 ':Site_Scope'=>$Site_Scope,
 ':Country_Site_'=>$Country_Site_,
 ':Supply_category'=>$Supply_category,
 ':Cost_Element_Code'=>$Cost_Element_Code,
 ':Cost_Element_Name'=>$Cost_Element_Name,
 ':Cost_element_type'=>$Cost_element_type,
 ':Amount_type'=>$Amount_type,
 ':Amount'=>$Amount,
 ':Currency'=>$Currency,
 ':Pricing_informations'=>$Pricing_informations,
 ':Commentaire'=>$Commentaire,
 ':Technical_annex_code'=>$Technical_annex_code,
 ':Technical_annex_label'=>$Technical_annex_label,
 ':Order_by_customer'=>$Order_by_customer,
 ':Order_by_OTC_Orange'=>$Order_by_OTC_Orange,
 ':Billable'=>$Billable,
 ':Lead_Time_To_Deliver'=>$Lead_Time_To_Deliver,
 ':Delivred_Service'=>$Delivred_Service
));

// zone de code pour le display

if($exec) {
echo 'RECORD NUMERO '.$j.' '.'</br>'
.$Catalogue_Version. '  '
.$CR_number. '  '
.$Release_Date. '  '
.$Contract. '  '
.$Appendix. '  '
.$WebSource_Catalogue_name. '  '
.$Country. '  '
.$Service_Category_Code. '  '
.$Service_Category_Label. '  '
.$Service_Class_Code. '  '
.$Service_Class_Label. '  '
.$Service_Code. '  '
.$Service_Label. '  '
.$Service_Description. '  '
.$Service_Element_Code. '  '
.$Service_Element_Label. '  '
.$Type_of_element. '  '
.$Site_Scope. '  '
.$Country_Site_. '  '
.$Supply_category. '  '
.$Cost_Element_Code. '  '
.$Cost_Element_Name. '  '
.$Cost_element_type. '  '
.$Amount_type. '  '
.$Amount. '  '
.$Currency. '  '
.$Pricing_informations. '  '
.$Commentaire. '  '
.$Technical_annex_code. '  '
.$Technical_annex_label. '  '
.$Order_by_customer. '  '
.$Order_by_OTC_Orange. '  '
.$Billable. '  '
.$Lead_Time_To_Deliver. '  '
.$Delivred_Service. '  '
.' has been put into table'.'</br>';
}
else {
	echo 'insertion operation failed';
}
$j++;
} // fin du while
// FIN DE LA ZONE INSERTION DISPLAY TABLE EXCEL
// $dataco > exec($sqldata);
echo $NbreDeligne.' data has been put into table '.$tab.' !'.'</br>';
} // fin du try
catch (PDOException $e) {
echo' failed to insert data into  '.$tab.' '.$e -> getMessage();
}
?>
<a href="indexquart.html"> <strong>Click here to return to CatManDo control panel !</strong></a> 
</body>
</html>

