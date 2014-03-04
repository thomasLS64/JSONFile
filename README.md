# JSONFile
Librairie php pour faciliter la gestion de fichier JSON.

### Fonctionnalit�s
- Cr�ation de fichier
- Suppression de fichier
- Ajout d'�l�ment
- Modification d'�l�ment
- Suppression d'�l�ment
- Lecture compl�te ou conditionn�e d'un fichier

### Exemples
Initialisation
``` php
include 'jsonfile.php';
$JSONFile = new JSONFile;
```

Cr�ation d'un fichier JSON
``` php
$JSONFile->creatFile('monFichier');
```

Suppression d'un fichier
``` php
$JSONFile->removeFile('monFichier');
```

Ajout d'�l�ment dans un fichier
``` php
$JSONFile->add('monFichier', 'monContenu');
```

Modification d'�l�ment dans un fichier
``` php
$JSONFile->modify('monFichier', $IdElement, $nouvelleValeur);
```

Suppression d'�l�ment
``` php
$JSONFile->remove('monFichier', $IdElement);
```

Lecture compl�te
``` php
$JSONFile->read('monFichier');
```

Lecture conditionn�e
``` php
$condition = 'where id = 0'; // Condition simple
OU
$condition = array( // Condition multiple
		'where id < 10',
		'where id >= 2',
		'order id DESC'
	);
$JSONFile->read('monFichier', $condition);
```
Voir les [conditions](condition.md)