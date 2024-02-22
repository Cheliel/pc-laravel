---
sticker: emoji//2694-fe0f
---
[[Les bases de Laravel]]
	
	.blade n'est pas un langague, c'est un fichier gérer par Laravel et qui sera comvertie en php natif. Blade évite les balise PHP qui était un des éléments les plus embêtant à utiliser dans un fichier html/php.

> [!abstract]
> Les fichiers blade une fois compilé sont stocké dans storage/framework/views. Il est donc possible de lire le fichier compilé en php natif. 

	Les pages blade on une protection automatique anti attaque XSS. Toutes varaible passé à une page view('') sera passé à la moulinette et tout les caractères spécifiquement interprété comme language de programation sera échapé en caractère html (&lt / &gt). Il est possible de bypassé cette sécurité avec la syntax {{!! myVar !!}}. En php natif on utilisera la fonction e()

	les @ suivie d'un mot clef sont définie par Laravel pour par nous même. Ils permettent de faire des opération de base comme les @if ou d'autre fonction comme @auth()...@endif qui est un if simplifier pour vérifier si l'utilisateur est connecté. 
	
> [!Directive]
> Les boucles @forEach() sont modifier, on peut accedé la variable @loop dans sont contexte pour connaître la première et la dernière itération de la boucle. 



```php
//html
@foreach($bookings as $booking)
	//html 
	{ 
		$loop->last
		$loop->first
		$loot->count
		//php 
	}
@endforeach
```
	list des directive: https://laravel.com/docs/10.x/blade



> [!caution]
> La variable <span style="color:#92d050">old()</span> permet dans un formulaire de se souvenir des valeur précédente. Pour ce faire <span style="color:#92d050">il faut Invalider un formulaire</span> c'est la seul manière que la fonction old() a pour se souvenir des données.  



```php
public function form(Request $request){
	$request->validate([
		'label' => 'required'
		'label2' => 'required|min:2'
	])
} 
```



	récupération de variable php pour l'utilisation en JS
```php
<scripte>
	var nj = @json($varTest)
	console.log(nj)
</scripte>
```


## Layout & include



> [!@yeld()]
> Ces balises permettent de placer un tag pour signifier qu'il est possible d'ajouter du code d'autre vues Blade. 

> [!@section()]
> Section est une balise qui fait le liens avec la balise Yeld(). Dans un ficher on écrit des section et on y associe une page avec extends(). Dans la page de layout on écrit des yeld() qui référence nos fichier de section. 

> [!@include()]
> S'écrit de la même manière qu'un view() coté back-end. 

> [!@extend()]
> Fonctionne comme un include mais inversé. Il se place dans le fichier qui contient nos section pour définir à quel Layout il s'affilie.  


On est pages en full synchrone 
Mais on a tout ce qu'il vous faut 
Ajax ! Ajax ! 
Engine inix ! Engine inix ! 
Eh qu'es qu'il y a dans cette app ? 
Pas une ligne de javascripte chef !


## Ajouter des instructions blade


> [!@instruction]
> Les instructions sont des mots clef utilisable dans un fichier blade. Pour cela il faut aller dans AppServiceCreator 


```php
    public function boot(): void

    {
        Blade::directive('route', function ($expression) {
            return "<?php echo e(route($expression)) ?>";
        });
    }
```

