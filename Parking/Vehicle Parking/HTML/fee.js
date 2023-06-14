document.addEventListener('DOMContentLoaded', function () {
  const nextBtn = document.querySelector('.btn_next');
  const backBtn = document.querySelector('.btn_back');
  const form = document.querySelector('#fee-form');

  nextBtn.addEventListener('click', function () {
    window.location.href = 'slot.html';
  });

  backBtn.addEventListener('click', function (event) {
    event.preventDefault(); // prevent form submission and page reload
    const inputs = form.querySelectorAll('input');
    let isValid = true;
    //check if any of the fields are empty 
    inputs.forEach(function (input) {
      if (!input.value.trim()) {
        isValid = false;
      }
    });

    if (!isValid) {
      alert("Please fill in all fields.");
      return;
    }
    window.location.href = 'parking.html';
  });
});