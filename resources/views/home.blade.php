@extends('layouts.app')

@section('content')
<div class="container">
    <example-component></example-component>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté !') }}

                    <task-lists-index></task-lists-index>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
