<body>
    <div id="menu">
        <p id="grimmo">Grimmo Web</p>
        <button class="btn" id="home_btn"><a href="/">Accueil</a></button>

        @guest
            <button id="login_btn"><a href="/login">Connexion</a></button>
        @endguest

        @if (session()->has('user_type'))
            @if (session('user_type') == 0)
                <button class="btn" id="my_owns_btn"><a href="/my_owns">Mes biens</a></button>
            @endif
        @endif

        @auth
            <button class="btn" id="favorites_goods"><a href="/favorites">Mes Favoris</a></button>
            <p id="username">{{session('user_last_name')}} {{session('user_first_name')}}</p>
            <form METHOD="POST" action="{{route('logout')}}">
                @csrf
                <button class="btn" type="submit" id="logout_btn">Déconnexion</button>
            </form>
        @endauth
    </div>
</body>
