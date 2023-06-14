 document.addEventListener('DOMContentLoaded', function () {
  const signupBtn = document.getElementById("signupBtn");
  signupBtn.addEventListener("click", function () {
    console.log("Sign up button clicked");

    const form = document.getElementById('sign-form');
    const requiredFields = ['user_Id', 'user_Name', 'Phone', 'Email', 'Password'];

    let isValid = true;
    for (const fieldName of requiredFields) {
      const field = form.elements[fieldName];
      if (field.value.trim() === '') {
        field.classList.add('invalid');
        isValid = false;
      } else {
        field.classList.remove('invalid');
      }
    }

    if (isValid) {
      form.submit();
    } else {
      const banner = document.getElementById('banner');
      banner.textContent = 'Please fill in all required fields.';
      banner.classList.add('error');
    }
  });
});
