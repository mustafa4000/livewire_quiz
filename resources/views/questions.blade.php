@extends('layouts.master')

@push('styles')
  @livewireStyles
@endpush

@section('content')
    @livewire('quiz')
@endsection

@push('scripts')
    @livewireScripts
@endpush