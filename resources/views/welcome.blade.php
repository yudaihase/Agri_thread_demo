<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
        <style>


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
                text-align:center;
                top: 18px;
            }

            .title {
                color: #050a0d;
                text-align:center;
                font-family:"Palatino Linotype";
                font-size: 84px;
            }

            .my_agri_plan {
                font-family:"Lucida Sans Unicode";
                font-size: 40px;
            }

            .advice {
                font-family:"Lucida Sans Unicode";
                font-size: 40px;
            }

            .cp_link {
                display: inline-block;
                perspective: 1000px;
                perspective-origin: 50% 50%;
                vertical-align: bottom;
                overflow: hidden;
            }

            .cp_link span {
	            display: inline-block;
	            position: relative;
	            padding: 0.1em 0.3em;
	            transition: .4s;
	            transform-origin: 50% 0%;
	            transform-style: preserve-3d;
            }

            .cp_link span:after {
                display: inline-block;
                position: absolute;
                padding: 0.1em 0.3em;
                left: 0;
                top: 0;
                content: attr(data-text);
                color: #fff;
                background-color: #00ACC1;
                transform-origin: 50% 0%;
                transform: translate3d(0, 105%, 0) rotateX(-90deg);
            }
            
           .cp_link:hover span {
                background-color: #00ACC1;
	            transform: translate3d(0, 0, -30px) rotateX(90deg);
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right ">
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

                <div class="title">
                    Agri thread
                </div>

                <div class="my_agri_plan cp_link">
                <a href="{{ url('/') }}" class="btn btn-success">
                <span data-text="My Agri plan">My Agri plan</span></a>
                </div>

                <div class="advice cp_link">
                <a href="{{ url('questions/') }}" class="btn btn-success">
                <span data-text="Advice">Advice</span></a>
                </div>
            </div>
        </div>
    </body>
</html>