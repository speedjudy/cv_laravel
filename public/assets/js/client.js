$(document).ready(function () {
    getClientList("True");
    $("#add_indisponible").click(function(){
        if ($(this)[0].checked==true) {
            getClientList("False");
        } else {
            getClientList("True");
        }
    });
    $(document).on('click', '#removeBtn', function(){
        if (confirm("really delete?")) {
            $.get(
                "/client/removeClient",
                {
                    id : $(this).parent().parent().attr("r_id")
                }, function(res){
                    toastr.success("Success.");
                    getClientList("True");
                }
            );
        }
    });
    function getClientList(activeFlag) {
        $.get(
            "/client/getList",
            {
                activeFlag: activeFlag
            },
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html += "<tr r_id='" + res[i]["id"] + "'>";
                    html += "<td>" + res[i]["id"] + "</td>";
                    html += "<td>" + res[i]["cli_rs"] + "</td>";
                    html += "<td>" + res[i]["cli_adr"] + "</td>";
                    html += "<td>" + res[i]["cli_cp"] + "</td>";
                    html += "<td>" + res[i]["cli_vil"] + "</td>";
                    html += "<td>" + res[i]["typ_fnr"] + "</td>";
                    html += "<td>" + res[i]["cli_fax"] + "</td>";
                    html += "<td><a href='javascript:void(0);' id='editCV'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeBtn><i class='fas fa-trash'></i></a></td>";
                    html += "</tr>";

                }
                $("#client_tbody").html(html);
            },
            "json"
        );
    }
});
