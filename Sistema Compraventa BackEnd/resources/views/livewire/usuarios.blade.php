<div>
    @if (!in_array(request()->path(), ['register']))
        <div>
            <style>
                .text-custom {
                    color: #B68929;
                }

                .btn-custom {
                    background-color: #B68929;
                    color: white;
                    font-size: 18px;
                    border: none;
                    transition: background-color 0.3s ease;
                }

                .btn-custom:hover {
                    background-color: #caa139;
                }

                .form-control:focus {
                    border-color: #B68929;
                    box-shadow: 0 0 0 0.2rem rgba(216, 154, 20, 0.25);
                }

                .input-group .form-control {
                    border-left: none;
                }

                .input-group-text {
                    background-color: white;
                    border-right: none;
                }

                .card-custom {
                    width: 100%;
                    max-width: 450px;
                    border-radius: 15px;

                    background-color: #fff;
                    padding: 30px;
                }

                .form-label {
                    font-weight: 500;
                }

                a.text-custom:hover {
                    text-decoration: underline;
                }

                .hover-black:hover {
                    color: rgb(47, 67, 245);
                }

                .full-screen-center {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #ffffff;
                }
            </style>

            <div class="full-screen-center" wire:ignore>
                <div class="card-custom text-center">
                    <form>
                        <h2 class="fw-bold text-custom mb-3">Bienvenido</h2>
                        <img src="{{ asset('images/rp_logo.png') }}" alt="Logo" class="img-fluid my-2"
                            style="max-width: 250px;">
                        <p class="text-muted mb-4">Inicia sesión para continuar</p>

                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                                        class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" name="name_usuario" id="email"
                                    placeholder="Ingresa tu usuario" required>
                            </div>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                                        class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                    </svg>
                                </span>
                                <input type="password" class="form-control" name="contrasena_usuario" id="password"
                                    placeholder="Ingresa tu contraseña" required>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
                        </div>


                    </form>
                    <p class="text-center mt-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#actualizarContrasenaModal"
                            style="font-size: 12px">¿Quiere cambiar
                            su contraseña?</a>
                    </p>

                    <div class="text-center mt-3">
                        <p class="mb-0">¿No tienes cuenta?
                            <a href="{{ route('register') }}" class="text-custom text-decoration-none hover-black">Crear
                                cuenta</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="actualizarContrasenaModal" tabindex="-1" aria-labelledby="updatePasswordModalLabel"
            wire:ignore>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background: #9a7417;">
                        <h5 class="modal-title" id="updatePasswordModalLabel">Cambiar Contraseña</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group mb-3">
                                <label for="update-codigo-usuario">Código de Usuario:</label>
                                <input type="text" wire:model="user_id_modal" id="update-codigo-usuario"
                                    class="form-control" placeholder="Ingrese su código de usuario">
                            </div>

                            <div class="form-group mb-3">
                                <label for="update-contrasena-nueva">Nueva Contraseña:</label>
                                <input type="password" wire:model="password" id="update-contrasena-nueva"
                                    class="form-control" placeholder="Ingrese su nueva contraseña">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-white" style="background: #9a7417;"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn text-white" style="background: #9a7417;"
                            wire:click="updatePassword">Cambiar
                            Contraseña</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (!in_array(request()->path(), ['/']))
        <div style="min-height: 100vh;" class="d-flex align-items-center justify-content-center">
            <style>
                .bg-custom {
                    background-color: #B68929;
                }

                .btn-custom {
                    background-color: #B68929;
                    color: white;
                    font-weight: 500;
                    transition: background-color 0.3s ease;
                }

                .btn-custom:hover {
                    background-color: #caa139;
                }

                .card.selected {
                    background-color: #B68929;
                    color: white;
                }

                .card-option {
                    cursor: pointer;
                    transition: all 0.3s ease;
                    width: 150px;
                    height: 150px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .card.selected .text-muted {
                    color: white;
                }

                .card-option:hover {
                    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
                }

                .register-card {
                    background-color: #fff;

                    width: 100%;
                    max-width: 450px;
                    min-width: 450px;
                }


                .custom-login-link {
                    color: #B68929;
                    transition: color 0.3s ease;
                }

                .custom-login-link:hover {
                    color: rgb(47, 67, 245);
                }

                .card-container {
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    margin-bottom: 30px;
                }
            </style>


            <div class="register-card">
                <div class="text-center mb-4">
                    <h2 class="text-custom fw-bold" style="color: #B68929">Crear una cuenta</h2>
                    <img src="{{ asset('images/rp_logo.png') }}" alt="Logo" class="img-fluid my-2"
                        style="max-width: 250px;">
                    <p class="text-muted">Selecciona el tipo de registro</p>
                </div>

                <div class="card-container">
                    <div class="card card-option shadow-sm text-center selected" id="personalCard" width ="200px"
                        height="200px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <h5 class="card-title">Personal</h5>
                        <p>Usuario individual</p>
                    </div>
                    <div class="card card-option shadow-sm text-center" id="comercialCard" width ="200px"
                        height="200px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-shop" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                        </svg>
                        <h5 class="card-title">Comercial</h5>
                        <p>Empresa o negocio</p>
                    </div>
                </div>
                <form>
                    <div class="mb-2">
                        <label for="nameUser" class="form-label">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: rgb(255, 255, 255);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" name="name_usuario" id="email"
                                placeholder="Ingresa tu usuario" required>
                        </div>
                    </div>


                    <div class="mb-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: rgb(255, 255, 255);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                                    class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                </svg>
                            </span>
                            <input type="password" class="form-control" name="contrasena_usuario" id="password"
                                placeholder="Ingresa tu contraseña" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-custom w-100 mt-2" id="btnPersonal" wire:click="">Crear
                        Cuenta
                        Personal</button>
                    <button type="submit" class="btn btn-custom w-100 mt-2" id="btnComercial" wire:click="">Crear
                        Cuenta
                        Comercial</button>
                </form>

                <div class="text-center mt-2">
                    <p class="mb-0">¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="custom-login-link text-decoration-none">Inicia
                            sesión</a>
                    </p>
                </div>
            </div>

            @push('scripts')
                <script>
                    let selectedOption = 'personal';

                    const personalCard = document.getElementById('personalCard');
                    const comercialCard = document.getElementById('comercialCard');
                    const btnPersonal = document.getElementById('btnPersonal');
                    const btnComercial = document.getElementById('btnComercial');

                    personalCard.addEventListener('click', function() {
                        selectedOption = 'personal';
                        updateCardSelection();
                    });

                    comercialCard.addEventListener('click', function() {
                        selectedOption = 'comercial';
                        updateCardSelection();
                    });

                    function updateCardSelection() {
                        personalCard.classList.remove('selected');
                        comercialCard.classList.remove('selected');

                        if (selectedOption === 'personal') {
                            personalCard.classList.add('selected');
                            btnPersonal.style.display = 'block';
                            btnComercial.style.display = 'none';
                        } else {
                            comercialCard.classList.add('selected');
                            btnPersonal.style.display = 'none';
                            btnComercial.style.display = 'block';
                        }
                    }

                    [btnPersonal, btnComercial].forEach(btn => {
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            const name = document.getElementById('nameUser').value;
                            const email = document.getElementById('email').value;
                            const password = document.getElementById('password').value;

                            console.log('Registrando usuario...', name, email, password, 'Tipo:', selectedOption);
                        });
                    });

                    updateCardSelection();
                </script>
            @endpush

        </div>
    @endif


</div>
