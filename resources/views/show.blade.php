@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {{ $commandant->name }}
                        {{ $commandant->lasers }}
                        <ul>
                        @foreach($commandant->stars as $star)
                            <li>{{ $star->name }}</li>
                        @endforeach
                        </ul>
                    </div>
                    <table class="table table-bordered table-stars">
                        <tr>
                            <td><br>{{ isset($nearStars[0]->name) ? $nearStars[0]->name : 'Void' }} @if (isset($nearStars[0]->name)) <br><button><a href="#" >Rejoindre</a></button> @endif</td>
                            <td><br>{{ isset($nearStars[1]->name) ? $nearStars[1]->name : 'Void' }} @if (isset($nearStars[1]->name)) <br><button>Rejoindre</button> @endif</td>
                            <td><br>{{ isset($nearStars[2]->name) ? $nearStars[2]->name : 'Void' }} @if (isset($nearStars[2]->name)) <br><button>Rejoindre</button> @endif</td>
                        </tr>
                        <tr>
                            <td><br>{{ isset($nearStars[3]->name) ? $nearStars[3]->name : 'Void' }} @if (isset($nearStars[3]->name)) <br><button>Rejoindre</button> @endif</td>
                            <td><br><br>{{ isset($nearStars[4]->name) ? $nearStars[4]->name : 'Void' }} <br></td>
                            <td><br>{{ isset($nearStars[5]->name) ? $nearStars[5]->name : 'Void' }} @if (isset($nearStars[5]->name)) <br><button>Rejoindre</button> @endif</td>
                        </tr>
                        <tr>
                            <td><br>{{ isset($nearStars[6]->name) ? $nearStars[6]->name : 'Void' }} @if (isset($nearStars[6]->name)) <br><button>Rejoindre</button> @endif</td>
                            <td><br>{{ isset($nearStars[7]->name) ? $nearStars[7]->name : 'Void' }} @if (isset($nearStars[7]->name)) <br><button>Rejoindre</button> @endif</td>
                            <td><br>{{ isset($nearStars[8]->name) ? $nearStars[8]->name : 'Void' }} @if (isset($nearStars[8]->name)) <br><button>Rejoindre</button> @endif</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection