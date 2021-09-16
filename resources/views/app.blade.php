<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">

        <title>
            @yield('title')
        </title>

    </head>
    <body>
        <header>
            <!-- Image and text -->
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
                        <li class="nav-item active">
                            <a class="nav-link" href="/users">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
            <div class="mt-5 fundo">
                <span>
                    <i>Todos os direitos reservados.</i> <!-- colocar o icone de copyright-->
                </span>
            </div>
        </footer>

        <!-- JavaScript  -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    
        <!-- JS functions-->
        <script type="text/javascript">     
            var table = document.getElementById("user-data");
            var rows = table.getElementsByTagName("tr");
            var cols = table.getElementsByTagName("td");
            var rowInfo = [];
            var buttonArea = document.getElementById("button-box");
            var buttons = buttonArea.getElementsByTagName("button");
            var buttonDetails = [];
            var editForm = document.getElementById("edit-form");
            var inputValues = editForm.getElementsByTagName("input");
            var selectedValues = editForm.getElementsByTagName("option");
            var userToUp = document.getElementById("idup");
            var userToDel = document.getElementById("iddel");

            for(var l = 0; l < buttons.length; l++) {
                var button = buttons[l];
                buttonDetails.push(buttons[l]);
                if (l < 2) {
                    button.classList.add("cursor-effects");
                    button.disabled = true;
                }
            }

            for(var i = 0; i < rows.length; i++) {
                var row = rows[i];
                for (var j = 0; j < cols.length; j++) {
                    if (i % 2 !== 0) {
                        row.classList.add("stripe");
                    } else {
                        row.classList.add("white-stripe");
                    }
                }

                row.addEventListener("click", function() { 
                    rowSelect(this, buttonDetails, false);
                    if (rowInfo.length === 0) {
                        for(var k = 0; k < cols.length; k++) { 
                            rowInfo.push(this.cells[k].innerHTML);
                            if (rowInfo.length > 5) {
                                userToUp.setAttribute("value", rowInfo[0]);
                                userToDel.setAttribute("value", rowInfo[0]);
                                for(var m = 2; m < inputValues.length - 3; m++) {
                                    if (m === 4) {
                                        inputValues[m].setAttribute("value", rowInfo[m].substring(4, 13));
                                    } else {
                                        inputValues[m].setAttribute("value", rowInfo[m-1]);
                                    }
                                }
                                for(var n = 0; n < selectedValues.length; n++) {
                                    selectedValues[n].setAttribute("value", rowInfo[n]);
                                    console.log(selectedValues[n].setAttribute("value", rowInfo[n]));
                                }
                            }
                        }
                    } else {
                        rowInfo.splice(0, 6);
                        for(var k = 0; k < cols.length; k++) { 
                            rowInfo.push(this.cells[k].innerHTML);
                            if (rowInfo.length > 5) {
                                userToUp.setAttribute("value", rowInfo[0]);
                                userToDel.setAttribute("value", rowInfo[0]);
                                for(var m = 2; m < inputValues.length - 3; m++) {
                                    if (m === 4) {
                                        inputValues[m].setAttribute("value", rowInfo[m].substring(4, 13));
                                    } else {
                                        inputValues[m].setAttribute("value", rowInfo[m-1]);
                                    }
                                }
                                for(var n = 0; n < selectedValues.length; n++) {
                                    selectedValues[n].setAttribute("value", rowInfo[n]);
                                    console.log(selectedValues[n].setAttribute("value", rowInfo[n]));
                                }
                            }
                        }
                    }
        
                });
            }

            function rowSelect(row, button, many) {
                if(!many) {
                    var rows = row.parentElement.getElementsByTagName("tr");
                        for(var i = 0; i < rows.length; i++) {
                            var aux_row = rows[i];
                            aux_row.classList.remove("active");    
                        }
                }  
            row.classList.add("active");
            button[0].disabled = false;
            button[1].disabled = false;
            console.log(rowInfo);
            }

        </script>
    </body>
</html>
       
