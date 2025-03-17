<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="icon" type="image/png" href="image/fastlogo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <title>Fast Courier</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #c0b5b5;
            background-image: url('image/404.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top */
        }
        
        .top {
            margin-top: 15px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(103, 103, 255);
            max-width: 100%;
            width: 500px; /* Adjust width as needed */
        }
        
        h1 {
            margin: 0;
            color: #333;
        }
        
        p {
            color: #666;
        }
    </style>
</head>
<body>

    <div class="top">
        <h2>Sorry, the data you have provided does not match our database.</h2><p>माफ गर्नुहोस्, तपाईंले प्रदान गर्नुभएको डाटा हाम्रो डाटाबेससँग मेल खाँदैन।</p>
        <!-- <h1>Site is Under Construction</h1> -->
        <!-- <p>Our website is currently being updated. Please check back soon.</p> -->
        <p>please contact Fast courier and cargo service to signup or change to the password</p>
        <p>For any details, contact us at <b><i>fastcourierbtm5@gmail.com or ashishbhandari380@gmail.com</i></b></p>
        <p style="font-size: 20px;"><b>for more information:<br><a href="tel:+977 023 534177"> 023-534177</a>,<a href="tel:+977 9801376348"> 9801376348</a></b></p>
        <a href="index.php"><button type="button" class="btn btn-light">Go to home page</button></a>
    </div>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries
      
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
          apiKey: "AIzaSyBwfgOj5dCrDaVeBJJjyVCUibeUjLUCbvM",
          authDomain: "fastcourierstatic.firebaseapp.com",
          projectId: "fastcourierstatic",
          storageBucket: "fastcourierstatic.appspot.com",
          messagingSenderId: "461348115942",
          appId: "1:461348115942:web:bdb8cd28d7f50e95533227",
          measurementId: "G-9C37V1WV0V"
        };
      
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
      </script>
</body>
</html>
