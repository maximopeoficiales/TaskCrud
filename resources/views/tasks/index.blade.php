@extends('layouts.app'){{-- hereda de layouts --}}
@section('content'){{-- crea una section --}}
    <div class="container">
       @include('tasks.partials.task-form')
        <hr>
        {{-- mostrar todas las tasks --}}
        {{-- {{dd($tasks)}} --}}
      @if (!empty($tasks))
        @include('tasks.partials.tasks-list')
      @endif
    </div>
    
@endsection