! function() {
    var t = sessionStorage.getItem("__ABSTACK_CONFIG__"),
        e = document.getElementsByTagName("html")[0],
        i = {
            theme: "light",
            topbar: {
                color: "brand"
            },
            menu: {
                color: "light"
            },
            sidenav: {
                size: "sm-hover-active"
            }
        },
        o = (this.html = document.getElementsByTagName("html")[0], config = Object.assign(JSON.parse(JSON.stringify(i)), {}), this.html.getAttribute("data-bs-theme")),
        o = (config.theme = null !== o ? o : i.theme, this.html.getAttribute("data-topbar-color")),
        o = (config.topbar.color = null != o ? o : i.topbar.color, this.html.getAttribute("data-sidenav-size")),
        o = (config.sidenav.size = null !== o ? o : i.sidenav.size, this.html.getAttribute("data-menu-color"));
    config.menu.color = null !== o ? o : i.menu.color, window.defaultConfig = JSON.parse(JSON.stringify(config)), null !== t && (config = JSON.parse(t)), (window.config = config) && (window.innerWidth <= 1140 ? e.setAttribute("data-sidenav-size", "full") : e.setAttribute("data-sidenav-size", config.sidenav.size), e.setAttribute("data-bs-theme", config.theme), e.setAttribute("data-menu-color", config.menu.color), e.setAttribute("data-topbar-color", config.topbar.color)), document.getElementById("app-style").href.includes("rtl.min.css") && (document.getElementsByTagName("html")[0].dir = "rtl")
}();