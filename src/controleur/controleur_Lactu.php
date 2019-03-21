<?php

function actionLactu($twig,$db){
 $form = array();
 $actualite = new Actualite($db);
 $liste = $actualite->select();
 echo $twig->render('Lactu.html.twig', array('form'=>$form,'liste'=>$liste));
}

?>

