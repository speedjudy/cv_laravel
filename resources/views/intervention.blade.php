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
                <h3>Tableau de bord des INTERVENTIONS</h3>
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
                            <h4 class="modal-title">Intervention</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <form action="/intervention/saveData" id="cv_form" method="post">
                            <div class="modal-body" style="overflow-y: scroll;max-height: 500px;">
                                @csrf
                                <input type="hidden" name="intervention_id" id="intervention_id">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="../assets/imgs/A2SEXPERT1.png" width=100></img>
                                    </div>
                                    <div class="col-sm-2" style="margin-top: 26px;">
                                        <h5>Fiche d'INTERVENTION</h5>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="intervention_no" class="mr-sm-2">n intervention</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" disabled name="intervention_no_">
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="intervention_no">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="derniere_date" class="mr-sm-2">Derniere mise a jour</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="derniere_date_" disabled>
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="derniere_date">
                                    </div>
                                </div>
                                <h5>MISSION____</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="mission" class="mr-sm-2">MISSION*: </label>
                                        <select class="select form-control mission" name="mission">
                                        </select>
                                        <label class="mr-sm-2">Client soft: <span id="client_soft"></span></label><br>
                                        <label class="mr-sm-2">Contact mission: <span id="contact_mission"></span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <br>
                                        <label class="mr-sm-2">Client final: <span id="client_final"></span></label><br>
                                        <label class="mr-sm-2">Date debut: <span id="date_debut"></span></label><br>
                                        <label class="mr-sm-2">Date fin: <span id="date_fin"></span></label>
                                    </div>
                                </div>
                                <h5>INTERVENANT____</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="nom_prenom" class="mr-sm-2">Nom prenom*: </label>
                                        <select class="select form-control nom_prenom" name="nom_prenom">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mr-sm-2">Tel fix: <span id="tel_fix"></span></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="mr-sm-2">Tel port: <span id="tel_port"></span></label><br>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="mr-sm-2">Email: <span id="email"></span></label><br>
                                    </div>
                                </div>
                                <h5>DETAILS INTERVENTION____</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="date_de_debut" class="mr-sm-2">Date de debut*: </label>
                                        <input type="datetime-local" class="form-control mb-2 mr-sm-2" name="date_de_debut">
                                        <label for="date_de_fin" class="mr-sm-2">Date de fin*: </label>
                                        <input type="datetime-local" class="form-control mb-2 mr-sm-2" name="date_de_fin">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="statut" class="mr-sm-2">Statut*: </label>
                                        <select class="select form-control statut" name="statut">
                                        </select>
                                        <label for="fournisseur" class="mr-sm-2">Fournisseur*: </label>
                                        <select class="select form-control fournisseur" name="fournisseur">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="profil_intervention" class="mr-sm-2">Profil d'intervention*: </label>
                                        <select class="select form-control profil_intervention" name="profil_intervention">
                                        </select>
                                        <label for="ref_bon_de_commande" class="mr-sm-2">Ref Bon de commande: </label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="ref_bon_de_commande">
                                        <label for="ref_facture" class="mr-sm-2">Ref Facture </label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="ref_facture">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pua" class="mr-sm-2">PUA(€)</label><br>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="pua" id="pua">
                                        <label for="puv" class="mr-sm-2">PUV(€)</label><br>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="puv" id="puv">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <label for="commentaires" class="mr-sm-2">Commentaires: </label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="commentaires">
                                    </div>
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
                        <th>N</th>
                        <th>NOM</th>
                        <th>DATE DEB</th>
                        <th>DATE FIN</th>
                        <th>CLIENT SOFT</th>
                        <th>CLIENT FINAL</th>
                        <th>MISSION</th>
                        <th>FOURNISSEUR</th>
                        <th>STATUT</th>
                        <!-- <th>CRA ENVOYES</th> -->
                        <!-- <th>CRA RECUS</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="intervention_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/intervention.js?<?php echo time(); ?>"></script>
</body>

</html>