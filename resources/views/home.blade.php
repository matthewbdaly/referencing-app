<x-layout>
    <form method="POST" action="{{ route('projects.store') }}" class="grid grid-cols-[100px_1fr] items-center gap-4 max-w-md">
        @csrf
        @error('name')
            <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
        @enderror
        <label for="name" class="text-sm font-medium text-gray-700">Project name</label>
        <input id="name" name="name" type="text" required autocomplete="off" placeholder="Project name" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" />
        <label for="public" class="col-start-2 flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center">
                <input type="checkbox" id="public" name="public"
                       class="peer appearance-none h-5 w-5 border-2 border-gray-300 rounded-md checked:bg-blue-600 checked:border-blue-600 transition-all duration-200 focus:ring-2 focus:ring-blue-300 outline-none"
                       />
                <svg class="absolute h-3.5 w-3.5 text-white opacity-0 peer-checked:opacity-100 pointer-events-none left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transition-opacity duration-200"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <span class="text-gray-700 font-medium group-hover:text-blue-600 transition-colors">
                Public
            </span>
        </label>
        <input type="submit" class="col-start-2 bg-gray-800 text-white rounded shadow w-full py-2" value="Submit" />
    </form>
    <div>
        <ul class="w-full my-8">
            @foreach ($projects as $project)
            <li class="p-2 border-2 border-gray-300 first:rounded-t-lg last:rounded-b-lg"><a href="">{{ $project->name }}</a></li>
            @endforeach
        </ul>
    </div>
</x-layout>
