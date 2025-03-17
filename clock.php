<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clock</title>
    <style>
        .blue-line {
            width: 50%;
            height: 2px;         
            background-color: rgba(85, 35, 0, 0); 
            /*margin: 10px auto;*/
        }
        .time {
            font-size: clamp(0.9rem, 1vw, 1.1rem); /* Responsive font size */
            color: black;
            text-shadow: 0 0 1px blue;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="clock">
        <center>
            <h3><div class="time" id="current-time"></div></h3>
            <!--<hr class="blue-line">-->
        </center>
    </div>
    
    <script>
        function updateTime() {
            const now = new Date();
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';  // Determine AM/PM
            
            hours = hours % 12 || 12; // Convert to 12-hour format and handle midnight as 12

            const currentTime = `${hours}:${minutes}:${seconds} ${ampm} Jhapa/Nepal`;
            document.getElementById('current-time').textContent = currentTime;
        }

        // Update time every second
        setInterval(updateTime, 1000);
        // Initial call to display time immediately
        updateTime();
    </script>
</body>
</html>
