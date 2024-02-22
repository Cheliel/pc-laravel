---
sticker: emoji//1f4d1
---
[[Les bases de Laravel]]


`shell laragon`
```shell
mysql -uroot -p
show databases;
CREATE DATABASE laravel;
use laravel
```

> [!.env]
> Le fichier .env se trouve à la racine de l'application. Il contient tout un tas de variable et de configuration comme un marquer pour dire à laravel de se compiler en mode de production. 
> >Pour accéder aux variable du .env il faut utiliser la fonction env('key), par défaut cette méthode ne renvoie pas d'erreur si  la valeur est vide. 

> [!caution]
> Il ne faut pas utiliser les variables d'environnement directement. En mode de production les variables du .env ne serons pas accessible. 
> > Le seul endroit où les variable d'environnement sont autorisé c'est le dossier de configuration. 
>

> [!caution]
> Toute information sensible ne doit pas être écrit en clair dans le fichier de configuration. Il faut absolument les écrire dans le .env et les utiliser en les appelant par leur clef dans les fichier de conf. 




```php
config('fileName.key')
env('key')
```


- [ ] APP-key 
- [ ] APP_DEBUG // page d'erreur
- [ ] log-channel // change fichier de log (fréquence)
- [ ] DB


php artisan migrate:status



## Migration 

	ce sont des fichiers qui vont ajouter et supprimer la structure d'une BDD et les donné de test qui sont dedans. Le principe est de pouvoir monter et démonter aussi souvent qu'on le soutaite une BDD. 

### Syntaxe 


```php
Schema::create('users', function(Blueprint $table){ // table pour une modification
            $table->id();
            $table->string('name', 255); 
            $table->text('name2'); // espace mémoire dynamique 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps(); // create_at + update_at
})
```

> [!caution]
> string n'est pas un type SQL c'est une variable php, l'intérêt est d'écrire le même code pour n'importe quel type de BDD. 

> [!caution]
> Attention une fois en production les fichiers ne migration ne doivent plus changer, notament le nom pour qu'il soit reconnu par le system. La seul manière de changer le nom d'un ficher de migration est migrate down depuis le début, ce qui est pour des raison évidente" impossible à faire en production.



```shell
php artisan migration table

php artisan make:migration create_users_table

php artisan migrate

php artisan migrate:reset // utilise migration down

php artisan migrate:refresh

php artisan migrate:fresh // drétruit les tables en ignorant les foreignKey
```

	
> [!concept]
> Dans les concepts Un ficher de migration = une table. Quand on fait de la modification on peut modifier plusieurs table en même temps. 


	
## Eloquent 



> [!caution]
> Les modèles sont toujours au singulier et les tables au pluriel. Le modèle est un représentant de la données. Laravel définie tout seul le nom de la table en faisaient Nom -> nom - noms. 
> 

	Il est aussi possible de enseigner le nom de la table 
```php
protected $table = "users"
```





