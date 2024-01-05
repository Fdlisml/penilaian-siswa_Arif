// component form admin, siswa, dan guru
let adminForm = document.getElementById("formAdmin");
let siswaForm = document.getElementById("formSiswa");
let guruForm = document.getElementById("formGuru");

// function onclick form siswa
function handleFormSiswa() {
    adminForm.style.display = "none";
    siswaForm.style.display = "block";
    guruForm.style.display = "none";
}

// function onclick form guru
function handleFormGuru() {
    adminForm.style.display = "none";
    siswaForm.style.display = "none";
    guruForm.style.display = "block";
}

// function onclick form admin
function handleFormAdmin() {
    adminForm.style.display = "block";
    siswaForm.style.display = "none";
    guruForm.style.display = "none";
}
