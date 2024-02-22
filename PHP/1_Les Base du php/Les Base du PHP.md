---
sticker: emoji//1f9ec
---
[[PHP]]
## Les variables 

```php
// Valide
$var; $varTest; $var_test; // Usage normal
$_var; $Var; // Usage particulier
$VAR; $VAR_TEST; // Constante
// Non-valide
$125; $87var; $var-test; // wrong name 
$$var; $'var'; // appel d'un variable qui contient le nom d'une variable
```


### Le typage

![[Pasted image 20240212203825.png]]


### Les fonctions standare 

> [!Var_dump]
> C'est la seul fonction qui peut imprimer tout les types de variable elle n'est présent que pour le Débug ! 


> [!isset()]
> Ce fonction ne peut pas planter. Elle permet de vérifier si la variable existe ou pas. Empty() fais la même chose, mais considère les tableaux vide comme faux, plus simplement il vérifie si la variable a une valeur / un contenue. 

> [!Conversion]
> <span style="color:#92d050">INTVAL</span> / <span style="color:#92d050">STRVAL</span> => pour convertir dans un type données. Une autre manière de convertir est de mettre le type devant la variable. 


```php
$myVar = (int) myStr 

$myVar = intval(myStr)
```


#### Format 

```php
echo round (7.6214);
// 8
echo round (7.6214, 1); // 7.6 echo round (7.6214, 3);
// 7.621
echo round (7.628, 2);
// 7.63
echo round (7.625),
2);
// 7.63
echo round (7.621, 2);
// 7.62
// Formate un nombre avec des paramètres choisis :
// 1. un nombre de décimal
// 2. un séparateur décimal
// 3. un séparateur des milliers
echo number_format($my_var, 2, ',', ''); // 1027,62
// Affichage pour le développement uniquement var_dump($my_var); // float(1027.621)
var_dump(strval($my_var) ); // string(8) "1027.621"


```

#### Navigation 


```php
$dirPath = __DIR__;
$fileName = __FILE__;
$line = __LINE__;
```

![[Pasted image 20240212204132.png]]


#### Constante 

```php

define('ROOT', __DIR__); // same thing 
const ROOT = __DIR__;

```



