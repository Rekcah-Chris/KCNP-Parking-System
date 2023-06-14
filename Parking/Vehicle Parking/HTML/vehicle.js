document.addEventListener('DOMContentLoaded', function () {
  const nextBtn = document.querySelector('.btn_next');

  nextBtn.addEventListener('click', function (event) {
    event.preventDefault(); // prevent form submission and page reload

    const form = document.getElementById('vehicle-form');
    const inputs = form.querySelectorAll('input');
    let isValid = true;

    inputs.forEach(function (input) {
      if (!input.value.trim()) {
        isValid = false;
      }
    });

    if (!isValid) {
      alert("Please fill in all fields.");
      return;
    }

    // Create a new FormData object
    const formData = new FormData(form);

    // Create an XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('POST', 'vehicle.php');

    // Handle the response
    xhr.onload = function () {
      if (xhr.status === 200) {
        // If the request was successful
        window.location.href = 'parking.html'; // Redirect to parking.html
      } else {
        // If there was an error
        alert('Error: ' + xhr.responseText);
      }
    };

    // Send the request
    xhr.send(formData);
  });
});
