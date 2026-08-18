@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Launcher</p>
            @livewire('components::launcher')
        </div>
    </div>
@endsection
