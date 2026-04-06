<x-layout>
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <main>
                {{-- Header --}}
                <div class="mb-8">
                    <div class="flex items-center">
                        <a href="{{ route('projects.show', ['project' => $reference->project->id]) }}" 
                           class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 mr-4">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to {{ $reference->project->name }}
                        </a>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mt-2">{{ $reference->title }}</h1>
                    <div class="mt-2 flex items-center space-x-4">
                        <p class="text-gray-600">{{ $reference->author }}</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $reference->type->value }}
                        </span>
                    </div>
                </div>

                {{-- Reference Actions --}}
                <div class="bg-white shadow rounded-lg p-6 mb-8">
                    <div class="flex space-x-3">
                        @if($reference->url)
                        <a href="{{ $reference->url }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Visit Source
                        </a>
                        @endif
                        @if(auth()->user()->id === $reference->project->owner_id)
                        <form method="POST" action="{{ route('references.destroy', ['reference' => $reference->id]) }}" onsubmit="return confirm('Are you sure you want to delete this reference? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                        @endif
                    </div>
                </div>

                {{-- Reference Details --}}
                <div class="bg-white shadow rounded-lg p-6 mb-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Reference Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Title</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $reference->title }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Author</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $reference->author }}</p>
                        </div>
                        @if($reference->url)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">URL</h3>
                            <p class="mt-1 text-sm text-gray-900 break-all">
                                <a href="{{ $reference->url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                    {{ $reference->url }}
                                </a>
                            </p>
                        </div>
                        @endif
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Type</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $reference->type->value }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Accessed</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $reference->accessed_at->format('F j, Y g:i A') }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Project</h3>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="{{ route('projects.show', ['project' => $reference->project->id]) }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $reference->project->name }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Notes Section --}}
                <div class="bg-white shadow rounded-lg p-6 mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Notes</h2>
                        <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Note
                        </button>
                    </div>

                    @if ($reference->notes->count() > 0)
                        <div class="space-y-4">
                            @foreach ($reference->notes as $note)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-start justify-between mb-2">
                                    <div class="flex-1">
                                        <p class="text-gray-900">{{ $note->content }}</p>
                                    </div>
                                    @if(auth()->user()->id === $reference->project->owner_id)
                                    <form method="POST" action="{{ route('notes.destroy', ['note' => $note->id]) }}" onsubmit="return confirm('Are you sure you want to delete this note?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="ml-4 text-red-600 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 rounded-md hover:bg-red-50 p-1 transition-colors"
                                                title="Delete note">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500">
                                    Added {{ $note->created_at->format('F j, Y g:i A') }}
                                    @if($note->updated_at->gt($note->created_at))
                                        • Updated {{ $note->updated_at->format('F j, Y g:i A') }}
                                    @endif
                                </p>
                            </div>
                            @endforeach
                        </div>
                    @else
                    <div class="text-center py-12">
                        <svg class="h-12 w-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500">No notes yet. Add your first note to get started!</p>
                    </div>
                    @endif
                </div>

                {{-- Terms Section --}}
                <div class="bg-white shadow rounded-lg p-6 mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Terms</h2>
                        <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Term
                        </button>
                    </div>

                    @if ($reference->terms->count() > 0)
                        <div class="flex flex-wrap gap-2">
                            @foreach ($reference->terms as $term)
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                {{ $term->name }}
                                @if(auth()->user()->id === $reference->project->owner_id)
                                <form method="POST" action="{{ route('terms.detach', ['reference' => $reference->id, 'term' => $term->id]) }}" class="ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-indigo-600 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md hover:bg-indigo-50 p-0.5 transition-colors"
                                            title="Remove term">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </span>
                            @endforeach
                        </div>
                    @else
                    <div class="text-center py-12">
                        <svg class="h-12 w-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <p class="text-gray-500">No terms yet. Add your first term to categorize this reference!</p>
                    </div>
                    @endif
                </div>

                {{-- Project Info --}}
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Project Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Project Name</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $reference->project->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Project Owner</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $reference->project->owner->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Project Status</h3>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($reference->project->public)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Public
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Private
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Total References</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $reference->project->references->count() }} references</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layout>
