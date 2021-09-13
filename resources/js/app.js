require('./bootstrap');


window.bootstrap = require('bootstrap')


document.querySelectorAll(".sidebar__toggler").forEach(btn =>
    btn.addEventListener("click", () => {
        document.body.classList.toggle('sidebar-open');
    })
)
