<x-layout>
    <div class="m-6 lg:m-8 bg-white shadow rounded-lg flex items-center lg:justify-center min-h-screen flex-col">
        <main class="">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Forgot Password</h1>
                <p class="mt-2 text-sm text-gray-600">Enter your email address and we'll send you a link to reset your password.</p>
            </div>
            <form method="POST" action="{{ route('password.email') }}" class="grid grid-cols-[100px_1fr] items-center gap-4 max-w-md">
                @csrf
                @if (session('status'))
                    <div class="w-full p-2 bg-green-100 border border-green-400 text-green-700 col-span-2 rounded-md text-sm">{{ session('status') }}</div>
                @endif
                @error('email')
                    <div class="w-full p-2 bg-pink-600 text-white col-span-2">{{ $message }}</div>
                @enderror
                <label for="email" class="text-sm font-medium text-gray-700">Email address</label>
                <input id="email" name="email" type="email" required autocomplete="email" placeholder="Email address" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" value="{{ old('email') }}" />
                <input type="submit" class="col-start-2 bg-gray-800 text-white rounded shadow w-full py-2" value="Send Reset Link" />
            </form>
        </main>
    </div>
</x-layout>
