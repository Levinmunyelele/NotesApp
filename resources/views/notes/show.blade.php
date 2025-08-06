@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $note->title }}</h2>

                <p class="text-gray-700 mb-4">{{ $note->content }}</p>

                <div class="text-sm text-gray-500 mb-4">
                    <p>Created: {{ $note->created_at->format('M d, Y H:i A') }}</p>
                    <p>Last Updated: {{ $note->updated_at->format('M d, Y H:i A') }}</p>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('notes.edit', $note->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Edit Note
                    </a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Delete Note
                        </button>
                    </form>
                    <a href="{{ route('notes.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Back to Notes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
