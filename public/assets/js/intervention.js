$(document).ready(function () {
    var n_id = 0;
    getIntervention();
    getMission();
    getCommercialForADD();
    getProfils();
    getStatus();
    getFournisseur();
    function getMission () {
        $.get(
            "/mission/getMission",
            {},
            function (res) {
                var html = "<option value=''></option>";
                for (var i = 0; i < res[0].length; i++) {
                    html +=
                        '<option value="' +
                        res[0][i]["miss_id"] +
                        '">' +
                        res[0][i]["miss_name"] +
                        "</option>";
                }
                $(".mission").html(html);
            },
            "json"
        );
    }
    $(document).on('click', '#remove', function(){
        if (confirm("really delete?")) {
            $.get(
                "/intervention/remove",
                {
                    id : $(this).parent().parent().attr("r_id")
                }, function(res){
                    toastr.success("Success.");
                    getIntervention();
                }
            );
        }
    });
    function getFournisseur() {
        $.get(
            "/intervention/getFournisseur",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id"] +
                        '">' +
                        res[i]["cli_rs"] +
                        "</option>";
                }
                $(".fournisseur").html(html);
            },
            "json"
        );
    }
    function getStatus() {
        $.get(
            "/cv/getStatus",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_statut"] +
                        '">' +
                        res[i]["statut_name"] +
                        "</option>";
                }
                $(".statut").html(html);
            },
            "json"
        );
    }
    function getProfils() {
        $.get(
            "/cv/getProfils",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_profil"] +
                        '">' +
                        res[i]["profil_name"] +
                        "</option>";
                }
                $(".profil_intervention").html(html);
            },
            "json"
        );
    }
    function getCommercialForADD () {
        $.get(
            "/demand/getCommercial",
            {},
            function (res) {
                var html = "<option value=''></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_cv"] +
                        '">' +
                        res[i]["cv_nom"] +
                        "</option>";
                }
                $(".nom_prenom").html(html);
            },
            "json"
        );
    }
    $(".nom_prenom").change(function(){
        getDataWhenChange();
    });
    $(".mission").change(function(){
        getDataWhenChange();
    });
    function getDataWhenChange() {
        $.get(
            "/intervention/getCommercialDetail",
            {
                contact_id: $(".nom_prenom").val()
            }, function(res) {
                $("#tel_fix").text(res[0]['cv_fix']);
                $("#tel_port").text(res[0]['cv_mob']);
                $("#email").text(res[0]['cv_email']);
            },"json"
        );
        $.get(
            "/mission/getMissionByMID",
            {
                contact_id: $(".mission").val()
            }, function(res) {
                var cli = JSON.parse(sessionStorage.getItem("cliData"));
                $("#client_soft").text(cli[res[0]['miss_clis']]);
                $("#contact_mission").text(res[0]['miss_name']);
                $("#client_final").text(cli[res[0]['miss_clif']]);
                $("#date_debut").text(res[0]['miss_datedeb']);
                $("#date_fin").text(res[0]['miss_datefin']);
            },"json"
        );
    }
    $(document).on('click', '#edit', function(){
        $('#myModal').modal("show");
        $("#cv_form").attr("action", "/intervention/editData");
        $("[name=intervention_id]").val($(this).parent().parent().attr("r_id"));
        $.get(
            "/intervention/getDataForEdit",
            {
                id : $(this).parent().parent().attr("r_id")
            }, function(res){
                console.log(res);
                if (res.length>0) {
                    $("[name=intervention_no_]").val(res[0]['int_id']);
                    $("[name=derniere_date_]").val(res[0]['int_maj']);

                    $("[name=mission]").val(res[0]['miss_id']);
                    $("[name=nom_prenom]").val(res[0]['cv_id']);
                    getDataWhenChange();
                    $("[name=date_de_debut]").val(res[0]['int_deb']);
                    $("[name=date_de_fin]").val(res[0]['int_fin']);
                    $("[name=profil_intervention]").val(res[0]['int_profil']);
                    $("[name=ref_facture]").val(res[0]['int_fact']);
                    $("[name=ref_bon_de_commande]").val(res[0]['int_bdc']);
                    $("[name=commentaires]").val(res[0]['int_com']);
                    $("[name=statut]").val(res[0]['int_statut']);
                    $("[name=fournisseur]").val(res[0]['int_fnr']);
                    $("[name=pua]").val(res[0]['int_pua']);
                    $("[name=puv]").val(res[0]['int_puv']);
                }
            }, "json"
        );
    });
    function getIntervention() {
        $.get(
            "/intervention/getIntervention",
            {},
            function (res) {
                var html = "";
                var data = res[0];
                var cliData = res[1];
                var cli = {};
                for (var j=0;j<cliData.length;j++) {
                    cli[cliData[j]['id']] = cliData[j]['cli_rs'];
                }
                sessionStorage.setItem("cliData", JSON.stringify(cli));
                setTimeout(function(){
                    for (var i = 0; i < data.length; i++) {
                        html += "<tr r_id='" + data[i]["int_id"] + "'>";
                        html += "<td>" + data[i]["int_id"] + "</td>";
                        html += "<td>" + data[i]["cv_nom"] + "</td>";
                        html += "<td>" + data[i]["int_deb"] + "</td>";
                        html += "<td>" + data[i]["int_fin"] + "</td>";
                        html += "<td>" + cli[data[i]["miss_clis"]] + "</td>";
                        html += "<td>" + cli[data[i]["miss_clif"]] + "</td>";
                        html += "<td>" + data[i]["miss_name"] + "</td>";
                        html += "<td>" + data[i]["cli_rs"] + "</td>";
                        html += "<td>" + data[i]["statut_name"] + "</td>";
                        html +=
                            "<td><a href='javascript:void(0);' id='edit'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=remove><i class='fas fa-trash'></i></a></td>";
                        html += "</tr>";
                        if (n_id < data[i]["int_id"]) {
                            n_id = data[i]["int_id"];
                        }
                    }
                    $("#intervention_tbody").html(html);
                    setTimeout(function(){
                        $("#intervention_id").val(n_id*1+1);
                    },2000);
                },500);
            },
            "json"
        );
    }
});
