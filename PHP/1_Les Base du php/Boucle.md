---
sticker: emoji//1f4c0
---
[[Les Base du PHP]]


> [!Boucle infinie]
> En cas de boucle infinie l'ensemble du moteur php ne plante pas,  même si l'on dépasse les capacité définie pour php. En effet, les appels  sont indépendant les uns des autres. La requête qui occasionne une boucle infinie mettra les autres requête en attends, puis sera coupé par l'os.  



> [!Continue & Break]
> Les instructions Continue est Break accepte une numérotation " break 3" pour remonter trois niveau. Ainsi la dernière boucle est capable couper la première boucle. Enfin Continue tout seul équivaut à Continue 1.

```php
	$lst = ['pomme', 'autre'];

	forEach($lst as $fruit){
		forEach($fruit as $elements){
			break 2;
		}
	}
```

