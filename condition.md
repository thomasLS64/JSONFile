# Conditions
## where
Permet d'extraire le contenu du fichier respectant la condition

#### Appel
``` php
read('monFichier', 'where ATTRIBUT = VALEUR');
```

#### Opérateurs
Cette condition peut être effectuée avec les opérateurs =, <, >, <=, >=


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


## concatenate
Concaténe deux fichiers en fonction d'une condition ou non

#### Appel
``` php
read('monFichier1', 'concatenate (with/delete) monFichier2 [on ATTRIBUT1 = ATTRIBUT2]');
```
() : Choix entre les deux options
[] : Optionnel avec le "concatenate with"
ATTRIBUT1 correspond à un attribut de monFichier1
ATTRIBUT2 correspond à un attribut de monFichier2

#### Deux concaténations
La concaténation "with" ajoute monFichier2 dans monFichier1 en fonction de la condition s'il y en a une.
La concaténation "delete" ajoute monFichier2 dans monFichier1 en fonction de la condition et si celle-ci n'est pas respecter les enregistrement ne sont pas affichés

#### Opérateurs
Cette condition peut être effectuée avec les opérateurs =, <, >, <=, >=
