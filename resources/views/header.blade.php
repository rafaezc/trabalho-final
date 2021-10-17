{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<nav class="mb-5 navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/welcome">
        SMARP
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @if (session()->get('user_code') == 'M1')
            <li class="nav-item mx-2">
                <a class="nav-link" href="/users">Usuários</a>
            </li>
            @endif
            <li class="nav-item dropdown mx-2">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Agenda
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/schedules"><i class="fas fa-calendar-alt"></i> Sessões Futuras</a>
                    <a class="dropdown-item" href="/pastschedules"><i class="fas fa-calendar-times"></i> Sessões Passadas</a>
                </div>
            </li>
            <li class="nav-item dropdown mx-2">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pacientes
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/patients/search"><i class="fas fa-search"></i> Buscar pacientes</a>
                    <a class="dropdown-item" href="/patients/add" type="button" data-toggle="modal" 
                        data-target="#addPatientModal" id="patient-add"><i class="fas fa-plus"></i> Adicionar paciente</a>
                </div>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="/tests">Testes</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="{{ route('login.logout') }}">{{ "(". session()->get('user_name') . ")" . " Sair" }}</a>
                {{-- {{ "(". session()->get('user_name') .")" . "Sair" }} --}}
            </li>
        </ul>
    </div>
</nav>