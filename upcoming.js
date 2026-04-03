document.addEventListener("DOMContentLoaded", function () {

const tableBody = document.querySelector("#eventsTable tbody");
const eventForm = document.getElementById("eventForm");
const eventModal = document.getElementById("eventModal");
const deleteModal = document.getElementById("deleteModal");

const openAddModal = document.getElementById("openAddModal");
const closeModalBtn = document.getElementById("closeModal");
const cancelModal = document.getElementById("cancelModal");
const cancelDelete = document.getElementById("cancelDelete");
const confirmDelete = document.getElementById("confirmDelete");

const eventDate = document.getElementById("eventDate");
const eventTime = document.getElementById("eventTime");
const eventDesc = document.getElementById("eventDesc");
const eventVenue = document.getElementById("eventVenue");
const eventCategory = document.getElementById("eventCategory");
const editIndexInput = document.getElementById("editIndex");

let deleteId = null;

/* ================= LOAD EVENTS ================= */

function loadEvents() {
    const formData = new FormData();
    formData.append("action", "fetch");

    fetch("event_api.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(result => {
        tableBody.innerHTML = "";
        result.data.forEach((event, index) => {
            const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${event.event_date}</td>
                    <td>${event.event_time}</td>
                    <td>${event.description}</td>
                    <td>${event.venue}</td>
                    <td>${event.category}</td>
                    <td>
                        <button class="btn btn-primary edit" data-id="${event.id}">Edit</button>
                        <button class="btn btn-danger delete" data-id="${event.id}">Delete</button>
                    </td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    });
}

/* ================= ADD / UPDATE ================= */

eventForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const id = editIndexInput.value;
    const formData = new FormData();

    formData.append("action", id ? "update" : "add");
    formData.append("id", id);
    formData.append("event_date", eventDate.value);
    formData.append("event_time", eventTime.value);
    formData.append("description", eventDesc.value);
    formData.append("venue", eventVenue.value);
    formData.append("category", eventCategory.value);

    fetch("event_api.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(() => {
        eventForm.reset();
        editIndexInput.value = "";
        eventModal.style.display = "none";
        loadEvents();
    });
});

/* ================= EDIT ================= */

tableBody.addEventListener("click", function (e) {

    if (e.target.classList.contains("edit")) {

        const row = e.target.closest("tr");

        editIndexInput.value = e.target.dataset.id;
        eventDate.value = row.cells[1].innerText;
        eventTime.value = row.cells[2].innerText;
        eventDesc.value = row.cells[3].innerText;
        eventVenue.value = row.cells[4].innerText;
        eventCategory.value = row.cells[5].innerText;

        eventModal.style.display = "flex";
    }

    if (e.target.classList.contains("delete")) {
        deleteId = e.target.dataset.id;
        deleteModal.style.display = "flex";
    }
});

/* ================= DELETE ================= */

confirmDelete.addEventListener("click", function () {

    const formData = new FormData();
    formData.append("action", "delete");
    formData.append("id", deleteId);

    fetch("event_api.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(() => {
        deleteModal.style.display = "none";
        loadEvents();
    });
});

/* ================= MODAL CONTROLS ================= */

openAddModal.onclick = () => {
    eventForm.reset();
    editIndexInput.value = "";
    eventModal.style.display = "flex";
};

closeModalBtn.onclick = () => eventModal.style.display = "none";
cancelModal.onclick = () => eventModal.style.display = "none";
cancelDelete.onclick = () => deleteModal.style.display = "none";

loadEvents();

});