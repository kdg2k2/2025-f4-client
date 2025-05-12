if (!user.isEmpty(user.getAll())) {
    document.getElementById("login-btn").remove();
    const registerBtn = document.getElementById("register-btn");
    registerBtn.innerHTML = "Tài khoản";
    registerBtn.setAttribute("href", "/admin/dashboard");
}
