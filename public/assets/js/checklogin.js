if (!user.isEmpty(user.getAll())) {
    document.getElementById("login-btn").remove();
    const registerBtn = document.getElementById("register-btn");
    registerBtn.innerHTML = "<i class='fal fa-shopping-cart'></i>";
    registerBtn.setAttribute("href", "/admin");
}
