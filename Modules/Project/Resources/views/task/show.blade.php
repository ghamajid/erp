@extends('layouts.app_task', ['title' => $task->name])

@push('css_before')


@endpush

@section('content')
<task-details task_id="{{ $task->uuid }}"/>
</div>
@endsection


@push('js_before')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
@endpush

