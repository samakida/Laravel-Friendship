@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                        <div class="col-md-4">
                            <div class="img-thumbnail text-center">
                                <img class="rounded-circle" src="{{ asset('img') }}/{{ $user->pic }}" alt="{{ $user->name }}" width="100%">
                                {{ $user->profile->city }} - {{ $user->profile->country }}
                                {!! Form::open(array('route' => 'uploadephoto', 'files' => true)) !!}
                                    <div class="form-group">
                                    {!! Form::label('image', 'Change Photo') !!}
                                    {!! Form::file('image', ['class' => 'form-control-file']) !!}
                                    @if ($errors->has('image'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="text-right">
                                        {!! Form::submit('Upload', ['class' => 'btn']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Update Profile</h5>
                                {!! Form::open(array('route' => 'editprofile')) !!}
                                <div class="form-group">
                                    {!! Form::label('city', 'City Name') !!}
                                    {!! Form::text('city', $user->profile->city, ['class' => 'form-control', 'placeholder' => 'City Name']) !!}
                                    {!! Form::label('country', 'Country Name') !!}
                                    {!! Form::text('country', $user->profile->country, ['class' => 'form-control', 'placeholder' => 'Country Name']) !!}
                                    {!! Form::label('about', 'About') !!}
                                    {!! Form::textarea('about', $user->profile->about, ['class' => 'form-control', 'rows' => '3']) !!}
                                </div>
                                <div class="text-right">
                                    {!! Form::submit('Update', ['class' => 'btn']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
