<!DOCTYPE html>
<html lang="en">

<head>
    <title>CV</title>
    @include('layout.head')
</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5" style="width:37%">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="../assets/imgs/A2SEXPERT-tit.png" alt="logo icon" style="width:24% !important;">
                    </div>
                    <div class="card-title text-uppercase text-center py-3"><h3>Sign In</h3></div>
                    <form>
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="username" class="form-control input-shadow" placeholder="Enter Username">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="pwd" class="form-control input-shadow" placeholder="Enter Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary signin_btn">Sign In</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script>
        $(".signin_btn").click(function() {
            signIn();
        });
        $("#pwd").keypress(function() {
            if (event.keyCode==13) {
                signIn();
            }
        });

        function signIn() {
            var name = $("#username").val();
            var pwd = $("#pwd").val();
            $.get(
                "signin/checkuser", {
                    n: name, //name
                    p: pwd //pwd
                },
                function(res) {
                    if (res == "wrong user") {
                        alert("The user name is wrong.");
                        $("#username").focus();
                    } else if (res == "wrong pwd") {
                        alert("The password is wrong.");
                        $("#pwd").focus();
                    } else {
                        sessionStorage.setItem("x-t", res);
                        sessionStorage.setItem("user", name);
                        location.href = 'cvlist';
                    }
                }
            );
        }
    </script>
</body>

</html>