$(document).ready(function () {
    var n_id = 0;
    getCommercialForADD();
    getCommercial();
    getMission();
    getClientFinal();
    getContactClient();

    $(".contact_client").change(function(){
        $.get(
            "/demand/getByContactClient",
            {
                contact_id: $(".contact_client").val()
            }, function(res) {
                $("#contact_prenom").text(res[0]['con_prenom']);
                $("#contact_port").text(res[0]['con_port']);
                $("#contact_email").text(res[0]['con_mail']);
                $("#contact_fax").text(res[0]['con_fax']);
                $("#contact_tel").text(res[0]['con_tel']);
            },"json"
        );
    });
    $(".client_soft").change(function(){
        $.get(
            "/mission/getByClientSoft",
            {
                contact_id: $(".client_soft").val()
            }, function(res) {
                $("#cs_address").text(res[0]['cli_adr']);
                $("#cs_fax").text(res[0]['cli_fax']);
                $("#cs_tel").text(res[0]['cli_tel']);
            },"json"
        );
    });
    function getCommercial () {
        $.get(
            "/demand/getCommercial",
            {},
            function (res) {
                var html = "<option value='all'>_TOUS_</option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_cv"] +
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
    
    $(".filterPortefeuille").change(function(){
        $.get(
            "/mission/getMissionByFilter",
            {
                filter: $(".filterPortefeuille").val()
            },
            function (res) {
                var missdata = res[0];
                var cliData = res[1];
                var cli = {};
                for (var j=0;j<cliData.length;j++) {
                    cli[cliData[j]['id']] = cliData[j]['cli_rs'];
                }
                if (missdata.length>0) {
                    setTimeout(function(){
                        var html = "";
                        for (var i = 0; i < missdata.length; i++) {
                            html += "<tr r_id='" + missdata[i]["miss_id"] + "'>";
                            html += "<td>" + missdata[i]["miss_id"] + "</td>";
                            html += "<td>" + missdata[i]["miss_name"] + "</td>";
                            html += "<td>" + cli[missdata[i]["miss_clif"]] + "</td>";
                            html += "<td>" + missdata[i]["miss_datedeb"] + "</td>";
                            html += "<td>" + missdata[i]["miss_datefin"] + "</td>";
                            html += "<td>" + cli[missdata[i]["miss_clis"]] + "</td>";
                            html += "<td>" + missdata[i]["con_nom"] + "</td>";
                            html += "<td></td>";
                            html += "<td></td>";
                            html +=
                                "<td><a href='javascript:void(0);' id='editMission'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeMission><i class='fas fa-trash'></i></a></td>";
                            html += "</tr>";
                        }
                        $("#mission_tbody").html(html);
                    },500);
                } else {
                    $("#mission_tbody").html("");
                }
            },
            "json"
        );
    });
    $(document).on('click', '#editMission', function(){
        $('#myModal').modal("show");
        $("#cv_form").attr("action", "/mission/editData");
        $("[name=mission_id]").val($(this).parent().parent().attr("r_id"));
        $.get(
            "/mission/getDataForEdit",
            {
                id : $(this).parent().parent().attr("r_id")
            }, function(res){
                console.log(res);
                if (res.length>0) {
                    $("[name=mission_no_]").val(res[0]['miss_id']);
                    $("#mission_id").val(res[0]['miss_id']);
                    $("[name=derniere_date_]").val(res[0]['miss_maj']);
                    $(".client_soft").val(res[0]['miss_clis']);
                    $("[name=nom_mission]").val(res[0]['miss_name']);
                    $(".client_final").val(res[0]['miss_clif']);
                    $(".commercial").val(res[0]['miss_commercial']);
                    $("[name=date_de_debut]").val(res[0]['miss_datedeb']);
                    $("[name=date_de_fin]").val(res[0]['miss_datefin']);
                    $("[name=commentaires]").val(res[0]['miss_com']);
                    $(".contact_client").val(res[0]['miss_contact']);
                    $.get(
                        "/demand/getByContactClient",
                        {
                            contact_id: $(".contact_client").val()
                        }, function(res) {
                            $("#contact_prenom").text(res[0]['con_prenom']);
                            $("#contact_port").text(res[0]['con_port']);
                            $("#contact_email").text(res[0]['con_mail']);
                            $("#contact_fax").text(res[0]['con_fax']);
                            $("#contact_tel").text(res[0]['con_tel']);
                        },"json"
                    );
                    $.get(
                        "/mission/getByClientSoft",
                        {
                            contact_id: $(".client_soft").val()
                        }, function(res) {
                            $("#cs_address").text(res[0]['cli_adr']);
                            $("#cs_fax").text(res[0]['cli_fax']);
                            $("#cs_tel").text(res[0]['cli_tel']);
                        },"json"
                    );
                }
            }, "json"
        );
    });
    $(document).on('click', '#removeMission', function(){
        if (confirm("really delete?")) {
            $.get(
                "/mission/removeMission",
                {
                    id : $(this).parent().parent().attr("r_id")
                }, function(res){
                    toastr.success("Success.");
                    getMission();
                }
            );
        }
    });
    $(".btn-close").click(function(){
        window.location.reload();
    })
    $(".close_btn").click(function(){
        window.location.reload();
    })
    function getMission() {
        $.get(
            "/mission/getMission",
            {},
            function (res) {
                var missdata = res[0];
                var cliData = res[1];
                var cli = {};
                for (var j=0;j<cliData.length;j++) {
                    cli[cliData[j]['id']] = cliData[j]['cli_rs'];
                }
                setTimeout(function(){
                    var html = "";
                    for (var i = 0; i < missdata.length; i++) {
                        html += "<tr r_id='" + missdata[i]["miss_id"] + "'>";
                        html += "<td>" + missdata[i]["miss_id"] + "</td>";
                        html += "<td>" + missdata[i]["miss_name"] + "</td>";
                        html += "<td>" + cli[missdata[i]["miss_clif"]] + "</td>";
                        html += "<td>" + missdata[i]["miss_datedeb"] + "</td>";
                        html += "<td>" + missdata[i]["miss_datefin"] + "</td>";
                        html += "<td>" + cli[missdata[i]["miss_clis"]] + "</td>";
                        html += "<td>" + missdata[i]["con_nom"] + "</td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html +=
                            "<td><a href='javascript:void(0);' id='editMission'><i class='fas fa-edit'></i></a> &nbsp;&nbsp; <a href='javascript:void(0);' id=removeMission><i class='fas fa-trash'></i></a></td>";
                        html += "</tr>";
                        if (n_id < missdata[i]["miss_id"]) {
                            n_id = missdata[i]["miss_id"];
                        }
                    }
                    $("#mission_tbody").html(html);
                    setTimeout(function(){
                        $("#mission_id").val(n_id*1+1);
                    },2000);
                },500);
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
});
