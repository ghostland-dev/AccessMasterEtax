const emailInput = document.getElementById('email');
emailInput ? emailInput.addEventListener('input', function () { validateEmail(emailInput.value); }) : console.log("tel not found.");




async function validateEmail(email) {
    // Regular expression for email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailRegex.test(email)) {
        return true;
    } else {
        console.log('Invalid email format');
        return false;
    }
}



// Phone number validation
var phoneInput = document.getElementById('tel');
phoneInput ? phoneInput.addEventListener('input', validatePhoneNumber) : console.log("tel not found.");

function validatePhoneNumber() {
    var phoneNumber = phoneInput.value;
    var regex = /^\d{10}$/; // Assuming 10-digit phone numbers

    if (!regex.test(phoneNumber)) {
        phoneInput.setCustomValidity('Please enter a valid phone number');
    } else {
        phoneInput.setCustomValidity('');
    }
}
