$(document).ready(function () {
    var cycle_minutes = 120000;
    var check = setInterval(() => {
        set();
    }, cycle_minutes);
    function set() {
        $.get(
            "/run_server/push",
            {
                date: Math.floor(Date.now() / 1000)
            }, function (res) {
                // getData();
            }
        );
    }
});