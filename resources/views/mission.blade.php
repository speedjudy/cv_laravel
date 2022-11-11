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
            <div class="col-sm-4" style="margin-top: 36px;">
                <h3>Tableau de bord des MISSIONS</h3>
            </div>
            <div class="col-sm-2">
                <label for="porte" class="mr-sm-2" style="margin-top: 35px;">Portefeuille Commercial : </label>
                <select class="select form-control filterPortefeuille">
                </select>
            </div>
            <div class="col-sm-2" style="margin-top: 25px;">
                <!-- <label for="demand_cloturees" class="mr-sm-2">Afficher les demandes cloturees</label><br>
                <input class="form-check-input" type="checkbox" name="demand_cloturees" id="demand_cloturees">  -->
            </div>
            <div class="col-sm-2" style="margin-top: 26px;">
                <button type="button" class="btn btn-primary" id="addMissionBtn" data-bs-toggle="modal" data-bs-target="#myModal">Creer une nouvelle mission</button>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Mission</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <form action="/mission/saveData" id="cv_form" method="post">
                            <div class="modal-body" style="overflow-y: scroll;max-height: 500px;">
                                @csrf
                                <input type="hidden" name="mission_id" id="mission_id">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="../assets/imgs/A2SEXPERT1.png" width=100></img>
                                    </div>
                                    <div class="col-sm-2" style="margin-top: 26px;">
                                        <h5>Fiche Mission</h5>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="mission_no" class="mr-sm-2">n mission</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" disabled name="mission_no_">
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="mission_no">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="derniere_date" class="mr-sm-2">Derniere mise a jour</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="derniere_date_" disabled>
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="derniere_date">
                                    </div>
                                </div>
                                <h5>CLIENT SOFT____</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="client_soft" class="mr-sm-2">CLIENT SOFT*: </label>
                                        <select class="select form-control client_soft" name="client_soft">
                                        </select>
                                        <label class="mr-sm-2">Adresse: <span id="cs_address"></span></label><br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="mr-sm-2">Tel: <span id="cs_tel"></span></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="mr-sm-2">Fax: <span id="cs_fax"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="contact_client" class="mr-sm-2">Contact Client <span id=""></span></label>
                                        <select class="select form-control contact_client" name="contact_client">
                                        </select><span id="contact_prenom"></span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="client_soft" class="mr-sm-2">Port: <span id="contact_port"></span></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="client_soft" class="mr-sm-2">Fax: <span id="contact_fax"></span></label>
                                            </div>
                                            <label for="client_soft" class="mr-sm-2">Tel: <span id="contact_tel"></span></label><br>
                                            <label for="client_soft" class="mr-sm-2">Email: <span id="contact_email"></span></label><br>
                                        </div>
                                    </div>
                                </div>
                                <h5>DETAILS MISSION____</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="nom_mission" class="mr-sm-2">Nom Mission *: </label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="nom_mission">
                                        <label for="date_de_debut" class="mr-sm-2">Date de debut*: </label>
                                        <input type="datetime-local" class="form-control mb-2 mr-sm-2" name="date_de_debut">
                                        <label for="date_de_fin" class="mr-sm-2">Date de fin*: </label>
                                        <input type="datetime-local" class="form-control mb-2 mr-sm-2" name="date_de_fin">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="client_final" class="mr-sm-2">Client Final*: </label>
                                        <select class="select form-control client_final" name="client_final">
                                        </select>
                                        <label for="commercial" class="mr-sm-2">COMMERCIAL*:</label>
                                        <select class="select form-control commercial" name="commercial">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <label for="commentaires" class="mr-sm-2">Commentaires: </label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="commentaires">
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>Liste des INTERVENTIONS</h5>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>NOM</th>
                                                <th>PRENOM</th>
                                                <th>Debut</th>
                                                <th>Fin</th>
                                                <th>Profil</th>
                                                <th>Fournisseur</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="save_btn">Save</button>
                                <button type="button" class="btn btn-danger close_btn" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>N MISSION</th>
                        <th>MISSION</th>
                        <th>CLENT FINAL</th>
                        <th>DATE DEB</th>
                        <th>DATE FIN</th>
                        <th>CLIENT SOFT</th>
                        <th>CONTACT</th>
                        <th>Nb INTER</th>
                        <th>Tot JO</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="mission_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/mission.js?<?php echo time(); ?>"></script>
</body>

</html>