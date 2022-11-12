$(document).ready(function () {
    getCvNom();
    getType();
    getData();
    setTimeout(function(){
        $(".nom").val(sessionStorage.getItem("cv_id_calendar"));
    },1000);
    function getCvNom() {
        $.get(
            "/demand/getCommercial",
            {},
            function (res) {
                var html = "";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["id_cv"] +
                        '">' +
                        res[i]["cv_nom"] +
                        "</option>";
                }
                $(".nom").html(html);
            },
            "json"
        );
    }
    function getData() {
        setTimeout(()=>{
            $.get(
                "/calendar/getData",
                {
                    cv_id: $(".nom").val(),
                    day: $(".year").val()+"-"+$(".month").val()
                },
                function (res) {
                    console.log(res);
                    if (res.length>0) {
                        for (var i=0;i<res.length;i++) {
                            var date_s = res[i]['spe_date'].split("-");
                            var class_s = res[i]['spe_period']+"_"+date_s[2];
                            $("#"+class_s).val(res[i]['j_type_id']);
                        }
                    }
                },
                "json"
            );
        },500);
    }
    function getType() {
        $.get(
            "/calendar/getType",
            {},
            function (res) {
                var html = "<option value=''></option>";
                for (var i = 0; i < res.length; i++) {
                    html +=
                        '<option value="' +
                        res[i]["j_type_id"] +
                        '">' +
                        res[i]["j_code"] +
                        "</option>";
                }
                $(".ma").html(html);
                $(".ap").html(html);
            },
            "json"
        );
    }
    const d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth() + 1;
    $(".year").val(year);
    $(".month").val(month);
    setTable();
    $(".year").change(function(){
        setTable();
        setTimeout(function(){
            getData()
        },100);
    });
    $(".month").change(function(){
        setTable();
        setTimeout(function(){
            getData()
        },100);
    });
    $(".nom").change(function(){
        setTable();
        setTimeout(function(){
            getData()
        },100);
    });
    $(".ma").change(function(){
        console.log($(this).attr("rid"));
        console.log($(this).val());
        $.get(
            "/calendar/save",
            {
                day: $(".year").val()+"-"+$(".month").val()+"-"+$(this).attr("rid"),
                value: $(this).val(),
                cv_id: $(".nom").val(),
                spe_period: 1
            },
            function (res) {
            },
            "json"
        );
    });
    $(".ap").change(function(){
        console.log($(this).attr("rid"));
        console.log($(this).val());
        $.get(
            "/calendar/save",
            {
                day: $(".year").val()+"-"+$(".month").val()+"-"+$(this).attr("rid"),
                value: $(this).val(),
                cv_id: $(".nom").val(),
                spe_period: 2
            },
            function (res) {
            },
            "json"
        );
    });
    function setTable(){
        var selected_year = $(".year").val();
        var selected_month = $(".month").val();
        const getDays = (year, month) => {
            return new Date(year, month, 0).getDate();
        };

        const daysInMonth = getDays(selected_year, selected_month);
        const daysInBeforeMonth = getDays(selected_year, selected_month-1);
        const d = new Date(selected_year+"-"+selected_month+"-01");
        var firstDay = d.getDay()-1;
        var row = 0;
        for (var i=1;i<=daysInMonth;i++) {
            var index = firstDay % 7;
            if (index == 0) {
                row++;
            }
            var trs = $("#calendar_tbody").children();
            var tr = trs[row];
            var tds = $(tr).children();
            var td = tds[index];
            $(td).find("#display_date").text(i);
            $(td).find(".ma").val("");
            $(td).find(".ap").val('');
            if (index != 5 && index != 6) {
                $(td).find(".ma").attr('disabled', false);
                $(td).find(".ma").attr('rid', i);
                $(td).find(".ma").attr("id",'1_' + i);
                $(td).find(".ap").attr('disabled', false);
                $(td).find(".ap").attr('rid', i);
                $(td).find(".ap").attr("id",'2_' + i);
            }
            firstDay++;
        }
        var firstDay2 = d.getDay()-1;
        var firstDayTemp = d.getDay()-2;
        var beforeMonthDays = 0;
        for (var j=daysInBeforeMonth; j>daysInBeforeMonth-firstDay2;j--) {
            beforeMonthDays++;
            var trs = $("#calendar_tbody").children();
            var tr = trs[0];
            var tds = $(tr).children();
            var td = tds[firstDayTemp];
            $(td).find("#display_date").text(j);
            $(td).find(".ma").attr('disabled', true);
            $(td).find(".ap").attr('disabled', true);
            $(td).find(".ma").val("");
            $(td).find(".ap").val('');
            firstDayTemp--;
        }
        var continueRow = Math.ceil((daysInMonth+beforeMonthDays)/7)-1;
        var continueIndex = (daysInMonth+d.getDay()-1)%7;
        var forwardCount = 42-(daysInMonth+beforeMonthDays);
        console.log(continueRow, forwardCount, continueIndex);
        for (var k=0;k<forwardCount;k++) {
            var index2 = continueIndex % 7;
            if (index2 == 0) {
                continueRow++;
            }
            var trs = $("#calendar_tbody").children();
            var tr = trs[continueRow];
            var tds = $(tr).children();
            var td = tds[index2];
            $(td).find("#display_date").text(k+1);
            $(td).find(".ma").attr('disabled', true);
            $(td).find(".ap").attr('disabled', true);
            $(td).find(".ma").val("");
            $(td).find(".ap").val('');
            continueIndex++;
        }
    }
});
