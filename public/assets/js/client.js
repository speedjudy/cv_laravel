$(document).ready(function () {
    var n_id = 0;
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
    $("#fournisseur").click(function(){
        if ($(this)[0].checked==true) {
            $("[name=fournisseur]").val("True");
        } else {
            $("[name=fournisseur]").val("False");
        }
    });
    $("#actif").click(function(){
        if ($(this)[0].checked==true) {
            $("[name=actif]").val("True");
        } else {
            $("[name=actif]").val("False");
        }
    });
    $(".btn-close").click(function(){
        window.location.reload();
    })
    $(".close_btn").click(function(){
        window.location.reload();
    });
    $(document).on('click', '#editBtn', function(){
        $('#myModal').modal("show");
        $("#cv_form").attr("action", "/client/editData");
        $("[name=client_id]").val($(this).parent().parent().attr("r_id"));
        $("[name=clientId_]").val($(this).parent().parent().attr("r_id"));
        $.get(
            "/client/getClientForEdit",
            {
                id : $(this).parent().parent().attr("r_id")
            }, function(res){
                var clients = res[0][0];
                var contacts = res[1][0];
                $("[name=social_reason]").val(clients.cli_rs);
                $("[name=siret]").val(clients.cli_siret);
                $("[name=address]").val(clients.cli_adr);
                $("[name=tel]").val(clients.cli_tel);
                $("[name=fax]").val(clients.cli_fax);
                $("[name=cp]").val(clients.cli_cp);
                $("[name=ville]").val(clients.cli_vil);
                if (clients['typ_fnr']=="True") {
                    $("#fournisseur").attr("checked", true);
                }
                if (clients['cli_actif']=="True") {
                    $("#actif").attr("checked", true);
                }
                $("[name=fournisseur]").val(clients['typ_fnr']);
                $("[name=actif]").val(clients['cli_actif']);
                
                $("[name=contact_nom]").val(contacts.con_nom);
                $("[name=contact_prenom]").val(contacts.con_prenom);
                $("[name=contact_fonction]").val(contacts.con_fonc);
                $("[name=contact_email]").val(contacts.con_mail);
                $("[name=contact_tel_fix]").val(contacts.con_tel);
                $("[name=contact_tel_port]").val(contacts.con_port);
                $("[name=contact_fax]").val(contacts.con_fax);
            }, "json"
        );
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
                    if (res[i]['cli_actif']==activeFlag) {
                        html += "<tr r_id='" + res[i]["id"] + "'>";
                        html += "<td>" + res[i]["id"] + "</td>";
                        html += "<td>" + res[i]["cli_rs"] + "</td>";
                        html += "<td>" + res[i]["cli_adr"] + "</td>";
                        html += "<td>" + res[i]["cli_cp"] + "</td>";
                        html += "<td>" + res[i]["cli_vil"] + "</td>";
                        html += "<td>" + res[i]["typ_fnr"] + "</td>";
                        html += "<td>" + res[i]["cli_fax"] + "</td>";
                        html += "<td><a href='javascript:void(0);' id='editBtn'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeBtn><i class='fas fa-trash'></i></a></td>";
                        html += "</tr>";
                    }
                    if (n_id <= res[i]["id"]) {
                        n_id = res[i]["id"];
                    }
                }
                setTimeout(function(){
                    $("#client_id").val(n_id*1+1);
                    $("[name=clientId_]").val(n_id*1+1);
                },1500);
                $("#client_tbody").html(html);
            },
            "json"
        );
    }
});
