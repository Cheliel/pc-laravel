---
sticker: emoji//1f97e
---

[[Les bases de Laravel]]
	
	
	Nous utiliserons la version web et un peu avec la version api. La version web est la plus complette de plus elle active par défaut la Session. Pour ce qui est des routes ce sont les points d'entré de l'application. 
	
> [!VERBE]
> Il faut faire attention au VERBE dans la route (any) pour dire all. Match demande un tableau en premier paramettre, qui représente la liste textuel de tout les mode respecté ['post', 'get'].
	
	Toutes les routes ont deux éléments supplémentaire. L'url qui démare à partir du domain, ce domain est géré automatiquement par Laravel. L'action, c'est le comportement, il y en a plusieurs type, comme le call back ou fontion anonyme qui doit absolument retourner un élément "return view('myView')", sans le return rien ne plante mais une page blanche s'affiche aucun body n'est envoyé.
	
	 Ici il y a une conversion automatique qui se fait, si on envoye une chaine de caractère la convetion est en pleine texte et le texte s'affiche. Si on return une view() la traduction se fait en HTML, et pour un tableau la convertion se fait en JSON. 
	 
	La deuxième manière d'intéragire avec le deuxième argument des routes est d'utlilser les actions. On appel un controller et sa fonction. Cependant ce n'est pas la meilleurs version d'utiliser les routes. Il faut selon la documentation (pas le cours) mettre le tout dans un tableau et utiliser cette syntaxe pour vérifier que la classe existe dans ce context. 
	
> [!caution]
> Deux routes peuvent avoir le même url tant qu'elle n'ons pas le même VERBE.

```php
Route::get(?, '/test', [MyController::class, 'login']);
```

> [!fonction chainée]
> Après une route, il est possible d'executer du code, comme il est possible de la nommer. Dans l'utilisation des views le séparateur des dossier n'est pas une / mais un . car c'est un<span style="color:#92d050"> lien virtuel</span>. 
	

```php
Route::get(?, '/test', [MyController::class, 'login'])
	->name('user.index');
```

> [!abstract]
> Ce n'est pas obligatoire de nommer une route mais très important. Depuis le nom d'une route on peut récupéré son url. 

	
```php
$url = route('user.index');
```

> [!caution]
> On peut crée des Routes différents qui se distingue par leur VERBE / WHERE. Celle si sera récupérable dans le controller. 


```php

Route::get('/test/{id}', [MyController::class, 'showInt'])
->where('id', '[0-9]+');

Route::get('/test/{id}', [MyController::class, 'showString'])
->where('id', '([a-z]|[A-Z])+');

Route::get('/test/{id}/chien', [MyController::class, 'showAny']);

Route::get('/test/{id?}', [MyController::class, 'showAny']);

```

> [!Paramettre d'url]
> L'ordre des paramètres n'est pas important , c'est un tableau clef valeur qui nous est fournie. 


> [!Caution]
> Les paramètres /{id} sont interne à Laravel et peux se référencer partout dans la requête.
> >Ce ne sont pas des web parameter il n'ont pas la même syntaxe dans l'url. 
> 


	localhost:8000/test/9080

	localhost:8000/test/?id=9080


## Provider 

	Les provider sont des services. Ils se place avant toutes les autres system, ils démarent et configure les autres services.  


> [!APP service provider]
> Provider par défaut, il est vide pour montrer à quoi ressemble à provider. S'il l'on souhaite ajouter un fichier de service au niveau le plus bas du cycle de vie de Laravel il faudra passer par un provider de service. 
> > Avec <span style="color:#92d050">composer update</span> / <span style="color:#92d050">composer install</span> / <span style="color:#92d050">php artisan discover (auto)</span> / permettent la gestion des provider. Avec la commande <span style="color:#92d050">composer dump-autoload</span> pour identifier les providers. 

> [!Root service provider]
> Il index la liste des routes de l'application. A l'intérieur de ce fichier il y a une commande par fichier de route, il est facile d'en ajouter. 
> >Ce ficher sert a appelé / charger des fichiers 
>
> Il sera ainsi possible d'ajouter à l'appel du fichier un middleware pour l'authentification pour toutes les routes de ce fichier.


> [!Caution]
> Pour chaque ajout de nouveau fichier il faudra ajouter l'entrer dans le tableau http/middleware/kernel 


```php
Route::prefix('/user')
	->as('/user.')
	->middleware('auth')
	->group(function(){
		Route::get('/', [UsersControllers::class, 'index'])
		->name('index');
	});
```



> App/Provider/RouteServiceProvider

```php
    public function boot(): void

    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));


            // Route::middleware('web')
            //     ->group(base_path('routes/web.php'));


            Route::middleware('exo1')
            ->group(base_path('routes/exo1.php'));
        });

    }
```


> App/Http/Kernel

```php
    protected $middlewareGroups = [

        'web' => [

            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'exo1' => [
            \App\Http\Middleware\VerifyCsrfToken::class,
        ]
    ];
```




```php
redirect()->route('...');
redirect(route('name'));
```


> [!Gestion des Variable]
> dd() => permet d'arrêter le code en envoyant une réponse + afficher la réponse de manière visuel. 
> dump() => fait la même chose sans arrêter le code. 

