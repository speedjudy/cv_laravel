<!DOCTYPE html>
<html lang="en">

<head>
    <title>CV</title>
    @include('layout.head')
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="../assets/imgs/A2SEXPERT-tit.png" width=120></img>
            </div>
            <div class="col-sm-6" style="margin-top: 36px;">
                <h3>Tableau de bord CLIENTS / FOURNISSEURS</h3>
            </div>
            <div class="col-sm-2" style="margin-top: 37px;">
                <label for="add_indisponible" class="mr-sm-2">Afficher les clients inacifs</label><br>
                <input class="form-check-input" type="checkbox" name="add_indisponible" id="add_indisponible"> 
            </div>
            <div class="col-sm-2" style="margin-top: 26px;">
                <button type="button" class="btn btn-primary" id="addClientBtn">Creer un nouveau client/fournisseur</button>
            </div>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID CLIENT</th>
                        <th>NOM</th>
                        <th>ADRESSE</th>
                        <th>CP</th>
                        <th>VILLE</th>
                        <th>FNR o/n</th>
                        <th>Nb Contacts</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="client_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/client.js?<?php echo time(); ?>"></script>
</body>

</html>