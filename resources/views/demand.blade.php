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
                <h3>Tableau de bord de Demandes de Profils</h3>
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
                <button type="button" class="btn btn-primary" id="addDemandBtn" data-bs-toggle="modal" data-bs-target="#myModal">Creer une Nouvelle demande</button>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Demand</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <form action="/demand/saveData" id="cv_form" method="post">
                            <div class="modal-body" style="overflow-y: scroll;max-height: 500px;">
                                @csrf
                                <input type="hidden" name="demand_id" id="demand_id">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="../assets/imgs/A2SEXPERT1.png" width=100></img>
                                    </div>
                                    <div class="col-sm-2" style="margin-top: 26px;">
                                        <h5>Fiche Demande Profil</h5>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="reference_demande" class="mr-sm-2">Reference demande</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" required name="reference_demande_">
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="reference_demande">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="derniere_maj" class="mr-sm-2">Derniere maj</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" disabled name="derniere_maj_">
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="derniere_maj">
                                        <label for="ferrnee_le" class="mr-sm-2">Ferrnee le</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="ferrnee_le_" disabled>
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="ferrnee_le">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="cause_fermeture" class="mr-sm-2">Cause fermeture</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="cause_fermeture_" disabled>
                                        <input type="hidden" class="form-control mb-2 mr-sm-2" name="cause_fermeture">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="date_demande" class="mr-sm-2">DATE DEMANDE *</label>
                                                <input type="datetime-local" class="form-control mb-2 mr-sm-2" name="date_demande">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="commercial" class="mr-sm-2">COMMERCIAL*:</label>
                                                <select class="select form-control commercial" name="commercial">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="client_soft" class="mr-sm-2"><b>CLIENT SOFT____</b> </label>
                                                <select class="select form-control client_soft" name="client_soft">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="contact_client" class="mr-sm-2">Contact Client </label>
                                                <select class="select form-control contact_client" name="contact_client">
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="__" class="mr-sm-2">_ </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" disabled name="__">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="port" class="mr-sm-2">Port: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" disabled name="port">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="email" class="mr-sm-2">Email: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" disabled name="email">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="fax" class="mr-sm-2">Fax: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" disabled name="fax">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="tel" class="mr-sm-2">Tel: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" disabled name="tel">
                                            </div>
                                        </div>
                                        <h5>DETAILS DEMANDE_____</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="date_de_debut" class="mr-sm-2">Date de debut: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" disabled name="date_de_debut">
                                                <input class="form-check-input" type="checkbox" id="asap"> ASAP<br>
                                                <input type="hidden" name='asap'>
                                                <label for="duree" class="mr-sm-2">Duree: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" name="duree">
                                                <label for="puv" class="mr-sm-2">PUV: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" name="puv">
                                                <label for="nb_de_postes" class="mr-sm-2">Nb de postes: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" name="nb_de_postes">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="client_final" class="mr-sm-2">Client Final: </label>
                                                <select class="select form-control client_final" name="client_final">
                                                </select>
                                                <label for="lieu" class="mr-sm-2">Lieu: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" name="lieu">
                                                <input class="form-check-input" type="checkbox" id="mobilite"> Mobilite<br>
                                                <input type="hidden" name="mobilite">
                                                <label for="pua" class="mr-sm-2">PUA <= </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" name="pua">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <label for="commentaires" class="mr-sm-2">Commentaires: </label>
                                                <input type="text" class="form-control mb-2 mr-sm-2" name="commentaires">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>PROFIL RECHERCHE _____</h5>
                                        <label for="nom_profil" class="mr-sm-2">Nom profil (client) * </label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="nom_profil">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="profils" class="mr-sm-2">Profils:</label>
                                                <select class="select form-control addProfil" name="addProfil[]" required multiple>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="experience" class="mr-sm-2">Expérience:</label>
                                                <select class="select form-control addExperience" name="addExperience[]" multiple>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="language" class="mr-sm-2">Langues:</label>
                                                <select class="select form-control addLanguages" name="addLanguages[]" multiple>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="outils" class="mr-sm-2">Outils:</label>
                                                <select class="select form-control addOutils" name="addOutils[]" multiple>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="environment_reason" class="mr-sm-2">Environnements Réseau:</label>
                                                <select class="select form-control addEnvironments" name="addEnvironments[]" multiple>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="programming_language" class="mr-sm-2">Langages de prog:</label>
                                                <select class="select form-control addLanguagePro" name="addLanguagePro[]" multiple>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>PROFILS POTENTIELS: <b>10 CV trouve(s)</b></h5>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>NOM</th>
                                                <th>Prenom</th>
                                                <th>Ville</th>
                                                <th>DateCreation</th>
                                                <th>DerniereMaj</th>
                                                <th>DateDispo</th>
                                                <th>Experience</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cv_tbody">
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
                        <th>Ref Demande</th>
                        <th>Date Dde</th>
                        <th>Commercial</th>
                        <th>Profil</th>
                        <th>Nb</th>
                        <th>Duree</th>
                        <th>Client Soft</th>
                        <th>Date Deb</th>
                        <th>Date Fermeture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="demand_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/demand.js?<?php echo time(); ?>"></script>
</body>

</html>