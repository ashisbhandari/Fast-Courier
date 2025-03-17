<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        .welcome {
            text-align: center;
            font-size: clamp(1.5rem, 2vw + 1rem, 2.5rem); /* Responsive font size */
            opacity: 0;
            animation: fadeIn 5s forwards;
            color: skyblue; /* Text color */
            /* Text shadow layers for a glowing effect */
            text-shadow: 0 0 1px blue, 0 0 5px blue, 0 0 5px blue, 0 0 3px skyblue, 0 0 40px skyblue;
            transform: translateY(20px);
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Additional adjustments for smaller screens */
        @media (max-width: 600px) {
            .welcome {
                font-size: 1.5rem; /* Smaller font size for mobile screens */
            }
        }
    </style>
</head>
<body>
    <h1 class="welcome">Welcome to <br>Fast Courier & Cargo Services</h1>
</body>
</html>
