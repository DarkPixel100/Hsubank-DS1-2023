<header>
    <div style="display: flex; gap: 1rem;">
        <img src={{asset('img/hsubank_logo.svg')}} alt="Logo Hsubank">
        <h1>Hsubank</h1>
    </div>
    @if (Auth::check())
        <h2 id="hello">Olá, <b>{{Auth::user()->firstname}}</b>!</h2>
    @endif
</header>
