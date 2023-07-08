<header>
    <div id="mainName">
        <img src={{ asset('img/hsubank_logo.svg') }} alt="Logo Hsubank">
        <h1>Hsubank</h1>
    </div>
    @if (Auth::check())
        <h2 id="hello">Olá, <b>{{ Auth::user()->firstname }}</b>!</h2>
        <form action="{{ route('logout') }}" method="POST" autocomplete="off">
            @csrf
            <button id="logout">Logout</button>
        </form>
    @endif
</header>
