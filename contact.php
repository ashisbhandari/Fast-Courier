<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="icon" type="image/png" href="image/fastlogo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <title>Fast Courier</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Josefin Sans', Arial, sans-serif;
            background-color: #c0b5b5;
            background-image: url('https://img.freepik.com/premium-vector/flat-design-construction-concept_108061-440.jpg?w=740');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensures the footer stays at the bottom */
        }

        .content {
            flex: 1; /* Makes the content area flexible to fill space */
            display: flex;
            justify-content: center;
            align-items: flex-start;
            text-align: center;
            padding: 15px; /* Add padding around the content */
        }

        .top {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(103, 103, 255);
            width: 90%; /* Responsive width */
            max-width: 500px; /* Max width for larger screens */
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0; /* Consistent padding for footer */
        }

        footer .col-md-4 {
            margin-bottom: 1rem; /* Space between footer items */
        }

        @media (max-width: 576px) {
            .top {
                padding: 15px;
            }

            footer .social-media {
                display: flex;
                flex-direction: column; /* Stack social media links */
                align-items: center; /* Center items */
            }
        }
    </style>
</head>
<body>

    <div class="content">
        <div class="top">
            <h2>Sorry for the Inconvenience</h2>
            <p>असुविधाको लागि माफ गर्नुहोस् !</p> 
            <p>Please contact Fast courier and cargo service to sign up or change your password.</p>
            <p>For any details, contact us at <b><i>fastcourierbtm5@gmail.com or ashishbhandari380@gmail.com</i></b></p>
            <p style="font-size: 20px;">
                <b>For more information:<br>
                <a href="tel:+977023534177">023-534177</a>,
                <a href="tel:+9779801376348">9801376348</a></b>
            </p>
            <a href="index.php">
                <button type="button" class="btn btn-light">Go to home page</button>
            </a>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <a href="index.php" class="text-white">@Fastbtm</a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="tel:+977023534177" class="text-white">+977 023-534177</a><br>
                    <a href="tel:+9779801376348" class="text-white">9801376348 - Sagar Dahal</a><br>
                    <a href="tel:+9779852644177" class="text-white">9852644177 - Umanath Bhandari</a><br>
                    <a href="tel:+9779824915826" class="text-white">9824915826 - Ashish Bhandari</a>
                </div>
                <div class="col-12 col-md-4 social-media">
                    <h3>Social Media</h3>
                    <a href="https://www.facebook.com/p/Fast-Courier-And-Cargo-Services-Birtamod-100063864826842/" class="text-white">
                        <img src="image/fbpng.jpg" alt="Fast Courier" width="20" height="20"> Fast Courier
                    </a>
                    <br>
                    <a href="https://www.facebook.com/sagar.dahal.33" class="text-white">
                        <img src="image/fbpng.jpg" alt="Sagar Dahal" width="20" height="20"> Sagar Dahal
                    </a>
                    <br>
                    <a href="https://www.facebook.com/sagar.dahal.33" class="text-white">
                        <img src="image/fbpng.jpg" alt="Umanath Bhandari" width="20" height="20"> Umanath Bhandari
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
