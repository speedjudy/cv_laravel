<!DOCTYPE html>
<html lang="en">

<head>
    <title>CV</title>
    @include('layout.head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <style>
        #display_date {
            font-weight: 900;
            text-align: center;
            margin-bottom: 0px;
        }
    </style>
</head>

<body>

    <div class="container">
        @include('sidebar')
        <div class="row">
            <div class="col-sm-2">
                <img src="../assets/imgs/A2SEXPERT-tit.png" width=120></img>
            </div>
            <div class="col-sm-3" style="margin-top: 36px;">
                <h3>SAISIE ACTIVITE</h3>
            </div>
            <div class="col-sm-2" style="margin-top: 25px;">
                <label for="nom" class="mr-sm-2">Nom: </label>
                <select class="select form-control nom" name="nom">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-3">
                <select class="select form-control month" name="month">
                    <option value=1>Janvier</option>
                    <option value=2>Fevrier</option>
                    <option value=3>Mars</option>
                    <option value=4>Avril</option>
                    <option value=5>Mai</option>
                    <option value=6>Juin</option>
                    <option value=7>Juillet</option>
                    <option value=8>Aout</option>
                    <option value=9>Septembre</option>
                    <option value=10>Octobre</option>
                    <option value=11>Novembre</option>
                    <option value=12>Decembre</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="select form-control year" name="year">
                    <option value=2017>2017</option>
                    <option value=2018>2018</option>
                    <option value=2019>2019</option>
                    <option value=2020>2020</option>
                    <option value=2021>2021</option>
                    <option value=2022>2022</option>
                    <option value=2023>2023</option>
                    <option value=2024>2024</option>
                    <option value=2025>2025</option>
                </select>
            </div>
            <div class="col-sm-3">
                
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                        <th>Dimanche</th>
                    </tr>
                </thead>
                <tbody id="calendar_tbody">
                    <tr>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" name="ma">
                            </select>
                            <select class="select form-control ap" name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                        <td>
                            <p for="days" class="mr-sm-2" id="display_date"></p>
                            <select class="select form-control ma" disabled name="ma">
                            </select>
                            <select class="select form-control ap" disabled name="ap">
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/calendar.js?<?php echo time(); ?>"></script>
</body>

</html>