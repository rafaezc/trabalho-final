<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        
        <!-- Bootstrap Select -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"> 
            
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">

        <title>
            @yield('title')
        </title>

    </head>
    <body id="xyz">
        <header>
            @yield('header')
        </header>

        <main>
            <div class="my-5">
                @yield('content')
            </div>
        </main>

        <footer>
            {{-- <div class="mt-5">
                <span>&nbsp;</span> 
            </div> --}}
        </footer>

        @include('sweetalert::alert')
        
        <!-- Modals -->
        @include('modals.patient.addpatientmodal', ['modal_id' => 'addPatientModal', 'modal_title' => 'Adicionar paciente'])

        <!-- JavaScript  -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>    
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://kit.fontawesome.com/96cc411e91.js"></script>
        
        <!-- JS functions -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".select-filter").select2();
            });

            if (window.location.pathname.includes('/patients/')) {
                var url = window.location.pathname.split("/")[1].slice(0, -1);
            } else {
                var url = window.location.pathname.slice(0, -1).replace("/", ""); 
            }
            console.log(url);
            var xyz = document?.getElementById("xyz");
            var table = document?.getElementById(url + "-data"); 
            var rows = table?.getElementsByTagName("tr");
            var rowInfo = [];
            var buttonArea = document?.getElementById("button-box");
            var buttons = buttonArea?.getElementsByTagName("button");
            var buttonDetails = [];
            var editForm = document?.getElementById("edit-form");
            var addForm = document?.getElementById("add-form");
            console.log(editForm);
            var inputEditValues = editForm?.getElementsByTagName("input");
            var textareaEditValues = editForm?.getElementsByTagName("textarea");
            var selectedEditValues = editForm?.getElementsByTagName("select");
            var inputAddValues = addForm?.getElementsByTagName("input");
            var selectedAddValues = addForm?.getElementsByTagName("select");
            var userToUp = document?.getElementById("idup");
            var userToDel = document?.getElementById("iddel");
            var nameToDel = document?.getElementById("delete-" + url +"name-warning");
            var openProfile = document?.getElementById("open-btn");
            console.log(openProfile);

            if (url !== 'logi') {
                xyz.classList.remove("login-background");
                xyz.classList.add("login-background-card");
            } else {
                xyz.classList.remove("login-background-card")
                xyz.classList.add("login-background");
            }

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

                    row.addEventListener("click", function() { 
                        rowSelect(this, buttonDetails, false);
                        if (rowInfo.length === 0) {
                            for(var k = 0; k < this.cells.length; k++) { 
                                rowInfo.push(this.cells[k].innerHTML);
                                if (url === "schedule" && rowInfo.length > 3) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    nameFixer(rowInfo[1], rowInfo[2]);
                                    setDropdowns(rowInfo[1], rowInfo[2]);
                                    sendInputs(rowInfo);
                                    textareaEditValues[0].innerHTML = rowInfo[4];
                                    textareaEditValues[1].innerHTML = rowInfo[5];
                                }
                                if (url === "test" && rowInfo.length > 3) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    console.log(rowInfo);
                                    nameFixer(rowInfo[1]);
                                    sendInputs(rowInfo);
                                    textareaEditValues[0].innerHTML = rowInfo[2];
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
                                if (url === "schedule" && rowInfo.length > 3) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    nameFixer(rowInfo[1], rowInfo[2]);
                                    setDropdowns(rowInfo[1], rowInfo[2]);
                                    sendInputs(rowInfo);
                                    textareaEditValues[0].innerHTML = rowInfo[4];
                                    textareaEditValues[1].innerHTML = rowInfo[5];
                                }
                                if (url === "test" && rowInfo.length > 3) {
                                    userToUp.setAttribute("value", rowInfo[0]);
                                    userToDel.setAttribute("value", rowInfo[0]);
                                    console.log(rowInfo);
                                    nameFixer(rowInfo[1]); 
                                    sendInputs(rowInfo);
                                    textareaEditValues[0].innerHTML = rowInfo[2]; 
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
            
            function setDropdowns(value1, value2) {
                if (url === "user") {
                    switch (value1) {
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
                if (url === "schedule") {
                    console.log(selectedEditValues[0][1].innerHTML, value1, value2);
                    for(var p = 0; p < selectedEditValues[0].length; p++) {
                        if (selectedEditValues[0][p].innerHTML === value1) {
                            console.log(p);
                            $(".select-filter").val(p).change(); 
                            // selectedEditValues[0][p].setAttribute("selected", "");
                        }
                    }   
                    for(var q = 0; q < selectedEditValues[1].length; q++) {
                        if (selectedEditValues[1][q].innerHTML === value2) {
                            selectedEditValues[1][q].setAttribute("selected", "");
                        }
                    }
                }
                
            }    

            function sendInputs(values) {
                console.log(values, inputEditValues);
                if (url === "user") {
                    for(var r = 2; r < inputEditValues.length - 3; r++) {
                        if (r === 4) {
                            inputEditValues[r].setAttribute("value", values[r].substring(4, 13));
                        } else {
                            inputEditValues[r].setAttribute("value", values[r-1]);
                        }
                    }   
                }
                if (url === "test") {
                    for(var s = 2; s < inputEditValues.length; s++) {
                        if (s === 3) {
                            inputEditValues[s].setAttribute("value", values[s-3]);
                        } else {
                            inputEditValues[s].setAttribute("value", values[s-1]);
                        }
                    }  
                }
                if (url === "schedule") {
                    console.log(values);
                    var dataRev = values[3].split(" ");
                    var dataMod = dataRev[0].split("/").reverse().join("-");
                    
                    var dataFormat = dataMod + "T" + dataRev[1];
                    console.log(dataFormat);
                    inputEditValues[2].setAttribute("value", dataFormat);
                }
            }

            function nameFixer(name, namedr) {
                if (url === "test") {
                    nameToDel.textContent = "Confirma a exlusão do teste ?";
                    var x = nameToDel.textContent.split(" ");
                    x.splice(5, 0, name.substring(5));
                    nameToDel.textContent = x.join(" ");
                } else if (url === "schedule") {
                    nameToDel.textContent = "Confirma a exlusão da sessão ?";
                    var x = nameToDel.textContent.split(" ");
                    x.splice(5, 0, "do Sr.(a) " + name + " com o(a) Dr.(a) " + namedr + " no dia " + rowInfo[3].split(" ")[0] + " às " + rowInfo[3].split(" ")[1] + "h") ;
                    nameToDel.textContent = x.join(" ");
                } else {
                    nameToDel.textContent = "Confirma a exlusão do usuário ?";
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

            function changeFieldOne($event) {
                console.log(event);
                switch (event.target.value) {
                    case "P1":
                        selectedAddValues[1].removeAttribute("disabled");
                        inputAddValues[3].removeAttribute("disabled");
                        selectedAddValues[1].value = "CRM";
                        break;
                    case "P2":                        
                        selectedAddValues[1].removeAttribute("disabled");
                        inputAddValues[3].removeAttribute("disabled");
                        selectedAddValues[1].value = "CRP";
                        break;
                    case "S1": 
                        selectedAddValues[1].value = "";
                        selectedAddValues[1].setAttribute("disabled", "");
                        inputAddValues[3].setAttribute("disabled", "");
                        inputAddValues[3].setAttribute("value", "");
                        break;
                }
            }

            function changeFieldTwo($event) {
                console.log(event);
                switch (event.target.value) {
                    case "CRM":
                        selectedAddValues[1].removeAttribute("disabled");
                        inputAddValues[3].removeAttribute("disabled");
                        selectedAddValues[0].value = "P1";
                        break;
                    case "CRP":
                        selectedAddValues[1].removeAttribute("disabled");
                        inputAddValues[3].removeAttribute("disabled");
                        selectedAddValues[0].value = "P2";
                        break;
                    case "": 
                        selectedAddValues[0].value = "S1";
                        selectedAddValues[1].setAttribute("disabled", "");
                        inputAddValues[3].setAttribute("disabled", "");
                        inputAddValues[3].setAttribute("value", "");
                        break;
                }
            }
            // jogar para um arquivo separado quando terminar de mexer no script
        </script>
    </body>
</html>
       