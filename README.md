# JSONFile
Librairie php pour faciliter la gestion de fichier JSON.

### Fonctionnalités
- Création de fichier
- Suppression de fichier
- Ajout d'élément
- Modification d'élément
- Suppression d'élément
- Lecture complète ou conditionnée d'un fichier

### Exemples
Initialisation
``` php
include 'jsonfile.php';
$JSONFile = new JSONFile;
```

Création d'un fichier JSON
``` php
$JSONFile->creatFile('monFichier');
```

Suppression d'un fichier
``` php
$JSONFile->removeFile('monFichier');
```

Ajout d'élément dans un fichier
``` php
$JSONFile->add('monFichier', 'monContenu');
```

Modification d'élément dans un fichier
``` php
$JSONFile->modify('monFichier', $IdElement, $nouvelleValeur);
```

Suppression d'élément
``` php
$JSONFile->remove('monFichier', $IdElement);
```

Lecture complète
``` php
$JSONFile->read('monFichier');
```

Lecture conditionnée
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