function validatelogin() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Please fill in all fields.");
        return false;
    }

    return true;
}