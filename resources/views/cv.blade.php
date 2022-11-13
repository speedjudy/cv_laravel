<!DOCTYPE html>
<html lang="en">

<head>
    <title>CV</title>
    @include('layout.head')
</head>

<body>

    <div class="container">
        @include('sidebar')
        <div class="row">
            <div class="col-sm-3">
                <img src="../assets/imgs/A2SEXPERT-tit.png" width=120></img>
            </div>
            <div class="col-sm-3">
                <form class="form-inline">
                    <label for="nom" class="mr-sm-2">Nom :</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="nom">
                    <label for="prénom" class="mr-sm-2">prénom:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="prénom">
                </form>
            </div>
            <div class="col-sm-3">
                <label for="available_from" class="mr-sm-2">Disponible a partir du :</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="available_from">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="dept" class="mr-sm-2">Dept:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="dept">
                    </div>
                    <div class="col-sm-6">
                        <label for="pua" class="mr-sm-2">PUA<=</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="pua">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <label for="tags" class="mr-sm-2">Tags:</label>
                <select class="select form-control searchTags" multiple>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label for="profils" class="mr-sm-2">Profils:</label>
                <select class="select form-control searchProfil" multiple>
                </select>
                <input class="form-check-input" type="checkbox" id="include_unavailable"> Inclure les CV marques indisponibles
            </div>
            <div class="col-sm-2">
                <label for="experience" class="mr-sm-2">Expérience:</label>
                <select class="select form-control searchExperience" multiple>
                </select>
                <label for="status" class="mr-sm-2">Statuts:</label>
                <select class="select form-control searchStatus" multiple>
                </select>
            </div>
            <div class="col-sm-2">
                <label for="clients" class="mr-sm-2">Clients:</label>
                <select class="select form-control searchClients" multiple style="height: 228px;">
                </select>
            </div>
            <div class="col-sm-3">
                <label for="language" class="mr-sm-2">Langues:</label>
                <select class="select form-control searchLanguages" multiple>
                </select>
                <label for="environment_reason" class="mr-sm-2">Environnements Réseau:</label>
                <select class="select form-control searchEnvironments" multiple>
                </select>
            </div>
            <div class="col-sm-2">
                <label for="outils" class="mr-sm-2">Outils:</label>
                <select class="select form-control searchOutils" multiple>
                </select>
                <label for="programming_language" class="mr-sm-2">Langages de prog:</label>
                <select class="select form-control searchLanguagePro" multiple>
                </select>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" style="width:100%;" id="searchCV">RECHERCHER</button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" style="width:100%;" id="resetBtn">RESET</button>
            </div>
        </div>
        <br />
        
        <h5>Resultats de votre recherche: <b>10 CV trouve(s)</b></h5>
        <button type="button" class="btn btn-primary" style="width:100%;" data-bs-toggle="modal" data-bs-target="#myModal">Ajouter un nouveau cv</button>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">CV liste</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form action="/cv/saveData" id="cv_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body" style="overflow-y: scroll;max-height: 500px;">
                            @csrf
                            <input type="hidden" name="cv_id">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="../assets/imgs/A2SEXPERT1.png" width=100></img>
                                </div>
                                <div class="col-sm-2">
                                    <label for="add_cv_n" class="mr-sm-2">CV n</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_cv_n_" id="add_cv_n" disabled>
                                    <input type="hidden" class="form-control mb-2 mr-sm-2" name="add_cv_n" id="add_cv_n_real">
                                </div>
                                <div class="col-sm-2">
                                    <label for="add_cree" class="mr-sm-2">Cree le</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_cree_" value='<?php echo date('Y-m-d');?>' id="add_cree" disabled>
                                    <input type="hidden" class="form-control mb-2 mr-sm-2" name="add_cree" value='<?php echo date('Y-m-d');?>' id="add_cree">
                                </div>
                                <div class="col-sm-2">
                                    <label for="add_derniere" class="mr-sm-2">Derniere mise a jour</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_derniere" id="add_derniere">
                                </div>
                                <div class="col-sm-4">
                                    <label for="add_indisponible" class="mr-sm-2">Indisponible</label><br>
                                    <input class="form-check-input" type="checkbox" name="add_indisponible" id="add_indisponible"> 
                                    <input type="hidden" name="add_indis" value="False">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="add_nom" class="mr-sm-2">NOM</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_nom" id="add_nom" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_prenom" class="mr-sm-2">Prenom</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_prenom" id="add_prenom">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_nss" class="mr-sm-2">N SS</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_nss" id="add_nss">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_dateNaiss" class="mr-sm-2">Date Naiss</label><br>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_dateNaiss" id="add_dateNaiss">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="add_address" class="mr-sm-2">Adresse</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_address" id="add_address">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_telFixe" class="mr-sm-2">Tel fixe</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_telFixe" id="add_telFixe">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_port" class="mr-sm-2">Port</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_port" id="add_port">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_nationalite" class="mr-sm-2">Nationalite</label><br>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_nationalite" id="add_nationalite">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="add_cp" class="mr-sm-2">CP</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_cp" id="add_cp">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_ville" class="mr-sm-2">Ville</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_ville" id="add_ville">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_email" class="mr-sm-2">Email</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_email" id="add_email">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_emailSoft" class="mr-sm-2">Email soft</label><br>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_emailSoft" id="add_emailSoft">
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="add_statut" class="mr-sm-2">Statuts</label>
                                    <select class="select form-control add_statut" name="add_statut">
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_fournisseur" class="mr-sm-2">Fournisseur</label>
                                    <select class="select form-control add_fournisseur" name="add_fournisseur"></select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_permis" class="mr-sm-2">Permis B</label><br>
                                    <input class="form-check-input" type="checkbox" name="add_permis" id="add_permis"> 
                                    <input type="hidden" name="add_permit" value="False">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_puv" class="mr-sm-2">PUV(€)</label><br>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_puv" id="add_puv">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="add_experience" class="mr-sm-2">Experience</label>
                                    <select class="select form-control add_experience" name="add_experience">
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_dateDisponibilite" class="mr-sm-2">Date Disponibilite</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_dateDisponibilite" id="add_dateDisponibilite">
                                </div>
                                <div class="col-sm-3">
                                    <label for="add_pua" class="mr-sm-2">PUA(€)</label><br>
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="add_pua" id="add_pua">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="profils" class="mr-sm-2">Profils:</label>
                                    <select class="select form-control addProfil" name="addProfil[]" required multiple>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="clients" class="mr-sm-2">Clients:</label>
                                    <select class="select form-control addClients" name="addClients[]" required multiple>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="language" class="mr-sm-2">Langues:</label>
                                    <select class="select form-control addLanguages" name="addLanguages[]" required multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="environment_reason" class="mr-sm-2">Environnements Réseau:</label>
                                    <select class="select form-control addEnvironments" name="addEnvironments[]" required multiple>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="outils" class="mr-sm-2">Outils:</label>
                                    <select class="select form-control addOutils" name="addOutils[]" required multiple>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="programming_language" class="mr-sm-2">Langages de prog:</label>
                                    <select class="select form-control addLanguagePro" name="addLanguagePro[]" required multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="add_accessCVcomplete" class="mr-sm-2">Acces au CV complet</label>
                                    <input type="file" class="form-control mb-2 mr-sm-2" name="add_accessCVcomplete" id="add_accessCVcomplete">
                                    <label for="add_commentaires" class="mr-sm-2">Commentaires</label>
                                    <textarea class="form-control mb-2 mr-sm-2" name="add_commentaires" id="add_commentaires" >
                                    </textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label for="tags" class="mr-sm-2">Tags:</label>
                                    <select class="select form-control addTags" name="addTags[]" required multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Liste des INTERVENTIONS</h5>
                                <a id="calendar_btn"><button type="button" class="btn btn-primary" style="width:200px;">Calendar</button></a>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>MISSION</th>
                                            <th>Client Soft</th>
                                            <th>Debut</th>
                                            <th>Fin</th>
                                            <th>Fournisseur</th>
                                            <!-- <th>Commentaire</th> -->
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
                            <button type="submit" class="btn btn-success" id="cv_save_btn">Save</button>
                            <button type="button" class="btn btn-danger close_btn" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
                    
            </div>
        </div>

        <div class="row">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cv_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/js/cv.js?<?php echo time(); ?>"></script>
</body>

</html>