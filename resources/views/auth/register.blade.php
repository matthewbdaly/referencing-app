<x-layout>
    <div class="m-6 lg:m-8 bg-white shadow rounded-lg flex items-center lg:justify-center min-h-screen flex-col">
        <main class="">
            <form method="POST" action="{{ route('register.store') }}" class="grid grid-cols-[100px_1fr] items-center gap-4 max-w-md">
                @csrf
                @error('name')
                <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text" required placeholder="Name" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" value="{{ old('name') }}" />
                @error('email')
                <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="email" class="text-sm font-medium text-gray-700">Email address</label>
                <input id="email" name="email" type="email" required autocomplete="email" placeholder="Email address" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" value="{{ old('email') }}" />
                @error('password')
                <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Password" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" />
                @error('password_confirmation')
                <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Password" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" />
                <input type="submit" class="col-start-2 bg-gray-800 text-white rounded shadow w-full py-2" value="Submit" />
            </form>
        </main>
    </div>
</x-layout>
