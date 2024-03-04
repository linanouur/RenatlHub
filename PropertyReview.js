document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var feedback = document.getElementById('feedback').value;
    var rating = document.querySelector('input[name="rating"]:checked').value;

    console.log('Feedback:', feedback);
    console.log('Rating:', rating);

    

    var flipContainer = document.querySelector('.flip-container');
    flipContainer.classList.add('flip');
});