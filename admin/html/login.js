document.addEventListener('DOMContentLoaded', function () {
  const signinBtn = document.getElementById("loginBtn");
  signinBtn.addEventListener("click", function (event) {
      event.preventDefault(); // Prevent the form from submitting by default
      console.log("log in button clicked");

      const form = document.getElementById('log-form');
      const emailField = form.elements['Email'];
      const passwordField = form.elements['Password'];

      // Check if the email and password match
      if (emailField.value.trim() === '' || passwordField.value.trim() === '') {
          emailField.classList.add('invalid');
          passwordField.classList.add('invalid');
          return; // Stop further execution
      }

      // If the email and password match, submit the form
      form.submit();
      
  });
});