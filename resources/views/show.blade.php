@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-12 ">
            @if (Session::has('moved'))
                <div class="flash alert-info">
                    <p>{{ Session::get('moved') }}</p>
                </div>
            @endif

            {{ $commandant->name }} // Position x : {{ $commandant->x_position }} -
            Position y : {{ $commandant->y_position }}

            <div class="panel-body">
                <table class="table table-bordered table-stars">
                    <tr>
                        <td>
                            <br>{{ isset($nearStars[0]->name) ? $nearStars[0]->name : 'Void' }} @if (isset($nearStars[0]->name))
                                <br> <a href="{{ url('/moving/North-West') }}">Rejoindre</a>  @endif</td>
                        <td>
                            <br>{{ isset($nearStars[1]->name) ? $nearStars[1]->name : 'Void' }} @if (isset($nearStars[1]->name))
                                <br><a href="{{ url('/moving/North') }}">Rejoindre</a> @endif</td>
                        <td>
                            <br>{{ isset($nearStars[2]->name) ? $nearStars[2]->name : 'Void' }} @if (isset($nearStars[2]->name))
                                <br>
                                <button><a href="{{ url('/moving/North-East') }}">Rejoindre</a></button> @endif</td>
                    </tr>
                    <tr>
                        <td>
                            <br>{{ isset($nearStars[3]->name) ? $nearStars[3]->name : 'Void' }} @if (isset($nearStars[3]->name))
                                <br>
                                <button><a href="{{ url('/moving/West') }}">Rejoindre</a></button> @endif</td>
                        <td><br><br>{{ isset($nearStars[4]->name) ? $nearStars[4]->name : 'Void' }} <br></td>
                        <td>
                            <br>{{ isset($nearStars[5]->name) ? $nearStars[5]->name : 'Void' }} @if (isset($nearStars[5]->name))
                                <br>
                                <button><a href="{{ url('/moving/East') }}">Rejoindre</a></button> @endif</td>
                    </tr>
                    <tr>
                        <td>
                            <br>{{ isset($nearStars[6]->name) ? $nearStars[6]->name : 'Void' }} @if (isset($nearStars[6]->name))
                                <br>
                                <button><a href="{{ url('/moving/South-West') }}">Rejoindre</a></button> @endif</td>
                        <td>
                            <br>{{ isset($nearStars[7]->name) ? $nearStars[7]->name : 'Void' }} @if (isset($nearStars[7]->name))
                                <br><a href="{{ url('/moving/South') }}">Rejoindre</a> @endif</td>
                        <td>
                            <br>{{ isset($nearStars[8]->name) ? $nearStars[8]->name : 'Void' }} @if (isset($nearStars[8]->name))
                                <br>
                                <button><a href="{{ url('/moving/South-East') }}">Rejoindre</a></button> @endif</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 bg-info">
                <table class="table table-hover table-condensed">
                    {!! Form::open(array('method' => 'post', 'route' => 'order.store')) !!}

                    <th>Nom</th>
                    <th>Hommes</th>
                    <th>Lasers</th>
                    <th>Type</th>
                    <th>Population</th>
                    <th>Status</th>
                    <th>Commandant</th>
                    <th>Type</th>
                    <th>Hommes</th>
                    <th> Lasers </th>
                    {{ Form::text('commandant_id', $commandant->id, ['hidden' => 'hidden']) }}
                    @foreach($nearStars as $star)
                        <tr>
                            <td>{{ $star->name }}</td>
                            <td>{{ $star->men }}</td>
                            <td>{{ $star->lasers }}</td>
                            <td>{{ $star->type }}</td>
                            <td>{{ $star->population }}</td>
                            <td>{{ $star->status }}</td>
                            <td>{{ $star->commandant_id }}</td>

                            @if ($star['attack'])

                                <td>{{ Form::text('star[]', $star->id, ['hidden' => 'hidden']) }}{{ Form::select('type[]', ['A' => 'Attack', 'D' => 'Defense'], $star['attack']['type']) }}</td>
                                <td>{{ Form::text('men[]', $star['attack']['men'], ['class' => 'form-control']) }}</td>
                                <td>{{ Form::text('lasers[]', $star['attack']['lasers'], array('class' => 'form-control')) }}</td>
                            @else
                                <td>{{ Form::text('star[]', $star->id, ['hidden' => 'hidden']) }}{{ Form::select('type[]', ['A' => 'Attack', 'D' => 'Defense']) }}</td>
                                <td>{{ Form::text('men[]', 0, ['class' => 'form-control']) }}</td>
                                <td>{{ Form::text('lasers[]', 0, array('class' => 'form-control')) }}</td>
                            @endif

                        </tr>
                    @endforeach
                    {!! Form::submit('Valider', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                </table>
            </div>
            <div class="col-md-1 bg-warning">
            </div>
            <div class="col-md-4 bg-info">
                <table class="table table-hover table-condensed ">
                    {!! Form::open(array('method' => 'post', 'route' => 'orderMission.store')) !!}
                    <th>Type</th>
                    <th>Navettes</th>
                    {{ Form::text('commandant_id', $commandant->id, ['hidden' => 'hidden']) }}
                    @foreach($nearStars as $star)
                        <tr>
                            @if ($star['mission'])

                                <td>{{ Form::text('star[]', $star->id, ['hidden' => 'hidden']) }}{{ Form::select('type[]', ['C' => 'Commerce', 'P' => 'Pillage'], $star['mission']['type']) }}</td>
                                <td>{{ Form::text('ships[]', $star['mission']['ships'], ['class' => 'form-control']) }}</td>

                            @else
                                <td>{{ Form::text('star[]', $star->id, ['hidden' => 'hidden']) }}{{ Form::select('type[]', ['C' => 'Commerce', 'P' => 'Pillage']) }}</td>
                                <td>{{ Form::text('ships[]', 0, ['class' => 'form-control']) }}</td>

                            @endif

                        </tr>
                    @endforeach
                    {!! Form::submit('Mission', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                </table>
            </div>
            <div class="col-md-1 bg-success">
                <table class="table table-hover table-condensed">
                    {{ Form::text('commandant_id', $commandant->id, ['hidden' => 'hidden']) }}
                    @foreach($nearStars as $star)
                        <tr>
                            @if ($star['mission'])
                                <td>
                                    {!! Form::open(array('method' => 'DELETE', 'route' => ['orderMission.destroy', $star['mission']['id']])) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                    {!! Form::close() !!}
                                </td>
                           @else
                                <td></td>
                           @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 bg-success">

                {{ form::open(array('method' => 'post', 'route' => 'orderBuy.store')) }}
                {{ Form::text('commandant_id', $commandant->id, ['hidden' => 'hidden']) }}
                {{ Form::label('men', 'Hommes') }}
                {{ Form::text('men', $nearStars['buy']['men']) }}
                {{ Form::label('lasers', 'Lasers') }}
                {{ Form::text('lasers', $nearStars['buy']['lasers']) }}
                {{ Form::label('ships', 'Navettes') }}
                {{ Form::text('ships', $nearStars['buy']['ships']) }}
                {{ Form::label('robots', 'Robots') }}
                {{ Form::text('robots', $nearStars['buy']['robots']) }}
                {{ Form::label('missiles', 'Missiles') }}
                {{ Form::text('missiles', $nearStars['buy']['missiles']) }}
                {{ Form::submit('Valider') }}

            </div>
        </div>
    </div>
                {{--<?php--}}
                {{--$north = array(); $north["id"] = $commandant->id; $north["direction"] = "north"; $north["star"] = $nearStars[1]->name; $northJson = json_encode($north);--}}
                {{--$south = array(); $south["id"] = $commandant->id; $south["direction"] = "south"; $south["star"] = $nearStars[7]->name; $southJson = json_encode($south);--}}
                {{--?>--}}
                {{--<a href="{{ url('/movingJson/' . $northJson) }}">North</a>--}}
                {{--<a href="{{ url('/movingJson/' . $southJson) }}">South</a>--}}

@endsection