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
</div>

@if(auth()->user()->status == 'Admin' || auth()->user()->status == 'enseignant')
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Étudiants par filière</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xl-5">
                                        <h3 class="mb-2">Total: {{ $etudiantFiliereStats['totalEtudiant'] }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            {{--
                                            <p class="text-danger">
                                                <span>-2.8%</span>
                                                <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                            </p>
                                            --}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-7">
                                        <div id="etudiantFiliereChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        var studentstats = {!! json_encode($etudiantFiliereStats) !!}
    </script>
    <script src="{{ asset('assets/js/customChart.js') }}"></script>
@endpush

