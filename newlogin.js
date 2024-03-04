let submit_btn = document.querySelector(".login");
let emailOrName = document.querySelector("#emailOrName");
let password = document.querySelector("#password");
let message = document.querySelector("message");
let message2 = document.querySelector("message2");
container = document.querySelector(".container");
submit_btn.addEventListener("click", (event) => {
    event.preventDefault();
    checkInputs();
});

function checkInputs() {
    const EmailName = emailOrName.value.trim();
    const PasswordValue = password.value.trim();

    if (EmailName === "") {
        setError1For(emailOrName, "Name or Email cannot be empty");
    } else {
        setSuccess1For(emailOrName);
    }

    if (PasswordValue === "") {
        setError2For(password, "Password cannot be empty");
    } else {
        setSuccess2For(password);
    }
}

function setError1For(input, msg) {
    message.innerText = msg; // Change to innerText instead of += for single message
    if (input.classList.contains("success")) input.classList.remove("success");
    input.classList.add("error");
    
}

function setError2For(input, msg) {
    message2.innerText = msg; // Change to innerText instead of += for single message
    if (input.classList.contains("success")) input.classList.remove("success");
    input.classList.add("error");
   container.style.height="85vh";
   container.style.margin="8vh auto";
   
}

function setSuccess1For(input) {
    if (input.classList.contains("error")) input.classList.remove("error");
    input.classList.add("success");
    message.innerText = "";
}
    
function setSuccess2For(input) {
    if (input.classList.contains("error")) input.classList.remove("error");
    input.classList.add("success");
    message2.innerText = "";
}
 
    