<?php
include 'jsonfile.php';
$JSONFile = new JSONFile;

$file = 'monFichier';

// Cr�ation du fichier
echo '<br>Cr�ation du fichier<br>';
$JSONFile->creatFile($file);

// Ajout d'un �l�ment
echo '<br>Ajout de l\'�l�ment<br>';
$newElt = array(
	'title' => 'Test',
	'content' => 'coucou bande de petit pute !'
);
$JSONFile->add($file, $newElt);

// Lecture du fichier
echo 'Mon fichier '.$file.'<br>';
var_dump($JSONFile->read($file));

// Suppression de l'�l�ment
echo '<br>Suppression de l\'�l�ment<br>';
$JSONFile->remove($file, 0);

// Lecture du fichier
echo '<br>Mon fichier '.$file.'<br>';
var_dump($JSONFile->read($file));

// Suppression du fichier
echo '<br>Suppression du fichier<br>';
$JSONFile->removeFile($file);
?>