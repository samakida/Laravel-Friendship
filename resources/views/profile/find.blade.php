@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Find Friend</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    <div class="row">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach ($allUsers as $user)
                            <div class="col-md-3">
                                <div class="img-thumbnail text-center">
                                    <a class="btn" role="button" href="{{ action('ProfileController@index', ['id' => $user->id]) }}">
                                        <strong>{{ $user->name }}</strong>
                                    </a>
                                    <img class="rounded-circle" src="{{ asset('img') }}/{{ $user->pic }}" alt="{{ $user->name }}" width="100%">
                                    <p>{{ $user->profile->city }} - {{ $user->profile->country }}</p>
                                    @if ($user->requested)
                                        Friend Request Sent
                                    @else
                                    <div class="form-group">
                                        {!! Form::open(['route' => 'addfriend']) !!}
                                        {!! Form::hidden('id', $user->id) !!}
                                        {!! Form::submit('Add Friend', ['class' => 'btn']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    @endif
                                </div>
                                <p>{{ $user->profile->about }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
