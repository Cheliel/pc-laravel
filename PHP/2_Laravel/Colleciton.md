---
sticker: emoji//1f5c3-fe0f
---


> [!abstract]
>Une collection est une super classe qui comprend les tableaux. La BBD nous renvoie pas un tableau mais une collection ce qui nous permet tout un tas d'opération supplémentaire. 
 

> [!caution]
> Php n'est pas un langage qui traite les références, la variable $pok n'est donc jamais modifié, il faut récupéré la valeur de tout de ces fonctions.


```php
    public function collectionTest(){
        $pok = Pokemon::all(); // requêt sql effectué
        dd(
            $pok->sum('age'), // gestin de collection hors BDD
            $pok->max('age'),
            $pok->pluck('label')->toArray(),
            $pok->pluck('label'), // collection of label
            $pok->pluck('label', 'id'),
            $pok->random(),
            $pok->random(3), // get collection of 3 random pokemons
            $pok->keyBy('id'),
            $pok->keyBy('element'),// collection of id
            $pok->keyBy('id')->get(34), // select pokemons at id 34
            $pok->groupBy('user_id'), // restructure selon un critère
            $pok->where('age', '<', 20) // ce n'est toujours pas du SQL -> / ::
            $pok->first() // toujours pas...
        ); // on agit pas directement sur la collection mais sur une copie !!!
    }
```

> [!map]
> Map() permet de modifier le tableau mais il faudra tout de même récupéré un object retourné. La méthode transforme() permet de modifier directement la variable. 


`creation d'une collection`
```php
$collection = collect($data);
```


> [!convertion]
> Il n'y a pas besoin de convertir les collections pour les envoyer notamment en JSON la fonction interne toArray() s'en chargera pour nous. 


```php
$pok[0] // error if empty
$pok->first() // return null if empty
```

