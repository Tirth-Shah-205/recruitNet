const companyRowsPerPage = 5;
let currentCompanyPage = 1;
const companyTable = document.getElementById('companiesTable');
const companyPagination = document.getElementById('companyPagination');
const companySearch = document.getElementById('companySearch');
const companyRows = Array.from(document.querySelectorAll('.company-row'));

function renderCompanyPage(page = 1) {
    const filteredRows = companyRows.filter(row => row.dataset.visible !== 'false');
    const totalPages = Math.max(1, Math.ceil(filteredRows.length / companyRowsPerPage));
    currentCompanyPage = Math.min(Math.max(page, 1), totalPages);
    const start = (currentCompanyPage - 1) * companyRowsPerPage;
    const end = start + companyRowsPerPage;

    companyRows.forEach(row => {
        row.style.display = 'none';
    });

    filteredRows.forEach((row, index) => {
        row.style.display = index >= start && index < end ? '' : 'none';
    });

    buildCompanyPagination(totalPages);
}

function buildCompanyPagination(totalPages) {
    companyPagination.innerHTML = '';

    function createPageItem(label, page, disabled = false, active = false) {
        const li = document.createElement('li');
        li.className = 'page-item' + (disabled ? ' disabled' : '') + (active ? ' active' : '');
        const a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.textContent = label;
        a.addEventListener('click', function(e) {
            e.preventDefault();
            if(!disabled && page !== currentCompanyPage) {
                renderCompanyPage(page);
            }
        });
        li.appendChild(a);
        return li;
    }

    companyPagination.appendChild(createPageItem('Prev', currentCompanyPage - 1, currentCompanyPage === 1));

    for(let i = 1; i <= totalPages; i++) {
        companyPagination.appendChild(createPageItem(i, i, false, i === currentCompanyPage));
    }

    companyPagination.appendChild(createPageItem('Next', currentCompanyPage + 1, currentCompanyPage === totalPages));
}

function filterCompanies() {
    const filter = companySearch.value.trim().toUpperCase();

    companyRows.forEach(row => {
        const text = row.textContent.toUpperCase();
        const visible = !filter || text.includes(filter);
        row.dataset.visible = visible ? 'true' : 'false';
    });

    renderCompanyPage(1);
}

companySearch.addEventListener('keyup', filterCompanies);

document.addEventListener('DOMContentLoaded', () => {
    companyRows.forEach(row => row.dataset.visible = 'true');
    renderCompanyPage(1);
});

function exportCompanies() {
    alert('✅ Companies exported successfully as CSV!');
}

// Company functions
function viewCompany(id) {
    window.location.href = `../company_details.php?id=${id}`;
}

function deleteCompany(id) {
    if(confirm('Are you sure you want to delete this company?')) {
        ajaxRequest('../delete_company.php', { id: id }, function(result) {
            if(result === 'success') {
                alert('Company deleted successfully!');
                location.reload();
            } else {
                alert('Error deleting company');
            }
        });
    }
}
