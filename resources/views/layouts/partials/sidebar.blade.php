<div style="min-height: 120px;">
    <div class="collapse collapse-horizontal" id="collapseWidthExample">
        <div class="card card-body bg-light" style="width: 300px;">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                    <span class="fs-4">Home</span>
                </a>
                <hr>
                @if ((Auth::user()->tipo_usuario ?? 'Ninguno') == 'E')
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/pago"
                                class="nav-link active">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Pago
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/aporte"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Aporte
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/multa"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Multa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/empleado"
                                class="nav-link" aria-current="page">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#home" />
                                </svg>
                                Empleado
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/socio"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Socio
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/actaReunion"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Acta Reunion
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/asistencia"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Asistencia
                            </a>
                        </li>

                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/ingreso"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#table" />
                                </svg>
                                Ingreso
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/egreso"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#grid" />
                                </svg>
                                Egreso
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/reporte_ingreso"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                Reporte de Ingreso
                            </a>
                        </li>
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/reporte_egreso"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                Reporte de Egresos
                            </a>
                        </li>
                    </ul>
                @elseif ((Auth::user()->tipo_usuario ?? 'Ninguno') == 'S')
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="/inf513/grupo14sc/proyectofinal/web_system_tecno/public/kardex/{{ Auth::user()->ci ?? 0 }}"
                                class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                Kardex
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="#" class="nav-link">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                Bienvenido
                            </a>
                        </li>
                    </ul>
                @endif

                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
