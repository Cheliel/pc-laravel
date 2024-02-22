@extends('layout.home')


@section('title', 'Pokemons')
@section('page-title', 'Pokemons')

@section('content')
<div class=content>


    <form id="monFormulaire" method="POST" action="{{route('storePokemon')}}">
        @csrf
        <input value="{{old('Breed')}}" placeholder="Breed" type="text" name="Breed" >
        <br>
        <input value="{{old('Age')}}" placeholder="Age" type="text" name="Age">
        <br>
        <input value="{{old('Element')}}" placeholder="Element" type="text" name="Element">
        <br>
        <button type="submit">Save</button>
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
</div>

@endsection


