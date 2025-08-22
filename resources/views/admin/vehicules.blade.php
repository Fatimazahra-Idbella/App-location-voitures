
@php
    use Carbon\Carbon;
    $carassurance='1000-01-01';
    // $intervalle_assurance='1';
    // $perceassurance='1';
    // $difference='1';
    $carvisite='';
@endphp
@extends('users.vehicules')
@if (Auth::user()->isAdmin)
@section('head')
    <style>

    </style>
@endsection

@section('table1add')
    <div >
        <button onclick="addcar()" type="button" class="btn btn-info mr-3" data-toggle="modal" data-target="#AddCarModal" style="margin: 0px">Ajouter vehicule</button>
    </div>
@endsection

@section('tableCars')
@foreach ($cars as $car)
<tr>
  <td>
    <div class="d-flex px-2 py-1">
      <div>
        <img src="../assets/img/small-logos/{{ $car->marque}}.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
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
        <div class="flex-column align-items-center justify-content-center">
            <div>
                    <span class="text-secondary text-xs font-weight-bold">
                        {{$car->assurance}}
                    </span>
            </div>
            <div>
                @php
               $intervalle_assurance = $car->intervalle_assurance ?? 0;
    $oldDate = $car->assurance ? Carbon::parse($car->assurance) : Carbon::now();
    $currentDate = Carbon::now();
    $difference = ($oldDate->diffInDays($currentDate) - $intervalle_assurance) * -1;

    $durerPlaquette = $intervalle_assurance;

    if ($durerPlaquette > 0) {
        $contpercepl = $durerPlaquette / 100;
        $perceassurance = $difference / $contpercepl;
    } else {
        $perceassurance = 0;
    }
                @endphp
                <div class="progress mx-auto">
                <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$perceassurance}}%;"></div>
                </div>
            </div>
            <div>
                <span class="text-xs font-weight-bold j_plaque" style="
                color:
                    @if($perceassurance > 50)
                        rgb(0, {{ (255 * ($perceassurance - 50)) / 50 }}, 0)
                    @elseif($perceassurance < 50)
                        rgb({{ (255 * (50 - $perceassurance)) / 50 }}, 0, 0)
                    @else
                        black
                    @endif">
                    @if ($difference==1 || $difference==-1 || $difference==0)
                            {{$difference}} jour
                    @else
                            {{$difference}} jours
                    @endif
                </span>
            </div>
            </div>
  </td>
  <td class="align-middle text-center">
    <div class="flex-column align-items-center justify-content-center">
        <div>
                <span class="text-secondary text-xs font-weight-bold">
                    {{$car->visite}}
                </span>
        </div>
        <div>
            @php
                $intervalle_visit = $car->intervalle_visit ?? 0; // sécuriser si null
$oldDate = $car->visite ? \Carbon\Carbon::parse($car->visite) : \Carbon\Carbon::now();
$currentDate = \Carbon\Carbon::now();
$difference = ($oldDate->diffInDays($currentDate) - $intervalle_visit) * -1;

$durerPlaquette = $intervalle_visit;

if ($durerPlaquette > 0) {
    $contpercepl = $durerPlaquette / 100;
    $percevisite = $difference / $contpercepl;
} else {
    $percevisite = 0; // éviter la division par zéro
}
            @endphp
            <div class="progress mx-auto">
            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$percevisite}}%;"></div>
            </div>
        </div>
        <div>
            <span class="text-xs font-weight-bold j_plaque" style="
            color:
                @if($percevisite > 50)
                    rgb(0, {{ (255 * ($percevisite - 50)) / 50 }}, 0)
                @elseif($percevisite < 50)
                    rgb({{ (255 * (50 - $percevisite)) / 50 }}, 0, 0)
                @else
                    black
                @endif">
                @if ($difference==1 || $difference==-1 || $difference==0)
                        {{$difference}} jour
                @else
                        {{$difference}} jours
                @endif
            </span>
        </div>
        </div>
  </td>
  {{-- <td class="align-middle text-center">
    <a href="javascript:void(0)" onclick="editcar({{ $car->id }})" class="text-warning font-weight-bold text-xs" data-toggle="modal" data-target="#EditcarModal">
        Edit
    </a>
</td>
<td class="align-middle text-center">
    <a href="javascript:void(0)" onclick="deletCar({{ $car->id }})" class="text-danger font-weight-bold text-xs" data-toggle="modal" data-target="#EditcarModal">
        Delete
    </a>
</td> --}}

<td class="align-middle text-center">
    <a href="javascript:void(0)" onclick="addincar({{ $car->id }})" class="text-success font-weight-bold text-xs" data-toggle="modal" data-target="#addincarModal">
        Add
    </a>
    <br>
    <a href="javascript:void(0)" onclick="editcar({{ $car->id }})" class="text-warning font-weight-bold text-xs" data-toggle="modal" data-target="#EditCarModal">
        Update
    </a>
</td>
<td class="align-middle text-center">
    <a href="javascript:void(0)" onclick="printrepair({{ $car->id }})" class="text-info font-weight-bold text-xs" data-toggle="modal" data-target="#printrepairModal">
        Print
    </a>
    <br>
    <a href="javascript:void(0)" onclick="deletCar({{ $car->id }})" class="text-danger font-weight-bold text-xs" data-toggle="modal" data-target="#deletCarModal">
        Delete
    </a>
</td>
  @yield('table1td')
</tr>
@endforeach
@endsection

@section('table1th')
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Action</th>
@endsection

@section('modal')
<!-- Button trigger modal -->

    <!-- Modal ajouter -->
    <div class="modal fade" id="AddCarModal" tabindex="-1" role="dialog" aria-labelledby="AddCarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ Route('admin.car.store') }}" role="form" class="text-start">
            <div class="modal-header">
            <h5 class="modal-title" id="AddCarModalLabel">Ajouter vehicule</h5>
            <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    
                        @csrf
                        <table>
                            <tr>
                                <td>Marque</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <select class="form-control text-center" name="marquecar" id="marquecar" required>
                                            <option value="" disabled selected>...</option>
                                            <option value="Citroen">Citroën</option>
                                            <option value="Dacia">Dacia</option>
                                            <option value="Fiat">Fiat</option>
                                            <option value="Ford">Ford</option>
                                            <option value="Hyundai">Hyundai</option>
                                            <option value="Jeep">Jeep</option>
                                            <option value="Kia">Kia</option>
                                            <option value="Land_Rover">Land Rover</option>
                                            <option value="Mercedes">Mercedes</option>
                                            <option value="Mitsubishi">Mitsubishi</option>
                                            <option value="Nissan">Nissan</option>
                                            <option value="Opel">Opel</option>
                                            <option value="Peugeot">Peugeot</option>
                                            <option value="Renault">Renault</option>
                                            <option value="Seat">Seat</option>
                                            <option value="Skoda">Skoda</option>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Volkswagen">Volkswagen</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Model') }}" id="modelcar" name="modelcar" type="text" class="form-control @error('modelcar') is-invalid @enderror" required autocomplete="modelcar" autofocus>
                                        @error('modelcar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Matricule</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Matricule') }}" id="matriculeG" name="matriculeG" type="text" class="form-control @error('matriculeG') is-invalid @enderror" required autocomplete="matriculeG" autofocus>
                                        @error('matriculeG')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select class="form-control text-center mx-3" name="MatriculeL" id="MatriculeL" required>
                                            <option value="" disabled selected>..</option>
                                            <option value="أ">أ</option>
                                            <option value="ب">ب</option>
                                            <option value="د">د</option>
                                            <option value="و">و</option>
                                            <option value="ط">ط</option>
                                            <option value="هـ">هـ</option>
                                        </select>
                                        <input placeholder="{{ __('Matricule') }}" id="matriculeS" name="matriculeS" type="text" class="form-control @error('matriculeS') is-invalid @enderror" required autocomplete="matriculeS" autofocus>
                                        @error('matriculeS')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Assurance</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Assurance') }}" id="assurancecar" name="assurancecar" type="date" class="form-control @error('assurancecar') is-invalid @enderror" required autocomplete="assurancecar" autofocus>
                                        @error('assurancecar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select name="inter_assurance" id="inter_assurance" class="form-control text-center ml-3">
                                            <option value="30">1 Moi</option>
                                            <option value="91">3 Mois</option>
                                            <option value="182">6 Mois</option>
                                            <option value="365" selected>12 Mois</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Visite technique</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Visite technique') }}" id="visitetechnique" name="visitetechnique" type="date" class="form-control @error('visitetechnique') is-invalid @enderror" required autocomplete="visitetechnique" autofocus>
                                        @error('visitetechnique')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select name="inter_visite" id="inter_visite" class="form-control text-center ml-3">
                                            <option value="182">6 Mois</option>
                                            <option value="365" selected>1 An</option>
                                            <option value="730">2 Ans</option>
                                            <option value="1825">5 Ans</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Autorisation de cerculation</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Autorisation de cerculation') }}" id="auto_cercu" name="auto_cercu" type="date" class="form-control @error('auto_cercu') is-invalid @enderror" autocomplete="auto_cercu" autofocus>
                                        @error('auto_cercu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select name="inter_cercu" id="inter_cercu" class="form-control text-center ml-3">
                                            <option value="30" selected>provisoire</option>
                                            <option value="1825">5 Ans</option>
                                            <option value="2191">6 Ans</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Compteur Km</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Compteur Km') }}" id="Compteurcar" name="Compteurcar" type="number" class="form-control @error('Compteurcar') is-invalid @enderror" required autocomplete="Compteurcar" autofocus>
                                        @error('Compteurcar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input id="d_Compteurcar_add" name="d_Compteurcar" type="date" class="form-control ml-3 @error('d_Compteurcar') is-invalid @enderror">
                                        @error('d_Compteurcar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </td>
                            </tr>
                        </table>
                    
                    </div>
            </div>
            <div class="modal-footer">
            <button onclick="modalclosebtn()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <input type="submit"class="btn btn-info" value="Save changes">
            </div>
        </form>
        </div>
        </div>
    </div>
    <!-- Modal ajouter in car -->
    <div class="modal fade" id="AddinCarModal" tabindex="-1" role="dialog" aria-labelledby="AddinCarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ Route('admin.storeincar') }}" role="form" class="text-start">
            <div class="modal-header">
            <h5 class="modal-title">Ajouter info vehicule</h5>
            <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    
                        @csrf
                        <table>
                            <tr>
                                <td>Marque</td>
                                <td>
                                    <input type="hidden" name="id" id="addidincar">
                                    <div class="input-group input-group-outline my-3">
                                        <select class="form-control text-center" name="marquecar" id="marqueincar" disabled>
                                            <option >...</option>
                                            <option value="Citroen">Citroën</option>
                                            <option value="Dacia">Dacia</option>
                                            <option value="Fiat">Fiat</option>
                                            <option value="Ford">Ford</option>
                                            <option value="Hyundai">Hyundai</option>
                                            <option value="Jeep">Jeep</option>
                                            <option value="Kia">Kia</option>
                                            <option value="Land_Rover">Land Rover</option>
                                            <option value="Mercedes">Mercedes</option>
                                            <option value="Mitsubishi">Mitsubishi</option>
                                            <option value="Nissan">Nissan</option>
                                            <option value="Opel">Opel</option>
                                            <option value="Peugeot">Peugeot</option>
                                            <option value="Renault">Renault</option>
                                            <option value="Seat">Seat</option>
                                            <option value="Skoda">Skoda</option>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Volkswagen">Volkswagen</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Model') }}" id="modelincar" name="modelcar" type="text" class="form-control @error('modelcar') is-invalid @enderror" required autocomplete="modelcar" disabled>
                                        @error('modelcar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Matricule</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Matricule') }}" id="matriculeinG" name="matriculeG" type="text" class="form-control @error('matriculeG') is-invalid @enderror" required autocomplete="matriculeG" disabled>
                                        @error('matriculeG')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select class="form-control text-center mx-3" name="MatriculeL" id="MatriculeinL" disabled>
                                            <option value="" disabled selected>..</option>
                                            <option value="أ">أ</option>
                                            <option value="ب">ب</option>
                                            <option value="د">د</option>
                                            <option value="و">و</option>
                                            <option value="ط">ط</option>
                                            <option value="هـ">هـ</option>
                                        </select>
                                        <input placeholder="{{ __('Matricule') }}" id="matriculeinS" name="matriculeS" type="text" class="form-control @error('matriculeS') is-invalid @enderror" required autocomplete="matriculeS" disabled>
                                        @error('matriculeS')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nouvelle Assurance</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Assurance') }}" id="assurancecar" name="assurancecar" type="date" class="form-control" autofocus>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nouveau Visite technique</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Visite technique') }}" id="visitetechnique" name="visitetechnique" type="date" class="form-control" autofocus>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Autorisation de cerculation</td>
                                <td>
                                    <div class="input-group input-group-outline my-3">
                                        <input placeholder="{{ __('Autorisation de cerculation') }}" id="auto_cercu" name="auto_cercu" type="date" class="form-control" autofocus>
                                        {{-- <select name="inter_cercu" id="inter_cercu" class="form-control text-center ml-3">
                                            <option value="30" selected>provisoire</option>
                                            <option value="1825">5 Ans</option>
                                            <option value="2191">6 Ans</option>
                                        </select> --}}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    
                    </div>
            </div>
            <div class="modal-footer">
            <button onclick="modalclosebtn()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            <input type="submit"class="btn btn-info" value="Save changes">
            </div>
        </form>
        </div>
        </div>
    </div>
        <!-- Modal modifier -->
        <div class="modal fade" id="EditCarModal" tabindex="-1" role="dialog" aria-labelledby="EditCarModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="formUpdateCar" method="POST" action="" role="form" class="text-start">
                @csrf
                @method('PUT')
                <div class="modal-header">
                <h5 class="modal-title">Modifier vehicule</h5>
                <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                            <input type="hidden" name="id" id="Editid">
                            <table>
                                <tr>
                                    <td>Marque</td>
                                    <td>
                                        <div class="input-group input-group-outline my-3">
                                            <select class="form-control text-center" name="marquecar" id="Editmarquecar" value="{{ old('marquecar') }}" required>
                                                <option >...</option>
                                                <option value="Citroen">Citroën</option>
                                                <option value="Dacia">Dacia</option>
                                                <option value="Fiat">Fiat</option>
                                                <option value="Ford">Ford</option>
                                                <option value="Hyundai">Hyundai</option>
                                                <option value="Jeep">Jeep</option>
                                                <option value="Kia">Kia</option>
                                                <option value="Land_Rover">Land Rover</option>
                                                <option value="Mercedes">Mercedes</option>
                                                <option value="Mitsubishi">Mitsubishi</option>
                                                <option value="Nissan">Nissan</option>
                                                <option value="Opel">Opel</option>
                                                <option value="Peugeot">Peugeot</option>
                                                <option value="Renault">Renault</option>
                                                <option value="Seat">Seat</option>
                                                <option value="Skoda">Skoda</option>
                                                <option value="Toyota">Toyota</option>
                                                <option value="Volkswagen">Volkswagen</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>
                                        <div class="input-group input-group-outline my-3">
                                            <input placeholder="{{ __('Model') }}" id="Editmodelcar" name="modelcar" type="text" class="form-control @error('modelcar') is-invalid @enderror" value="{{ old('modelcar') }}" required autocomplete="modelcar" autofocus>
                                            @error('modelcar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Matricule</td>
                                    <td>
                                        <div class="input-group input-group-outline my-3">
                                            <input placeholder="{{ __('Matricule') }}" id="EditmatriculeG" name="matriculeG" type="text" class="form-control @error('matriculeG') is-invalid @enderror" value="{{ old('matriculeG') }}" required autocomplete="matriculeG" autofocus>
                                            @error('matriculeG')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <select class="form-control text-center mx-3" name="MatriculeL" id="EditMatriculeL" value="{{ old('MatriculeL') }}" required>
                                                <option >..</option>
                                                <option value="أ">أ</option>
                                                <option value="ب">ب</option>
                                                <option value="د">د</option>
                                                <option value="و">و</option>
                                                <option value="ط">ط</option>
                                                <option value="هـ">هـ</option>
                                            </select>
                                            <input placeholder="{{ __('Matricule') }}" id="EditmatriculeS" name="matriculeS" type="text" class="form-control @error('matriculeS') is-invalid @enderror" value="{{ old('matriculeS') }}" required autocomplete="matriculeS" autofocus>
                                            @error('matriculeS')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Assurance</td>
                                    <td>
                                        <div class="input-group input-group-outline my-3">
                                            <input placeholder="{{ __('Assurance') }}" id="Editassurancecar" name="assurancecar" type="date" class="form-control @error('assurancecar') is-invalid @enderror" required autocomplete="assurancecar" autofocus>
                                            @error('assurancecar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <select name="inter_assurance" id="Editinter_assurance" class="form-control text-center ml-3">
                                                <option value="30">1 Moi</option>
                                                <option value="91">3 Mois</option>
                                                <option value="182">6 Mois</option>
                                                <option value="365">12 Mois</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Visite technique</td>
                                    <td>
                                        <div class="input-group input-group-outline my-3">
                                            <input placeholder="{{ __('Visite technique') }}" id="Editvisitetechnique" name="visitetechnique" type="date" class="form-control @error('visitetechnique') is-invalid @enderror" required autocomplete="visitetechnique" autofocus>
                                            @error('visitetechnique')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <select name="inter_visite" id="Editinter_visite" class="form-control text-center ml-3">
                                                <option value="182">6 Mois</option>
                                                <option value="365">1 An</option>
                                                <option value="730">2 Ans</option>
                                                <option value="1825">5 Ans</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Autorisation de cerculation</td>
                                    <td>
                                        <div class="input-group input-group-outline my-3">
                                            <input placeholder="{{ __('Autorisation de cerculation') }}" id="Editauto_cercu" name="auto_cercu" type="date" class="form-control @error('auto_cercu') is-invalid @enderror" required autocomplete="auto_cercu" autofocus>
                                            @error('auto_cercu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <select name="inter_cercu" id="Editinter_cercu" class="form-control text-center ml-3">
                                                <option value="30">provisoire</option>
                                                <option value="1825">5 Ans</option>
                                                <option value="2191">6 Ans</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Compteur Km</td>
                                    <td>
                                        <div class="input-group input-group-outline my-3">
                                            <input placeholder="{{ __('Compteur Km') }}" id="EditCompteurcar" name="Compteurcar" type="number" class="form-control mr-2 @error('Compteurcar') is-invalid @enderror" value="{{ old('Compteurcar') }}" required autocomplete="Compteurcar" autofocus>
                                            @error('Compteurcar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input id="d_Compteurcar_edit" name="d_Compteurcar" type="date" class="form-control ml-2">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        
                        </div>
                </div>
                <div class="modal-footer">
                <button onclick="modalclosebtn()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <input type="submit"class="btn btn-info" value="Save changes">
                </div>
            </form>
            </div>
            </div>
        </div>
                {{-- Delete Modal --}}
    <div class="modal fade" id="deletCarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this user.</p>
                </div>
                <div class="modal-footer">
                    <button onclick="modalclosebtn()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <form action="" id="deletCarForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>


<script>

        function addcar() {
        console.log("add car btn");
        $('#AddCarModal').modal('toggle');
    }
        function editcar(id) {
        console.log("edit car btn");
        $('#EditCarModal').modal('toggle');

        $.get("/admin/car/" + id, function(car) {
            
            $('#Editmarquecar').val(car.marque);
            $('#Editmodelcar').val(car.model);
            $('#EditmatriculeG').val(car.matriculG);
            $('#EditMatriculeL').val(car.matriculL);
            $('#EditmatriculeS').val(car.matriculS);
            $('#Editassurancecar').val(car.assurance);
            $('#Editinter_assurance').val(car.intervalle_assurance);
            $('#Editvisitetechnique').val(car.visite);
            $('#Editinter_visite').val(car.intervalle_visit);
            $('#Editauto_cercu').val(car.circulation);
            $('#Editinter_cercu').val(car.intervalle_circulation);
            $('#EditCompteurcar').val(car.compteur);
            $('#d_Compteurcar_edit').val(car.d_compteur);
            $('#Editid').val(car.id);
            $('#formUpdateCar').attr('action', "/admin/car/" + id);
        });


    }
    function addincar(id) {
                    console.log("add in car btn");
                    $('#AddinCarModal').modal('toggle');

                    $.get("/admin/car/" + id, function(car) {
                        
                        $('#marqueincar').val(car.marque);
                        $('#modelincar').val(car.model);
                        $('#matriculeinG').val(car.matriculG);
                        $('#MatriculeinL').val(car.matriculL);
                        $('#matriculeinS').val(car.matriculS);
                        $('#addidincar').val(car.id);
                    });
                }
    function deletCar(id) {
        console.log("delet btn");
        $('#deletCarModal').modal('toggle');
        $('#deletCarForm').attr('action', "/admin/car/" + id);
    }
    function modalclosebtn() {
        console.log("close modal btn");
        $('#AddCarModal').modal('hide');
        $('#EditCarModal').modal('hide');
        $('#AddinCarModal').modal('hide');
        $('#deletCarModal').modal('hide');
    }

</script>
@endsection
@endif