<?php
include 'jsonfile.php';
$JSONFile = new JSONFile;

$file = 'monFichier';

// Création du fichier
echo '<br>Création du fichier<br>';
$JSONFile->creatFile($file);

// Ajout d'un élément
echo '<br>Ajout de l\'élément<br>';
$newElt = array(
	'title' => 'Test',
	'content' => 'coucou bande de petit pute !'
);
$JSONFile->add($file, $newElt);

// Lecture du fichier
echo 'Mon fichier '.$file.'<br>';
var_dump($JSONFile->read($file));

// Suppression de l'élément
echo '<br>Suppression de l\'élément<br>';
$JSONFile->remove($file, 0);

// Lecture du fichier
echo '<br>Mon fichier '.$file.'<br>';
var_dump($JSONFile->read($file));

// Suppression du fichier
echo '<br>Suppression du fichier<br>';
$JSONFile->removeFile($file);
?>