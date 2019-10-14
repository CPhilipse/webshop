<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyWebshop</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            width: 100%;
        }

        .title {
            font-size: 84px;
        }

        /* Menu */
        .navbar {
            overflow: hidden;
            background: #0f0c29;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /*background: #7F7FD5;  !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #91EAE4, #86A8E7, #7F7FD5);  !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #91EAE4, #86A8E7, #7F7FD5); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/
            position: fixed;
            top: 0;
            width: 100%;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background: #ddd;
            color: black;
        }

        /* Header */
        .header {
            padding: 60px;
            /*background: #7F7FD5;  !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #91EAE4, #86A8E7, #7F7FD5);  !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #91EAE4, #86A8E7, #7F7FD5); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/
            background: #0f0c29;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            color: white;
            font-size: 30px;
        }

        /* Styling products */
        .products {
            width: 25%;
            float: left;
        }

        .products > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="navbar">
    <span style="float: left;">
        <a href="/">¯\_(๑❛ᴗ❛๑)_/¯</a>
        <a href="/">MyWebshop</a>
    </span>
    <span style="float: right;">
        <a href="/">Account</a>
        <a href="/">Winkelwagentje</a>
    </span>
</div>

<div class="header">
    <h1>Meer producten, meer korting!</h1>
        <ul style="float: left;">
            <li>
                Boven 200 euro gratis verzendig!
            </li>
            <li>
                2 producten 5% korting!!
            </li>
            <li>
                3 producten 10% korting!
            </li>
            <li>
                4 producten 15% korting!
            </li>
            <li style="list-style-type: none;">
                ----------------------------
            </li>
            <li style="list-style-type: none;">
                Verzendkosten zijn €6,95,-
            </li>
        </ul>
    <img style="max-height: 22%; max-width: 38%; padding-left: 100px;" src="https://www.miinto.nl/imiintofashion/wp-content/uploads/sites/6/2015/12/broeken.png" alt="Spijkerbroeken">
</div>
<div class="flex-center position-ref">
    @auth()
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    @endauth
    {{-- Home page --}}

    <div class="content">
            @foreach($products as $product)
                <div class="products">
                    <a href="{{ route('product', ['id' => $product->productID]) }}">
                        <h1>{{$product->name}}</h1>
                        <p>{{$product->description}}</p>
                        <p>{{$product->price}}</p>
                    </a>
                </div>
            @endforeach
            {{-- For admin products page, do if and else statement, show more options if admin. --}}
    </div>
</div>
</body>
</html>
