$(document).ready(function () {
    getData();

    var n_id = 0;

    // $("#cv_save_btn").click(function () {
    //     n_id = n_id+1;
    // });
    $("#resetBtn").click(function(){
        window.location.reload();
    });
    $("#searchCV").click(function(){
        $.get(
            "/cv/getListBySearch",
            {
            },
            function (res) {
                var cvDatas = res[0];
                var clients_data = res[1];
                var envs_data = res[2];
                var langues_data = res[3];
                var lgprogs_data = res[4];
                var outils_data = res[5];
                var profils_data = res[6];
                var tags_data = res[7];
                console.log(lgprogs_data);
                var nom = $("#nom").val();
                var disponible = $("#available_from").val();
                var tags = $(".searchTags").val();
                var prenom = $("#prénom").val();
                var dept = $("#dept").val();
                var pua = $("#pua").val();
                var profils = $(".searchProfil").val();
                var xps = $(".searchExperience").val();
                var statuts = $(".searchStatus").val();
                var clients = $(".searchClients").val();
                var langues = $(".searchLanguages").val();
                var envs = $(".searchEnvironments").val();
                var outils = $(".searchOutils").val();
                var langpro = $(".searchLanguagePro").val();
                console.log(langpro,cvDatas);
                var html = "";
                for (var i = 0; i < cvDatas.length; i++) {
                    var flag = true;
                    if (nom && cvDatas[i]["cv_nom"].indexOf(nom) < 0) {
                        flag = false;
                    }
                    if (disponible && cvDatas[i]["cv_dispo"].indexOf(disponible) < 0) {
                        flag = false;
                    }
                    if (prenom && cvDatas[i]["cv_prenom"].indexOf(prenom) < 0) {
                        flag = false;
                    }
                    if (pua && pua<=cvDatas[i]["cjm"]) {
                        flag = false;
                    }
                    if (clients_data.length>0 && clients.length>0) {
                        for (var k=0;k<clients_data.length;k++) {
                            var c_flag = false;
                            for (var j=0;j<clients.length;j++) {
                                if (clients_data[k]['id_cv']==cvDatas[i]["id_cv"] && clients_data[k]['id_client']==clients[j]) {
                                    c_flag = true;
                                }
                            }
                            flag = c_flag;
                        }
                    }
                    if (envs_data.length>0 && envs.length>0) {
                        for (var k=0;k<envs_data.length;k++) {
                            var c_flag = false;
                            for (var j=0;j<envs.length;j++) {
                                if (envs_data[k]['id_cv']==cvDatas[i]["id_cv"] && envs_data[k]['id_env']==envs[j]) {
                                    c_flag = true;
                                }
                            }
                            flag = c_flag;
                        }
                    }
                    if (tags_data.length>0 && tags.length>0) {
                        for (var k=0;k<tags_data.length;k++) {
                            var c_flag = false;
                            for (var j=0;j<tags.length;j++) {
                                if (tags_data[k]['id_cv']==cvDatas[i]["id_cv"] && tags_data[k]['id_tag']==tags[j]) {
                                    c_flag = true;
                                }
                            }
                            flag = c_flag;
                        }
                    }
                    if (profils_data.length>0 && profils.length>0) {
                        for (var k=0;k<profils_data.length;k++) {
                            var c_flag = false;
                            for (var j=0;j<profils.length;j++) {
                                if (profils_data[k]['id_cv']==cvDatas[i]["id_cv"] && profils_data[k]['id_profil']==profils[j]) {
                                    c_flag = true;
                                }
                            }
                            flag = c_flag;
                        }
                    }
                    if (xps.length>0 && xps.indexOf(cvDatas[i]["id_xp"]+"") < 0) {
                        flag = false;
                    }
                    if (statuts.length>0 && statuts.indexOf(cvDatas[i]["id_statut"]+"") < 0) {
                        flag = false;
                    }
                    if (langues_data.length>0 && langues.length>0) {
                        for (var k=0;k<langues_data.length;k++) {
                            var c_flag = false;
                            for (var j=0;j<langues.length;j++) {
                                if (langues_data[k]['id_cv']==cvDatas[i]["id_cv"] && langues_data[k]['id_langue']==langues[j]) {
                                    c_flag = true;
                                }
                            }
                            flag = c_flag;
                        }
                    }
                    if (outils_data.length>0 && outils.length>0) {
                        for (var k=0;k<outils_data.length;k++) {
                            var c_flag = false;
                            for (var j=0;j<outils.length;j++) {
                                if (outils_data[k]['id_cv']==cvDatas[i]["id_cv"] && outils_data[k]['id_outil']==outils[j]) {
                                    c_flag = true;
                                }
                            }
                            flag = c_flag;
                        }
                    }
                    if (lgprogs_data.length>0 && langpro.length>0) {
                        for (var k=0;k<lgprogs_data.length;k++) {
                            var c_flag = false;
                            for (var j=0;j<langpro.length;j++) {
                                if (lgprogs_data[k]['id_cv']==cvDatas[i]["id_cv"] && lgprogs_data[k]['id_lgprog']==langpro[j]) {
                                    c_flag = true;
                                }
                            }
                            flag = c_flag;
                        }
                    }
                    
                    if (flag == true) {
                        html += "<tr r_id='" + cvDatas[i]["id_cv"] + "'>";
                        html += "<td>" + cvDatas[i]["cv_nom"] + "</td>";
                        html += "<td>" + cvDatas[i]["cv_prenom"] + "</td>";
                        html += "<td>" + cvDatas[i]["cv_loc"] + "</td>";
                        html += "<td>" + cvDatas[i]["cv_creation"] + "</td>";
                        html += "<td>" + cvDatas[i]["cv_maj"] + "</td>";
                        html += "<td>" + cvDatas[i]["cv_dispo"] + "</td>";
                        html += "<td>" + cvDatas[i]["xp_name"] + "</td>";
                        html += "<td>" + cvDatas[i]["statut_name"] + "</td>";
                        html += "<td><a href='javascript:void(0);' id='editCV'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeCV><i class='fas fa-trash'></i></a></td>";
                        html += "</tr>";
                    }
                    if (n_id < cvDatas[i]["id_cv"]) {
                        n_id = cvDatas[i]["id_cv"];
                    }

                }
                $("#cv_tbody").html(html);
            },
            "json"
        );
    });
    $("#add_indisponible").click(function(){
        if ($(this)[0].checked==true) {
            $("[name=add_indis]").val("True");
        } else {
            $("[name=add_indis]").val("False");
        }
    });
    $("#add_permis").click(function(){
        if ($(this)[0].checked==true) {
            $("[name=add_permit]").val("True");
        } else {
            $("[name=add_permit]").val("False");
        }
    });
    $(".btn-close").click(function(){
        window.location.reload();
    })
    $(".close_btn").click(function(){
        window.location.reload();
    })
    $(document).on('click', '#removeCV', function(){
        if (confirm("really delete?")) {
            $.get(
                "/cv/removeCV",
                {
                    id : $(this).parent().parent().attr("r_id")
                }, function(res){
                    toastr.success("Success.");
                    getData();
                }
            );
        }
    });
    $(document).on('click', '#editCV', function(){
        $('#myModal').modal("show");
        $("#cv_form").attr("action", "/cv/editData");
        $("[name=cv_id]").val($(this).parent().parent().attr("r_id"));
        $.get(
            "/cv/getCVForEdit",
            {
                id : $(this).parent().parent().attr("r_id")
            }, function(res){
                console.log(res);
                var cvDatas = res[0];
                var clients_data = res[1];
                var clients_ary = [];
                var envs_data = res[2];
                var envs_ary = [];
                var langues_data = res[3];
                var langues_ary = [];
                var lgprogs_data = res[4];
                var lgprogs_ary = [];
                var outils_data = res[5];
                var outils_ary = [];
                var profils_data = res[6];
                var profils_ary = [];
                var tags_data = res[7];
                var tags_ary = [];
                for (var i=0;i<clients_data.length;i++) {
                    clients_ary.push(clients_data[i]['id_client']);
                }
                for (var i=0;i<envs_data.length;i++) {
                    envs_ary.push(envs_data[i]['id_env']);
                }
                for (var i=0;i<langues_data.length;i++) {
                    langues_ary.push(langues_data[i]['id_langue']);
                }
                for (var i=0;i<lgprogs_data.length;i++) {
                    lgprogs_ary.push(lgprogs_data[i]['id_lgprog']);
                }
                for (var i=0;i<outils_data.length;i++) {
                    outils_ary.push(outils_data[i]['id_outil']);
                }
                for (var i=0;i<profils_data.length;i++) {
                    profils_ary.push(profils_data[i]['id_profil']);
                }
                for (var i=0;i<tags_data.length;i++) {
                    tags_ary.push(tags_data[i]['id_tag']);
                }
                $("#add_cv_n").val(cvDatas[0]['id_cv']);
                $("#add_cv_n_real").val(cvDatas[0]['id_cv']);
                $("#add_cree").val(cvDatas[0]['cv_creation']);
                $("#add_derniere").val(cvDatas[0]['cv_maj']);//
                $("[name=add_indis]").val(cvDatas[0]['cv_indispo']);
                if (cvDatas[0]['cv_indispo']=="True") {
                    $("#add_indisponible").attr("checked", true);
                }
                $("#add_nom").val(cvDatas[0]['cv_nom']);
                $("#add_prenom").val(cvDatas[0]['cv_prenom']);
                $("#add_nss").val(cvDatas[0]['cv_ss']);
                $("#add_dateNaiss").val(cvDatas[0]['cv_naiss']);
                $("#add_address").val(cvDatas[0]['cv_adresse']);
                $("#add_telFixe").val(cvDatas[0]['cv_fix']);
                $("#add_port").val(cvDatas[0]['cv_com']);
                $("#add_nationalite").val(cvDatas[0]['cv_nat']);
                $("#add_cp").val(cvDatas[0]['cv_mob']);
                $("#add_ville").val(cvDatas[0]['cv_loc']);
                $("#add_email").val(cvDatas[0]['cv_email']);
                $("#add_emailSoft").val(cvDatas[0]['cv_emailsoft']);
                $("[name=add_statut]").val(cvDatas[0]['id_statut']);
                $("[name=add_fournisseur]").val(cvDatas[0]['id_fnr']);
                $("[name=add_permit]").val(cvDatas[0]['permisB']);
                if (cvDatas[0]['permisB']=="True") {
                    $("#add_permis").attr("checked", true);
                }
                setTimeout(function(){
                    $("#add_puv").val(cvDatas[0]['tjm']);
                    $("[name=add_experience]").val(cvDatas[0]['id_xp']);
                    $("#add_dateDisponibilite").val(cvDatas[0]['cv_dispo']);
                    $("#add_pua").val(cvDatas[0]['cjm']);
                    $(".addProfil").val(profils_ary);
                    $(".addClients").val(clients_ary);
                    $(".addLanguages").val(langues_ary);
                    $(".addEnvironments").val(envs_ary);
                    $(".addOutils").val(outils_ary);
                    $(".addLanguagePro").val(lgprogs_ary);
                    $(".addTags").val(tags_ary);
                },500);
            }, "json"
        );
    });
    function getCvList() {
        $.get(
            "/cv/getList",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html += "<tr r_id='" + res[i]["id_cv"] + "'>";
                    html += "<td>" + res[i]["cv_nom"] + "</td>";
                    html += "<td>" + res[i]["cv_prenom"] + "</td>";
                    html += "<td>" + res[i]["cv_loc"] + "</td>";
                    html += "<td>" + res[i]["cv_creation"] + "</td>";
                    html += "<td>" + res[i]["cv_maj"] + "</td>";
                    html += "<td>" + res[i]["cv_dispo"] + "</td>";
                    html += "<td>" + res[i]["xp_name"] + "</td>";
                    html += "<td>" + res[i]["statut_name"] + "</td>";
                    html +=
                        "<td><a href='javascript:void(0);' id='editCV'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeCV><i class='fas fa-trash'></i></a></td>";
                    html += "</tr>";
                    if (n_id < res[i]["id_cv"]) {
                        n_id = res[i]["id_cv"];
                    }

                }
                $("#cv_tbody").html(html);
            },
            "json"
        );
        setTimeout(function(){
            $("#add_cv_n").val(n_id*1+1);
            $("#add_cv_n_real").val(n_id*1+1);
        },2000);
    }

    function getTags() {
        $.get(
            "/cv/getTags",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_tag"] +
                        '">' +
                        res[i]["tag_name"] +
                        "</option>";
                }
                $(".searchTags").html(html);
                $(".addTags").html(html);
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
                $(".searchProfil").html(html);
                $(".addProfil").html(html);
            },
            "json"
        );
    }
    function getExperience() {
        $.get(
            "/cv/getExperience",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_xp"] +
                        '">' +
                        res[i]["xp_name"] +
                        "</option>";
                }
                $(".searchExperience").html(html);
                $(".add_experience").html(html);
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
                $(".searchStatus").html(html);
                $(".add_statut").html(html);
            },
            "json"
        );
    }
    function getClients() {
        $.get(
            "/cv/getClients",
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
                $(".searchClients").html(html);
                $(".addClients").html(html);
                $(".add_fournisseur").html(html);
            },
            "json"
        );
    }
    function getLanguages() {
        $.get(
            "/cv/getLanguages",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_langue"] +
                        '">' +
                        res[i]["langue_name"] +
                        "</option>";
                }
                $(".searchLanguages").html(html);
                $(".addLanguages").html(html);
            },
            "json"
        );
    }
    function getEnvironments() {
        $.get(
            "/cv/getEnvironments",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_env"] +
                        '">' +
                        res[i]["env_name"] +
                        "</option>";
                }
                $(".searchEnvironments").html(html);
                $(".addEnvironments").html(html);
            },
            "json"
        );
    }
    function getOutils() {
        $.get(
            "/cv/getOutils",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_outil"] +
                        '">' +
                        res[i]["outil_name"] +
                        "</option>";
                }
                $(".searchOutils").html(html);
                $(".addOutils").html(html);
            },
            "json"
        );
    }
    function getLanguagePro() {
        $.get(
            "/cv/getLanguagePro",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_lgprog"] +
                        '">' +
                        res[i]["lgprog_name"] +
                        "</option>";
                }
                $(".searchLanguagePro").html(html);
                $(".addLanguagePro").html(html);
            },
            "json"
        );
    }
    function getData () {
        getCvList();
        getTags();
        getProfils();
        getExperience();
        getStatus();
        getClients();
        getLanguages();
        getEnvironments();
        getOutils();
        getLanguagePro();
    }
});
