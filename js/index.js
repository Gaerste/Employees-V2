import { addEmployeeForm } from './add-employee.js';
import { openEmployee } from './employee.js';

// Gets all employees from PHP => JSON
async function getEmployees () {
  try {
    const response = await fetch('http://localhost/php-employee-management-v1/src/library/employeeController.php');
    const data = response.json();
    return data;
  } catch (error) {
    alert(error);
  }
}

async function setTable () {
  const employees = await getEmployees();
  const tableBody = document.getElementById('employeesTableBody');  
  
  Object.values(employees).map(item => {    
    const row = document.createElement('tr');
    row.setAttribute('id', `user${item.id}`);
    row.classList.add('dash__row');

    Object.keys(dashCategories).map(col => {
      const cell = document.createElement('td');
      cell.textContent = item[col];
      cell.addEventListener('click', function (e) {
        openEmployee(e);
      });
      row.appendChild(cell);
    })
    addDeleteBtn(row, item);
    tableBody.appendChild(row);
    
  })
}

 function addDeleteBtn(row, item) {
  const cell = document.createElement('td');
  const form = document.createElement('form');
  const deleteLabel = document.createElement('label');
  const inputAction = document.createElement('input');
  const idLabel = document.createElement('label');
  const inputId = document.createElement('input');
  const deletebutton = document.createElement('button');
  const iconDelete = document.createElement('i');

  cell.classList.add('bg-white');
  
  form.id = 'deleteBtnForm';
  form.setAttribute('method', 'POST');
  form.setAttribute('action', './library/employeeController.php');
  form.classList.add('d-flex', 'justify-content-center', 'align-items-center');
  
  deleteLabel.setAttribute('for', 'deleteBtn');
  
  inputAction.setAttribute('type', 'hidden');
  inputAction.setAttribute('name','action');
  inputAction.setAttribute('value','deleteEmployee');
  inputAction.classList.add('mx-2');
  inputAction.id = 'deleteBtn';
    
  idLabel.setAttribute('for', 'inputId');  
  inputId.setAttribute('type', 'hidden');
  inputId.setAttribute('name','employeeId');
  inputId.setAttribute('value',item.id);
  inputId.setAttribute('id', 'inputId');
 
  deletebutton.setAttribute('type', 'submit');
  deletebutton.classList.add('delete__btn', 'text-align-center');
  iconDelete.classList.add('fa-solid','fa-trash', 'mt-3');

  deletebutton.appendChild(iconDelete);
  form.append(deleteLabel,inputAction,idLabel,inputId,deletebutton);
  cell.appendChild(form);

  row.appendChild(cell);
 }

window.onload = setTable();

const addEmployeeBtn = document.getElementById('addEmployeeBtn');
addEmployeeBtn.addEventListener('click',  addEmployeeForm);

const dashCategories = {
  name: 'text',
  email: 'email',
  age: 'number',
  streetAddress: 'number',
  city: 'text',
  state: 'text',
  phoneNumber: 'tel',
  postalCode: 'number',
};





export { dashCategories, getEmployees, setTable };