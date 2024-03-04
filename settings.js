function previewImage() {
    const input = document.getElementById('profile-upload');
    const image = document.getElementById('profile-image');
    
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            image.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}


function editInfo(fieldName) {
    document.getElementById(`edit-${fieldName}`).style.display = 'block';
    document.getElementById(fieldName).style.display = 'none';
}

function saveInfo(fieldName) {
    const newValue = document.querySelector(`input[name="${fieldName}"]`).value;

    // Use AJAX to send data to the server for updating
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_profile.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Specify the field name and new value as data to be sent
    const data = `field_name=${fieldName}&new_value=${newValue}`;
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            
            if (response.success) {
                // Update the display with the saved value
                document.getElementById(fieldName).innerText = newValue;
                document.getElementById(`edit-${fieldName}`).style.display = 'none';
                document.getElementById(fieldName).style.display = 'block';
                
                // Optionally, display a success message
                console.log(response.message);
            } else {
                // Optionally, display an error message
                console.error(response.message);
            }
        }
    };

    xhr.send(data);
}
