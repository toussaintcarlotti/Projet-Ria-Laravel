<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;

function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function format_edt(Collection $edt) {
    foreach ($edt as $class) {
        $class['start'] = $class->date_debut;
        $class['end'] = $class->date_fin;
        $class['title'] = $class->cours->matiere->libelle_matiere;
        $class['description'] = $class->information;
    }
    return $edt;
}
