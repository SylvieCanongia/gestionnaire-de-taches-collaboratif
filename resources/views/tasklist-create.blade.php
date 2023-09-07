@extends('layouts.app')

@section('content')
<div class="container">
    <task-list-form form-title="Créer une liste de tâches" button-submit-label="Créer" form-submit-method="post" form-submit-route="{{ route('task-list.store') }}" :errors="{{ $errors }}"></task-list-form>
</div>
@endsection
