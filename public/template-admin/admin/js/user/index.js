const user = (function () {
    let data = {};
    const updateHeader = function () {
        const isEmpty = Object.keys(data).length === 0;
        if (!data || isEmpty) return;
        const nameE = document.getElementById("user-name");
        if (nameE) nameE.innerHTML = data?.name || "";
        const roleE = document.getElementById("user-role");
        if (roleE) roleE.innerHTML = data?.email || "";
        const imgE = document.getElementById("user-img");
        if (!imgE) return;
        imgE.setAttribute(
            "src",
            data?.path ?? "/template-admin/admin/images/profile.png"
        );
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
    const profile = async () => {
        try {
            return await makeHttpRequest("get", "/api/profile", {}, "", false);
        } catch (error) {
            return { data: {} };
        }
    };
    return {
        setAll: function (userData) {
            data = { ...userData };
            localStorage.setItem("user", JSON.stringify(data));
        },
        getAll: function () {
            return data;
        },
        get: function (key) {
            return data[key];
        },
        set: function (key, value) {
            data[key] = value;
        },
        clear: function () {
            localStorage.removeItem("user");
            data = {};
        },
        getUserForLocalStorage: function () {
            try {
                return JSON.parse(localStorage.getItem("user"));
            } catch (error) {
                return null;
            }
        },
        updateHeader,
        init: async function () {
            const userRecord = this.getUserForLocalStorage();
            if (!this.isEmpty(userRecord)) {
                data = { ...userRecord };
            } else if ("/login" !== window.location.pathname) {
                const { data } = await profile();
                this.setAll(data);
            }
            updateHeader();
            if (data.id) setInterval(() => refresh(), 1000 * 60 * 10); // 10 minutes
        },
        isEmpty: function () {
            return Object.keys(data).length === 0;
        },
    };
})();

user.init();
