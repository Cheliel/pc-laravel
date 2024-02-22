---
sticker: emoji//1f30d
---
[[Les Base du PHP]]
# Informations

> [!SERVER INFO]
> PHP stock toutes les informations relative aux information envoyé par le server / nginx dans une variable globale appelé <span style="color:#92d050">$_SERVER</span>

- User agent (info sur le navigateur)
- Remote_ADDR (adress ip)
- Request_scheme (https/https)
- Script filename (ficher appelé par l'utilisateur)
- request_uri (url entré)

> [!User agent]
> La variable user agent donne des informations direct ou indirect. Direct car on peut connaitre l'os de l'ordinateur et indirect car le navigateur ne donne pas forcément son nom. Cependant, il est possible de déterminer le navigateur par l'absence ou la présence de certaines information transmise par le dis navigateur. 

> [!.htaccess]
> Apache autorise d'écrire des configurations depuis l'application sans passer  directement par apache. Le fichier<span style="color:#92d050"> .htaccess</span> peut être configuré pour que les erreurs 404 (url non valide) soit redirigé vers une page spécifique. 
> >Cela permet de faire un routage virtuel en PHP/ apache car .htaccess modifie la requête en entré : si tu ne trouve pas de fichier physique envoie tout à la <span style="color:#92d050">page de routage.</span>
> 
> Une fois sur cette page il est possible via la variable<span style="color:#92d050"> $_server </span>de récupéré l'url taper par l'utilisateur et ainsi d'exécuter le scripte php liée. Cette méthode permet de se passer des liens ainsi  www.wanado.fr restera identique où que l'on se trouve sur le site. 



> [!phpinfo()]
> Cette commande donne toutes <span style="color:#92d050">les informations disponibles sur notre instance de PHP</span>. Il donne la version du kernel et toutes les détails de la configuration PHP. Cela permet, si l'on a pas un accès physique à notre server de faire du débug à partir de ces informations. 


# Les requêtes


HTTP : 
- VERB + URL 
- HEADER
- BODY



> [!_GET]
> Content

```php
$name = $_GET['name'] ?? null;
if(empty($name)){
	echo 'fill yo\' name dude';
}
```


> [!_post]
> Quand on traite un formulaire un prb surviens. On réaffiche une page depuis notre requet POST. Ainsi, l'utilisateur s'il recharge la page, le navigateur va lui demander de renvoyer le fomrulaire. On éviter celà, il ne faut jamais renvoyer une page html depuis une requet POST mais seulement depuis une requet GET. C'est pourquoi il faut rediriger l'utiliser vers une page <span style="color:#92d050">$_GET</span> avec la fonction <span style="color:#92d050">header()</span>
> 


> [!Post]
> Un fichier PHP qui a reçut une requête POST ne doit jamais renvoyer une page HTML. Il faut faire une <span style="color:#92d050">redirection via la méthode header() vers une page GET</span>. Cela pour une erreur comme une réussite 


> [!warning]
> Quand un ficher PHP recevant une requête POST envoie du HTML et que l'utilisateur rafraichie la page, le navigateur demande si l'utilisateur veux renvoyer le formulaire.
> >Ce type de comportement inattendu entraine des duplicata ainsi qu'une mauvais expérience utilisateur.   

```php
$name = $_POST['name'] ?? null;
if(empty($name)){
	echo 'fill yo\' name dude'; //don't do that !
}



<form action="" method="POST">
    <input type="text" name="name">
    <button type="submite">Send</button>
</form>

```

### Code de correction pour POST 

> [!caution]
> La méthode header() renvoie toujours vers une page GET

```php
if($_SERVER['REQUEST_METHODE'] === 'POST'){

    $name = $_POST['name'] ?? null;
    header('Location: /index.php'.urlencode($errors));
}
```

> [!.urlencode()]
> Si l'utilisateur a fait une erreur dans la saisie de son formulaire, il faut préparer le message d'erreur et <span style="color:#92d050">l'envoyer dans l'url de la page GET que l'on va renvoyer</span>. Dans cette nouvelle page il sera possible d'afficher le message d'erreur à notre convenance. 
> 
> >Cette méthode permet aussi de rediriger l'utilisateur vers une page identique mais en GET et non en POST 


```php
if($_SERVER['REQUEST_METHODE'] !== 'GET'){
	header('Location: /index.php'.urlencode($_SERVER['REQUEST_URI']));
}
```


> [!warning]
> Une redirection n'arrêt pas le code , il est donc important de stopper le code avec la fonction <span style="color:#92d050">exit()</span> quand on fait une redirection.

> [!champ absent]
> Lors qu'il manque un champ dans un formulaire il est possible d'invalider la requête et de rediriger vers une page GET. Avec les erreurs il est possible d'envoyer les informations préalablement saisie dans l'url.


```php
    $redirectTo = '/index.php';
    $name = $_POST['name'] ?? null;

    if(empty($name)){
        header(
            'location: '.$redirectTo
            .'?message='
            .urlencode($data));
        exit();
    }
```

> [!Les Fichiers]
> il faut ajouter un attribue file à notre formulaire qui nous permet l'utilisation d'un nouveau type d'input. Ce fichier sera récupéré via le mot clef <span style="color:#92d050">$_FILE</span>. 
> >A noté que ce n'est pas le fichier qui est transmit par $_FILE ce sont le chemin d'accès sur le server, le type et la taille. 



```php
<form action="" method="POST" >
    <input type="text" name="name">
    <button type="submite">Send</button>
</form>
```

Pour utiliser ma variable Fichier il faudra vérifier : 

- Variable non null 
- Error === 0 
- Size === 0 (fichier upload mais vide, taille trop grande, type non définie)
- utiliser la fonction <span style="color:#92d050">move_uploaded_file()</span>



# Les Cookies 


	Les cookies ont d'abord été très bien utilisé bien que les navigateur ne les ont jamais aimé. Un premier problème est que des server ont déjà stocker de la data chez le client, on utilise l'espace de stockage des clients pour économiser de la place server (a l'ancienne). D'un point de vu sécurité beaucoup d'information on été stocker de manière très peu sécurisé. 

- Cookie de Session 
- Cookie de confort 
- Cookie tracking & publicitaire 


> [!Good practice]
> Les cookies de confort sont de plus en plus enregistré coté Back-end pour amélioré la persistance entre les différents appareil de l'utilisateur. 


> [!$_COOKIE]
> La variable <span style="color:#92d050">$_COOKIE </span>contient l'enssemble des clefs valeurs représentant tout les COOKIES de l'utilisateur pour cette page. Pour modifier un COOKIE il est essentiel de passer par la fonction setcookie(). En effet, notre variable cookie n'est qu'une copie, bien qu'il soit possible de la modifier directement en PHP, les modification se seront pas effective. 


> [!caution]
> L'unique moyen de modifier les COOKIE est de passer par la méthode setcookie() qui effectue : C<span style="color:#c00000">~~R~~</span>UD

```php
$locale = $_COOKIE['locale'];

setcookie('locale', $val, time() + (3600 * 24 * 30));

setcookie('locale', '', 1);
```

> [!UNIX timestamps]
> A partir de la date de création de UNIX le 01/01/1970 00:00:00, donne le nombre de seconde entre la date actuel et cette date.


# Session 


> [!Différence entre les cookies et les sessions]
> Une Session est géré coté server. Lorsqu'un utilisateur a une session, il possède un cookie de session, init by session_start(). Le server va géré de son côté la session de l'utilisateur et nous permettre d'y accéder par la variable de session, <span style="color:#92d050">en faisant le liens grâce au cookie de session.</span>
> >La variable de session est directement modifiable. Le tableau que l'on manipule est le tableau qui sera enregistré la fin de la manipulation

<span style="color:#002060">
</span>
```php
//start session

if(!isset($_SESSION)){

    session_start();

}  

//si il n'y a pas un cookie de ssesion, il en crée un

setcookie('PHPSESSID', $id);

$_SESSION = [];  

//s'il y a un cookie de session, il l'utilise
$_SESSION = [

    '...' => '...',

];
```


> [!Suppression]
> Content

