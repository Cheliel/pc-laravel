---
sticker: emoji//1f3f3-fe0f-200d-1f308
---

[[Les bases de Laravel]]

> [!traduction]
> Ce system est très bien mais les erreurs sont auto généré et en angalis qui plus est. Pour corriger ce problème 


```shell
composer require --dev laravel-lang/common

php artisan lang add en fr de es

php artisan lang:updates
```

> [!Set langage]
> La fonction App::setLocale('fr') doit être lancer très tôt dans le cycle de vie de l'application et sert donc à définir la la langue 💃 par défaut proposé à l'utilisateur. 
> >Il est donc possible de crée un middleware de lang qui sera lancé. Pour le lancer au plus tôt on peut ajouter notre middleware à ceux lancer sur toutes les requêtes http. 


> [!Config]
> Le config/app.php permet d'écrire des constante de l'application, modulable avec des variable d'environnement. Il est possible d'y placer un tableau pour stocker les différentes langues géré par l'application


> [!abstract]
> La version JSON permet d'avoir une phrase en clef, si la clef n'est pas trouvé c'est la phrase en anglais qui est renvoyé. 
> >Les deux system cohabite

`code laravel`
```php
$text = lang("actions.accept"); // KEY => VALUE 

$text = lang('Connection closed without response'); // JSON
```

`coté view`

```php
__("Provider Name", [], 'fr') // JSON
```