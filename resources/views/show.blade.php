@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {{--@if (Session::has('message'))--}}
                            {{--<div class="flash alert-info">--}}
                                {{--<p>{{ Session::get('message') }}</p>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        @if ($messages->any())
                            @foreach($messages as $message)
                                {{ $error }}
                            @endforeach
                        @endif

                        {{ $commandant->name }} // Position x : {{ $commandant->x_position }} -
                        Position y : {{ $commandant->y_position }}

                    </div>
                    <table class="table table-bordered table-stars">
                        <tr>
                            <td><br>{{ isset($nearStars[0]->name) ? $nearStars[0]->name : 'Void' }} @if (isset($nearStars[0]->name)) <br><button> <a href="{{ url('/moving/North-West') }}">Rejoindre</a> </button> @endif</td>
                            <td><br>{{ isset($nearStars[1]->name) ? $nearStars[1]->name : 'Void' }} @if (isset($nearStars[1]->name)) <br><button><a href="{{ url('/moving/North') }}">Rejoindre</a></button> @endif</td>
                            <td><br>{{ isset($nearStars[2]->name) ? $nearStars[2]->name : 'Void' }} @if (isset($nearStars[2]->name)) <br><button><a href="{{ url('/moving/North-East') }}">Rejoindre</a></button> @endif</td>
                        </tr>
                        <tr>
                            <td><br>{{ isset($nearStars[3]->name) ? $nearStars[3]->name : 'Void' }} @if (isset($nearStars[3]->name)) <br><button><a href="{{ url('/moving/West') }}">Rejoindre</a></button> @endif</td>
                            <td><br><br>{{ isset($nearStars[4]->name) ? $nearStars[4]->name : 'Void' }} <br></td>
                            <td><br>{{ isset($nearStars[5]->name) ? $nearStars[5]->name : 'Void' }} @if (isset($nearStars[5]->name)) <br><button><a href="{{ url('/moving/East') }}">Rejoindre</a></button> @endif</td>
                        </tr>
                        <tr>
                            <td><br>{{ isset($nearStars[6]->name) ? $nearStars[6]->name : 'Void' }} @if (isset($nearStars[6]->name)) <br><button><a href="{{ url('/moving/South-West') }}">Rejoindre</a></button> @endif</td>
                            <td><br>{{ isset($nearStars[7]->name) ? $nearStars[7]->name : 'Void' }} @if (isset($nearStars[7]->name)) <br><button><a href="{{ url('/moving/South') }}">Rejoindre</a></button> @endif</td>
                            <td><br>{{ isset($nearStars[8]->name) ? $nearStars[8]->name : 'Void' }} @if (isset($nearStars[8]->name)) <br><button><a href="{{ url('/moving/South-East') }}">Rejoindre</a></button> @endif</td>
                        </tr>
                    </table>

                    <div class="panel-body">

                        {{ $commandant->lasers }}

                        <ul>
                            @foreach($commandant->stars as $star)
                                <li>{{ $star->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection