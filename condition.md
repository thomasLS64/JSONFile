# Conditions
Fichier JSON
``` json
[{"title":"Test","content":"Bonjour"},{"title":"Test 2","content":"Bonsoir"}]
```

## where
Permet d'extraire le contenu du fichier respectant la condition
#### Opérateurs
Cette condition peut être effectuée avec les opérateurs =, <, >, <=, >=

#### Exemple
``` php
read('monFichier', 'where id = 0');
OU
read('monFichier', 'where title = Test');
OU ENCORE
read('monFichier', array(
	'where id >= 0',
	'where id < 1'
	)
);
```
Retournera uniquement le tableau suivant
``` json
{"title":"Test","content":"Bonjour"}
```

## order
Permet de ranger le contenu dans un certain ordre
``` php
read('monFichier', 'order id DESC');
```
Retournera
``` json
[{"title":"Test 2","content":"Bonsoir"},{"title":"Test","content":"Bonjour"}]
```

## join
Permet d'extraire deux fichiers en une fois
``` php
read('monFichier1', 'join monFichier2');
```
Retournera ainsi le contenu de monFichier1 et de monFichier2