---
sticker: emoji//1f5dd-fe0f
---

[[Les bases de Laravel]]


> [!Middleware]
> Il est possible de coder le system d'authorisation à tout les niveau notament dans les routes. Il est donc possible définir des routes pour certain utilisateur seulement et aussi d'être connecter avec plusieurs rôle en même temps.


> [!Caution]
> La variable { id } n'est pas un paramèttre qui proviens du GET ou du POST, c'est un system géré par laravel qui lit l'url. Son avantage est d'être lue avant les controllers. Cela permet de faire un system de routage avant l'application à l'origine. 

```php
Route::get('/test/{id}', [MyController::class, 'showInt'])
->name('users.index')
->middleware('auth:user');

Route::get('/test/{id}', [MyController::class, 'showInt'])
->name('users.index')
->middleware('auth:admin');

```

	Il existe énormément de manière de définir les authentifications à tous les niveau une de plus dans les routes. 


```php

$url = route('users.update', ['id' => 5, 'mode' => 'test']);
//users/5/update?mode=test

Route::prefix('users')->group, function(){

	Route::get('/', [MyController::class, 'index'])
	->name('show');

	//users/5/update?mode=test
	Route::get('/{id}/update', [MyController::class, 'showInt']);
	
})->middleware('auth')

```



> [!caution]
> Le CSRF est activé par défaut sur Laravel. C'est une vérification par token qui expire au bou d'un moment donnée. il faut l'activer manuellement dans chaque formulaire avec l'instruction : @csrf.


```php
    <form id="monFormulaire" method="POST" action="{{route('exo1.create')}}">
        @csrf
        <input placeholder="Race" type="text" id="nom" name="Race" >
        <input placeholder="Age" type="number" name="Age">
        <input placeholder="Element" type="text" name="Element">
        <button type="submit">Envoyer</button>
    </form>
```