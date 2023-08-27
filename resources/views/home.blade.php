@extends('layouts.app')

@section('content')
<div class="container">
    <task-list-index :user="{{ Auth::user() }}" :task-lists="{{ json_encode($taskLists) }}" task-list-create-url="{{ route('task-list.create') }}"></task-list-index>
</div>
@endsection