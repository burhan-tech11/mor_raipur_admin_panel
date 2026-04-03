document.addEventListener('DOMContentLoaded', () => {
    // Elements Selection
    const galleryModal = document.getElementById('gallery modal');
    const deleteModal = document.getElementById('deleteModal');
    const galleryForm = document.getElementById('gallery form');
    const tableBody = document.querySelector('.admin-table tbody');
    const entriesSelect = document.getElementById('entriesSelect');
    const searchInput = document.getElementById('searchInput');

    // State Variables
    let galleryData = []; 
    let editIndex = -1;
    let deleteIndex = -1;
    let currentPage = 1;
    let rowsPerPage = parseInt(entriesSelect.value);

    // --- 1. TABLE RENDER WITH PAGINATION ---
    function renderTable() {
        tableBody.innerHTML = "";
        
        // Search Filter
        const term = searchInput.value.toLowerCase();
        const filtered = galleryData.filter(item => 
            item.location.toLowerCase().includes(term) || 
            item.desc.toLowerCase().includes(term)
        );

        // Pagination Calculations
        const totalItems = filtered.length;
        const totalPages = Math.ceil(totalItems / rowsPerPage) || 1;
        if (currentPage > totalPages) currentPage = totalPages;

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageData = filtered.slice(start, end);

        pageData.forEach((data, index) => {
            const actualIndex = galleryData.indexOf(data);
            const row = `
                <tr>
                    <td>${start + index + 1}</td>
                    <td>${data.location}</td>
                    <td>${data.desc}</td>
                    <td><img src="${data.img}" width="100" style="border-radius:4px;"></td>
                    <td>
                        <button class="btn btn-primary" onclick="editItem(${actualIndex})">Edit</button>
                        <button class="btn btn-danger" onclick="confirmDelete(${actualIndex})">Delete</button>
                    </td>
                </tr>`;
            tableBody.innerHTML += row;
        });

        document.getElementById('pageInfo').innerText = `Showing ${filtered.length > 0 ? start + 1 : 0} to ${Math.min(end, totalItems)} of ${totalItems} entries`;
    }

    // --- 2. BUTTON ACTIONS ---

    // Add New Open
    document.getElementById('openAddModal').onclick = () => {
        galleryForm.reset();
        editIndex = -1;
        document.getElementById('modalTitle').innerText = "Add New Gallery";
        galleryModal.style.display = 'flex';
    };

    // Form Submit (Save/Update)
    galleryForm.onsubmit = (e) => {
        e.preventDefault();
        const fileInput = document.getElementById('File');
        const imgPath = fileInput.files[0] ? URL.createObjectURL(fileInput.files[0]) : "https://via.placeholder.com/100";

        const newItem = {
            location: document.getElementById('Location').value,
            desc: document.getElementById('galleryDesc').value,
            img: imgPath
        };

        if (editIndex === -1) {
            galleryData.push(newItem);
        } else {
            galleryData[editIndex] = newItem;
        }

        renderTable();
        galleryModal.style.display = 'none';
    };

    // Previous & Next Logic
    document.getElementById('prevBtn').onclick = () => {
        if (currentPage > 1) { 
            currentPage--; 
            renderTable(); 
        }
    };

    document.getElementById('nextBtn').onclick = () => {
        const totalPages = Math.ceil(galleryData.length / rowsPerPage);
        if (currentPage < totalPages) { 
            currentPage++; 
            renderTable(); 
        }
    };

    // Entries Change
    entriesSelect.onchange = () => {
        rowsPerPage = parseInt(entriesSelect.value);
        currentPage = 1;
        renderTable();
    };

    // Search Click
    document.getElementById('searchBtn').onclick = () => {
        currentPage = 1;
        renderTable();
    };

    // Close Modals
    document.querySelectorAll('.close, #cancelModal, #cancelDelete').forEach(btn => {
        btn.onclick = () => {
            galleryModal.style.display = 'none';
            deleteModal.style.display = 'none';
        };
    });

    // --- 3. WINDOW FUNCTIONS (Global) ---
    window.editItem = (index) => {
        editIndex = index;
        const item = galleryData[index];
        document.getElementById('Location').value = item.location;
        document.getElementById('galleryDesc').value = item.desc;
        document.getElementById('modalTitle').innerText = "Edit Gallery";
        galleryModal.style.display = 'flex';
    };

    window.confirmDelete = (index) => {
        deleteIndex = index;
        deleteModal.style.display = 'flex';
    };

    document.getElementById('confirmDelete').onclick = () => {
        galleryData.splice(deleteIndex, 1);
        renderTable();
        deleteModal.style.display = 'none';
    };
});