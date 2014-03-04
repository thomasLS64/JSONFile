# Conditions
## where
Permet d'extraire le contenu du fichier respectant la condition

#### Op�rateurs
Cette condition peut �tre effectu�e avec les op�rateurs =, <, >, <=, >=

#### Appel
``` php
read('monFichier', 'where ATTRIBUT = VALEUR');
```


## order
Permet de ranger le contenu dans un certain ordre

#### Appel
``` php
read('monFichier', 'order id DESC');
```


## limit
Permet de limiter le nombre d'�l�ment � r�cup�rer

#### Appel
``` php
read('monFichier', 'limit START,NBELT');
```


## join
Permet d'extraire deux fichiers en une fois

#### Appel
``` php
read('monFichier1', 'join monFichier2');
```
Retournera ainsi le contenu de monFichier1 et de monFichier2