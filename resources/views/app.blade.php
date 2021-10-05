<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
        <!-- Full Calendar -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
            
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">

        <title>
            @yield('title')
        </title>

    </head>
    <body>
        <header>
            <nav class="mb-5 navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <img src="/docs/4.6/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                    Bootstrap
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/users">Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/calendar">Agenda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pacientes
                                <i class="fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/patients"><i class="fas fa-search"></i> Buscar pacientes</a>
                                <a class="dropdown-item" href="/patients/add" type="button" data-toggle="modal" 
                                    data-target="#addPatientModal" id="patient-add"><i class="fas fa-plus"></i> Adicionar paciente</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tests">Testes</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="my-5">
                @yield('content')
            </div>
        </main>

        <footer>
            <div class="mt-5">
                <span>&nbsp;</span> <!--definir o que será feito no rodapé de uma vez-->
            </div>
        </footer>

        <!-- Modals -->
        @include('modals.patient.addpatientmodal', ['modal_id' => 'addPatientModal', 'modal_title' => 'Adicionar paciente'])

        <!-- JavaScript  -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://kit.fontawesome.com/96cc411e91.js"></script>
        
        <!-- JS functions -->
        <script type="text/javascript">
            if (window.location.pathname.includes('/patients/')) {
                var url = window.location.pathname.split("/")[1].slice(0, -1);
            } else {
                var url = window.location.pathname.slice(0, -1).replace("/", ""); 
            }
            var table = document?.getElementById(url + "-data");
            var rows = table?.getElementsByTagName("tr");
            var rowInfo = [];
            var buttonArea = document.getElementById("button-box");
            var buttons = buttonArea?.getElementsByTagName("button");
            var buttonDetails = [];
            var editForm = document?.getElementById("edit-form");
            console.log(editForm);
            var inputEditValues = editForm?.getElementsByTagName("input");
            var textareaEditValues = editForm?.getElementsByTagName("textarea");
            var selectedEditValues = editForm?.getElementsByTagName("select");
            var addForm = document?.getElementById("add-form");
            // var inputAddValues = addForm.getElementsByTagName("input");  
            // var selectedAddValues = addForm.getElementsByTagName("select");  
            var userToUp = document.getElementById("idup");
            var userToDel = document.getElementById("iddel");
            var nameToDel = document.getElementById("delete-" + url +"name-warning");
            var openProfile = document.getElementById("open-btn");
            console.log(openProfile);
            
            if (buttons && buttons.length > 2) {
                for(var i = 0; i < buttons.length; i++) {
                    var button = buttons[i];
                    buttonDetails.push(buttons[i]);
                    if (i < 2) {
                        button.classList.add("cursor-effects");
                        button.disabled = true;
                    }
                }
            }

            if (rows) {
                for(var j = 0; j < rows.length; j++) {
                    var row = rows[j];
                    if (j % 2 !== 0) {
                        row.classList.add("stripe");
                    } else {
                        row.classList.add("white-stripe");
                    }

                    row.addEventListener("dblclick", function() {
                        console.log("abre fdp");
                    });

                    row.addEventListener("click", function() { 
                        rowSelect(this, buttonDetails, false);
                        if (rowInfo.length === 0) {
                            for(var k = 0; k < this.cells.length; k++) { 
                                rowInfo.push(this.cells[k].innerHTML);
                                if (url === "test" && rowInfo.length > 3) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    nameFixer(rowInfo[1]);
                                    sendInputs(rowInfo);
                                    textareaEditValues[0].append(rowInfo[2]);
                                }
                                if (url === "user" && rowInfo.length > 5) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    nameFixer(rowInfo[1]);
                                    setDropdowns(rowInfo[3]);
                                    sendInputs(rowInfo);
                                }
                                if (url === "patient" && rowInfo.length > 5) {
                                    setHref(rowInfo[0]);
                                } 
                            }
                        } else {
                            rowInfo.splice(0, 6);
                            for(var k = 0; k < this.cells.length; k++) { 
                                rowInfo.push(this.cells[k].innerHTML);
                                if (url === "test" && rowInfo.length > 3) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    nameFixer(rowInfo[1]);
                                    sendInputs(rowInfo);
                                    textareaEditValues[0].append(rowInfo[2]); 
                                }
                                if (url === "user" && rowInfo.length > 5) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    nameFixer(rowInfo[1]);
                                    setDropdowns(rowInfo[3]);
                                    sendInputs(rowInfo);
                                }
                                if (url === "patient" && rowInfo.length > 5) {
                                    setHref(rowInfo[0]);
                                }
                            }
                        }
            
                    });
                }
            }

            function rowSelect(row, button, many) {
                if (buttons && button.length > 0) {
                    button[0].disabled = false;
                    button[1].disabled = false;
                }
                if(!many) {
                    var rows = row.parentElement.getElementsByTagName("tr");
                    for(var l = 0; l < rows.length; l++) {
                        var aux_row = rows[l];
                        aux_row.classList.remove("active");    
                    }
                }
                row.classList.add("active");
                // setHref(rowInfo[0]);
                console.log(rowInfo); 
            }

            function changeDropOne() {
                for (var m = 0; m < selectedEditValues[0].length; m++) {
                    if (m < 3) {
                        selectedEditValues[1][m].removeAttribute("selected");
                    }
                    selectedEditValues[0][m].removeAttribute("selected");
                }              
                switch (selectedEditValues[0].value) {
                    case "P1":
                        selectedEditValues[1].removeAttribute("disabled");
                        inputEditValues[4].removeAttribute("disabled");
                        selectedEditValues[1].value = "CRM";
                        inputEditValues[4].setAttribute("value", rowInfo[4].substring(4, 13));
                        break;
                    case "P2":
                        selectedEditValues[1].removeAttribute("disabled");
                        inputEditValues[4].removeAttribute("disabled");
                        selectedEditValues[1].value = "CRP";
                        inputEditValues[4].setAttribute("value", rowInfo[4].substring(4, 13));
                        break;
                    case "S1":
                        selectedEditValues[1].value = "";
                        selectedEditValues[1].setAttribute("disabled", "");
                        inputEditValues[4].setAttribute("disabled", "");
                        inputEditValues[4].setAttribute("value", "");
                        break;
                }

            }
            
            function changeDropTwo() {
                for (var n = 0; n < selectedEditValues[1].length; n++) {
                    if (n < 3) {
                        selectedEditValues[1][n].removeAttribute("selected");
                    }
                    selectedEditValues[0][n].removeAttribute("selected");
                }
                switch (selectedEditValues[1].value) {
                    case "CRM":
                        selectedEditValues[0].value = "P1";
                        break;
                    case "CRP":
                        selectedEditValues[0].value = "P2";
                        break;
                    case "": 
                        selectedEditValues[0].value = "S1";
                        selectedEditValues[1].setAttribute("disabled", "");
                        inputEditValues[4].setAttribute("disabled", "");
                        inputEditValues[4].setAttribute("value", "");
                        break;
                }
            }
            
            function setDropdowns(values) {
                switch (values) {
                    case "Psiquiatra":
                        selectedEditValues[0][1].setAttribute("selected", "");
                        selectedEditValues[1][1].setAttribute("selected", "");
                        break;
                    case "Psicólogo(a)":
                        selectedEditValues[0][2].setAttribute("selected", "");
                        selectedEditValues[1][2].setAttribute("selected", "");
                        break;
                    case "Secretário(a)":
                        selectedEditValues[0][3].setAttribute("selected", "");
                        selectedEditValues[1][3].setAttribute("selected", "");
                        selectedEditValues[1].setAttribute("disabled", "");
                        inputEditValues[4].setAttribute("disabled", "");
                        break;
                }
            }    

            function sendInputs(values) {
                console.log(values);
                let quantity = url === "test" ? 0 : 3;
                for(var p = 2; p < inputEditValues.length - quantity; p++) {
                    if (p === 4) {
                        inputEditValues[p].setAttribute("value", values[p].substring(4, 13));
                    } else {
                        inputEditValues[p].setAttribute("value", values[p-1]);
                    }
                }    
            }

            function nameFixer(name) {
                if (url === "test") {
                    var x = nameToDel.textContent.split(" ");
                    x.splice(5, 0, name.substring(5));
                    nameToDel.textContent = x.join(" ");
                } else {
                    var x = nameToDel.textContent.split(" ");
                    x.splice(5, 0, name);
                    nameToDel.textContent = x.join(" ");
                }
            }    

            function setHref(id) {
                console.log(openProfile);
                console.log(id);
                if (url === "patient") {
                    const link = "{{ route('patients.show', 'id') }}";
                    let mod = link.replace("id", id);
                    console.log("link", mod)
                    openProfile.setAttribute("href", mod);
                }
                console.log(openProfile);
            }
            // jogar para um arquivo separado quando terminar de mexer no script
            // implementar os rules possíveis no momento 
            // fazer um rodapé
        </script>
    </body>
</html>
       