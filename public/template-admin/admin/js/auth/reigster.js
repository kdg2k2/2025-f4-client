const formRegister = $("#formRegister");

const redirect = () => {
    window.location.href = '/admin';
}

window.addEventListener('message', function (evt) {
    if (evt.origin !== window.location.origin) return;
    if (evt.data.access_token) {
        redirect();
    }
}, false);

formRegister.on("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    http.post("api/auth/register", formData)
        .then(({ message }) => {
            alertSuccess(message);
            window.location.href = "/login";
        })
        .catch(({ message }) => {
            alertError(message);
        });
});

$('#btnGoogleLogin').on('click', function () {
    const url = '/api/auth/google/redirect';
    const w = 500,
        h = 600;
    const left = (screen.width - w) / 2,
        top = (screen.height - h) / 2;
    window.open(url, 'GoogleLogin', `width=${w},height=${h},top=${top},left=${left}`);
});
