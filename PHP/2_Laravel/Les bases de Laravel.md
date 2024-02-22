---
sticker: emoji//1f9ec
---
[[PHP]]

Le framework Laravel a 10 version pour un peu plus de 10 d'expérience.  La plus grosse release est la version 5.5, elle apporte la majeurs partie des concepts encore utiliser aujourd'hui.


> [!Package Officel]
> Laravel fournie un ensemble de Package qui simplifie le développement comme des system d'authentification. 

> [!Monitoring]
> Laravel <span style="color:#92d050">Horizon</span> 

> [!Outils]
> Laravel <span style="color:#92d050">Telescope</span> contient les reuqêtes, les routines, les commandes, les logs, les dumps, les queries. 



> [!Invention]
> Il y a une personne initiateur/ createur du projet Laravel. Crée 2/3ans après Symphonie, Laravel est devenu très populaire depuis 2014 il est aujourd'hui le leader mondial. Le fonctionnement de Laravel est si bien pensé que d'autre framework dans d'autre langage copie ces principes. De plus, il est complètement open source et donc non géré par une entreprise. 


> [!Faiblesse]
> Sur le point de vu de la vitesse, Laravel a quelque problème de performance notament si on le commpare à node.js qui n'a dans sa racine que quelque fichier a charger. Ici Laravel comporte énormément de fonctionnalité ce qui ralentie sont processus bien qu'une application Laravel bien optimiser soit assez rapide pour la pluspart des usages. 


> [!Package]
> La version officiel des packages répondes à tous nos besoins en termes de développement. Ils sont toujours customisable bien qu'il faille un bon niveau technique pour y toucher. 


> [!Cycle de vie]
> Le ficher index.php est le point d'entré de toutes l'application. Après avoir démarer tout le system de l'application, on arrive au routes. Les routes reçoit des requêtes qui si elles sont valide sont envoyer vers les Controller qui gère toutes les entré et toutes les sorties. 




> [!Kernel]
> Coeur de l'application qui peut d'ailleurs <span style="color:#92d050">lancer autant d'application laravel que l'on souhaite</span>. 


> [!Maintenance]
> Pour activier laravel en mode de maintenace lancer la commande suivante, ouvrez un shell supplémentaire et lancez la commande : 


```bash
php artisan down 
php artisan up
```



## Gestionnaire de packet


> [!Composer]
> Installeur de Laravel, il sert à l'installation de celle-ci. le fichier <span style="color:#92d050">Composer.json</span> référence tout les packages et dépendances installer de base et ultérieurement. 
> Dans ce fichier il est aussi possible de modifier les variables de base de la norme <span style="color:#92d050">PSR-4</span> pour avoir un nom de classe en majuscule et un nom de dossier en minuscule, composer fera le mapping. 
> C'est aussi dans ce fichier que l'on gère les différentes commande pour lancer / compiler l'application. 








