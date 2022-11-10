<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    @include('layout.head')
</head>

<body>

    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-4 col-lg-3 col-md-3"></div>
                <div class="col-sm-4 col-lg-6 col-md-6">
                    <h2>Enter Guest Number</h2>
                    <div id="enter_form">
                        <div class="form-group">
                            <label for="number"></label>
                            <input type="number" max="1000" class="form-control" id="number" placeholder="0001~1000" name="guest_number">
                        </div><br>
                        <button type="button" id="confirm" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3"></div>
            </div>
        </div>

    </div>
    <script>
        $("#confirm").click(function() {
            if ($("[name=guest_number]").val() > 1000 || $("[name=guest_number]").val()=="") {
                toastr.warning("Please input 1~1000");
            } else {
                add();
            }
        });
        $("#number").keypress(function(event) {
            if (event.keyCode == 13) {
                if ($("[name=guest_number]").val() > 1000 || $("[name=guest_number]").val()=="") {
                    toastr.warning("Please input 1~1000");
                } else {
                    add();
                }
            }
        });

        function add() {
            $.get(
                "/register/add", {
                    guest_number: $("[name=guest_number]").val(),
                    date: Math.floor(Date.now() / 1000)
                },
                function(res) {
                    console.log(res);
                    toastr.success("success.");
                    $("[name=guest_number]").val("");
                    if (res == "exist") {
                        // alert("Enter other number. The number has already exist.");
                    } else {
                        // location.href="score_board.php";
                    }
                }
            );
        }
    </script>
</body>

</html>