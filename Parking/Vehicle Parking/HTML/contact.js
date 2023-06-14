document.addEventListener('DOMContentLoaded', function () {
    const sendBtn = document.getElementById("sendBtn");
    sendBtn.addEventListener('click', function () {
        console.log("Form submitted");
        alert("Button clicked");
    });
});