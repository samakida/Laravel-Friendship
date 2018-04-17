@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Requests</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($friendship as $user)
                    <div class="row">
                        <div class="col-3">
                            <div class="img-thumbnail text-center">
                                <img class="rounded-circle" src="{{ asset('img') }}/{{ $user->pic }}" alt="{{ $user->name }}" height="80px">
                            </div>
                        </div>
                        <div class="col-6">
                            <h3><a href="{{ action('ProfileController@index', ['id' => $user->id]) }}">
                                <strong>{{ $user->name }}</strong>
                            </a></h3>
                            <strong>Gende: </strong>{{ ucwords($user->gender) }}<br>
                            <strong>Email: </strong>{{ $user->email }}
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {{-- {!! Form::open(['route' => 'addfriend']) !!} --}}
                                {{-- {!! Form::hidden('id', $user->id) !!} --}}
                                {!! Form::submit('Confirm', ['class' => 'btn']) !!}
                                {{-- {!! Form::close() !!} --}}
                            </div>
                        </div>
                    </div><hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
