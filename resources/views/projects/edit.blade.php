<x-layout>
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <main>
                {{-- Header --}}
                <div class="mb-8">
                    <div class="flex items-center">
                        <a href="{{ route('projects.show', ['project' => $project->id]) }}" 
                           class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 mr-4">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Project
                        </a>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mt-2">Edit Project</h1>
                    <p class="mt-2 text-gray-600">Update your project details</p>
                </div>

                {{-- Edit Project Form --}}
                <div class="bg-white shadow rounded-lg p-6">
                    <form method="POST" action="{{ route('projects.update', ['project' => $project->id]) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        @error('name')
                        <div class="p-3 bg-red-50 border border-red-200 text-red-700 rounded-md text-sm">{{ $message }}</div>
                        @enderror

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Project name</label>
                            <input 
                                id="name" 
                                name="name" 
                                type="text" 
                                required 
                                autocomplete="off" 
                                value="{{ old('name', $project->name) }}"
                                placeholder="Enter project name" 
                                class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 invalid:border-red-500 invalid:text-red-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" 
                            />
                        </div>

                        <div>
                            <label for="public" class="flex items-center gap-3 cursor-pointer group">
                                <div class="relative flex items-center">
                                    <input 
                                        type="checkbox" 
                                        id="public" 
                                        name="public"
                                        @if(old('public', $project->public)) checked
                                        @endif
                                        class="peer appearance-none h-5 w-5 border-2 border-gray-300 rounded-md checked:bg-blue-600 checked:border-blue-600 transition-all duration-200 focus:ring-2 focus:ring-blue-300 outline-none"
                                    />
                                    <svg class="absolute h-3.5 w-3.5 text-white opacity-0 peer-checked:opacity-100 pointer-events-none left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transition-opacity duration-200"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 font-medium group-hover:text-blue-600 transition-colors">
                                    Make project public
                                </span>
                            </label>
                            <p class="mt-1 text-xs text-gray-500">
                                Public projects can be viewed by anyone with the link. Private projects are only visible to you.
                            </p>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <a href="{{ route('projects.show', ['project' => $project->id]) }}" 
                               class="text-sm text-gray-500 hover:text-gray-700">
                                Cancel
                            </a>
                            <div class="flex space-x-3">
                                <form method="POST" action="{{ route('projects.destroy', ['project' => $project->id]) }}" onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Delete Project
                                    </button>
                                </form>
                                <button type="submit" 
                                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Project Info --}}
                <div class="mt-8 bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Project Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Created</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $project->created_at->format('F j, Y g:i A') }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Last Updated</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $project->updated_at->format('F j, Y g:i A') }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Owner</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $project->owner->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">References</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $project->references->count() }} references</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layout>
