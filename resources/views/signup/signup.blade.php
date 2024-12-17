@extends('layout.app')

@section('content')

    <body>
    <h1 id="title">Créer un compte</h1>
    <div id="auth_content">
        <form id="sign_up" method="POST" action="/signup">
            @csrf
            <label for="last_name">Nom :</label>
            <input type="text" placeholder="Nom :" id="last_name" name="last_name">

            <label for="first_name">Prenom :</label>
            <input type="text" placeholder="Prenom :" id="first_name" name="first_name">

            <label for="tel_input">Téléphone :</label>
            <input type="text" placeholder="Téléphone :" id="tel_input" name="tel_input">

            <label for="email_input">Email :</label>
            <input type="email" placeholder="Email :" id="email_input" name="email_input">

            <label for="password_input">Mot de passe :</label>
            <input type="password" placeholder="Mot de passe :" id="password_input" name="password_input">

            <button type="submit">Créer un compte</button>

        </form>
    </div>

    </body>
@stop
