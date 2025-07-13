    @extends('layouts.body')

    @section('Title')
        Maintenance
    @endsection

    @section('maintenance_active')
    active bg-gradient-primary 
    @endsection

    @section('page_name')
        Maintenance
    @endsection
    @section('head')
    
    @endsection

    @section('main_content')
    {{-- Status Cars --}}
    <div class="row">
        <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Projects table</h6>
            </div>
            </div>
            <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
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
                            <p class="text-xs text-secondary mb-0">Model : 2022</p>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <div class="flex-column align-items-center justify-content-center">
                        <div>
                            <span class="me-2 text-md font-weight-bold mb-0">01/01/2999</span>
                        </div>
                        <div>
                            <div class="progress mx-auto">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-xs font-weight-bold">60%</span>
                        </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="text-sm font-weight-bold">01/01/2999</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="flex-column align-items-center justify-content-center">
                        <div>
                            <span class="me-2 text-sm font-weight-bold">01/01/2999</span>
                        </div>
                        <div>
                            <div class="progress mx-auto">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-xs font-weight-bold">60%</span>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <a href="javascript:void(0)" onclick="editcar({{ $car->id }})" class="text-success font-weight-bold text-xs" data-toggle="modal" data-target="#EditcarModal">
                            Add
                        </a>
                    </td>
                    <td class="align-middle text-center">
                        <a href="javascript:void(0)" onclick="deletCar({{ $car->id }})" class="text-info font-weight-bold text-xs" data-toggle="modal" data-target="#EditcarModal">
                            Print
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @show
            </div>
            </div>
        </div>
        </div>
    </div>
    <script>
var valueContCroit = document.querySelectorAll(".valueContCroit");
// var valueCroit = document.querySelectorAll(".valueCroit");
var hidCompteur = document.querySelectorAll(".hidCompteur");

// valueContCroit.forEach(function(element) {
//     if (element.innerHTML.trim() === '') {
//   console.log("The element is empty.");
//   element.innerHTML= '<span class="me-2 text-sm font-weight-bold">0</span>';
// }});
// window.onload = function() {
//     var elements = document.getElementsByClassName("myClass");
//     var allEmpty = true;

//     for (var i = 0; i < elements.length; i++) {
//       var innerHTML = elements[i].innerHTML.trim();
//       if (innerHTML !== '') {
//         allEmpty = false;
//         break;
//       }
//     }

//     if (allEmpty) {
//       console.log("All elements with the class 'myClass' have empty values.");
//     } else {
//       console.log("At least one element with the class 'myClass' does not have an empty value.");
//     }
//   };
// valueContCroit.forEach(function(element) {
//     if (element.innerHTML.trim() === '') {
//   console.log("The element is empty.");
//   element.innerHTML= '<span class="me-2 text-sm font-weight-bold">0</span>';
// }});
// valueCroit.forEach(function(element) {
//     if (element.innerHTML.trim() === '') {
//   console.log("The element is empty33.");
//   element.innerHTML= '<span class="me-2 text-sm font-weight-bold">0</span>';
//   valueContCroit.innerHTML= '<span class="me-2 text-sm font-weight-bold">0</span>';
  
// }});

                        $(document).ready( function() {
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#dt_videngerepair').val(today);
    $('#dt_Plaquetterepair').val(today);
    $('#dt_Contrepair').val(today);
    $('#dt_Repair').val(today);
    console.log(today);
});

var dt_paque = document.getElementsByClassName('dt_paque');
var j_plaque = document.getElementsByClassName('j_plaque');

        for (var i = 0; i < dt_paque.length; i++) {
            if (dt_paque[i].innerText.trim() == "") {
                dt_paque[i].innerHTML = "Non inséré!";
                j_plaque[i].innerHTML = "0 jour";
            }
        }
        
    </script>
    @endsection
