document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value; // Corrected ID

        fetch("login.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = "dashboard.php";
            } else {
                document.getElementById("error-message").innerText = data.message;
            }
        })
        .catch(error => console.error("Error:", error));
    });
});
