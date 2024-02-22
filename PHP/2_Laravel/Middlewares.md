---
sticker: emoji//1f595
---
[[Les bases de Laravel]]
	
	Les middlewares sont des actions qui se place générallement après les routes et qui font basiquement tout ce que l'on veux. En généralle on vérifie qu'une personne a bien le droit d'avoir accès à la ressource ou pour traiter la resource. 

	Il y a trois type de middleware, les globaux, les groups et les alias. Les deux derniers s'utilise exactement de la même manière avec la fonction middleware('toto')



Un _middleware_ est simplement une fonction de traitement de requête intermédiaire. En Laravel, on les trouves dans des classes qui ont une méthodes `handle(Request $request, Closure $next)`, qui prend donc en argument la requête à traiter et $next qui sert simplement à passer à l'étape suivante (appel du controlleur, un autre middleware, ...):


	App/http/kernel.php

![[Pasted image 20240220161101.png]]


![[Pasted image 20240220161137.png]]

![[Pasted image 20240220161213.png]]


	App/Providers/RouteServiceProvider.php

![[Pasted image 20240220161526.png]]





> [!abstract]
> Dans un <span style="color:#92d050">constructeur de Controlleur</span>, il peut être interressant de faire appel à certains middlewares. Notamment pour l'appel aux méthodes `only` et `except`, qui permettront de spécifier que le middleware doit être appelé uniquement pour une des méthodes de la classe (ou respectivement toutes les mothodes sauf celle spécifiée).


```php
public function __construct(){
	$this->middleware('test')->only(['index','store'])
}
```


