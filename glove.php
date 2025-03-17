<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast courier/earth</title>
    <style>
        .earth {
            position: relative;
            width: 130px;
            height: 140px;
            background: rgba(85,35,0,255) url('image/earth.png');
            background-size: cover;
            border-radius: 49%;
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.85);
            box-shadow: 0 0 20px rgba(85,35,0,255);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.5s;
            animation: animate 5s linear infinite;
            margin-top: 15px;
            margin-left: 47px;
        }

        .earth:active {
            transform: scale(5);
        }

        .earth:active img {
            transform: scale(0.2) rotate(-90deg);
        }

        .earth:before {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;
            background: url('image/cloud.png');
            background-size: cover;
            animation: animate 18s linear infinite;
            z-index: 1;
        }

        .earth img {
            transform: rotate(-90deg);
            width: 80px;
            height: 90px;
            position: absolute;
            z-index: 5;
            transition: 1s;
        }

        .earth .text {
            position: absolute;
            font-size: 24px;
            font-weight: bold;
            color: red;
            z-index: 3;
        }

        @keyframes animate {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 500px 0;
            }
        }
    </style>
</head>
<body>
    <div class="earth">
       
        <img src="image/fastcourier.png" alt="Icon">
    </div>
</body>
</html>
