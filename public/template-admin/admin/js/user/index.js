const user = (function () {
    const data = {};
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
        }
    };
})();
