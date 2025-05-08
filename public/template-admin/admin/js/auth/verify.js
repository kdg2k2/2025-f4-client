const pageVerify = {
    elements: {
        message: $(".message"),
    },
    getData: function () {
        const token = window.location.pathname.split("/").pop();
        return http.post(`api/auth/verify/${token}`);
    },
    update: function (success = false) {
        if (success) {
            this.elements.message.html(`
                <div class="alert alert-success">
                    Tài khoản của bạn đã được xác thực thành công. Bạn có thể <a href="/login" class="text-primary">đăng nhập</a> vào tài khoản của mình.
                </div>
            `);
        } else {
            this.elements.message.html(`
                <div class="alert alert-danger">
                    Tài khoản của bạn không được xác thực. Vui lòng kiểm tra email của bạn để xác thực tài khoản. <a href="#" class="text-primary" id="resendVerify">Gửi lại</a>
                </div>
            `);
        }
    },
    init: async function () {
        try {
            await this.getData();
            this.update(true);
        } catch (error) {
            this.update(false);
            // get email serch param
            const urlParams = new URLSearchParams(window.location.search);
            const email = urlParams.get("email");
            $(document).on("click", "#resendVerify", async (e) => {
                e.preventDefault();
                const { message } = await http.post("api/auth/resend-verify", {
                    email,
                });
                alertSuccess(message);
            });
        }
    },
};

pageVerify.init();
