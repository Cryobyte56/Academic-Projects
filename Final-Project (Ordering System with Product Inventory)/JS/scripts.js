function sendMessage() {
    var messageInput = document.getElementById("messageInput");
    var chatBody = document.getElementById("chatBody");

    if (messageInput.value.trim() !== "") {
        var newMessage = document.createElement("div");
        newMessage.className = "message sender";
        newMessage.innerHTML = "<p>" + messageInput.value + "</p>";

        chatBody.appendChild(newMessage);
        messageInput.value = "";

        // Simulate a reply from the seller (you can customize this part)
        setTimeout(function() {
            var reply = document.createElement("div");
            reply.className = "message receiver";
            reply.innerHTML = "<p>Thanks for your inquiry!</p>";
            chatBody.appendChild(reply);
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 500);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Get all the quantity input elements and buttons with the specified class
    const quantityInputs = document.querySelectorAll('.quantity');
    const plusButtons = document.querySelectorAll('.plusBtn');
    const minusButtons = document.querySelectorAll('.minusBtn');

    // Add click event listeners to each set of buttons
    for (let i = 0; i < plusButtons.length; i++) {
        plusButtons[i].addEventListener('click', function() {
            incrementQuantity(quantityInputs[i]);
        });

        minusButtons[i].addEventListener('click', function() {
            decrementQuantity(quantityInputs[i]);
        });
    }

    // Function to increment the quantity
    function incrementQuantity(input) {
        input.value = parseInt(input.value) + 1;
    }

    // Function to decrement the quantity, with a minimum value of 0
    function decrementQuantity(input) {
        if (parseInt(input.value) > 0) {
            input.value = parseInt(input.value) - 1;
        }
    }
});

$(document).ready(function() {
    $('.input-group button').on('click', function() {
        // Clear focus on button click
        $(this).blur();
    });
});

function goBack() {
    window.history.back();
}

// Function to update the back button visibility
function updateBackButton() {
    var backButton = document.getElementById('backButton');

    // Check if there is a previous page in the history
    if (window.history.length > 1) {
        backButton.style.display = 'block';
    } else {
        backButton.style.display = 'none';
    }
}

function deleteRow(button) {
    var productId = button.getAttribute('data-product-id');

    // Create a form dynamically
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = 'your_script.php'; // Replace with the actual PHP script URL

    // Create an input element for the product ID
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'prod_id';
    input.value = productId;

    // Append the input to the form
    form.appendChild(input);

    // Append the form to the document
    document.body.appendChild(form);

    // Submit the form
    form.submit();
}




// Add an event listener to update the back button on page load
window.addEventListener('load', updateBackButton);