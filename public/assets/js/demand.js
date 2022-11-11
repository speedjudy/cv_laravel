$(document).ready(function () {
    var n_id = 0;
    getDemand();
    getCommercial();
    getCommercialForADD();
    getContactClient();
    getClientFinal();

    getProfils();
    getExperience();
    getLanguages();
    getEnvironments();
    getOutils();
    getLanguagePro();
    getCvList();
    $(".btn-close").click(function(){
        window.location.reload();
    })
    $(".close_btn").click(function(){
        window.location.reload();
    })
    $(".addProfil").change(function(){
        filterCV();
    });
    $(".addExperience").change(function(){
        filterCV();
    });
    $(".addLanguages").change(function(){
        filterCV();
    });
    $(".addOutils").change(function(){
        filterCV();
    });
    $(".addEnvironments").change(function(){
        filterCV();
    });
    $(".addLanguagePro").change(function(){
        filterCV();
    });
    $(".filterPortefeuille").change(function(){
        $.get(
            "/demand/getDemand",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    if (res[i]['cv_nom']==$(".filterPortefeuille").val() || $(".filterPortefeuille").val()=="all") {
                        html += "<tr r_id='" + res[i]["dde_id"] + "'>";
                        html += "<td>" + res[i]["dde_ref"] + "</td>";
                        html += "<td>" + res[i]["dde_date"] + "</td>";
                        html += "<td>" + res[i]["cv_nom"] + "</td>";
                        html += "<td>" + res[i]["pfr_lib"] + "</td>";
                        html += "<td>" + res[i]["dde_nbpostes"] + "</td>";
                        html += "<td>" + res[i]["dde_duree"] + "</td>";
                        html += "<td>" + res[i]["dde_clis"] + "</td>";
                        html += "<td>" + res[i]["pfr_deb"] + "</td>";
                        html += "<td>" + res[i]["dde_date_ferm"] + "</td>";
                        html +="<td><a href='javascript:void(0);' id='editDemand'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeDemand><i class='fas fa-trash'></i></a></td>";
                        html += "</tr>";
                    }
                }
                $("#demand_tbody").html(html);
            },
            "json"
        );
    });
    $("#asap").click(function(){
        if ($(this)[0].checked==true) {
            $("[name=asap]").val("True");
        } else {
            $("[name=asap]").val("False");
        }
    });
    $(document).on('click', '#removeDemand', function(){
        if (confirm("really delete?")) {
            $.get(
                "/demand/removeDemand",
                {
                    id : $(this).parent().parent().attr("r_id")
                }, function(res){
                    toastr.success("Success.");
                    getDemand();
                }
            );
        }
    });
    $("#mobilite").click(function(){
        if ($(this)[0].checked==true) {
            $("[name=mobilite]").val("True");
        } else {
            $("[name=mobilite]").val("False");
        }
    });
    $(".contact_client").change(function(){
        console.log($(".contact_client").val());
        $.get(
            "/demand/getByContactClient",
            {
                contact_id: $(".contact_client").val()
            }, function(res) {
                console.log(res);
                $("[name=__]").val(res[0]['con_prenom']);
                $("[name=port]").val(res[0]['con_port']);
                $("[name=email]").val(res[0]['con_mail']);
                $("[name=fax]").val(res[0]['con_fax']);
                $("[name=tel]").val(res[0]['con_tel']);
            },"json"
        );
    });
    $(document).on('click', '#editDemand', function(){
        $('#myModal').modal("show");
        $("#cv_form").attr("action", "/demand/editData");
        $("[name=demand_id]").val($(this).parent().parent().attr("r_id"));
        $.get(
            "/demand/getDataForEdit",
            {
                id : $(this).parent().parent().attr("r_id")
            }, function(res){
                console.log(res);
                var ddeData = res[0];
                var profilRich = res[1];
                if (ddeData.length>0 && profilRich.length>0) {
                    $("[name=reference_demande_]").val(ddeData[0]['dde_ref']);
                    $("[name=derniere_maj_]").val(ddeData[0]['dde_maj']);
                    $("[name=date_demande]").val(ddeData[0]['dde_date']);
                    $("[name=commercial]").val(ddeData[0]['dde_commercial']);
                    $("[name=client_soft]").val(ddeData[0]['dde_clis']);
                    $("[name=contact_client]").val(ddeData[0]['dde_contact']);
                    $("[name=date_de_debut]").val(ddeData[0]['dde_date_ferm']);
                    $("[name=client_final]").val(ddeData[0]['dde_clif']);
                    $("[name=asap]").val(profilRich[0]['pfr_deb_asap']);
                    if (profilRich[0]['pfr_deb_asap']=="True") {
                        $("#asap").attr("checked", true);
                    }
                    $("[name=mobilite]").val(ddeData[0]['dde_mobilite']);
                    if (ddeData[0]['dde_mobilite']=="True") {
                        $("#mobilite").attr("checked", true);
                    }
                    $("[name=lieu]").val(ddeData[0]['dde_lieu']);
                    $("[name=duree]").val(ddeData[0]['dde_duree']);
                    $("[name=puv]").val(ddeData[0]['dde_puv']);
                    $("[name=pua]").val(profilRich[0]['pfr_pua']);
                    $("[name=nb_de_postes]").val(ddeData[0]['dde_nbpostes']);
                    $("[name=commentaires]").val(ddeData[0]['dde_com']);
                    $("[name=nom_profil]").val(profilRich[0]['pfr_lib']);
                    if (profilRich[0]['pfr_prf']!="") {
                        var pfr_prf = profilRich[0]['pfr_prf'].replace("(", "");
                        pfr_prf = pfr_prf.replace(")", "");
                        pfr_prf = pfr_prf.split(",");
                        $(".addProfil").val(pfr_prf);
                    }
                    if (profilRich[0]['pfr_xp']!="") {
                        var pfr_xp = profilRich[0]['pfr_xp'].replace("(", "");
                        pfr_xp = pfr_xp.replace(")", "");
                        pfr_xp = pfr_xp.split(",");
                        $(".addExperience").val(pfr_xp);
                    }
                    if (profilRich[0]['pfr_lge']!="") {
                        var pfr_lge = profilRich[0]['pfr_lge'].replace("(", "");
                        pfr_lge = pfr_lge.replace(")", "");
                        pfr_lge = pfr_lge.split(",");
                        $(".addLanguages").val(pfr_lge);
                    }
                    if (profilRich[0]['pfr_outi']!="") {
                        var pfr_outi = profilRich[0]['pfr_outi'].replace("(", "");
                        pfr_outi = pfr_outi.replace(")", "");
                        pfr_outi = pfr_outi.split(",");
                        $(".addOutils").val(pfr_outi);
                    }
                    if (profilRich[0]['pfr_env']!="") {
                        var pfr_env = profilRich[0]['pfr_env'].replace("(", "");
                        pfr_env = pfr_env.replace(")", "");
                        pfr_env = pfr_env.split(",");
                        $(".addEnvironments").val(pfr_env);
                    }
                    if (profilRich[0]['pfr_lgprog']!="") {
                        var pfr_lgprog = profilRich[0]['pfr_lgprog'].replace("(", "");
                        pfr_lgprog = pfr_lgprog.replace(")", "");
                        pfr_lgprog = pfr_lgprog.split(",");
                        $(".addLanguagePro").val(pfr_lgprog);
                    }
                    filterCV();
                    $.get(
                        "/demand/getByContactClient",
                        {
                            contact_id: ddeData[0]['dde_contact']
                        }, function(respo) {
                            $("[name=__]").val(respo[0]['con_prenom']);
                            $("[name=port]").val(respo[0]['con_port']);
                            $("[name=email]").val(respo[0]['con_mail']);
                            $("[name=fax]").val(respo[0]['con_fax']);
                            $("[name=tel]").val(respo[0]['con_tel']);
                        },"json"
                    );
                }
            }, "json"
        );
    });
    function filterCV() {
        var addProfil = $(".addProfil").val();
        var addExperience = $(".addExperience").val();
        var addLanguages = $(".addLanguages").val();
        var addOutils = $(".addOutils").val();
        var addEnvironments = $(".addEnvironments").val();
        var addLanguagePro = $(".addLanguagePro").val();
        $.get(
            "/demand/getListByFilter",
            {},
            function (res) {
                var html = "";
                var cv_data = res[0];
                var profils_data = res[1];
                var langues_data = res[2];
                var lgprogs_data = res[3];
                var outils_data = res[4];
                var envs_data = res[5];

                for (var i = 0; i < cv_data.length; i++) {
                    var flag = true;
                    if (addProfil[0]!="") {
                        flag = false;
                        for (var k=0;k<profils_data.length;k++) {
                            for (var j=0;j<addProfil.length;j++) {
                                if (profils_data[k]['id_cv']==cv_data[i]["id_cv"] && profils_data[k]['id_profil']==addProfil[j]) {
                                    flag = true;
                                }
                            }
                            // flag = c_flag;
                        }
                    }
                    if (addLanguages[0]!="") {
                        flag = false;
                        for (var k=0;k<langues_data.length;k++) {
                            for (var j=0;j<addLanguages.length;j++) {
                                if (langues_data[k]['id_cv']==cv_data[i]["id_cv"] && langues_data[k]['cv_langues']==addLanguages[j]) {
                                    flag = true;
                                }
                            }
                            // flag = c_flag;
                        }
                    }
                    if (addLanguagePro[0]!="") {
                        flag = false;
                        for (var k=0;k<addLanguagePro.length;k++) {
                            for (var j=0;j<lgprogs_data.length;j++) {
                                if (lgprogs_data[j]['id_cv']==cv_data[i]["id_cv"] && lgprogs_data[j]['id_lgprog']==addLanguagePro[k]) {
                                    flag = true;
                                }
                            }
                            // flag = c_flag;
                        }
                    }
                    if (addOutils[0]!="") {
                        flag = false;
                        for (var k=0;k<addOutils.length;k++) {
                            for (var j=0;j<outils_data.length;j++) {
                                if (outils_data[j]['id_cv']==cv_data[i]["id_cv"] && outils_data[j]['id_outil']==addOutils[k]) {
                                    flag = true;
                                }
                            }
                            // flag = c_flag;
                        }
                    }
                    if (addEnvironments[0]!="") {
                        flag = false;
                        for (var k=0;k<addEnvironments.length;k++) {
                            for (var j=0;j<envs_data.length;j++) {
                                if (envs_data[k]['id_cv']==cv_data[i]["id_cv"] && envs_data[k]['id_env']==addEnvironments[j]) {
                                    flag = true;
                                }
                            }
                            // flag = c_flag;
                        }
                    }
                    if (addExperience[0]!="" && addExperience.indexOf(cv_data[i]["id_xp"]+"") < 0) {
                        flag = false;
                    }
                    if (flag == true) {
                        html += "<tr r_id='" + cv_data[i]["id_cv"] + "'>";
                        html += "<td>" + cv_data[i]["cv_nom"] + "</td>";
                        html += "<td>" + cv_data[i]["cv_prenom"] + "</td>";
                        html += "<td>" + cv_data[i]["cv_loc"] + "</td>";
                        html += "<td>" + cv_data[i]["cv_creation"] + "</td>";
                        html += "<td>" + cv_data[i]["cv_maj"] + "</td>";
                        html += "<td>" + cv_data[i]["cv_dispo"] + "</td>";
                        html += "<td>" + cv_data[i]["xp_name"] + "</td>";
                        html += "<td>" + cv_data[i]["statut_name"] + "</td>";
                        html += "</tr>";
                    }
                }
                $("#cv_tbody").html(html);
            },
            "json"
        );
    }
    function getCommercial () {
        $.get(
            "/demand/getCommercial",
            {},
            function (res) {
                var html = "<option value='all'>_TOUS_</option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["cv_nom"] +
                        '">' +
                        res[i]["cv_nom"] +
                        "</option>";
                }
                $(".filterPortefeuille").html(html);
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
                $(".commercial").html(html);
            },
            "json"
        );
    }
    function getContactClient () {
        $.get(
            "/demand/getContactClient",
            {},
            function (res) {
                var html = "<option></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["con_id"] +
                        '">' +
                        res[i]["con_nom"] +
                        "</option>";
                }
                $(".contact_client").html(html);
            },
            "json"
        );
    }
    function getClientFinal () {
        $.get(
            "/demand/getClientFinal",
            {},
            function (res) {
                var html = "<option></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id"] +
                        '">' +
                        res[i]["cli_rs"] +
                        "</option>";
                }
                $(".client_soft").html(html);
                $(".client_final").html(html);
                
            },
            "json"
        );
    }
    
    function getDemand() {
        $.get(
            "/demand/getDemand",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html += "<tr r_id='" + res[i]["dde_id"] + "'>";
                    html += "<td>" + res[i]["dde_ref"] + "</td>";
                    html += "<td>" + res[i]["dde_date"] + "</td>";
                    html += "<td>" + res[i]["cv_nom"] + "</td>";
                    html += "<td>" + res[i]["pfr_lib"] + "</td>";
                    html += "<td>" + res[i]["dde_nbpostes"] + "</td>";
                    html += "<td>" + res[i]["dde_duree"] + "</td>";
                    html += "<td>" + res[i]["dde_clis"] + "</td>";
                    html += "<td>" + res[i]["pfr_deb"] + "</td>";
                    html += "<td>" + res[i]["dde_date_ferm"] + "</td>";
                    html +=
                        "<td><a href='javascript:void(0);' id='editDemand'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeDemand><i class='fas fa-trash'></i></a></td>";
                    html += "</tr>";
                    if (n_id < res[i]["dde_id"]) {
                        n_id = res[i]["dde_id"];
                    }
                }
                $("#demand_tbody").html(html);
                setTimeout(function(){
                    $("#demand_id").val(n_id*1+1);
                },2000);
            },
            "json"
        );
    }
    function getProfils() {
        $.get(
            "/cv/getProfils",
            {},
            function (res) {
                var html = "<option value='' selected></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_profil"] +
                        '">' +
                        res[i]["profil_name"] +
                        "</option>";
                }
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
                var html = "<option value='' selected></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_xp"] +
                        '">' +
                        res[i]["xp_name"] +
                        "</option>";
                }
                $(".addExperience").html(html);
            },
            "json"
        );
    }
    function getLanguages() {
        $.get(
            "/cv/getLanguages",
            {},
            function (res) {
                var html = "<option value='' selected></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_langue"] +
                        '">' +
                        res[i]["langue_name"] +
                        "</option>";
                }
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
                var html = "<option value='' selected></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_env"] +
                        '">' +
                        res[i]["env_name"] +
                        "</option>";
                }
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
                var html = "<option value='' selected></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_outil"] +
                        '">' +
                        res[i]["outil_name"] +
                        "</option>";
                }
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
                var html = "<option value='' selected></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_lgprog"] +
                        '">' +
                        res[i]["lgprog_name"] +
                        "</option>";
                }
                $(".addLanguagePro").html(html);
            },
            "json"
        );
    }
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
                    html += "</tr>";
                }
                $("#cv_tbody").html(html);
            },
            "json"
        );
    }
});
