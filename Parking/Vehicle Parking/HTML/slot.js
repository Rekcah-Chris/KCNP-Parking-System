document.addEventListener('DOMContentLoaded', function () {
  const doneBtn = document.querySelector('.btn_done');
  const backBtn = document.querySelector('.btn_back');
  const thankyouDiv = document.querySelector('#thankyou');

  const form = document.querySelector('#slot-form');

  backBtn.addEventListener('click', function () {
    window.location.href = 'fee.html';
  });

  doneBtn.addEventListener('click', function () {
    const inputs = form.querySelectorAll('input');
    let isValid = true;

    // check if any of the fields are empty
    inputs.forEach(function (input) {
      if (!input.value.trim()) {
        isValid = false;
      }
    });

    if (!isValid) {
      alert("Please fill in all fields.");
      return;
    }

    thankyouDiv.style.display = 'block';
    setTimeout(function () {
      window.location.href = 'vehicle.html';
    }, 10000); // redirect to vehicle.html after 3 seconds
  });
});