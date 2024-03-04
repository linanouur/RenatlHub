document.addEventListener('DOMContentLoaded', function() {
    console.log('Document is ready');
const form = document.getElementById('form');
const firstname = document.getElementById('first-name');
const lastname = document.getElementById('last-name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmpassword = document.getElementById('confirm-password');
const dateofbirth = document.getElementById('date-of-birth');
const phonenumber = document.getElementById('phone-number');
let Submit_Btn = document.getElementById('Submit-Btn');
small = document.querySelector("small");

Submit_Btn.addEventListener("click", (event) => {
    event.preventDefault();
    console.log('Button clicked');
    checkInputs();
});

function setError (input, message) {
    const errorElement = document.getElementById(`${input.id}Error`);
    errorElement.innerText = message;

    if (input.classList.contains("success")) input.classList.remove("success");
    input.classList.add("error");
}
function setSuccess(input) {
    const errorElement = document.getElementById(`${input.id}Error`);
    errorElement.innerText = "";

    if (input.classList.contains("error")) input.classList.remove("error");
    input.classList.add("success");
}
function isEmail(Email) {
    return /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(
        Email
    );
}

function isPhone_Number(Phone_Number) {
    return /^([0]{1}[5-7]{1}[0-9]{8})$/.test(Phone_Number);
}

const checkInputs = () => {
    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value;
    const confirmpasswordValue = confirmpassword.value;
    const dobValue = dateofbirth.value;
    const phoneNumberValue = phonenumber.value;
    const Today_Date = Date.now();
    const BirthdateValue_MS = Date.parse(dobValue);

    if (firstnameValue === '') {
        setError(firstname, 'Fist name is required');
    }
    else { setSuccess(firstname); }

    if (firstnameValue === '') {
        setError(firstname, 'Fist name is required');
    }
    else { setSuccess(firstname); }

    if (lastnameValue === '') {
        setError(lastname, 'Last name is required');
    }
    else { setSuccess(lastname); }

    if (emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
    }

    if (passwordValue === '') {
        setError(password, 'Password is required');
    }
    else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 characters')
    }
    else { setSuccess(password); }

    if (confirmpasswordValue === '') {
        setError(confirmpassword, 'Please confirm your Password');
    }
    else if (confirmpasswordValue !== passwordValue) {
        setError(confirmpassword, 'Passwords do not match')
    }
    else { setSuccess(confirmpassword); }

    if (dobValue === '') {
        setError(dateofbirth, 'Date of birth is required');
    }
    else if (BirthdateValue_MS > Today_Date) {
        setError(dateofbirth, "You can't be born in the future");
    } else if (
        (Today_Date - BirthdateValue_MS) / (1000 * 60 * 60 * 24 * 365) <
        18
    ) {
        setError(dateofbirth, "You must be 18 years old or older");
    }
    else { setSuccess(dateofbirth); }

    if (phoneNumberValue === '') {
        setError(phonenumber, 'Phone number is required');
    }
    else if (!isPhone_Number(phoneNumberValue))
        setError(phonenumber, 'Please insert a valid phone number');
    else { setSuccess(phonenumber); }

}
});