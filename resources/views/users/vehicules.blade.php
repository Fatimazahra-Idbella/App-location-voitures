@extends('layouts.body')

@section('Title')
    Vehicules
@endsection

@section('vehicules_active')
active bg-gradient-primary 
@endsection

@section('page_name')
    Vehicules
@endsection

@section('main_content')
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
              <h6 class="text-white text-capitalize ps-3">Cars table</h6>
              @yield('table1add')
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Voiture</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Matricule</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date d'entrer</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">assurance</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">visite technique</th>
                    @yield('table1th')
                  </tr>
                </thead>
                <tbody>
                  @section('tableCars')
                  @foreach ($cars as $car)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/small-logos/{{ $car->marque}}.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $car->marque}}">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $car->marque}} {{ $car->model}}</h6>
                          <p class="text-xs text-secondary mb-0">Model : 2022</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 " >{{ $car->matriculG}} /&nbsp<bdi>{{ $car->matriculL}}</bdi>&nbsp/ {{ $car->matriculS}}</p>
                      <p class="text-xs text-secondary mb-0">text</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">Disponible</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">
                        @foreach ($assurances as $assurance)
                        @if ($assurance->papier_id == $car->id)
                        {{$assurance->assurance}}
                        @break
                        @endif
                        @endforeach
                        {{-- {{ $car->assurance}} --}}
                      </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">
                        @foreach ($visites as $visite)
                        @if ($visite->papier_id == $car->id)
                        {{$visite->visite}}
                        @break
                        @endif
                        @endforeach
                        {{-- {{ $car->visite}} --}}
                      </span>
                    </td>
                    @yield('table1td')
                  </tr>
                  @endforeach
                  @show
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
{{-- Status Cars --}}
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Status Voiture</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Budget</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($voittures as $voitture)
                  <tr>
                    <td>
                      <div class="d-flex px-2">
                        <div>
                          <img src="../assets/img/small-logos/{{ $voitture->marque}}.svg" class="avatar avatar-sm rounded-circle me-2" alt="{{ $voitture->marque}}">
                        </div>
                        <div class="my-auto">
                          <h6 class="mb-0 text-sm">{{ $voitture->marque}} {{ $voitture->model}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">$2,500</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">working</span>
                    </td>
                    <td class="align-middle text-center">
                      <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <button class="btn btn-link text-secondary mb-0">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
                              $(document).ready( function() {
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#d_Compteurcar_add').val(today);
});
    </script>
@endsection
