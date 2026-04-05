<x-layout>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <label for="username">Email address</label>
        <input id="username" name="username" type="email" placeholder="Email address" />
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Password" />
        <label for="remember">Remember me</label>
        <input type="checkbox" id="remember" name="remember" />
        <input type="submit">Submit</input>
    </form>
</x-layout>
