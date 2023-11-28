@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}

                        <div class="float-right">
                            <a href="{{ url('projects') }}" class="btn btn-primary ml-1">
                                Projetos
                            </a>
                        </div>
                        <div class="float-right">
                            <a href="{{ url('conferences') }}" class="btn btn-primary">
                                Conferencias
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
