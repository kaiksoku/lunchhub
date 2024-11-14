@extends('layouts.app')

@section('content')

<!-- Sidebar HTML -->
<div class="sidebar">
  <div class="sidebar-header">
    <h2>LunchHub</h2>
  </div>
  <ul>
    <li><a href="#"><i class="fa-solid fa-border-all icon"></i>&nbsp Dashboard</a></li>
    <li class="active"><a href="#"><i class="fa-regular fa-bell icon"></i>&nbsp Solicitar Comida</a></li>
    <li><a href="#"><i class="fa-regular fa-building icon"></i>&nbsp Departamentos</a></li>
    <li><a href="#"><i class="fa-regular fa-clipboard icon"></i>&nbsp Reportes</a></li>
    <li><a href="#"><i class="fa-solid fa-gear icon"></i>&nbsp Configuración</a></li>
  </ul>
</div>

<!-- Estilos CSS -->
<style>
  /* Estilos de la Sidebar */
  .sidebar {
    background-color: #1d6298; /* Fondo azul para la parte inferior de la sidebar */
    width: 250px;
    padding: 15px;
    color: white;
  }

  /* Sección superior de la Sidebar */
  .sidebar-header {
    background-color: #ffffff; /* Fondo blanco para la sección superior */
    padding: 15px;
    text-align: center;
    color: #6BA342;
    font-size: 1.5rem;
    font-weight: bold;
    border-top: 2px solid #6BA342;    /* Grosor superior */
    border-right: 6px solid #6BA342;  /* Grosor derecho */
    border-bottom: 4px solid #6BA342; /* Grosor inferior */
    border-left: 8px solid #6BA342;   /* Grosor izquierdo */
    border-radius: 20% 50% 20% 50%; /* Ajusta cada esquina para simular una forma de hoja */
    width: 185px; /* Ajusta el tamaño del contenedor */
    height: 75px;
    margin: 0 auto;
    box-shadow: -5px 10px 15px rgba(0, 0, 0, 0.3); /* Sombra debajo y a la izquierda */
}

  

  .sidebar-header h2 {
    color: #c62e1f; /* Color del texto */
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0;
    position: relative; /* Necesario para posicionar el ::after relativo al h2 */
}

.sidebar-header h2::after {
    content: "";
    display: block;
    width: 80%; /* Ancho de la línea */
    height: 6px; /* Grosor de la línea */
    background-color: #1d6298; /* Color azul de la línea */
    margin: 1px auto 0; /* Espaciado desde el texto */
}


  /* Estilos para la lista de navegación */
  .sidebar ul {
    list-style-type: none;
    padding: 0;
    margin-top: 15px; /* Espacio entre la línea y el primer elemento */
  }

  .sidebar ul li {
    margin: 10px 0;
  }

  .sidebar ul li a {
    color: #ffffff;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
    font-size: 1rem;
  }

  .sidebar ul li.active a,
  .sidebar ul li a:hover {
    background-color: #ffffff; /* Fondo blanco en el elemento activo o hover */
    color: #1d6298; /* Texto en azul para contraste */
  }

  /* Estilos para los Iconos */
  .sidebar ul li a .icon {
    background-color: #ffffff;
    color: #1d6298;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    font-size: 1.2rem;
    margin-right: 10px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
  }

  /* Estilos adicionales para el formulario */
  .card-header {
    border-top: 4px solid #6BA342; /* Verde cambiado para la cabecera del formulario */
    color: black; /* Texto de la cabecera */
  }

  .btn-submit {
    background-color: #6BA342; /* Verde para el botón */
    border-color: #6BA342;
    color: white;
  }

  .btn-submit:hover {
    background-color: #4e8b33; /* Verde oscuro para el hover */
    border-color: #6BA342;
    color: white;
  }

  .card-body {
    display: flex;
    justify-content: space-between;
  }

  .form-container {
    width: 60%;
  }

  .order-summary {
    width: 35%;
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    font-size: 14px;
  }

  .order-summary h5 {
    color: black;
    margin-bottom: 15px;
  }

  .order-summary .summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
  }

  .order-summary .summary-total {
    font-weight: bold;
    color: #1d6298;
  }

  .selected-employees {
    margin-top: 10px;
    font-size: 14px;
  }

  .selected-employees span {
    display: inline-block;
    background-color: #e9ecef;
    padding: 5px 10px;
    margin: 3px;
    border-radius: 3px;
  }
  .custom-border {
    width: 300px; /* Ajusta el tamaño según sea necesario */
    height: 200px;
    padding: 20px;
    background-color: white;
    position: relative;
    overflow: hidden;
  }

  .custom-border::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="none" stroke="%236BA342" stroke-width="4" d="M10 10 Q25 5 50 10 Q75 15 90 10 Q95 35 80 50 Q65 65 50 80 Q35 65 20 50 Q5 35 10 10 Z"/></svg>') no-repeat center center;
    background-size: cover;
    pointer-events: none;
  }
</style>

<div class="container mt-5">
  <div class="card">
    <div class="card-header text-center">
      <h4>Formulario de Solicitud de Comida</h4>
    </div>

    <div class="card-body">
      <!-- Formulario -->
      <div class="form-container">
        <!-- Restaurante -->
        <div class="form-group">
          <label for="restaurant">Selecciona un Restaurante</label>
          <select class="form-control" id="restaurant" required onchange="updateOrderSummary()">
            <option value="" disabled selected>Selecciona un restaurante</option>
            <option>Safari</option>
            <option>Mar y Tierra</option>
            <option>Mr. Wok</option>
          </select>
        </div>

        <!-- Justificación del Pedido -->
        <div class="form-group">
          <label for="justification">Justificación del Pedido</label>
          <input type="text" class="form-control" id="justification" placeholder="Escribe la razón del pedido" required>
        </div>

        <!-- Departamento -->
        <div class="form-group">
          <label for="department">Departamento</label>
          <select class="form-control" id="department" required onchange="filterEmployees(); updateOrderSummary()">
            <option value="" disabled selected>Selecciona un departamento</option>
            <option value="Interchange">Interchange</option>
            <option value="Operaciones">Operaciones</option>
            <option value="Lavado">Lavado</option>
          </select>
        </div>

        <!-- Empleado -->
        <div class="form-group">
          <label for="employee">Empleado</label>
          <select class="form-control" id="employee" onchange="addEmployee()">
            <option value="" disabled selected>Selecciona un empleado</option>
            <option data-department="Interchange" value="1">Bryan Moreno</option>
            <option data-department="Interchange" value="2">Melkin Gonzales</option>
            <option data-department="Interchange" value="3">Wilmer Hernandez</option>
            <option data-department="Operaciones" value="4">Roberto Hurtado</option>
            <option data-department="Operaciones" value="5">Jose Ajanel</option>
            <option data-department="Operaciones" value="6">Alfredo Bidal</option>
            <option data-department="Lavado" value="7">Carlos Guerra</option>
            <option data-department="Lavado" value="8">Julio Juarez</option>
            <option data-department="Lavado" value="9">Izai Cerna</option>
          </select>
        </div>

        <!-- Área de Empleados Seleccionados -->
        <div id="selected-employees" class="selected-employees"></div>
      </div>

      <!-- Nota de Compra -->
      <div class="order-summary">
        <h5>Resumen de la Orden</h5>
        <div class="summary-item">
          <span>Restaurante:</span>
          <span id="summary-restaurant">-</span>
        </div>
        <div class="summary-item">
          <span>Departamento:</span>
          <span id="summary-department">-</span>
        </div>
        <div class="summary-item">
          <span>Platos Pedidos:</span>
          <span id="summary-quantity">0</span>
        </div>
        <div class="summary-item summary-total">
          <span>Total:</span>
          <span id="summary-total">Q 0.00</span>
        </div>
      </div>
    </div>

    <div class="card-footer text-center">
      <button type="submit" class="btn btn-submit">Enviar Solicitud</button>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  const employeePrice = 25;
  let selectedEmployeesCount = 0;

  function filterEmployees() {
    const selectedDepartment = document.getElementById("department").value;
    const employees = document.getElementById("employee").options;

    for (let i = 0; i < employees.length; i++) {
      const employeeDepartment = employees[i].getAttribute("data-department");
      if (employeeDepartment === selectedDepartment || employees[i].value === "") {
        employees[i].style.display = "block";
      } else {
        employees[i].style.display = "none";
      }
    }

    document.getElementById("employee").selectedIndex = 0;
  }

  function addEmployee() {
    const employeeSelect = document.getElementById("employee");
    const selectedEmployee = employeeSelect.options[employeeSelect.selectedIndex];
    const displayArea = document.getElementById("selected-employees");

    if (selectedEmployee.value && !isEmployeeSelected(selectedEmployee.text)) {
      const span = document.createElement("span");
      span.textContent = selectedEmployee.text;
      displayArea.appendChild(span);

      selectedEmployeesCount++;
      updateOrderSummary();
      employeeSelect.selectedIndex = 0;
    }
  }

  function isEmployeeSelected(employeeName) {
    const selectedEmployees = document.getElementById("selected-employees").getElementsByTagName("span");
    for (let i = 0; i < selectedEmployees.length; i++) {
      if (selectedEmployees[i].textContent === employeeName) {
        return true;
      }
    }
    return false;
  }

  function updateOrderSummary() {
    const restaurant = document.getElementById("restaurant").value || "-";
    const department = document.getElementById("department").value || "-";
    const total = selectedEmployeesCount * employeePrice;

    document.getElementById("summary-restaurant").textContent = restaurant;
    document.getElementById("summary-department").textContent = department;
    document.getElementById("summary-quantity").textContent = selectedEmployeesCount;
    document.getElementById("summary-total").textContent = `Q ${total.toFixed(2)}`;
  }
</script>
@endsection
