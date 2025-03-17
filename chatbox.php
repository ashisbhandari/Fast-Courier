<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auto-chat</title>
    <style>
        /* Style for the anchor element */
        #myButton {
            display: inline-block;
            padding: 5px 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
            background-color: transparent;
            text-decoration: none;
        }

        /* Initial chatbox styling (hidden) */
        #chatbox {
            display: none;
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            flex-direction: column;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            position: absolute;
            bottom: 470px; /* Positioned above the button */
            right: 10px; /* Adjust this as per your layout */
            z-index: 1000;
            background-color: white;
        }

        /* Messages styling */
        #messages {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 5px;
            background-color: #e0e0e0;
        }

        /* Message bubble styling */
        .message {
            max-width: 75%;
            border-radius: 18px;
            font-size: 14px;
            line-height: 1.4;
            word-wrap: break-word;
            display: inline-block;
        }

        /* User message */
        .message.user {
            color: black;
            align-self: flex-end;
        }

        /* Bot message */
        .message.bot {
            background-color: #e0e1e1;
            color: black;
            align-self: flex-start;
        }

        /* Input and button styling */
        #inputContainer {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ccc;
            background-color: #fff;
        }

        #userInput {
            flex-grow: 1;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 18px;
            outline: none;
            margin-right: 8px;
        }

        button {
            background-color: #0078ff;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #005bb5;
        }

        .messenger-logo {
            width: 50px;
            height: 65px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Anchor element to toggle chat display -->
    <a id="myButton" onclick="toggleChatbox()">
        <img src="image/Messenger.png" alt="Messenger Logo" class="messenger-logo">
    </a>

    <!-- Chatbox container -->
    <div id="chatbox">
        <div id="messages"></div>
        <div id="inputContainer">
            <input type="text" id="userInput" placeholder="Type a message..." autocomplete="off">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        // Toggle the chatbox display on click
        function toggleChatbox() {
            var chatbox = document.getElementById("chatbox");
            if (chatbox.style.display === "none" || chatbox.style.display === "") {
                chatbox.style.display = "flex";
            } else {
                chatbox.style.display = "none";
            }
        }

        // Function to send the message
        function sendMessage() {
            var message = $("#userInput").val().trim().toLowerCase(); // Convert to lowercase for case-insensitive matching
            if (message !== "") { // Check if the message is not empty
                // Append the user's message to the chatbox
                $("#messages").append("<div class='message user'><b>Me:</b> " + message + "</div>");
                $("#userInput").val(""); // Clear the input field

                // Simulate bot response with a delay
                setTimeout(function () {
                    var botResponse;

                    // Keyword detection logic
                    if (message.includes("hello") || message.includes("hi")) {
                        botResponse = "Hi there! How can I assist you today?";
                    } else if (message.includes("how are you")) {
                        botResponse = "I'm doing great! Thanks for asking!";
                    } else if (message.includes("name")) {
                        botResponse = "I am the Fast Courier bot. How can I help you today?";
                    } else if (message.includes("bye")) {
                        botResponse = "Goodbye! Have a great day!";
                    } else if (message.includes("track")) {
                        botResponse = "To track your order, please provide your order tracking number.";
                    } else if (message.includes("time")) {
                        botResponse = "Our opening and delivery hours are from 9 AM to 5 PM, sunday to Friday.";
                    } else if (message.includes("location")||message.includes("address")) {
                        botResponse = "Sanischare road Dhanaraj Minimarket 2nd floor room no: F1 27 For more: <a href='https://maps.app.goo.gl/2e3rhGB7zx4omnvv5' target='_blank'>Click here</a>";
                    } else if (message.includes("order")||message.includes("ordering")) {
                        botResponse = "For ordering contact us on 023-534177 / 9801376348";
                    }else {
                        botResponse = "Sorry, I didn't understand that. Can you please rephrase?";
                    }

                    // Append the bot's response to the chatbox
                    $("#messages").append("<div class='message bot'><b>Fast Courier:</b> " + botResponse + "</div>");
                    $("#messages").scrollTop($("#messages")[0].scrollHeight); // Scroll to the bottom
                }, 1000); // Simulate delay of 1 second
            }
        }

        // Listen for Enter key press on the input field
        $("#userInput").on("keypress", function(event) {
            if (event.which === 13) { // Enter key code
                sendMessage();
            }
        });

        // Adjust chatbox position on scroll
        window.addEventListener("scroll", function () {
            var chatbox = document.getElementById("chatbox");
            var scrollPosition = window.scrollY; // Get the current scroll position
            chatbox.style.bottom = Math.max(10, 470 - scrollPosition) + "px"; // Move the chatbox up/down while scrolling
        });
    </script>
</body>
</html>
