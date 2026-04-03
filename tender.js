// ================= ELEMENTS =================

const openAddModal = document.getElementById("openAddModal");
const modal = document.getElementById("TenderModal");
const closeModal = document.getElementById("closeModal");
const cancelModal = document.getElementById("cancelModal");

const form = document.getElementById("TenderForm");
const table = document.getElementById("TenderTable").getElementsByTagName("tbody")[0];

const deleteModal = document.getElementById("deleteModal");
const cancelDelete = document.getElementById("cancelDelete");
const confirmDelete = document.getElementById("confirmDelete");

const searchInput = document.getElementById("searchInput");

let editRow = null;
let deleteRow = null;


// ================= OPEN MODAL =================

openAddModal.onclick = () => {
    modal.style.display = "flex";
    form.reset();
    editRow = null;
};


// ================= CLOSE MODAL =================

closeModal.onclick = () => modal.style.display = "none";
cancelModal.onclick = () => modal.style.display = "none";


// ================= ADD / EDIT DATA =================

form.onsubmit = function (e) {

    e.preventDefault();

    const tenderNo = document.getElementById("tenderNo").value;
    const desc = document.getElementById("eventDesc").value;
    const publish = document.getElementById("Publishing").value;
    const submission = document.getElementById("Submission").value;
    const opening = document.getElementById("Opening").value;
    const file = document.getElementById("file").files[0];

    let fileName = file ? file.name : "Download";

    if (editRow) {

        editRow.cells[1].innerText = tenderNo;
        editRow.cells[2].innerText = desc;
        editRow.cells[3].innerText = publish;
        editRow.cells[4].innerText = submission;
        editRow.cells[5].innerText = opening;
        editRow.cells[6].innerText = fileName;

    } else {

        const rowCount = table.rows.length + 1;

        const row = table.insertRow();

        row.innerHTML = `
            <td>${rowCount}</td>
            <td>${tenderNo}</td>
            <td>${desc}</td>
            <td>${publish}</td>
            <td>${submission}</td>
            <td>${opening}</td>
            <td>${fileName}</td>
            <td>
                <button class="btn btn-primary edit">Edit</button>
                <button class="btn btn-danger delete">Delete</button>
            </td>
        `;

    }

    modal.style.display = "none";
};


// ================= EDIT BUTTON =================

document.addEventListener("click", function (e) {

    if (e.target.classList.contains("edit")) {

        editRow = e.target.closest("tr");

        modal.style.display = "flex";

        document.getElementById("Tender No.").value = editRow.cells[1].innerText;
        document.getElementById("eventDesc").value = editRow.cells[2].innerText;
        document.getElementById("Publishing").value = editRow.cells[3].innerText;
        document.getElementById("Submission").value = editRow.cells[4].innerText;
        document.getElementById("Opening").value = editRow.cells[5].innerText;

    }

});


// ================= DELETE BUTTON =================

document.addEventListener("click", function (e) {

    if (e.target.classList.contains("delete")) {

        deleteRow = e.target.closest("tr");
        deleteModal.style.display = "flex";

    }

});


// ================= CONFIRM DELETE =================

confirmDelete.onclick = () => {

    if (deleteRow) {
        deleteRow.remove();
    }

    deleteModal.style.display = "none";

};

cancelDelete.onclick = () => deleteModal.style.display = "none";


// ================= SEARCH =================

searchInput.addEventListener("keyup", function () {

    const filter = this.value.toLowerCase();
    const rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {

        const text = rows[i].innerText.toLowerCase();

        rows[i].style.display = text.includes(filter) ? "" : "none";

    }

});