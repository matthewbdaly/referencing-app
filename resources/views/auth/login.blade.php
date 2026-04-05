<x-layout>
    <form method="POST" action="{{ route('register.store') }}" class="grid grid-cols-[100px_1fr] items-center gap-4 max-w-md">
        @csrf
        <label for="username" class="text-sm font-medium text-gray-700">Email address</label>
        <input id="username" name="username" type="email" required placeholder="Email address" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" />
        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
        <input id="password" name="password" type="password" required placeholder="Password" class="rounded-md border border-gray-300 p-2 invalid:border-pink-600 invalid:text-pink-600 focus:ring-2 focus:ring-blue-500 focus:invalid:ring-pink-600 outline-none" />
        <label for="remember" class="text-sm font-medium text-gray-700">Remember me</label>
        <input type="checkbox" id="remember" name="remember" class="rounded-md border border-gray-300 p-2 focus:ring-2 focus:ring-blue-500 outline-none" />
        <input type="submit" class="col-start-2 bg-gray-800 text-white rounded shadow w-full py-2" value="Submit" />
    </form>
</x-layout>
