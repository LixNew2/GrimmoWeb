<html>
    <head>
        <meta charset="utf-8">
        <title>GrimmoWeb</title>
    </head>
    <style>
        body{
            margin : 0;
            font-family: 'FUTURA', sans-serif;
            background-color: #f8f8f8;
        }

        @font-face {
            font-family: 'FUTURA';
            src: url('/public/fonts/Futura Book.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        #content {
            margin-top: 100px;
            margin-left: 30px;
            display: grid;
            grid-template-columns: 600px 600px 600px;
            justify-self: center;
        }

        #img_own{
            width: 500px;
            height: 300px;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        #img_own:hover{
            transform: scale(1.05, 1.05);
        }

        #img_own_spec{
            width: 1000px;
            height: 1000px;
            border-radius: 10px;
            justify-self: center;
            align-self: center;
        }

         #menu{
             margin-bottom: 20px;
             background-color: #f8f8f8;
             height: 60px;
             align-items: center;
             padding-left: 10px;
             display: flex;
             justify-content: center;
             border-bottom: 1px solid #6c6c6c;
         }

         #menu button{
             border-radius: 10px;
             height: 35px;
             width: 130px;
             cursor: pointer;
             margin-right: 20px;
             font-size: 18px;
         }

         #menu a{
            color: #2f2f2f;
         }

         a{
             color : black;
             text-decoration: none;
         }

         #title{
             justify-self: center;
             margin-top: 50px;
         }

        .btn{
            left: 10px;
            border: 1px solid black;
            background-color: transparent;
        }

        #grimmo{
            position: absolute;
            left:30px;
            font-weight: bold;
            font-size: 20px;
        }

        #login_btn{
            position: absolute;
            right: 10px;
            border: 1px solid black;
            background-color: black;
        }

        #login_btn a{
            color: white;
            font-weight: bold;
        }

        #login_btn:hover{
            background-color: #2f2f2f;
        }

         #search_form{
             display: flex;
             justify-content: center;
             margin-top: 50px;
         }

         #send_search{
            background-color: transparent;
             border: none;
             cursor: pointer;
         }

        #search_icon{
            height: 20px;
        }

        #search_value {
            border-radius: 20px;
            height: 40px;
            width: 400px;
            padding-left: 10px;
            border: 1px solid #ddd;

            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2), -2px -2px 5px rgba(255, 255, 255, 0.8);

            transition: box-shadow 0.3s ease-in-out;
        }

        #search_value:hover {
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3), -4px -4px 10px rgba(255, 255, 255, 0.8);
        }


        #search_value:focus {
            box-shadow: 2px 2px 10px rgba(0, 123, 255, 0.5), -2px -2px 10px rgba(255, 255, 255, 0.8);
            outline: none;
        }

         #auth_content{
             width: 800px;
             height: 600px;
             background-color: #e9e9e9;
             border-radius: 15px;
             justify-self: center;
             box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
         }

         #form-login{
             display: flex;
             flex-direction: column;
             align-items: center;
             justify-content: center;
             height: 100%;
         }

        #form-login label{
            margin-bottom: 10px;
            color: #718096;
        }

        #form-login input{
            box-sizing: border-box;
            width: 400px;
            height: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        #form-login input {
            border-radius: 20px;
            height: 40px;
            width: 400px;
            padding-left: 10px;
            border: 1px solid #ddd;

            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2), -2px -2px 5px rgba(255, 255, 255, 0.8);

            transition: box-shadow 0.3s ease-in-out;
        }

        #form-login input:hover {
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3), -4px -4px 10px rgba(255, 255, 255, 0.8);
        }


        #form-login input:focus {
            box-shadow: 2px 2px 10px rgba(0, 123, 255, 0.5), -2px -2px 10px rgba(255, 255, 255, 0.8);
            outline: none;
        }

        #form-login button:not(#show_password){
            border-radius: 10px;
            height: 30px;
            width: 130px;
            cursor: pointer;
            border : 1px solid black;
            transition: transform 0.3s ease-in-out;
        }

        #form-login button:hover:not(#show_password){
            transform: scale(1.05, 1.05);
        }

        #login_btn_login{
            margin-top: 30px;
        }

        #logout_btn{
            margin-top: 15px;
        }

        #button:hover{
            background-color: #e1e1e1;
        }

        #not-account{
            margin-top: 50px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        #not-account button{
            margin-left: 20px;
        }

        #not-account p{
            color: #718096;
        }

        #sign_up{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        #sign_up label{
            margin-bottom: 10px;
            color: #718096;
        }

        #sign_up input{
            box-sizing: border-box;
            width: 400px;
            height: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        #sign_up input {
            border-radius: 20px;
            height: 40px;
            width: 400px;
            padding-left: 10px;
            border: 1px solid #ddd;

            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2), -2px -2px 5px rgba(255, 255, 255, 0.8);

            transition: box-shadow 0.3s ease-in-out;
        }

        #sign_up input:hover {
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3), -4px -4px 10px rgba(255, 255, 255, 0.8);
        }


        #sign_up input:focus {
            box-shadow: 2px 2px 10px rgba(0, 123, 255, 0.5), -2px -2px 10px rgba(255, 255, 255, 0.8);
            outline: none;
        }

        #sign_up button{
            border-radius: 10px;
            height: 30px;
            width: 130px;
            cursor: pointer;
            border : 1px solid black;
            transition: transform 0.3s ease-in-out;
            margin-top: 20px;
        }

        #sign_up button:hover{
            transform: scale(1.05, 1.05);
        }

        #content-own{
            width: 550px;
            height: 450px;
            border-radius: 15px;

        }

        #content-own button{
            border-radius: 10px;
            height: 30px;
            width: 130px;
            cursor: pointer;
            border : 1px solid black;
        }

        #content-own button:hover{
            background-color: #e1e1e1;
        }

        #content-own-spec{
            width: 1000px;
            height: 750px;
            border-radius: 15px;
            justify-self: center;
            display: flex;
            flex-direction: column;
            margin-bottom: 300px;
            padding-top: 20px;
        }

        #content-own-spec p{
            margin-top: 2px;
            color: #7b7b7b;
        }

        #chart-container{
            width: 1000px;
            height: 750px;
            justify-self: center;
        }

        #username{
            position: absolute;
            right: 10px;
            font-weight: bold;
        }

        #price_text{
            color: #888888;
        }

        #more_btn{
            position: absolute;
            justify-self: center;
        }

        #add_favorite_btn, #remove_favorite_btn{
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .heart{
            height: 30px;
            width: 30px;
        }

        #title_famous{
            display: flex;
            flex-direction: row;
            height: 40px;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            border-bottom: 1px solid #6c6c6c;
            margin-bottom: 20px;
            white-space: nowrap;
        }

        .famous_btn{
            display: flex;
            margin-left: 780px;
            background-color: red;
        }

        #password_icon{
            height: 30px;
            width: 30px;
            cursor: pointer;
            pointer-events: none;
            top: 0;
        }

        #show_password{
            border: none;
            height: 40px;
            background-color: transparent;
            position: absolute;
            margin-left: 350px;
        }

        #password_content{
            display: flex;
            flex-direction: row;
            height: 40px;
        }

        #password_input{
            padding-right: 70px;
        }

    </style>
    <body>
        @include("components.menu")

        <div class="content">
            @yield('content')
        </div>
    </body>
</html>
