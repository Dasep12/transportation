
!function ($) {
    "use strict";
    if (window.sessionStorage) {
        var alreadyVisited = sessionStorage.getItem("is_visited");
        if (alreadyVisited) {
            switch (alreadyVisited) {
                case "light-mode-switch":
                    document.documentElement.removeAttribute("dir");
                    if (document.getElementById("bootstrap-style").getAttribute("href") != "public/build/css/bootstrap.min.css")
                        document.getElementById("bootstrap-style").setAttribute("href", "/public/build/css/bootstrap.min.css");
                    if (document.getElementById("app-style").getAttribute("href") != "/public/build/css/app.min.css")
                        document.getElementById("app-style").setAttribute("href", "/public/build/css/app.min.css");
                    document.documentElement.setAttribute("data-bs-theme", "light");
                    break;
                case "dark-mode-switch":
                    document.documentElement.removeAttribute("dir");
                    if (document.getElementById("bootstrap-style").getAttribute("href") != "public/build/css/bootstrap.min.css")
                        document.getElementById("bootstrap-style").setAttribute("href", "/public/build/css/bootstrap.min.css");
                    if (document.getElementById("app-style").getAttribute("href") != "/public/build/css/app.min.css")
                        document.getElementById("app-style").setAttribute("href", "/public/build/css/app.min.css");
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                    break;
                case "rtl-mode-switch":
                    if (document.getElementById("bootstrap-style").getAttribute("href") != "public/build/css/bootstrap.min.rtl.css")
                        document.getElementById("bootstrap-style").setAttribute("href", "/public/build/css/bootstrap.min.rtl.css");
                    if (document.getElementById("app-style").getAttribute("href") != "/public/build/css/app.min.rtl.css")
                        document.getElementById("app-style").setAttribute("href", "/public/build/css/app.min.rtl.css");
                    document.documentElement.setAttribute("dir", "rtl");
                    document.documentElement.setAttribute("data-bs-theme", "light");
                    break;
                case "dark-rtl-mode-switch":
                    if (document.getElementById("bootstrap-style").getAttribute("href") != "public/build/css/bootstrap.min.rtl.css")
                        document.getElementById("bootstrap-style").setAttribute("href", "/public/build/css/bootstrap.min.rtl.css");
                    if (document.getElementById("app-style").getAttribute("href") != "/public/build/css/app.min.rtl.css")
                        document.getElementById("app-style").setAttribute("href", "/public/build/css/app.min.rtl.css");
                    document.documentElement.setAttribute("dir", "rtl");
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                    break;
                default:
                    console.log("Something wrong with the layout mode.");
            }
        }
    }
}(window.jQuery);