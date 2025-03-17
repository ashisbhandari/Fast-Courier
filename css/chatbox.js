// Toggle the chatbox display
function toggleChatbox() {
    const chatbox = document.getElementById("chatbox");
    chatbox.style.display = chatbox.style.display === "none" || chatbox.style.display === "" ? "flex" : "none";
}

// Static responses (you can customize these)
const botResponses = {
    "hello": "Hi there! How can I assist you today?",
    "how are you": "I'm just a bot, but I'm here to help you!",
    "what is your name": "I'm Fast Courier Assistant.",
    "bye": "Goodbye! Have a great day!",
    "default": "I'm not sure I understand. Can you please clarify?"
};

// Send message and handle bot response
function sendMessage() {
    const userInput = document.getElementById("userInput");
    const message = userInput.value.trim();

    if (message) {
        // Add user message to chat
        appendMessage("user", `<b>Me:</b> ${message}`);

        // Get bot response (from static list or logic)
        const response = getBotResponse(message.toLowerCase());
        appendMessage("bot", `<b>Fast Courier:</b> ${response}`);

        // Clear input field
        userInput.value = "";
    }
}

// Append a message to the chat
function appendMessage(sender, text) {
    const messages = document.getElementById("messages");
    const messageDiv = document.createElement("div");
    messageDiv.className = `message ${sender}`;
    messageDiv.innerHTML = text;
    messages.appendChild(messageDiv);

    // Scroll to the latest message
    messages.scrollTop = messages.scrollHeight;
}

// Get bot response based on user input
function getBotResponse(input) {
    return botResponses[input] || botResponses["default"];
}

// Handle "Enter" key for sending messages
document.getElementById("userInput").addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        sendMessage();
    }
});
