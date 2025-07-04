<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato');

        * {
            position: relative;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom right, #EEE, #AAA);
        }

        h1 {
            margin: 40px 0 20px;
        }

        .lock {
            border-radius: 5px;
            width: 55px;
            height: 45px;
            background-color: #333;
            animation: dip 1s ease;
            animation-delay: 1.5s;
            animation-fill-mode: forwards;
        }

        .lock::before,
        .lock::after {
            content: '';
            position: absolute;
            height: 20px;
            width: 15px;
            left: calc(50% - 12.5px);
        }

        .lock::before {
            top: -30px;
            border: 5px solid #333;
            border-bottom-color: transparent;
            border-radius: 15px 15px 0 0;
            height: 30px;
            animation: lock 2s ease forwards, spin 2s ease forwards;
        }

        .lock::after {
            top: -10px;
            border-left: 5px solid #333;
            border-right: 5px solid transparent;
            animation: spin 2s ease forwards;
        }

        @keyframes lock {
            0% {
                top: -45px;
            }
            65% {
                top: -45px;
            }
            100% {
                top: -30px;
            }
        }

        @keyframes spin {
            0% {
                transform: scaleX(-1);
                left: calc(50% - 30px);
            }
            65% {
                transform: scaleX(1);
                left: calc(50% - 12.5px);
            }
            100% {
                transform: scaleX(1);
                left: calc(50% - 12.5px);
            }
        }

        @keyframes dip {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>
<body>
<div class="lock"></div>
<div class="message">
    <h1>Access to this page is restricted</h1>
    <p>Please check with the site admin if you believe this is a mistake.</p>
</div>

</body>
</html>


