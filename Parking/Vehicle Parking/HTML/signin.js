document.addEventListener('DOMContentLoaded', function () {

  const signinBtn = document.getElementById("signinBtn");
  signinBtn.addEventListener("click", function (event) {
    event.preventDefault();   // Prevent the form from submitting by default
   

    console.log("Sign in button clicked");

    const form = document.getElementById('sign-form');
    const emailField = form.elements['Email'];
    const passwordField = form.elements['Password'];

    // Check if the email and password match
    if (emailField.value.trim() === '' || passwordField.value.trim() === '') {
      emailField.classList.add('invalid');
      passwordField.classList.add('invalid');
      return; // Stop further execution
    }else
    // If the email and password match, submit the form
    form.submit();
  });
});
