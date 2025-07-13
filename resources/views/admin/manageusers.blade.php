    @extends('layouts.app')

    @section('head')
        <style>
            .nav-user{
                margin-left: 20px;
                padding: auto;
            }
            #table_list_User{
                border: solid 1px;
                width: 100%;
            }
            #table_list_User td,th{
                padding: 10px
            }
        </style>
    @endsection

    @section('title_nav')
    <div class="container">
        <i class="large material-icons opacity-10" style="margin-right: 6px;vertical-align: middle; font-size: 30px">group</i>
        <span style="vertical-align: middle;">Gestion Users</span>
        
    </div>
    @endsection
    @section('href_nav')
    href="{{ Route("home") }}"
    @endsection
    @section('name_nav')
        Home
        {{-- input hidden --}}

        <div style="display: inline-block">
            <input type="radio" name="mang-users" id="radio-list-users" checked>
            <input type="radio" name="mang-users" id="radio-add-user">
            <input type="radio" name="mang-users" id="radio-update-user">
        </div>
    @endsection

    @section('icon_nav')
        <i class="bi bi-house-lock-fill opacity-6 text-dark me-1"></i>
    @endsection

    @section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <ul>
                <li class="text-center font-weight-bold"> {{session('success')}} </li>
            </ul>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning">
            <ul>
                <li class="text-center font-weight-bold"> {{session('warning')}} </li>
            </ul>
        </div>
    @endif
    @if (session('info'))
        <div class="alert alert-info">
            <ul>
                <li class="text-center font-weight-bold"> {{session('info')}} </li>
            </ul>
        </div>
    @endif

    {{-- list user --}}
    <div class="row" id="list-users">
        <div class="w-auto mx-auto">
        <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('List Users') }}</h4>
            </div>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('register') }}" role="form" class="text-start">
                @csrf
                <div class="input-group input-group-outline my-3">
                    <table id="table_list_User">
                        <tr>
                            <th>User Name</th>
                            <th>E-mail</th>
                            <th colspan="2">Action</th>
                        </tr>
                        @foreach ($utils as $util)
                        <tr>
                            <td>{{ $util->username }}</td>
                            <td>{{ $util->email }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="editUser({{ $util->id }})">
                                    <img src="../assets/img/editer.png" alt="edit" width="24">
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deletUser({{ $util->id }})">
                                    <img src="../assets/img/supprimer.png" alt="delet" width="24">
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="text-center">
                <button id="btn_add" type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">{{ __('Add User') }}</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    {{-- add user --}}
    <div class="row" id="add-user" style="display: none">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
        <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Add User') }}</h4>
            </div>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ Route('admin.store') }}" role="form" class="text-start">
                @csrf
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('Prenom') }}"  id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('username') }}"  id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('Email Address') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline mb-3">
                    <input placeholder="{{ __('Password') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline mb-3">
                    <input placeholder="{{ __('Confirm Password') }}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">{{ __('Register') }}</button>
                <button id="btn_anl_add" type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __('Anuler') }}</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    {{-- update user --}}
    <div class="row" id="update-user" style="display: none">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
        <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Update User') }}</h4>
            </div>
            </div>
            <div class="card-body">
            <form id="editUserForm" method="POST" action="{{ route('admin.update') }}" role="form" class="text-start">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('Name') }}" id="Editname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('Prenom') }}"  id="Editprenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('username') }}"  id="Editusername" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline my-3">
                    <input placeholder="{{ __('Email Address') }}" id="Editemail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline mb-3">
                    <input placeholder="{{ __('Password') }}" id="Editpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline mb-3">
                    <input placeholder="{{ __('Confirm Password') }}" id="Editpassword-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="text-center">
                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">{{ __('Update') }}</button>
                <button id="btn_anl_up" type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __('Anuler') }}</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>



    <script>
        
        const radio_list_users = document.getElementById("radio-list-users");
        const radio_add_user = document.getElementById("radio-add-user");
        const radio_update_user = document.getElementById("radio-update-user");

        const list_users = document.getElementById("list-users");
        const add_user = document.getElementById("add-user");
        const update_user = document.getElementById("update-user");

        const btn_add = document.getElementById("btn_add");
        const btn_anl_add = document.getElementById("btn_anl_add");
        const btn_anl_up = document.getElementById("btn_anl_up");

        function displayCheked() {
        if (radio_add_user.checked == true) {
            list_users.style.display = "none";
            add_user.style.display = "block";
            update_user.style.display = "none";
        } else if (radio_update_user.checked == true) {
            list_users.style.display = "none";
            add_user.style.display = "none";
            update_user.style.display = "block";
        }else {
            list_users.style.display = "block";
            add_user.style.display = "none";
            update_user.style.display = "none";
        }
    }
    radio_list_users.addEventListener("click", displayCheked);
    radio_add_user.addEventListener("click", displayCheked);
    radio_update_user.addEventListener("click", displayCheked);

    radio_list_users.addEventListener("change", displayCheked);
    radio_add_user.addEventListener("change", displayCheked);
    radio_update_user.addEventListener("change", displayCheked);


    btn_add.addEventListener("click", function(){
        radio_add_user.checked = true;
        displayCheked();
    });
    btn_anl_add.addEventListener("click", function(){
        radio_list_users.checked = true;
        displayCheked();
    });
    btn_anl_up.addEventListener("click", function(){
        radio_list_users.checked = true;
        displayCheked();
    });

    // ---------------------------------------

    function editUser(id) {
        console.log("edit btn");
        radio_update_user.checked = true;
        displayCheked();

        $.get("/admin/admin/" + id, function(user) {
            $('#Editname').val(user.name);
            $('#Editprenom').val(user.prenom);
            $('#Editusername').val(user.username);
            $('#Editemail').val(user.email);
            $('#Editpassword').val(user.password);
            $('#id').val(user.id);
        });
    }

    function deletUser(id) {
        console.log("delet btn");
        $('#deletUserModal').modal('toggle');
        $('#deletUserForm').attr('action', "/admin/admin/" + id);
    }
    function modalclosebtn() {
        console.log("close modal btn");
        $('#deletUserModal').modal('hide');
    }


    </script>
    @endsection
    @section('modal')
        {{-- Delete Modal --}}
        <!-- Modal -->
    <div class="modal fade" id="deletUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="" id="deletUserForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    @endsection