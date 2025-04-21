<div class="d-flex justify-content-center align-items-center vh-50">
    <div style="width: 300px;" class="d-inline-block m-3" id="perfilUsuario">
        <h5 style="text-align: center;">Información Personal</h5>
        <img src="{{ asset('images/rp_logo.png') }}" alt="Logo" class="img-fluid my-2" style="max-width: 250px;">

        <div class="form-group mb-3">
            <label for="usuario">Nombre:</label>
            <div class="input-group">
                <span class="input-group-text" style="background: rgb(255, 255, 255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                </span>
                <input type="text" wire:model="usuario" id="usuario" class="form-control" readonly>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="tipo_cuenta">Tipo de Cuenta:</label>
            <div class="input-group">
                <span class="input-group-text" style="background: rgb(255, 255, 255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                </span>
                <input type="text" wire:model="tipo_cuenta" id="tipo_cuenta" class="form-control" readonly>
            </div>
        </div>


        <div class="form-group mb-3">
            <label for="direccion">Direccion:</label>

            <div class="input-group">
                <span class="input-group-text" style="background: rgb(255, 255, 255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                        class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                    </svg>
                </span>
                </span>
                <input type="text" wire:model="direccion" id="direccion" class="form-control" readonly>
            </div>

        </div>

        <div class="form-group mb-3">
            <label for="telefono">Telefono:</label>
            <div class="input-group">
                <span class="input-group-text" style="background: rgb(255, 255, 255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9a7417"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    </svg>
                </span>
                </span>
                <input type="text" wire:model="telefono" id="telefono" class="form-control" readonly>
            </div>
        </div>
    </div>
</div>
