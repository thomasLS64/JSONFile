# Conditions
## where
Permet d'extraire le contenu du fichier respectant la condition

#### Opérateurs
Cette condition peut être effectuée avec les opérateurs =, <, >, <=, >=

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
Permet de limiter le nombre d'élément à récupérer

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