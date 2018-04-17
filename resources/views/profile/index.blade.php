@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                        <div class="col-md-4 text-center">
                            <div class="img-thumbnail">
                                <img class="rounded-circle" src="{{ asset('img') }}/{{ $user->pic }}" alt="{{ $user->name }}" width="100%">
                                {{ ucwords($user->gender) }}<br>
                                {{ $user->profile->city }} - {{ $user->profile->country }}<br>
                                @if (Auth::user()->id == $user->id)
                                    <a href="{{ route('editprofile') }}"><button type="button" class="btn">Edit Profile</button></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">About</h5>
                                <p class="card-text">{{ $user->profile->about }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
