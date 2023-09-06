@extends('layouts.app')

@section('content')
    <task-list-index :user="{{ Auth::user() }}" :task-lists="{{ Js::from($taskLists) }}" task-list-create-url="{{ route('task-list.create') }}"></task-list-index>
{{ $taskLists->links() }}
@endsection