---
sticker: emoji//1f4aa
---

`php artisan make:model  -mcr`

`Lib for models`
https://github.com/barryvdh/laravel-ide-helper


> [!Abstract]
> Il fichier model n'est pas obligé d'être remplit pour fonctionner. Il suffie d'étendre la classe Model et d'appeler sa classe avec le même nom que la Table.

> [!caution]
> Le nom de la classe ne comporte pas de S mais la table dans la BDD a toujours un S, c'est la convention de nommage. 


`enregistrement d'une données dans la BDD`
```php
$pokemon = new Pokemon();
$pokemon->bread = $request->bread;
$pokemon->save();
```



`enregistrement d'une image dans la BDD locale`
```php
$picture = $request->file('picture');

if($picture and $picture->isValide()){
	$pictureName = \Str::random(32).'.'.$picture->getClientOriginalExtension();
	$picturePath = 'pokemon/'.$pictureName;
	Storage::putFileAs('pokemons', $picture, $picturePath); // default drive local
	$pokemon->picture_path = $picturePath;
 }
```


```php
$pokemon = Pokemon::fin($id);
$pokemon->save();
$pokemon->selete();
```



```php
Pokemon::insert([
'buying_price' => 0
]);

Pokemon::where('id', 1)->update(['buying_price' => 0, 'quantity' => 0]);
```


## Mode Factory 


> [!abstract]
> Définie comment la BDD sera remplit, les fonction a appeler pur chaque champ. 

```php
class Pokemon extends Model
{
    use HasFactory; // important
    protected $table = "Pokemons";
}
```

`php artisan make:factory`


```php
    public function definition(): array
    {
        return [
            'breed' => fake()->name(),
            'element' => 'Feu',
            'label' => fake()->randomElement(config(pokemons.name))
            'age' => random_int(16, 116),
            'provider_email' => fake()->unique->safeEmail(),
            'picture_path' => fake()->filePath(),
            'description' => fake()->realText(),
            'created_at'=> $now = now(),
            'updated_at' => $now,
        ];
    }
}
```


## Seeder


> [!abstract]
> Appel les fichiers de fake & remplissage des données


`Création des données de fake`
```php
public function run(): void
{
	$user = User::Factory()->createOne();
	Pokemon::factory()->count(36)->create([
		'user_id' => $user->id
	]);
}
```


`Appel de nos seeder : database/seeder/databaseSeeder.php`
```php
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        if(!app()->environment(('production'))){
            $this->call(PokemonSeeder::class);
        }
    }
```

`php artisan make:seeder`

`php artisan migrate:fresh --seed`



## Pagination



```php
public function listPokemon(){
	return view('pokemons.listePokemon',  ['pokemons' => Pokemon::paginate(15)]);   
}

public function listP(Request $request){
	$query = Pokemon::query();
	if(null != $request->quantity){
		$query->where('qauntity', '>', $request->quantity)
	}
	return view('pokemons.listePokemon',  ['pokemons' => $query->paginate(15)]);  
}

```


## Select




```php
$pok = Pokemon::all()->first();

$pok = Pokemon::where('element', '=', 'Feu')->get(['champ1', 'champ2']);

// simule les parentèses autour des 2 premier where
$pok = Pokemon::where(function($query) use ($request){
	$query->where('element', '=', 'Feu') 
		->where('age', '>', 20);
})
->orWhere('age', '<', 20)
->limit(100)->get();

//observer la forme de la requête final 
$pok->toSQL()
```

- [ ] GET - renvoie tout
- [ ] Limit - 
- [ ] First 


`Fonction de bar de recherche`
```php
public function searchBar(Request $request){
	$query = Pokemon::query();
	$searchText = $request->seachtexh;
	if($searchText){
		$query->where(function($query) use ($searchText){
			foreach(['champ1', 'champ2', 'champ3'] as $col){
				$query->orWhere(
					$col, 'like', '%'.$searchText.'%'
				);
			}
		});
	}
	return view('pokemons.listePokemon', ['pokemons' => $query->paginate(15)]);
}
```


## Laravel foreigne key 




```php
        $users = User::all();
        $users->get(0)->pokemons;
        $users->get(1)->pokemons;
        $users->get(2)->pokemons;



        $users = User::with(['pokemons'])->get();
        $users = User::with(['pokemons:id, user_id, label'])->get(0);
        $users->get(0)->pokemons;
```