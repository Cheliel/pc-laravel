---
sticker: emoji//2696-fe0f
aliases:
---

[[Les bases de Laravel]]

> [!caution]
> Il est conseillé d'avoir un modèle de controller qui extends BaseController, puis crée ses controller à partir de celui ci. 
> >Permet d'avoir des fonction partagé par plusieurs controller.

Pour afficher une vue dans un controller il faut appeler la fonction view(). Dans le dossier ressource on a une dossier View qui contient des fichier foo.blade.php un sous extention propre à Laravel. C'est un moteur de rendu qui permet d'écrire plus simplement. Donc en écrivant view('Pokemon.index') je recherche dans le dossier Pokemon le fichier index.blade.php.


> [!Récupérer les paramettres]
> Tout les paramètres sont dans la variable $request 



```php
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    public function index(Request $request){

        $name = $request->name;
        $street = $request->adress->street;

		$id = $request->query->get('id');
		$allVariableInPOST = $request->request->get('post');

		$header =  $request->header('User-Agent')
		$user = $request->user();
        return view('welcome');
    }
}
```

> [!caution]
> <span style="color:#92d050">Content type</span> est présent dans le header d'une requête. Pour Laravel il faut lui donner impérativement un content type : application/json. Ainsi Laravel pourra déchiffrer la requête automatiquement. 



> [!Redirection]
> Pour tout ce qui est requête GET on peut renvoyer du html pout tout ce qui est POST PUT DELETE c'est une action et il faut rediriger vers une page (même si c'est la même).


```php
    public function store(){
	    return response()->send() // une seul réponse est possible ici on shinte Laravel
        return redirect('URL');
        return redirect()->route('name.index');
        return to_route('pokemon.index');
        return back()->with([
            'message' => 'Pokemon create suceffuly'
        ]);
    }
```


> [!View & param]
> Pour transmettre de l'info à une vue on peut passer un deuxième paramettre à view('myView', [data])
>> C'est un tableau clef/valeur qui sera récupéré dans le ficher view.balde.php. Les éléments du tableau devienne des variable globale à la page. 
>Le deuxième paramètre peut remplacer par la fonction chainé ->With([]);


```php
return view('muView', [
	"pokemon" => "Ricardo",
	"pokemons" => [
		"Pikapu",
		"piaru"
	]
]); 

return view('myView')->with([data])
```



> [!Automatisation]
> php Artisan permet de crée des controllers en ligne de commande. Le paramètre --ressources permet la création de méthode standard au CRUD. 


	php artisan make:controller <ctrlName> --ressources 

	 php artisan list:route


```php
Route::resource("controller", ControllerName:class) // crée toutes les routes de bases. 
```



## Controller Web ou API 

	
	Un controller WEB standard & syncrone retourne une vue. Dans un controller API c'est la méhtode de retour qui diffère. Dans un controller API il faut utiliser l'object response. Dans le controller API il n'y a pas de sessions. 


```php
public function indexWEB(){
	return view('tatata');
}

public function indexAPI(){
	return response->json([
		'user' => user::all()
	]);
}
```


		Les middleware sont différents. Il sont représenté dans /app/http/Karnel.php, quand on appel middleware on appel on certain nombre de fichier présente dans le kernel.php. Sur ce principe on peu très bien faire un service web comme on a fait avec exo1 qui n'utilise par la vérification CsrfToken. 