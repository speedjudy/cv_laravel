$(document).ready(function () {
    sessionStorage.setItem("set-top-animation", "");
    sessionStorage.setItem("first_time", "");
    sessionStorage.setItem("second_time", "");
    sessionStorage.setItem("third_time", "");
    sessionStorage.setItem("fourth_time", "");
    var setMins = 600;
    getData();
    setInterval(function () {
        getData();
        if (sessionStorage.getItem("first_time")) {
            var timeVal1 = getMin(sessionStorage.getItem("first_time") * 1 + setMins - Math.floor(Date.now() / 1000));
            $(".first_time").text(timeVal1);
        }
        if (sessionStorage.getItem("second_time")) {
            var timeVal2 = getMin(sessionStorage.getItem("second_time") * 1 + setMins - Math.floor(Date.now() / 1000));
            $(".second_time").text(timeVal2);
        }
        if (sessionStorage.getItem("third_time")) {
            var timeVal3 = getMin(sessionStorage.getItem("third_time") * 1 + setMins - Math.floor(Date.now() / 1000));
            $(".third_time").text(timeVal3);
        }
        if (sessionStorage.getItem("fourth_time")) {
            var timeVal4 = getMin(sessionStorage.getItem("fourth_time") * 1 + setMins - Math.floor(Date.now() / 1000));
            $(".fourth_time").text(timeVal4);
        }
    }, 1000);
    function getData() {
        $.get(
            "/score/getdata", {},
            function (res) {
                var line = res[2];
                var tbNum = res[1];
                var res = res[0];
                // format();
                if (tbNum['left_num']!=0) {
                    $(".table_num").text(tbNum['left_num']);
                    $(".table_num_right").text(tbNum['right_num']);
                }
                if (res.length > 0) {
                    console.log(line,"line");
                    if (line % 2 == 1) {
                        // $(".first_step_div").css("background-color: #009CDA;");
                        // $(".second_step_div").css("background-color:#004884;");
                        // $(".third_step_div").css("background-color: #009CDA;");
                        // $(".fourth_step_div").css("background-color:#004884;");
                    
                        $(".first_step_div").removeClass("animate_blue");
                        $(".first_step_div").addClass("animate_lightblue");

                        $(".second_step_div").removeClass("animate_lightblue");
                        $(".second_step_div").addClass("animate_blue");

                        $(".third_step_div").removeClass("animate_blue_strong");
                        $(".third_step_div").addClass("animate_lightblue_strong");

                        $(".fourth_step_div").removeClass("animate_lightblue");
                        $(".fourth_step_div").addClass("animate_blue_strong");
                    } else {
                        // $(".first_step_div").css("background-color: #004884;");
                        // $(".second_step_div").css("background-color:#009CDA;");
                        // $(".third_step_div").css("background-color: #004884;");
                        // $(".fourth_step_div").css("backgro`und-color:#009CDA;");
                    
                        $(".first_step_div").removeClass("animate_lightblue");
                        $(".first_step_div").addClass("animate_blue");

                        $(".second_step_div").removeClass("animate_blue");
                        $(".second_step_div").addClass("animate_lightblue");

                        $(".third_step_div").removeClass("animate_lightblue_strong");
                        $(".third_step_div").addClass("animate_blue_strong");

                        $(".fourth_step_div").removeClass("animate_blue_strong");
                        $(".fourth_step_div").addClass("animate_lightblue_strong");
                    }
                    
                    for (var i = 0; i < res.length; i++) {
                        var number = res[i]['number'];
                        if (number.length == 1) {
                            number = "000" + number;
                        } else if (number.length == 2) {
                            number = "00" + number;
                        } else if (number.length == 3) {
                            number = "0" + number;
                        }
                        if (number == "OPEN") {
                            number = "OPEN";
                        }
                        if (res[i]['step'] == 1) {
                            sessionStorage.setItem("first_time", res[i]['date']);
                            if (res[i]['order_num'] == 1) {
                                $("#first_step_first_order").text(number);
                            } else if (res[i]['order_num'] == 2) {
                                $("#first_step_second_order").text(number);
                            } else if (res[i]['order_num'] == 3) {
                                $("#first_step_first_order_right").text(number);
                            } else if (res[i]['order_num'] == 4) {
                                $("#first_step_second_order_right").text(number);
                            }
                        } else if (res[i]['step'] == 2) {
                            sessionStorage.setItem("second_time", res[i]['date']);
                            if (res[i]['order_num'] == 1) {
                                $("#second_step_first_order").text(number);
                            } else if (res[i]['order_num'] == 2) {
                                $("#second_step_second_order").text(number);
                            } else if (res[i]['order_num'] == 3) {
                                $("#second_step_first_order_right").text(number);
                            } else if (res[i]['order_num'] == 4) {
                                $("#second_step_second_order_right").text(number);
                            }
                        } else if (res[i]['step'] == 3) {
                            sessionStorage.setItem("third_time", res[i]['date']);
                            if (res[i]['order_num'] == 1) {
                                $("#third_step_first_order").text(number);
                            } else if (res[i]['order_num'] == 2) {
                                $("#third_step_second_order").text(number);
                            } else if (res[i]['order_num'] == 3) {
                                $("#third_step_first_order_right").text(number);
                            } else if (res[i]['order_num'] == 4) {
                                $("#third_step_second_order_right").text(number);
                            }
                        }
                        else if (res[i]['step'] == 4) {
                            // var time = res[i]['date'] * 1 + setMins - Math.floor(Date.now() / 1000);
                            // if (time == 120 || time == 118 || time == 119) {
                            //     sessionStorage.setItem("set-top-animation", "active");
                            //     setTimeout(function () {
                            //         sessionStorage.setItem("set-top-animation", "");
                            //     }, 8000);
                            // }
                            sessionStorage.setItem("fourth_time", res[i]['date']);
                            if (res[i]['order_num'] == 1) {
                                $("#fourth_step_first_order").text(number);
                            } else if (res[i]['order_num'] == 2) {
                                $("#fourth_step_second_order").text(number);
                            } else if (res[i]['order_num'] == 3) {
                                $("#fourth_step_first_order_right").text(number);
                            } else if (res[i]['order_num'] == 4) {
                                $("#fourth_step_second_order_right").text(number);
                            }
                        } else if (res[i]['step'] == 5) {
                            if (res[i]['order_num'] == 1) {
                                $("#top_step_first_order").text(number);
                            } else if (res[i]['order_num'] == 2) {
                                $("#top_step_second_order").text(number);
                            } else if (res[i]['order_num'] == 3) {
                                $("#top_step_first_order_right").text(number);
                            } else if (res[i]['order_num'] == 4) {
                                $("#top_step_second_order_right").text(number);
                            }

                        }
                    }
                }

            }, "json"
        );
    }
    function getMin(timeP) {
        var min = Math.floor(timeP / 60);
        var sec = timeP % 60;
        min = (min < 10) ? "0" + min : min;
        sec = (sec < 10) ? "0" + sec : sec;
        return min + ":" + sec;
    }
    function format() {
        // $(".first_time").text("EN ATTENTE");
        // $("#first_step_first_order").text("READY TO");
        // $("#first_step_first_order_right").text("READY TO");
        // $("#first_step_second_order").text("PLAY");
        // $("#first_step_second_order_right").text("PLAY");
        // $(".second_time").text("EN ATTENTE");
        // $("#second_step_first_order").text("READY TO");
        // $("#second_step_first_order_right").text("READY TO");
        // $("#second_step_second_order").text("PLAY");
        // $("#second_step_second_order_right").text("PLAY");
        // $(".third_time").text("EN ATTENTE");
        // $("#third_step_first_order").text("READY TO");
        // $("#third_step_first_order_right").text("READY TO");
        // $("#third_step_second_order").text("PLAY");
        // $("#third_step_second_order_right").text("PLAY");
        // $(".fourth_time").text("EN ATTENTE");
        // $("#fourth_step_first_order").text("READY TO");
        // $("#fourth_step_first_order_right").text("READY TO");
        // $("#fourth_step_second_order").text("PLAY");
        // $("#fourth_step_second_order_right").text("PLAY");
        // $("#top_step_first_order").text("READY TO");
        // $("#top_step_first_order_right").text("READY TO");
        // $("#top_step_second_order").text("PLAY");
        // $("#top_step_second_order_right").text("PLAY");
        if (sessionStorage.getItem("set-top-animation") == 'active') {
            $(".top_layer").addClass("top-animation");
            $(".top_layer_right").addClass("top-animation");
        } else {
            $(".top_layer").removeClass("top-animation");
            $(".top_layer_right").removeClass("top-animation");
        }
    }
});