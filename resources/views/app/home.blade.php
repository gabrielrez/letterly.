<x-layout>
    <h1>Home</h1>
    <p>{{ Auth::user()->fullName()}}</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Exit</button>
    </form>
</x-layout>