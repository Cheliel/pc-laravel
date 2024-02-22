---
sticker: emoji//1f991
---

[[Les bases de Laravel]]
	
	Les Providers sont les premiers system à s'exécuter. Ils manipulent le code au niveau le plus bas de Laravel. C'est le meilleurs endroit pour intégrer les fonctionnalités supplémentaire à Laravel. Par exemple ajouter une directive BLADE. 

	php artisan clear 

> [!abstract]
> Dans un Providers la fonction boot est appelé directement. 

> [!caution]
> Il faut absolument ajouter le provider dans la liste des provider appeler par l'applciation : config/app.php


```php
    public function boot(): void
    {
        $this->bladeDirective();
    }
    //$expression "'welcome', ['name' => 'Taylor']"
    
    public function bladeDirective(){
        Blade::directive('asset', function ($expression) {
            return "<?php mix($expression) ?>";
        });
        Blade::directive('route', function ($expression) {
            return "<?php echo e(route($expression)) ?>";
        });
        Blade::directive('debug', function ($expression) {
            return "<?php echo dd($expression) ?>";
        });
    }
```


```php
Blade::directive('isUrl', function ($expression) {

	return "<?php \Str::isUrl($expression) ?>";

});
```


```php
Blade::directive('isUrl', function ($expression) {

	return <<<EOF

	<?php

		foreach($expression as \$url){

			echo "<a href='\$url'>\$url</a> <br>

	?>

	EOF;

});

```



