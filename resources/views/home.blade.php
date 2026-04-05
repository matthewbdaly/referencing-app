<x-layout>
    <div>
        <ul>
            @foreach ($projects as $project)
            <li><a href="">{{ $project->name }}</a></li>
            @endforeach
        </ul>
    </div>
</x-layout>
