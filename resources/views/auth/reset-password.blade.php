<x-layout>
    <div class="m-6 lg:m-8 bg-white shadow rounded-lg flex items-center lg:justify-center min-h-screen flex-col">
        <main class="">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Reset Password</h1>
                <p class="mt-2 text-sm text-gray-600">Enter your new password below.</p>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="grid grid-cols-[100px_1fr] items-center gap-4 max-w-md">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                @error('email')
                    <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="email" class="text-sm font-medium text-gray-700">Email address</label>
                <input id="email" name="email" type="email" required autocomplete="email" placeholder="Email address" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" value="{{ old('email', $request->email) }}" />
                @error('password')
                    <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Password" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" />
                @error('password_confirmation')
                    <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Confirm Password" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" />
                <input type="submit" class="col-start-2 bg-gray-800 text-white rounded shadow w-full py-2" value="Reset Password" />
            </form>
        </main>
    </div>
</x-layout>
