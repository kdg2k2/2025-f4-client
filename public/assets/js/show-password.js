const showpassword = document.querySelector("#showPassword");
const password = document.querySelector("#password");

showpassword.addEventListener("click", function () {
    // toggle the type attribute
    const type =
        password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("fe-eye-off");
});
(function () {
    const showBtn = document.querySelector("#re-show-password");
    const pass = document.querySelector("#re-password");
    if (!showBtn || !pass) return;
    showBtn.addEventListener("click", function () {
        // toggle the type attribute
        const type =
            pass.getAttribute("type") === "password" ? "text" : "password";
        pass.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("fe-eye-off");
    });
})();
