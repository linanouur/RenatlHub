document.addEventListener('DOMContentLoaded', function () {
    const contactUsBtn = document.getElementById('contactUsBtn');
    const body = document.body;

    // Create the container for the contact form
    const contactContainer = document.createElement('div');
    contactContainer.id = 'contactContainer';
    body.appendChild(contactContainer);

    let isFormVisible = false; // Flag to track form visibility

    // Add event listener to the "Contact Us" button
    contactUsBtn.addEventListener('click', function () {
        if (!isFormVisible) {
            // Create the contact form
            const contactUsForm = document.createElement('div');
            contactUsForm.classList.add('contact-us-form');

            contactUsForm.innerHTML = `
          <button id="closeFormBtn">X</button>
          <h2>Contact Us</h2>
          <form>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
  
            <label for="problem">Describe your problem:</label>
            <textarea id="problem" name="problem" rows="4" required></textarea>
  
            <button type="submit" class="submit-btn">Submit</button>
          </form>
        `;

            // Append the form to the contact form container
            contactContainer.innerHTML = ''; // Clear previous content
            contactContainer.appendChild(contactUsForm);
            isFormVisible = true;

            // Add event listener to close the form
            const closeFormBtn = document.getElementById('closeFormBtn');
            closeFormBtn.addEventListener('click', function () {
                contactContainer.innerHTML = ''; // Clear form when closed
                isFormVisible = false;
            });
        } else {
            // Toggle visibility if form is already visible
            contactContainer.innerHTML = '';
            isFormVisible = false;
        }

        // Toggle the visibility of the contact form container
        contactContainer.classList.toggle('visible', isFormVisible);
    });
});
