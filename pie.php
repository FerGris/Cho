

    <footer>
        <div class="container">
            <div class="contacto">
                <h2>Contacto</h2>
                <p>Email: contacto@primfit.com</p>
                <p>Teléfono: (123) 456-7890</p>
            </div>
            <div class="social">
                <h2>Redes Sociales</h2>
                <a href="#">Facebook: Omar Monge</a>
                <a href="#">Instagram: oma_rmonge</a>
                <a href="#">Twitter: primfit</a>
            </div>
            <div class="políticas">
                <h2>Políticas</h2>
                <a href="#">Términos de Servicio</a>
                <a href="#">Política de Privacidad</a>
            </div>
        </div>
    </footer>

    <!-- Modal para Más Información 
    <div id="modal-membresia" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Detalles de Membresía Exclusiva</h2>
            <p>Selecciona el plan que más te convenga y disfruta de nuestros beneficios exclusivos:</p>
            <div class="planes">
                <div class="plan">
                    <h3>Plan Básico</h3>
                    <p>Precio: $200</p>
                    <p>Beneficios:</p>
                    <ul>
                        <li>Descuento en productos seleccionados</li>
                        <li>Acceso anticipado a nuevas ofertas</li>
                    </ul>
                    <a href="#" class="cta inscribirse" data-plan="basico">Inscribirse</a>
                    <div class="form-inscripcion" id="form-basico">
                        <h4>Formulario de Inscripción</h4>
                        <input type="text" id="nombre-basico" placeholder="Nombre completo" required>
                        <input type="email" id="correo-basico" placeholder="Correo electrónico" required>
                        <input type="tel" id="telefono-basico" placeholder="Teléfono" required>
                        <button type="button" class="enviar" data-precio="200" data-plan="Básico">Enviar Inscripción</button>
                    </div>
                </div>
                <div class="plan">
                    <h3>Plan Premium</h3>
                    <p>Precio: $440</p>
                    <p>Beneficios:</p>
                    <ul>
                        <li>Descuentos en todos los productos</li>
                        <li>Acceso anticipado a nuevos productos</li>
                        <li>Consultas personalizadas</li>
                    </ul>
                    <a href="#" class="cta inscribirse" data-plan="premium">Inscribirse</a>
                    <div class="form-inscripcion" id="form-premium">
                        <h4>Formulario de Inscripción</h4>
                        <input type="text" id="nombre-premium" placeholder="Nombre completo" required>
                        <input type="email" id="correo-premium" placeholder="Correo electrónico" required>
                        <input type="tel" id="telefono-premium" placeholder="Teléfono" required>
                        <button type="button" class="enviar" data-precio="440" data-plan="Premium">Enviar Inscripción</button>
                    </div>
                </div>
            </div>
            <div class="ticket" id="ticket">
                <h3>Ticket de Inscripción</h3>
                <p id="ticket-plan"></p>
                <p id="ticket-nombre"></p>
                <p id="ticket-correo"></p>
                <p id="ticket-telefono"></p>
                <p id="ticket-costo"></p>
            </div>
        </div>-->
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        // Obtener el modal
        var modal = document.getElementById("modal-membresia");
        // Obtener el botón que abre el modal
        var btn = document.querySelector(".membresia .cta");
        // Obtener el elemento <span> que cierra el modal
        var span = document.getElementsByClassName("close")[0];

        // Cuando el usuario haga clic en el botón, abre el modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Cuando el usuario haga clic en <span> (x), cierra el modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cuando el usuario haga clic en cualquier parte fuera del modal, lo cierra
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Mostrar el formulario correspondiente al plan seleccionado
        document.querySelectorAll('.inscribirse').forEach(button => {
            button.onclick = function(event) {
                event.preventDefault();
                var plan = this.dataset.plan;
                var form = document.getElementById(`form-${plan}`);
                
                // Ocultar otros formularios
                document.querySelectorAll('.form-inscripcion').forEach(f => f.style.display = 'none');
                
                // Mostrar el formulario seleccionado
                form.style.display = 'block';
            }
        });

        // Enviar inscripción y generar ticket
        document.querySelectorAll('.enviar').forEach(button => {
            button.onclick = function() {
                var precio = this.dataset.precio;
                var plan = this.dataset.plan;

                // Obtener datos del formulario
                var nombre = document.getElementById(`nombre-${plan.toLowerCase()}`).value;
                var correo = document.getElementById(`correo-${plan.toLowerCase()}`).value;
                var telefono = document.getElementById(`telefono-${plan.toLowerCase()}`).value;

                // Mostrar ticket con la información
                document.getElementById("ticket-plan").innerText = `Plan: ${plan}`;
                document.getElementById("ticket-nombre").innerText = `Nombre: ${nombre}`;
                document.getElementById("ticket-correo").innerText = `Correo: ${correo}`;
                document.getElementById("ticket-telefono").innerText = `Teléfono: ${telefono}`;
                document.getElementById("ticket-costo").innerText = `Costo: $${precio}`;

                // Mostrar el ticket
                document.getElementById("ticket").style.display = "block";
            }
        });
    </script>
</body>
</html>
