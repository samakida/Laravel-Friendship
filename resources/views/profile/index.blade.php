@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-4">
                        Welcom to you profile

                        <img class="img-thumbnail" src="{{ asset('img') }}/{{ $user->pic }}" alt="{{ $user->name }}" width="100%">

                        <br>
                        @if (Auth::user()->id == $user->id)
                            {{ Form::open(array('route' => 'uploadephoto', 'files' => true)) }}
                            <div class="form-group">
                                {{ Form::file('image', ['class' => 'form-control-file']) }}
                                @if ($errors->has('image'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Save', ['class' => 'btn']) }}
                            </div>
                            {{ Form::close() }}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
