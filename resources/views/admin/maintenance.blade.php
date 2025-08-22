@php
    use Carbon\Carbon;
@endphp
@extends('users.maintenance')
@if (Auth::user()->isAdmin)
@section('repair_table')
<table class="table align-items-center justify-content-center mb-0">
    <thead>
        <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">videnge</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">plaquette</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">croix chaine</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" colspan="2">Action</th>
        </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="../assets/img/small-logos/{{ $car->marque}}.svg" class="avatar avatar-sm rounded-circle me-2" alt="{{ $car->marque}}">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $car->marque}} {{ $car->model}}</h6>
                            <p class="text-xs text-secondary font-weight-bold mb-0">{{ $car->matriculG}} /&nbsp<bdi>{{ $car->matriculL}}</bdi>&nbsp/ {{ $car->matriculS}}</p>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <div class="flex-column align-items-center justify-content-center">
                        <div>
                            @php
                            
                                $durervidenge = $car->intervalle_videnge ?? 0; // sécuriser si null
$contvidenge = $car->videnge - $car->compteur + $durervidenge;

if ($durervidenge > 0) {
    $contperce = $durervidenge / 100;
    $percevidenge = $contvidenge / $contperce;
} else {
    $percevidenge = 0; // éviter la division par zéro
}
                                
                            @endphp
                            <span class="me-2 text-md font-weight-bold mb-0" style="
                            color:
                                @if($percevidenge > 50)
                                    rgb(0, {{ (255 * ($percevidenge - 50)) / 50 }}, 0)
                                @elseif($percevidenge < 50)
                                    rgb({{ (255 * (50 - $percevidenge)) / 50 }}, 0, 0)
                                @else
                                    black
                                @endif">
                                    {{ $contvidenge }}
                                    <input type="hidden" name="" value="{{$car->car_id}}">
                            </span>
                        </div>
                        <div>
                            <div class="progress mx-auto">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$percevidenge}}%;
                            background-color:
                                @if($percevidenge > 50)
                                    rgb(0, {{ (255 * ($percevidenge - 50)) / 50 }}, 0)
                                @elseif($percevidenge < 50)
                                    rgb({{ (255 * (50 - $percevidenge)) / 50 }}, 0, 0)
                                @else
                                    black
                                @endif"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-xs font-weight-bold">
                                @if ($car->videnge == 0)
                                    0
                                @else
                                    {{ $car->videnge}}
                                @endif
                            </span>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <div class="flex-column align-items-center justify-content-center">
                            <div>
                                @php
                                    $plaquette_d_videnge = date('Y-m-d');
                                    $plaquette_car_id = 0;
                                @endphp
                                <span class="me-2 text-sm font-weight-bold dt_paque">
                                    @foreach ($plaquettes as $plaquette)
                                    @if ($plaquette->car_id == $car->id)
                                    {{$plaquette->d_videnge}}
                                    @php
                                        $plaquette_d_videnge = $plaquette->d_videnge;
                                        $plaquette_car_id =$plaquette->car_id;
                                    @endphp
                                    @break
                                    @endif
                                    @endforeach
                                </span>
                            </div>
                            <div>
                                @php
                                   $oldDate = Carbon::parse($plaquette_d_videnge);
$currentDate = Carbon::now();
$durerPlaquette = $car->intervalle_plaquette ?? 0; // sécuriser si null
$difference = ($oldDate->diffInDays($currentDate) - $durerPlaquette) * -1;

if ($durerPlaquette > 0) {
    $contpercepl = $durerPlaquette / 100;
    $perceplaquette = $difference / $contpercepl;
} else {
    $perceplaquette = 0; // éviter la division par zéro
}
                                @endphp
                                <div class="progress mx-auto">
                                <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$perceplaquette}}%;"></div>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs font-weight-bold j_plaque" style="
                                color:
                                    @if($perceplaquette > 50)
                                        rgb(0, {{ (255 * ($perceplaquette - 50)) / 50 }}, 0)
                                    @elseif($perceplaquette < 50)
                                        rgb({{ (255 * (50 - $perceplaquette)) / 50 }}, 0, 0)
                                    @else
                                        black
                                    @endif">
                                    @if ($difference==1 || $difference==-1 || $difference==0)
                                        @if ($plaquette_car_id == $car->id)
                                            {{$difference}} jour
                                        @endif
                                    @else
                                        @if ($plaquette_car_id == $car->id)
                                            {{$difference}} jours
                                        @endif
                                    @endif
                                </span>
                            </div>
                            </div>
                    </td>
                    <td class="align-middle text-center">
                        <div class="flex-column align-items-center justify-content-center">
                        <div>
                            @php
                                $durerCroit = $car->intervalle_croix ?? 0; // sécuriser si null
$contCroit = 0 - $car->compteur + $durerCroit;

if ($durerCroit > 0) {
    $contpercecr = $durerCroit / 100;
    $perceCroit = $contCroit / $contpercecr;
} else {
    $perceCroit = 0; // éviter la division par zéro
}

$croixChaine_croix_chaine = 0;
                            @endphp
                            @foreach ($croixChaines as $croixChaine)
                                @if ($croixChaine->car_id == $car->id)
                                @php
                                    $croixChaine_croix_chaine = $croixChaine->croix_chaine;
                                    $contCroit = $croixChaine->videnge - $car->compteur + $durerCroit;
                                    $contpercecr =$durerCroit/100;
                                    $perceCroit = $contCroit/$contpercecr;
                                @endphp
                                @break
                                @endif
                            @endforeach
                            <span class="me-2 text-sm font-weight-bold " style="
                            color:
                                @if($perceCroit > 50)
                                    rgb(0, {{ (255 * ($perceCroit - 50)) / 50 }}, 0)
                                @elseif($perceCroit < 50)
                                    rgb({{ (255 * (50 - $perceCroit)) / 50 }}, 0, 0)
                                @else
                                    black
                                @endif">
                                    {{$contCroit}}
                            </span>
                        </div>
                        <div>
                            <div class="progress mx-auto">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$perceCroit}}%;
                            background-color:
                                @if($perceCroit > 50)
                                    rgb(0, {{ (255 * ($perceCroit - 50)) / 50 }}, 0)
                                @elseif($perceCroit < 50)
                                    rgb({{ (255 * (50 - $perceCroit)) / 50 }}, 0, 0)
                                @else
                                    black
                                @endif"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-xs font-weight-bold">
                                @if ($croixChaine_croix_chaine == 0)
                                    0
                                @else
                                    {{$croixChaine->videnge}}
                                    {{-- {{$croixChaine->updated_at}} --}}
                                @endif
                            </span>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <a href="javascript:void(0)" onclick="addrepair({{ $car->id }})" class="text-success font-weight-bold text-xs" data-toggle="modal" data-target="#addrepairModal">
                            Add
                        </a>
                        <br>
                        <a href="javascript:void(0)" onclick="editrepair({{ $car->id }})" class="text-warning font-weight-bold text-xs" data-toggle="modal" data-target="#editrepairModal">
                            Update
                        </a>
                    </td>
                    <td class="align-middle text-center">
                        <a href="javascript:void(0)" onclick="printrepair({{ $car->id }})" class="text-info font-weight-bold text-xs" data-toggle="modal" data-target="#printrepairModal">
                            Print
                        </a>
                        <br>
                        <a href="javascript:void(0)" onclick="deletrepairmodal({{ $car->id }})" class="text-danger font-weight-bold text-xs" data-toggle="modal" data-target="#deletrepairModal">
                            Delete
                        </a>
                    </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>

                    <!-- Modal ajouter -->
    <div class="modal fade" id="AddrepairModal" tabindex="-1" role="dialog" aria-labelledby="AddrepairModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddrepairModalLabel">Ajouter repair</h5>
                <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav d-flex justify-content-around w-100">
                            <label id="navCompteur" for="radioCompteur" role="button" onclick="chk_type_repair()" style="background-color: #7b809a;"><span class="nav-item nav-link">Compteur<span class="sr-only">(current)</span></span></label>
                            <label id="navVidenge" for="radioVidenge" role="button" onclick="chk_type_repair()"><span class="nav-item nav-link">Videnge</span></label>
                            <label id="navPlaquette" for="radioPlaquette" role="button" onclick="chk_type_repair()"><span class="nav-item nav-link">Plaquette</span></label>
                            <label id="navAutre" for="radioAutre" role="button" onclick="chk_type_repair()"><span class="nav-item nav-link">Autre repair</span></label>
                        </div>
                    </div>
                    <input type="radio" name="radiorepairnav" id="radioCompteur" onchange="chk_type_repair()" hidden>
                    <input type="radio" name="radiorepairnav" id="radioVidenge"onchange="chk_type_repair()" hidden>
                    <input type="radio" name="radiorepairnav" id="radioPlaquette"onchange="chk_type_repair()" hidden>
                    <input type="radio" name="radiorepairnav" id="radioAutre"onchange="chk_type_repair()" hidden>
                </nav>
                <div id="type_Vehicule" class="card-body pb-0">
                                    
                                    <table>
                                        <tr>
                                            <td>Vehicule</td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input id="addrepaircar" name="addrepaircar" type="text" value="{{ old('marquecar') }}" class="form-control text-center @error('addrepaircar') is-invalid @enderror" required autocomplete="addrepaircar" disabled>
                                                    @error('addrepaircar')
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
                                                    <input placeholder="{{ __('Matricule') }}" id="addmatriculeG" name="addmatriculeG" type="text" class="form-control @error('addmatriculeG') is-invalid @enderror" required autocomplete="addmatriculeG" disabled>
                                                    @error('addmatriculeG')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <select class="form-control text-center mx-3" name="addMatriculeL" id="addMatriculeL" value="{{ old('addMatriculeL') }}" required disabled>
                                                        <option >..</option>
                                                        <option value="أ">أ</option>
                                                        <option value="ب">ب</option>
                                                        <option value="د">د</option>
                                                        <option value="و">و</option>
                                                        <option value="ط">ط</option>
                                                        <option value="هـ">هـ</option>
                                                    </select>
                                                    <input placeholder="{{ __('Matricule') }}" id="addmatriculeS" name="addmatriculeS" type="text" class="form-control @error('addmatriculeS') is-invalid @enderror" required autocomplete="addmatriculeS" disabled>
                                                    @error('addmatriculeS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                </div>
                <div id="type_Compteur">
                    <form id="formUpdateCont" method="POST" action="" role="form" class="text-start">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="card-body">
                                <input type="hidden" name="id" id="Editid">
                                    <table class="w-100">
                                        <tr>
                                            <td>Compteur Ancien Km</td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input placeholder="{{ __('Compteur Km') }}" id="CompteurcarOld" name="" type="number" class="form-control mr-2" disabled>
                                                    <input id="dt_ContrepairOld" name="" type="date" class="form-control ml-2" disabled>
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
                                                    <input id="dt_Contrepair" name="d_Compteurcar" type="date" class="form-control ml-2 @error('dt_Contrepair') is-invalid @enderror">
                                                    @error('dt_Contrepair')
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
                <div id="type_Videnge">
                    <form method="POST" action="{{ Route('admin.addvidenge') }}" role="form" class="text-start" onsubmit="submitvidenge()">
                        <div class="modal-body">
                            <div class="card-body">
                                    @csrf
                                    <input type="hidden" name="autre_repair" value="0">
                                    <input type="hidden" name="id" id="addvidengeid">
                                    <table class="w-100">
                                        <tr>
                                            <td colspan="2">Videnge</td>
                                            <td colspan="2">
                                                <div class="input-group input-group-outline my-3">
                                                    <input placeholder="{{ __('Videnge') }}" id="videngerepair" name="videngerepair" type="number" class="form-control @error('videngerepair') is-invalid @enderror" required autofocus>
                                                    @error('videngerepair')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Date videnge</td>
                                            <td colspan="2">
                                                <div class="input-group input-group-outline my-3">
                                                    <input id="dt_videngerepair" name="dt_videngerepair" type="date" class="form-control @error('dt_videngerepair') is-invalid @enderror">
                                                    @error('dt_videngerepair')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="chk_Filterair"  role="button">Filter air</label></td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="hidden" name="chk_Filterair" value="0">
                                                    <input type="checkbox" name="chk_Filterair" id="chk_Filterair" value="1" class="mx-3">
                                                </div>
                                            </td>
                                            <td><label for="chk_Filteroil"  role="button">Filter oil</label></td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="hidden" name="chk_Filteroil" value="0">
                                                    <input type="checkbox" name="chk_Filteroil" id="chk_Filteroil" value="1" class="mx-3">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="chk_Filtergasoil"  role="button">Filter gasoil</label></td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="hidden" name="chk_Filtergasoil" value="0">
                                                    <input type="checkbox" name="chk_Filtergasoil" id="chk_Filtergasoil" value="1" class="mx-3">
                                                </div>
                                            </td>
                                            <td><label for="chk_plaquette"  role="button">Plaquette</label></td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="hidden" name="chk_plaquette" value="0">
                                                    <input type="checkbox" name="chk_plaquette" id="chk_plaquette" value="1" class="mx-3">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="chk_croix_chaine"  role="button">Croix Chaine</label></td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="hidden" name="chk_croix_chaine" value="0">
                                                    <input type="checkbox" name="chk_croix_chaine" id="chk_croix_chaine" value="1" class="mx-3">
                                                </div>
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
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
                <div id="type_Plaquette">
                    <form method="POST" action="{{ Route('admin.addplaquette') }}" role="form" class="text-start" id="FormAddplaquette">
                        <div class="modal-body">
                            <div class="card-body">
                                    @csrf
                                    <table class="w-100">
                                        <tr>
                                            <td colspan="2">Plaquette</td>
                                            <td colspan="2">
                                                <div class="input-group input-group-outline my-3">
                                                    <input placeholder="{{ __('Plaquette') }}" id="Plaquetterepair" name="Plaquetterepair" type="number" class="form-control @error('Plaquetterepair') is-invalid @enderror" required autocomplete="Plaquetterepair" autofocus>
                                                    @error('Plaquetterepair')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Date Plaquette</td>
                                            <td colspan="2">
                                                <div class="input-group input-group-outline my-3">
                                                    <input id="dt_Plaquetterepair" name="dt_Plaquetterepair" type="date" class="form-control @error('dt_Plaquetterepair') is-invalid @enderror">
                                                    @error('dt_Plaquetterepair')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="chk_PlaquetteAV"  role="button">Plaquette Avant ⬆️</label></td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="hidden" name="chk_PlaquetteAV" value="0">
                                                    <input type="checkbox" name="chk_PlaquetteAV" id="chk_PlaquetteAV" value="1" class="mx-3" checked>
                                                </div>
                                            </td>
                                            <td><label for="chk_PlaquetteAR"  role="button">Plaquette arriere ⬇️</label></td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="hidden" name="chk_PlaquetteAR" value="0">
                                                    <input type="checkbox" name="chk_PlaquetteAR" id="chk_PlaquetteAR" value="1" class="mx-3">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                <input type="hidden" id="addplaquetteid" name="id">
                                </div>
                        </div>
                        <div class="modal-footer">
                        <button onclick="modalclosebtn()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        {{-- <button onclick="submitplaquette2()" type="button" class="btn btn-info">Save changes</button> --}}
                        <input type="submit"class="btn btn-info" value="Save changes">
                        </div>
                    </form>
                </div>
                <div id="type_Autre">
                    <form method="POST" action="{{ Route('admin.addOderRepair') }}" id="FormAddOderRepair" role="form" class="text-start">
                        <div class="modal-body">
                            <div class="card-body">
                                    @csrf
                                    <input type="hidden" id="addoderRepair" name="id">
                                    <table class="w-100">
                                        <tr>
                                            <td>Repair</td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <textarea id="TextRepair" name="TextRepair" class="form-control @error('TextRepair') is-invalid @enderror" cols="40" rows="5"></textarea>
                                                    @error('TextRepair')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Date repair</td>
                                            <td>
                                                <div class="input-group input-group-outline my-3">
                                                    <input id="dt_Repair" name="dt_Repair" type="date" class="form-control @error('dt_Repair') is-invalid @enderror">
                                                    @error('dt_Repair')
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
    </div>

        <!-- Modal modifier -->
        <div class="modal fade" id="EditrepairModal" tabindex="-1" role="dialog" aria-labelledby="EditrepairModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddrepairModalLabel">Modifier repair</h5>
                    <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav d-flex justify-content-around w-100">
                                <label id="navinterv2" for="radioInterv2" role="button" onclick="chk_type_repair_update()" style="background-color: #7b809a;"><span class="nav-item nav-link">Intervalle<span class="sr-only">(current)</span></span></label>
                                <label id="navVidenge2" for="radioVidenge2" role="button" onclick="chk_type_repair_update()"><span class="nav-item nav-link">Videnge</span></label>
                                <label id="navPlaquette2" for="radioPlaquette2" role="button" onclick="chk_type_repair_update()"><span class="nav-item nav-link">Plaquette</span></label>
                                <label id="navAutre2" for="radioAutre2" role="button" onclick="chk_type_repair_update()"><span class="nav-item nav-link">Autre repair</span></label>
                            </div>
                        </div>
                        <input type="radio" name="radiorepairnav2" id="radioInterv2" onchange="chk_type_repair_update()" hidden>
                        <input type="radio" name="radiorepairnav2" id="radioVidenge2"onchange="chk_type_repair_update()" hidden>
                        <input type="radio" name="radiorepairnav2" id="radioPlaquette2"onchange="chk_type_repair_update()" hidden>
                        <input type="radio" name="radiorepairnav2" id="radioAutre2"onchange="chk_type_repair_update()" hidden>
                    </nav>
                    <div id="type_Vehicule" class="card-body pb-0">
                                        
                                        <table>
                                            <tr>
                                                <td>Vehicule</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input id="Editmrepaircar" name="Editmrepaircar" type="text" value="{{ old('marquecar') }}" class="form-control text-center" required autocomplete="addrepaircar" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Matricule</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input placeholder="{{ __('Matricule') }}" id="EditmatriculeG" name="EditmatriculeG" type="text" class="form-control" required autocomplete="addmatriculeG" disabled>
                                                        <select class="form-control text-center mx-3" name="EditMatriculeL" id="EditMatriculeL" value="{{ old('addMatriculeL') }}" required disabled>
                                                            <option >..</option>
                                                            <option value="أ">أ</option>
                                                            <option value="ب">ب</option>
                                                            <option value="د">د</option>
                                                            <option value="و">و</option>
                                                            <option value="ط">ط</option>
                                                            <option value="هـ">هـ</option>
                                                        </select>
                                                        <input placeholder="{{ __('Matricule') }}" id="EditmatriculeS" name="EditmatriculeS" type="text" class="form-control" required autocomplete="addmatriculeS" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                    </div>
                    <div id="type_Intervalle_update">
                        <form id="formUpdateIntervalle" method="POST" action="" role="form" class="text-start">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="card-body">
                                    <input type="hidden" name="id" id="Editid1">
                                        <table class="w-100">
                                            <tr>
                                                <td>Videnge par Km</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input placeholder="{{ __('Videnge Intervalle') }}" id="InterVidengeOld" name="InterVidenge" type="number" step="100" class="form-control mr-2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Plaquette par Jour</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <select name="InterPlaquette" id="InterPlaquetteOld" class="form-control mr-2">
                                                            <option value="30">1 Moi</option>
                                                            <option value="60">2 Mois</option>
                                                            <option value="90">3 Mois</option>
                                                            <option value="120">4 Mois</option>
                                                            <option value="150">5 Mois</option>
                                                            <option value="180">6 Mois</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>croix de la chaine par Km</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input placeholder="{{ __('Croix Intervalle') }}" id="InterCroixOld" name="InterCroix" type="number" step="1000" class="form-control mr-2">
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
                    <div id="type_Videnge_update">
                        <form method="POST" id="formUpdateVidenge" action="" role="form" class="text-start" onsubmit="submitvidenge()">
                            <div class="modal-body">
                                <div class="card-body">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="autre_repair" value="0">
                                        <input type="hidden" name="id" id="addvidengeid_UP">
                                        <table class="w-100">
                                            <tr>
                                                <td>Videnge</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input placeholder="{{ __('Videnge') }}" id="videngerepairUpdate" name="videngerepairUpdate" type="number" class="form-control" required autofocus>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date videnge</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input id="dt_videngerepairUpdate" name="dt_videngerepairUpdate" type="date" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="w-100">
                                            <tr>
                                                <td><label for="chk_FilterairUP"  role="button">Filter air</label></td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="hidden" name="chk_FilterairUP" value="0">
                                                        <input type="checkbox" name="chk_FilterairUP" id="chk_FilterairUP" value="1" class="mx-3">
                                                    </div>
                                                </td>
                                                <td><label for="chk_FilteroilUP"  role="button">Filter oil</label></td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="hidden" name="chk_FilteroilUP" value="0">
                                                        <input type="checkbox" name="chk_FilteroilUP" id="chk_FilteroilUP" value="1" class="mx-3">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="chk_FiltergasoilUP"  role="button">Filter gasoil</label></td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="hidden" name="chk_FiltergasoilUP" value="0">
                                                        <input type="checkbox" name="chk_FiltergasoilUP" id="chk_FiltergasoilUP" value="1" class="mx-3">
                                                    </div>
                                                </td>
                                                <td><label for="chk_plaquetteUP"  role="button">Plaquette</label></td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="hidden" name="chk_plaquetteUP" value="0">
                                                        <input type="checkbox" name="chk_plaquetteUP" id="chk_plaquetteUP" value="1" class="mx-3">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="chk_croix_chaineUP" role="button">Croix Chaine</label></td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="hidden" name="chk_croix_chaineUP" value="0">
                                                        <input type="checkbox" name="chk_croix_chaineUP" id="chk_croix_chaineUP" value="1" class="mx-3">
                                                    </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="number" step="1000" name="inter_videnge" id="inter_videnge" class="form-control d-none">
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
                    <div id="type_Plaquette_update">
                        <form method="POST" id="formUpdatePlaquette" action="" role="form" class="text-start">
                            <div class="modal-body">
                                <div class="card-body">
                                        @csrf
                                        @method('PUT')
                                        <table class="w-100">
                                            <tr>
                                                <td colspan="2">Plaquette</td>
                                                <td colspan="2">
                                                    <div class="input-group input-group-outline my-3">
                                                        <input placeholder="{{ __('Plaquette') }}" id="PlaquetterepairUP" name="PlaquetterepairUP" type="number" class="form-control" required autocomplete="PlaquetterepairUP" autofocus>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Date Plaquette</td>
                                                <td colspan="2">
                                                    <div class="input-group input-group-outline my-3">
                                                        <input id="dt_PlaquetterepairUP" name="dt_PlaquetterepairUP" type="date" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="chk_PlaquetteAV_UP"  role="button">Plaquette Avant ⬆️</label></td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="hidden" name="chk_PlaquetteAV_UP" value="0">
                                                        <input type="checkbox" name="chk_PlaquetteAV_UP" id="chk_PlaquetteAV_UP" value="1" class="mx-3">
                                                    </div>
                                                </td>
                                                <td><label for="chk_PlaquetteAR_UP"  role="button">Plaquette arriere ⬇️</label></td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input type="hidden" name="chk_PlaquetteAR_UP" value="0">
                                                        <input type="checkbox" name="chk_PlaquetteAR_UP" id="chk_PlaquetteAR_UP" value="1" class="mx-3">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    <input type="hidden" id="addplaquetteid_UP" name="id">
                                    </div>
                            </div>
                            <div class="modal-footer">
                            <button onclick="modalclosebtn()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <input type="submit"class="btn btn-info" value="Save changes">
                            </div>
                        </form>
                    </div>
                    <div id="type_Autre_update">
                        <form method="POST" id="formUpdateOder" action="" role="form" class="text-start">
                            <div class="modal-body">
                                <div class="card-body">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="addoderRepair_UP" name="id">
                                        <table class="w-100">
                                            <tr>
                                                <td>Repair</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <textarea id="TextRepair_UP" name="TextRepair_UP" class="form-control @error('TextRepair_UP') is-invalid @enderror" cols="40" rows="5"></textarea>
                                                        @error('TextRepair_UP')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date repair</td>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">
                                                        <input id="dt_Repair_UP" name="dt_Repair_UP" type="date" class="form-control @error('dt_Repair_UP') is-invalid @enderror">
                                                        @error('dt_Repair_UP')
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
            </div>
        </div>
                {{-- Delete Modal --}}
    <div class="modal fade" id="deletrepairModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete the latest update</h5>
                    <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="P_radrio_delete1">
                        <input type="radio" name="deleteRepeir" id="deleteViddenge" onchange="deletrepair()" checked>
                        <label for="deleteViddenge"><b>Viddenge</b></label>
                    </p>
                    <p id="P_radrio_delete2">
                        <input type="radio" name="deleteRepeir" id="deletePlaquette" onchange="deletrepair()">
                        <label for="deletePlaquette"><b>Plaquette</b></label>
                    </p>
                    <p id="P_radrio_delete3">
                        <input type="radio" name="deleteRepeir" id="deleteAutre" onchange="deletrepair()">
                        <label for="deleteAutre"><b>Autre repair</b></label>
                    </p>
                </div>
                <div class="modal-footer">
                    <button onclick="modalclosebtn()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <form action="" id="deletrepairForm" method="POST">
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
                    function addrepair(id) {
                    console.log("add repair btn");
                    $('#AddrepairModal').modal('toggle');

                    $.get("/admin/car/" + id, function(car) {
                        
                        $('#addrepaircar').val(car.marque+' '+car.model);
                        $('#addmatriculeG').val(car.matriculG);
                        $('#addMatriculeL').val(car.matriculL);
                        $('#addmatriculeS').val(car.matriculS);
                        $('#CompteurcarOld').val(car.compteur);
                        $('#dt_ContrepairOld').val(car.d_compteur);
                        $('#Editid').val(car.id);
                        $('#addvidengeid').val(car.id);
                        $('#addplaquetteid').val(car.id);
                        $('#addoderRepair').val(car.id);
                        $('#formUpdateCont').attr('action', "/admin/repair/" + id);
                    });
                    chk_type_repair();
                }
                function submitvidenge() {
                    if (chk_plaquette.checked == true) {
                        document.getElementById("chk_plaquette").value = document.getElementById("videngerepair").value;
                    }
                    if (chk_croix_chaine.checked == true) {
                        document.getElementById("chk_croix_chaine").value = document.getElementById("videngerepair").value;
                    }
                }
                    function editrepair(id) {
                    console.log("edit repair btn");
                    $('#EditrepairModal').modal('toggle');
            
                    $.get("/admin/car/" + id, function(car) {
                        $('#Editmrepaircar').val(car.marque+' '+car.model);
                        $('#EditmatriculeG').val(car.matriculG);
                        $('#EditMatriculeL').val(car.matriculL);
                        $('#EditmatriculeS').val(car.matriculS);
                        $('#InterVidengeOld').val(car.intervalle_videnge);
                        $('#InterPlaquetteOld').val(car.intervalle_plaquette);
                        $('#InterCroixOld').val(car.intervalle_croix);
                        $('#Editid2').val(car.id);
                        $('#formUpdateIntervalle').attr('action', "/admin/updateinterval/" + id);
                    });
                    $.get("/admin/repair/" + id, function(repair) {
                        if (!(repair.videnge)) {
                            $('#navVidenge2').removeAttr("style").hide();
                            $('#videngerepairUpdate').prop("disabled", true);
                            $('#dt_videngerepairUpdate').prop("disabled", true);
                            $('#radioInterv2').prop( "checked", true );
                            chk_type_repair_update();
                        } else {
                            $('#formUpdateVidenge').attr('action', "/admin/updatevidenge/" + (repair.id));
                            $('#navVidenge2').show();
                            $('#videngerepairUpdate').prop("disabled", false);
                            $('#dt_videngerepairUpdate').prop("disabled", false);
                            $('#videngerepairUpdate').val(repair.videnge);
                            $('#dt_videngerepairUpdate').val(repair.d_videnge);
                            if ((repair.isfilterair)!='0') {
                                $('#chk_FilterairUP').prop( "checked", true );
                            }
                            if ((repair.isfilteroil)!='0') {
                                $('#chk_FilteroilUP').prop( "checked", true );
                            }
                            if ((repair.isfiltergasoil)!='0') {
                                $('#chk_FiltergasoilUP').prop( "checked", true );
                            }
                            if ((repair.plaquette)!='0') {
                                $('#chk_plaquetteUP').prop( "checked", true );
                            }
                            if ((repair.croix_chaine)!='0') {
                                $('#chk_croix_chaineUP').prop( "checked", true );
                            }
                        }
                        $('#addvidengeid_UP').val(repair.id);
                    });
                    $.get("/admin/showplaquette/" + id, function(ShowPlaquette) {
                        $('#PlaquetterepairUP').val(ShowPlaquette.plaquette);
                        $('#dt_PlaquetterepairUP').val(ShowPlaquette.d_videnge);
                        if ((ShowPlaquette.autre_repair)!='0') {
                            $('#chk_PlaquetteAR_UP').prop( "checked", true );
                        }else{
                            $('#chk_PlaquetteAR_UP').prop( "checked", false );
                        }
                        if (!(ShowPlaquette.plaquette)) {
                            $('#navPlaquette2').removeAttr("style").hide();
                            $('#PlaquetterepairUP').prop("disabled", true);
                            $('#dt_PlaquetterepairUP').prop("disabled", true);
                            $('#radioInterv2').prop( "checked", true );
                            chk_type_repair_update();
                        }else{
                            $('#formUpdatePlaquette').attr('action', "/admin/updateplaquette/" + (ShowPlaquette.id));
                            $('#navPlaquette2').show();
                            $('#chk_PlaquetteAV_UP').prop( "checked", true );
                            $('#PlaquetterepairUP').prop("disabled", false);
                            $('#dt_PlaquetterepairUP').prop("disabled", false);
                        }
                        $('#addplaquetteid_UP').val(ShowPlaquette.id);
                    });
                    $.get("/admin/showOder/" + id, function(showOder) {
                        $('#TextRepair_UP').val(showOder.autre_repair);
                        $('#dt_Repair_UP').val(showOder.d_videnge);

                        if ((showOder.autre_repair)=='0' || !(showOder.autre_repair)) {
                            $('#navAutre2').removeAttr("style").hide();
                            $('#TextRepair_UP').prop("disabled", true);
                            $('#dt_Repair_UP').prop("disabled", true);
                            $('#radioInterv2').prop( "checked", true );
                            chk_type_repair_update();
                        }else{
                            $('#navAutre2').show();
                            $('#formUpdateOder').attr('action', "/admin/updateoder/" + (showOder.id));
                            $('#chk_PlaquetteAV_UP').prop( "checked", true );
                            $('#TextRepair_UP').prop("disabled", false);
                            $('#dt_Repair_UP').prop("disabled", false);
                        }
                        $('#addoderRepair_UP').val(showOder.id);
                    });
                    chk_type_repair_update();
                    console.log('$car->id');
                }
                function deletrepairmodal(id) {
                    $('#deletrepairModal').modal('toggle');
                    console.log("delet repair2 btn");
                    $('#deleteViddenge').attr('onchange', "deletrepair("+id+")");
                    $('#deletePlaquette').attr('onchange', "deletrepair("+id+")");
                    $('#deleteAutre').attr('onchange', "deletrepair("+id+")");
                    deletrepair(id);
                        $.get("/admin/repair/" + id, function(repair) {
                            if (!(repair.videnge)) {
                                $('#P_radrio_delete1').removeAttr("style").hide();
                                $('#deleteViddenge').prop("disabled", true);
                            } else {
                                $('#P_radrio_delete1').show();
                                $('#deleteViddenge').prop("disabled", false);
                            }
                        });
                        $.get("/admin/showplaquette/" + id, function(ShowPlaquette) {
                            if (!(ShowPlaquette.plaquette)) {
                                $('#P_radrio_delete2').removeAttr("style").hide();
                                $('#deletePlaquette').prop("disabled", true);
                            }else{
                                $('#P_radrio_delete2').show();
                                $('#deletePlaquette').prop("disabled", false);
                            }
                        });
                        $.get("/admin/showOder/" + id, function(showOder) {
                            if ((showOder.autre_repair)=='0' || !(showOder.autre_repair)) {
                                $('#P_radrio_delete3').removeAttr("style").hide();
                                $('#deleteAutre').prop("disabled", true);
                            }else{
                                $('#P_radrio_delete3').show();
                                $('#deleteAutre').prop("disabled", false);
                            }
                        });
                    }
                function deletrepair(id) {
                    console.log("delet repair change radio");
                    if (document.getElementById("deleteAutre").checked) {
                        $.get("/admin/showOder/" + id, function(showOder) {
                            $('#deletrepairForm').attr('action', "/admin/repair/" + (showOder.id));
                            console.log((showOder.id));
                        });
                    } else if (document.getElementById("deletePlaquette").checked) {
                        $.get("/admin/showplaquette/" + id, function(ShowPlaquette) {
                            $('#deletrepairForm').attr('action', "/admin/repair/" + (ShowPlaquette.id));
                            console.log((ShowPlaquette.id));
                        });
                    } else {
                        $.get("/admin/repair/" + id, function(repair) {
                            $('#deletrepairForm').attr('action', "/admin/repair/" + (repair.id));
                            console.log((repair.id));
                        });
                    }
                }
                function modalclosebtn() {
                    console.log("close modal btn");
                    $('#AddrepairModal').modal('hide');
                    $('#EditrepairModal').modal('hide');
                    $('#deletrepairModal').modal('hide');
                }

                function chk_type_repair() {
                    if (radioVidenge.checked == true) {
                        type_Compteur.style.display = "none";
                        type_Videnge.style.display = "block";
                        type_Plaquette.style.display = "none";
                        type_Autre.style.display = "none";

                        navCompteur.style.backgroundColor = "transparent";
                        navVidenge.style.backgroundColor = "#7b809a";
                        navPlaquette.style.backgroundColor = "transparent";
                        navAutre.style.backgroundColor = "transparent";
                    } else if (radioPlaquette.checked == true) {
                        type_Compteur.style.display = "none";
                        type_Videnge.style.display = "none";
                        type_Plaquette.style.display = "block";
                        type_Autre.style.display = "none";

                        navCompteur.style.backgroundColor = "transparent";
                        navVidenge.style.backgroundColor = "transparent";
                        navPlaquette.style.backgroundColor = "#7b809a";
                        navAutre.style.backgroundColor = "transparent";
                    } else if (radioAutre.checked == true) {
                        type_Compteur.style.display = "none";
                        type_Videnge.style.display = "none";
                        type_Plaquette.style.display = "none";
                        type_Autre.style.display = "block";

                        navCompteur.style.backgroundColor = "transparent";
                        navVidenge.style.backgroundColor = "transparent";
                        navPlaquette.style.backgroundColor = "transparent";
                        navAutre.style.backgroundColor = "#7b809a";
                    }else {
                        type_Compteur.style.display = "block";
                        type_Videnge.style.display = "none";
                        type_Plaquette.style.display = "none";
                        type_Autre.style.display = "none";

                        navCompteur.style.backgroundColor = "#7b809a";
                        navVidenge.style.backgroundColor = "transparent";
                        navPlaquette.style.backgroundColor = "transparent";
                        navAutre.style.backgroundColor = "transparent";
                    }
                }
                function chk_type_repair_update() {
                    if (radioVidenge2.checked == true) {
                        type_Intervalle_update.style.display = "none";
                        type_Videnge_update.style.display = "block";
                        type_Plaquette_update.style.display = "none";
                        type_Autre_update.style.display = "none";

                        navinterv2.style.backgroundColor = "transparent";
                        navVidenge2.style.backgroundColor = "#7b809a";
                        navPlaquette2.style.backgroundColor = "transparent";
                        navAutre2.style.backgroundColor = "transparent";
                    } else if (radioPlaquette2.checked == true) {
                        type_Intervalle_update.style.display = "none";
                        type_Videnge_update.style.display = "none";
                        type_Plaquette_update.style.display = "block";
                        type_Autre_update.style.display = "none";

                        navinterv2.style.backgroundColor = "transparent";
                        navVidenge2.style.backgroundColor = "transparent";
                        navPlaquette2.style.backgroundColor = "#7b809a";
                        navAutre2.style.backgroundColor = "transparent";
                    } else if (radioAutre2.checked == true) {
                        type_Intervalle_update.style.display = "none";
                        type_Videnge_update.style.display = "none";
                        type_Plaquette_update.style.display = "none";
                        type_Autre_update.style.display = "block";

                        navinterv2.style.backgroundColor = "transparent";
                        navVidenge2.style.backgroundColor = "transparent";
                        navPlaquette2.style.backgroundColor = "transparent";
                        navAutre2.style.backgroundColor = "#7b809a";
                    }else {
                        type_Intervalle_update.style.display = "block";
                        type_Videnge_update.style.display = "none";
                        type_Plaquette_update.style.display = "none";
                        type_Autre_update.style.display = "none";

                        navinterv2.style.backgroundColor = "#7b809a";
                        navVidenge2.style.backgroundColor = "transparent";
                        navPlaquette2.style.backgroundColor = "transparent";
                        navAutre2.style.backgroundColor = "transparent";
                    }
                }

                </script>
@endsection

@endif