---
sticker: emoji//2753
---

[[Les bases de Laravel]]


> [!abstract]
> C'est un super Object codé au cœur de symphonie. On peut y accéder à n'importe quel moment avec la méthode request()->name. 


> [!Validation]
> Comment valider les variables qui vienne de la requêt ? Il faut tout d'abord définir un tableau de règle (champ / rule )

> [!message d'erreur]
> Il est possible de donner un deuxième tableau à la fonction validate pour personnalisé le message d'erreur

> [!Définir le nom du champ]
> Un troisième tableau permet de modifier le nom du champ quand il apparaîtra dans une erreur. 

```php
$request->validate([
	'label' => 'required|min:10|max:180|alpha_num',
	'price_ht' => 'decimal:10|gt:0|size:10',
	'logo' => 'image|extensions:jpg, jpeg, png',
	'email' => 'exists:Table, column',
	'order' => 'exists:userss.orderId, id', // recherche dans la table d'association
	'array.*' => 'min:10',
	'array.sub' => 'required'
	
	'description' => Rule::([
		'image' => function($value){
			//toto
		}
	], 
	[
		'label.rule' => 'my message'
	], 
	[
		'champ' => 'newChampName'
	])
])
```

	Toutes ces règles sont le dernier niveau mit en place par laravel. Cependant il est possible de crée ses propres règles.

> [!Invalidation]
> Quand une requêt est invalide elle se fait automatiquement rejeter, l'utilisateur reste sur la page du formulaire et les données sont injecté dans les champs. 
> >Un message d'erreur est renvoyé indiquand le champs invalide + règle non respecter. 


```php
@if($errs = $errors->all())
	<section class="errors">
	<ul>
		@foreach($errs as $err)
			<li>
				Invalide : {{ $err }}
			</li>
		@endforeach
	</ul>
@endif
```


_____

> [!caution]
> Il est toujours possible de reprendre le controlle de la gestion d'erreur et de la redirection faite par une validation erroné. 
> >Il faut crée un Objet de type validator, lui donner tout les champs de la requête. 
> 


```php
	$validator = Validator::make($request->all(), [
		'provider_name' => 'required|min:1|max:20',
		'provider_email' => 'required|email',
	]);
	
	$erros = $validator->errors()->toArray();
```