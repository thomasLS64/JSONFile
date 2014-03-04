# Conditions
## where
Permet d'extraire le contenu du fichier respectant la condition

#### Appel
``` php
read('monFichier', 'where ATTRIBUT = VALEUR');
```

#### Op�rateurs
Cette condition peut �tre effectu�e avec les op�rateurs =, <, >, <=, >=


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


## concatenate
Concat�ne deux fichiers en fonction d'une condition ou non

#### Appel
``` php
read('monFichier1', 'concatenate (with/delete) monFichier2 [on ATTRIBUT1 = ATTRIBUT2]');
```
() : Choix entre les deux options
[] : Optionnel avec le "concatenate with"
ATTRIBUT1 correspond � un attribut de monFichier1
ATTRIBUT2 correspond � un attribut de monFichier2

#### Deux concat�nations
La concat�nation "with" ajoute monFichier2 dans monFichier1 en fonction de la condition s'il y en a une.
La concat�nation "delete" ajoute monFichier2 dans monFichier1 en fonction de la condition et si celle-ci n'est pas respecter les enregistrement ne sont pas affich�s

#### Op�rateurs
Cette condition peut �tre effectu�e avec les op�rateurs =, <, >, <=, >=
