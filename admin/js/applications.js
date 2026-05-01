const applicationRowsPerPage = 5;
let currentApplicationPage = 1;
const applicationsTable = document.getElementById('applicationsTable');
const applicationPagination = document.getElementById('applicationPagination');
const applicationSearch = document.getElementById('applicationSearch');
const applicationRows = Array.from(document.querySelectorAll('.application-row'));

function renderApplicationPage(page = 1) {
    const filteredRows = applicationRows.filter(row => row.dataset.visible !== 'false');
    const totalPages = Math.max(1, Math.ceil(filteredRows.length / applicationRowsPerPage));
    currentApplicationPage = Math.min(Math.max(page, 1), totalPages);
    const start = (currentApplicationPage - 1) * applicationRowsPerPage;
    const end = start + applicationRowsPerPage;

    applicationRows.forEach(row => row.style.display = 'none');
    filteredRows.forEach((row, index) => {
        row.style.display = index >= start && index < end ? '' : 'none';
    });

    buildApplicationPagination(totalPages);
}

function buildApplicationPagination(totalPages) {
    applicationPagination.innerHTML = '';

    function createPageItem(label, page, disabled = false, active = false) {
        const li = document.createElement('li');
        li.className = 'page-item' + (disabled ? ' disabled' : '') + (active ? ' active' : '');
        const a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.textContent = label;
        a.addEventListener('click', function(e) {
            e.preventDefault();
            if(!disabled && page !== currentApplicationPage) {
                renderApplicationPage(page);
            }
        });
        li.appendChild(a);
        return li;
    }

    applicationPagination.appendChild(createPageItem('Prev', currentApplicationPage - 1, currentApplicationPage === 1));

    for(let i = 1; i <= totalPages; i++) {
        applicationPagination.appendChild(createPageItem(i, i, false, i === currentApplicationPage));
    }

    applicationPagination.appendChild(createPageItem('Next', currentApplicationPage + 1, currentApplicationPage === totalPages));
}

function filterApplications() {
    const filter = applicationSearch.value.trim().toUpperCase();
    applicationRows.forEach(row => {
        const text = row.textContent.toUpperCase();
        row.dataset.visible = !filter || text.includes(filter) ? 'true' : 'false';
    });
    renderApplicationPage(1);
}

applicationSearch.addEventListener('keyup', filterApplications);

document.addEventListener('DOMContentLoaded', () => {
    applicationRows.forEach(row => row.dataset.visible = 'true');
    renderApplicationPage(1);
});

function viewApplication(id) {
    window.location.href = `../application_details.php?id=${id}`;
}

function updateApplicationStatus(id, status) {
    ajaxRequest('../update_application_status.php', { id: id, status: status }, function(result) {
        if(result === 'success') {
            alert('Application status updated successfully!');
            // Optionally reload or update UI
        } else {
            alert('Error updating application status');
        }
    });
}
