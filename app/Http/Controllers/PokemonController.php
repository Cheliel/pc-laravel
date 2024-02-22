<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poks = Pokemon::all();
        return view('listPokemon', ['pokemons' =>$poks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createPokemon');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Element' => Rule::in(config('elements')),
            'Age' => 'gt:15',
            'Breed'=> 'min:1'
        ]);

        $pok = new Pokemon();
        $pok->breed = $request->Breed;
        $pok->element = $request->Element;
        $pok->age = $request->Age;
        $pok->user_id = 1;
        $pok->save();
        return to_route('listPokemon');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $pok = Pokemon::Where('id',  '=', $request->id)->first();
        return view('updatePokemon', ["pokemon" => $pok]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'Element' => Rule::in(config('elements')),
            'Age' => 'gt:15',
            'Breed'=> 'min:1'
        ]);

        // dd($request->Element);

        $pok = Pokemon::Where('id',  '=', $request->id)->first();
        $pok->element = $request->Element;
        $pok->breed = $request->Breed;
        $pok->age = $request->Age;

        $pok->save();
        $poks = Pokemon::all();
        return to_route('listPokemon');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Pokemon::destroy($request->id);
        return to_route('listPokemon');
    }
}
