@extends('layout.home')




@section('title', 'Pokemons')
@section('page-title', 'Pokemons')

@section('content')

<div class=content>

    <form method="get" action="{{route('createPokemon')}}">
        @csrf
        <button>New</button>
    </form>

    <table class="table table-style">
        <tr>
            <th scope="col"> Race</th>
            <th scope="col">Age</th>
            <th scope="col">Element</th>
            <th scope="col">update</th>
        </tr>

        @foreach ($pokemons as $p)


            <tr>
                <td><a href="{{route('editPokemon', ['id' => $p->id])}}">{{$p->breed}}"</a></td>
                <td>{{$p->age}}</td>
                <td>{{$p->element}}</td>
                <td>{{$p->updated_at}}</td>
            </tr>

        @endforeach

    </table>
</div>

@endsection
