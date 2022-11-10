<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cvlist extends Model
{
    protected $table = 'cv_list';
    
    protected $fillable = [
        'cv_nom',
        'cv_prenom',
        'cv_lien',
        'cv_adresse',
        'cv_loc',
        'cv_ville',
        'cv_fix',
        'cv_mob',
        'cv_email',
        'cv_emailsoft',
        'id_statut',
        'id_fnr',
        'cv_com',
        'tjm',
        'cjm',
        'id_xp',
        'cv_creation',
        'cv_maj',
        'cv_dispo',
        'permisB',
        'cv_ss',
        'cv_naiss',
        'cv_nat',
        'cv_indispo'
    ];
}
