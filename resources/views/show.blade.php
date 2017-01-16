@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="panel-body">
            @if (Session::has('moved'))
            <div class="flash alert-info">
                <p>{{ Session::get('moved') }}</p>
            </div>
        @endif
                </div>
        {{--@if ($messages->any())--}}
        {{--@foreach($messages as $message)--}}
        {{--{{ $error }}--}}
        {{--@endforeach--}}
        {{--@endif--}}

        {{ $commandant->name }} // Position x : {{ $commandant->x_position }} -
        Position y : {{ $commandant->y_position }}

            <div class="panel-body">
        <table class="table table-bordered table-stars">
            <tr>
                <td><br>{{ isset($nearStars[0]->name) ? $nearStars[0]->name : 'Void' }} @if (isset($nearStars[0]->name))
                        <br> <a href="{{ url('/moving/North-West') }}">Rejoindre</a>  @endif</td>
                <td><br>{{ isset($nearStars[1]->name) ? $nearStars[1]->name : 'Void' }} @if (isset($nearStars[1]->name))
                        <br><a href="{{ url('/moving/North') }}">Rejoindre</a> @endif</td>
                <td><br>{{ isset($nearStars[2]->name) ? $nearStars[2]->name : 'Void' }} @if (isset($nearStars[2]->name))
                        <br>
                        <button><a href="{{ url('/moving/North-East') }}">Rejoindre</a></button> @endif</td>
            </tr>
            <tr>
                <td><br>{{ isset($nearStars[3]->name) ? $nearStars[3]->name : 'Void' }} @if (isset($nearStars[3]->name))
                        <br>
                        <button><a href="{{ url('/moving/West') }}">Rejoindre</a></button> @endif</td>
                <td><br><br>{{ isset($nearStars[4]->name) ? $nearStars[4]->name : 'Void' }} <br></td>
                <td><br>{{ isset($nearStars[5]->name) ? $nearStars[5]->name : 'Void' }} @if (isset($nearStars[5]->name))
                        <br>
                        <button><a href="{{ url('/moving/East') }}">Rejoindre</a></button> @endif</td>
            </tr>
            <tr>
                <td><br>{{ isset($nearStars[6]->name) ? $nearStars[6]->name : 'Void' }} @if (isset($nearStars[6]->name))
                        <br>
                        <button><a href="{{ url('/moving/South-West') }}">Rejoindre</a></button> @endif</td>
                <td><br>{{ isset($nearStars[7]->name) ? $nearStars[7]->name : 'Void' }} @if (isset($nearStars[7]->name))
                        <br><a href="{{ url('/moving/South') }}">Rejoindre</a> @endif</td>
                <td><br>{{ isset($nearStars[8]->name) ? $nearStars[8]->name : 'Void' }} @if (isset($nearStars[8]->name))
                        <br>
                        <button><a href="{{ url('/moving/South-East') }}">Rejoindre</a></button> @endif</td>
            </tr>
        </table>
</div>
            <div class="panel-body">
        <table class="table table-hover table-condensed">
            <th>Nom</th>
            <th>Hommes</th>
            <th>Lasers</th>
            <th>Type</th>
            <th>Population</th>
            <th>Status</th>
            <th>Commandant</th>
            @foreach($commandant->stars as $star)
                <tr>
                    <td>{{ $star->name }}</td>
                    <td>{{ $star->men }}</td>
                    <td>{{ $star->lasers }}</td>
                    <td>{{ $star->type }}</td>
                    <td>{{ $star->population }}</td>
                    <td>{{ $star->status }}</td>
                    <td>{{ $star->commandant_id }}</td>
                </tr>
            @endforeach
        </table>
</div>
        <?php
        $north = array(); $north["id"] = $commandant->id; $north["direction"] = "north"; $north["star"] = $nearStars[1]->name; $northJson = json_encode($north);
        $south = array(); $south["id"] = $commandant->id; $south["direction"] = "south"; $south["star"] = $nearStars[7]->name; $southJson = json_encode($south);
        ?>
        <a href="{{ url('/movingJson/' . $northJson) }}">North</a>
        <a href="{{ url('/movingJson/' . $southJson) }}">South</a>
        </div>
        </div>
        </div>
@endsection