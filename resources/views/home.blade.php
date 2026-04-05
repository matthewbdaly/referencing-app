<x-layout>
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <main>
                {{-- Header --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">My Projects</h1>
                    <p class="mt-2 text-gray-600">Create and manage your referencing projects</p>
                </div>

                {{-- Create Project Form --}}
                <div class="bg-white shadow rounded-lg p-6 mb-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Create New Project</h2>
                    <form method="POST" action="{{ route('projects.store') }}" class="space-y-5 max-w-md">
                        @csrf
                        @error('name')
                        <div class="p-3 bg-red-50 border border-red-200 text-red-700 rounded-md text-sm">{{ $message }}</div>
                        @enderror
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Project name</label>
                            <input id="name" name="name" type="text" required autocomplete="off" placeholder="Enter project name" class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 invalid:border-red-500 invalid:text-red-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" />
                        </div>
                        <label for="public" class="flex items-center gap-3 cursor-pointer group">
                            <div class="relative flex items-center">
                                <input type="checkbox" id="public" name="public"
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
                        <input type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md py-2 px-4 transition-colors duration-200" value="Create Project" />
                    </form>
                </div>

                {{-- Projects List --}}
                @if ($projects->count() > 0)
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Your Projects</h2>
                    <ul class="space-y-2">
                        @foreach ($projects as $project)
                        <li class="bg-white border border-gray-200 hover:border-gray-300 hover:shadow-md rounded-lg transition-all duration-200">
                            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="block w-full h-full p-4 text-blue-600 hover:text-blue-800 font-medium">{{ $project->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @else
                <div class="bg-white border border-gray-200 rounded-lg p-12 text-center">
                    <svg class="h-12 w-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-500">No projects yet. Create one to get started!</p>
                </div>
                @endif
            </main>
        </div>
    </div>
</x-layout>
