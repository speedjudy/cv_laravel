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
                <button type="button" class="btn btn-primary" id="addClientBtn" data-bs-toggle="modal" data-bs-target="#myModal">Creer un nouveau client/fournisseur</button>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">CV liste</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <form action="/client/saveData" id="cv_form" method="post">
                            <div class="modal-body" style="overflow-y: scroll;max-height: 500px;">
                                @csrf
                                <input type="hidden" name="client_id" id="client_id">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="../assets/imgs/A2SEXPERT1.png" width=100></img>
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 26px;">
                                        <h5>Fiche Client / Fournisseur</h5>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="clientId" class="mr-sm-2">n client/fournisseur</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="clientId_" disabled>
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="clientId">
                                    </div>
                                </div>
                                <h5>Informations Client / Fournisseur</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="social_reason" class="mr-sm-2">Raison Sociale*</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="social_reason">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="siret" class="mr-sm-2">SIRET</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="siret">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="address" class="mr-sm-2">Adresse</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="address">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="tel" class="mr-sm-2">Tel</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="tel">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="fax" class="mr-sm-2">Fax</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="fax">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="cp" class="mr-sm-2">CP</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="cp">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="ville" class="mr-sm-2">Ville</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="ville">
                                    </div>
                                    <div class="col-sm-6" style="margin-top: 18px;">
                                        <input class="form-check-input" type="checkbox" id="fournisseur"> Cohez s'il s'agit d'un fournisseur<br>
                                        <input type="hidden" name="fournisseur">
                                        <input class="form-check-input" type="checkbox" id="actif"> Cohez si le client est actif
                                        <input type="hidden" name="actif">
                                    </div>
                                </div>
                                <h5>Liste des CONTACTS (x contacts enregistres)</h5>
                                <div class="row">
                                    <!-- <div class="col-sm-4">
                                        <label for="n_contact" class="mr-sm-2">N Contact</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="n_contact">
                                    </div> -->
                                    <div class="col-sm-4">
                                        <label for="contact_nom" class="mr-sm-2">Nom</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="contact_nom">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="contact_prenom" class="mr-sm-2">Prenom</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="contact_prenom">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="contact_fonction" class="mr-sm-2">Fonction</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="contact_fonction">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="contact_email" class="mr-sm-2">Email</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="contact_email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="contact_tel_fix" class="mr-sm-2">Tel Fix</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="contact_tel_fix">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="contact_tel_port" class="mr-sm-2">Tel Port</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="contact_tel_port">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="contact_fax" class="mr-sm-2">Fax</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="contact_fax">
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