@extends('layouts.app')

@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">
        {{ session()->get('success_message') }}
        </div>
    @endif

    <task-list-index :user="{{ Auth::user() }}" :task-lists="{{ Js::from($taskLists) }}" task-list-create-url="{{ route('task-list.create') }}"></task-list-index>
{{ $taskLists->links() }}
@endsection