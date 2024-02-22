---
sticker: emoji//1f45f
---

[[Les Base du PHP]]

> [!Extends]
> Une classe fille ne peut hérité que d'une seul classe mère. Toutes les propriétés sont transmise à la classes fille, <span style="color:#92d050">sauf les propriété privé.</span> 



## Surcharge

> [!Surcharge Override]
> Il faut respecter la déclaration du parent, sa signature. Pour accéder au comportement de base de la fonction parent il faut utiliser le mot clef <span style="color:#92d050">Parent::foo() </span>


> [!Final]
> Le mot clef <span style="color:#92d050">Final permet d'empêcher la surcharge d'une variable ou d'une fonction</span>. Il est possible de déclarer l'entièreté d'une classe en final. Cela signifie que toutes classe qui l'utilise comme classe mère ne peut pas surchargé le contenue de cette classe mère. 


## Les différents type de classes


> [!Abstract]
> Les classes abstraite ne peux pas être appelé directement, elle ne servira que de classes mère. Ce type de classe apporte la notion de signature de méthode qui sont des méthodes abstraite qui  ne comportent ni d'accolade ni code. Cette méthode abstraite devra obligatoirement être définie dans la classes fille avec la même signature : nom / params / retour. 


> [!Interface]
> Elles ne sont pas réellement des classes, elles ont le même style contenu, mais sans adopter le même comportement. De la même manière que les méthodes abstraite, les interfaces obliges toutes les classes qui les implémentes à définir l'ensemble de leurs méthodes abstraite. A l'inverse des classes abstraite,<span style="color:#92d050"> une classes peu implémenter autant d'interface qu'elle le souhaite.</span>
> >Elle permet aussi de définir un type, ou plutôt un comportement. <span style="color:#92d050">Il est possible d'utiliser les interface dans les paramètres d'enter d'une fonction à la place d'un type</span>. Ainsi, toutes les classes qui implémente cette interface serons accepter par la fonction. 
> Une interface peut aussi contenir des constantes qui seront utilisable dans toutes les classes qui l'implémente. 


> [!Trait]
> Partant du principe qu'une classe fille ne peut avoir qu'une seul est unique classe mère, PHP a inventer le principe de traite. Le trait n'est pas une classes instanciable, l'idée est d'<span style="color:#92d050">avoir une partie du code qui soit ranger dans un trait et appelable dans une classes</span>. 


> [!Caution]
> Souvent trait et interface fonctionne ensemble où l'interface crée le contrat, la liste des méthodes et un on y couple un trait qui implémente les fonctions de l'interface. 


### Name Spaces

> [!Nommage]
> Il permet d'ajouter des sous dossier virtuel, ils sont fictif et complètement gérer par PHP. Le nom d'un name space doit se référer au nom du dossier qu'il référence.  


> [!Utilisation]
> Toutes les classes qui sont dans le même name space n'on pas besoin de s'appeler. Si une fichier se trouve en dehors d'un name space spécifique il pourra utiliser une classe de ce name space avec le mot clef USE nameSpace/classeName. 
> >Un alliasse se définie par le mot clef AS et n'existe quand dans sont fichier.
> 


```php
namespace Animal\Feline;
use \Animal\{
	Mammal\SubAnimal,
	Mammal\Animal,
	Reptile\Animal as RAnimal
}
```


> [!Caution]
> Il est impossible d'écrire une ligne de code au dessus d'un name space, PHP ne l'autorise pas. 

> [!Classe sans name space]
> Toutes les classes qui n'ons pas de name space définie sont dans le name space par défaut. Pour les utiliser dans un autre name space il faudra obligatoirement utilisa la méthode suivante. A la manière d'un chemin de ficher sur UNIX il faut mettre un back slash devant le nom de la classe. En effet une classe qui n'a pas de name space est forcément du name space par défaut. 


```php
namespace Animal;
// use \PDO()

class Cat{
	public function test(){
		new \PDO()
	}
}
```

> [!Fonction]
> Les fonctions peuvent aussi êtres ranger dans les name space mais ne n'est pas une bonne pratique dans les framework. 


```php
public function hello(){
	\Animal\hello()
}
```

