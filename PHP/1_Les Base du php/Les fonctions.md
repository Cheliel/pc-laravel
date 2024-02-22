---
sticker: emoji//2694-fe0f
---
[[Les Base du PHP]]

> [!Paramettre]
> PHP 7.4 Tout les paramètres d'une fonction PHP sont obligatoire par défaut, mais les variable peuvent être nullable.  
> 
> PHP 8 depuis cette version il est possible d'avoir plusieur type d'entré et/ou plusieurs type de retour. A noter que ces paradigme ne sont pas compatible, si un param peux avoir plusieur type il ne pourra pas être null.



PHP 7.4
```php
class Demo{}

function hello(?int $nb, bool $isFat, string $str, float $nbs, array $var5, object $var6, Demo $var7) : string

{
    return $str;
}
```

PHP 8

```php
class Demo{}

function hello(int|float $nb, bool $isFat, string $str, float $nbs, array $var5, object $var6, Demo $var7) : string

{
    return $str;
}

```


---


## Les fonctions anonymes 



> Fonction Anonyme
```php
function(){
    echo 'er';
};
```

---


> Fonction Anonyme as variable 
```php
$myFunc = function(){
    echo 'dump';
};
```

---


> Fonction anonyme auto-appellé
```php
(function(){
    echo 'elo';
})();
```

## variable globale 

> [!Scope & Function]
> Une fonction n'a accès que au fonction définie dans sont propre scope. Pour accèder a une variable a l'extérieur d'une fonction il faut utilise le mot clef <span style="color:#92d050">globale</span> ou <span style="color:#92d050">use</span>. 


```php
array_map(function ($item) use($var){

    return $item + $var;

}, $item);
```


> [!Les référence]
> Les références s'utilise a peut près partout et sont appelé par un &. Cette notation permet d'utiliser les références des objet et donc les modifier directement dans une fonction. 


```php
$myFunc = function(&$str){

    echo 'dump';

};
```

> [!COPY]
> En PHP toutes les variables sont copier elle ne sont quasiment pas modifier direcement, ainsi même si tu as l'habitude de modifier dirrectement les variables par leurs référence (comme en js) ce n'est pas une bonne pratique en PHP. 


## Importation de fonction


> [!Include]
> Cette instruction rend l'importation non obligatoire. En cas d'échec un simple warning sera renvoyé. 


> [!Requier]
> A l'inverse require rend obligatoire la réussite de l'opération d'importation.  

> [!Require_once]
> Dans la pratique, si on importe que du PHP il faut toujours utiliser cette fonction. Cependant, si l'on souhaite importer plusieurs fois le même composant html il faudra utiliser require. 


```php
forEach($data as $id => $param){
    echo '<div>';
    require 'components/table.php';
    echo '</div>';
}
```

