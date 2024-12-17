@extends('layout.app')

@section('content')

<body>
    <h1 id="title">Connexion</h1>
    <div id="auth_content">
        <form id="form-login" method="POST" action="/login">
            @csrf
            <label for="email_input">Email :</label>
            <input type="email" placeholder="Email :" id="email_input" name="email_input">
            <label for="password_input">Mot de passe :</label>
            <div id="password_content">
                <input type="password" placeholder="Mot de passe :" id="password_input" name="password_input">

                <button id="show_password" value="0"><svg id="password_icon" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 12C1 12 5 20 12 20C19 20 23 12 23 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="12" r="3" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <button type="submit" id="login_btn_login">Se connecter</button>
            <div id="not-account">
                <p id="not_account">Pas de compte ?</p>
                <button id="create_account_btn"><a href="/signup">Créer un compte</a></button>
            </div>
        </form>

        <script>
            document.getElementById('show_password').addEventListener('click', function(event){
                event.preventDefault();
                var input = document.getElementById('password_input');
                var svg = document.getElementById('password_icon');
                const svg_hide = `
                    <path d="M2 2L22 22" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.71277 6.7226C3.66479 8.79527 2 12 2 12C2 12 5.63636 19 12 19C14.0503 19 15.8174 18.2734 17.2711 17.2884M11 5.05822C11.3254 5.02013 11.6588 5 12 5C18.3636 5 22 12 22 12C22 12 21.3082 13.3317 20 14.8335" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 14.2362C13.4692 14.7112 12.7684 15.0001 12 15.0001C10.3431 15.0001 9 13.657 9 12.0001C9 11.1764 9.33193 10.4303 9.86932 9.88818" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            `;

                const svg_show = `
                    <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1 12C1 12 5 20 12 20C19 20 23 12 23 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="12" cy="12" r="3" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                `



                if(event.target.value === "0"){
                    input.type = "text";
                    event.target.value = 1
                    svg.innerHTML = svg_hide;

                }else{
                    input.type = "password";
                    event.target.value = 0;
                    svg.innerHTML = svg_show;
                }
            })
        </script>
    </div>
</body>
@stop
