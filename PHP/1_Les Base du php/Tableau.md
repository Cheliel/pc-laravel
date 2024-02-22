---
sticker: emoji//1f4e6
---
[[Les Base du PHP]]

> [!l'index]
> Il est possible de mettre des clefs dans un tableau, ce qui est une forme hybride.  Ainsi, quand pomme prendre l'index 'k1', il est tout a fait possible d'avoir une cellule du tableau sans index. Celui-ci sera assigné automatiquement. 

```php
<?php 

$lst = [ 'k1' => 'pomme', 'pierre']

# pomme a l'index 'k1'
# Pierre a l'index 0 
```

![[Pasted image 20240212150529.png]]


### La différence entre Array.php & Object.js

> [!INDEX]
> L'index se comporte comme les clef d'un objet en Javascript. 



```php
$lst = array_values($lst);
$keys = array_keys($lst);


```


## Exploitation des tableaux 


> [!Index undefined]
>Une erreur sera renvoyé quand l'index d'un tableau est inexistant. Il est alors possible d'utiliser la notation suivante pour vérifier la condition puis assigné la condition. 

```php
$myVar = $myVar ?? null; 
```



> [!Récupérer l'index]
> Seul méthode pour récupérer l'index du tableau que l'on parcourt

```php
forEach($lst as $key => $value){

}
```



---



> [!forEach & Référence]
> La fonction forEach n'utilise pas la référence de la variable. Il est donc essentiel de push les modification dans le tableau avant de finir son tour de boucle. 


> [!Convertion]
> <span style="color:#92d050">Implode</span> / <span style="color:#92d050">Explode</span> permet de casser une chaine avec un séparateur. <span style="color:#92d050">str_split</span> quant à lui transforme une chaine de caractère tableau, ce qui était déjà le cas. 


### Concaténation de tableau 

> [!merge]
> Array merge est la seul manière viable de faire de la concaténation de tableau. A noter qu'il est possible de faire $tab + $tab2 mais ce n'est pas une concaténation, c'est un remplacement. Dans le cadre du Array merge, les tableaux sont mit à la suite des autres. 
>
> Il y a un écrasement des clefs, l'ordre de priorité si l'écrassement advient est de droite à gauche. La variable la plus à droit est prioritaire.


## Destructuration 

Disponible depuis peu de version de PHP. 

```php
$demo = [...$lst, 4, 5, 6];
```