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