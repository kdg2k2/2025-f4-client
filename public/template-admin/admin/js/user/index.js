const user = (function () {
    let data = {};
    const updateHeader = function () {
        document.getElementById("user-name").innerHTML = data.name;
        document.getElementById("user-role").innerHTML = data.email;
        const imgE = document.getElementById("user-img");
        imgE.setAttribute("src", data.path);
        imgE.onerror = function () {
            imgE.setAttribute(
                "src",
                "/template-admin/admin/images/profile.png"
            );
        };
    };
    const refresh = () => {
        return http.post("/api/auth/refresh", {}, "", false);
    };
    const profile = () => {
        return makeHttpRequest("get", "/api/profile", {}, "", false);
    };
    return {
        setAll: function (userData) {
            data = { ...userData };
        },
        get: function (key) {
            return data[key];
        },
        set: function (key, value) {
            data[key] = value;
        },
        clear: function () {
            data = {};
        },
        updateHeader,
        init: async function () {
            const userRecord = JSON.parse(localStorage.getItem("user"));
            if (userRecord) {
                data = {
                    ...userRecord,
                };
            } else {
                const { data } = await profile();
                localStorage.setItem("user", JSON.stringify(data));
                this.setAll(data);
            }
            updateHeader();
            // setInterval(() => {
            //     refresh();
            // }, 1000);
        },
    };
})();

user.init();
