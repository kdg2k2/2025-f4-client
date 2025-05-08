const btnUpgrades = $(".btn-upgrade");

btnUpgrades.on("click", async function (e) {
    try {
        e.preventDefault();
        // disable button
        $(this).prop("disabled", true);
        const id = String($(this).data("id"));
        if (user.isEmpty(user.getAll()))
            return (window.location.href = "/login");
        if (id === "1" && !user.isEmpty(user.getAll()))
            return (window.location.href = "/admin");
        const { data } = await http.post("api/upgrade/payment", {
            package_id: id,
        });
        if (data) {
            window.location.href = data;
        }
    } catch (error) {
        $(this).prop("disabled", false);

    }
});
