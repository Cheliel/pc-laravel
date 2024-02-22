@extends('layout.home')




@section('title', 'Pokemons')
@section('page-title', 'Pokemons')

@section('content')

<div class=content>


    <form id="monFormulaire" method="POST" action="{{route('updatePokemon', ['id' => $pokemon->id])}}">
        @csrf
        <input value="{{$pokemon->breed ?? ''}}" placeholder="Breed" type="text" name="Breed" >
        <br>
        <input value="{{$pokemon->age ?? ''}}" placeholder="Age" type="text" name="Age">
        <br>
        <input value="{{$pokemon->element ?? ''}}" placeholder="Element" type="text" name="Element">
        <br>
        <button type="submit">Save</button>
    </form>


    <form method="post" action="{{route('deletePokemon', ['id' => $pokemon->id])}}">
        @csrf
        <button>Delete</button>
    </form>

    @if($errs = $errors->all())
    <section class="errors">
    <ul>
        @foreach($errs as $err)
            <li>
               <span class="done"> Invalise {{ $err }} </span>
            </li>
        @endforeach
    </ul>
    </section>
    @endif

@endsection





