@extends('layout.master')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Tableau de bord</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">

  </div>
</div>


<div class="row">
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body">
          <h1> Bonjour <span class="text-primary">{{ auth()->user()->nom .' '. auth()->user()->prenom }}</span></h1>
      </div>
    </div>
  </div>
</div> <!-- row -->

@endsection

