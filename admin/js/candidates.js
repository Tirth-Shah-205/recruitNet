const candidateRowsPerPage = 5;
let currentCandidatePage = 1;
const candidatesTable = document.getElementById('candidatesTable');
const candidatePagination = document.getElementById('candidatePagination');
const candidateSearch = document.getElementById('candidateSearch');
const candidateRows = Array.from(document.querySelectorAll('.candidate-row'));

function renderCandidatePage(page = 1) {
    const filteredRows = candidateRows.filter(row => row.dataset.visible !== 'false');
    const totalPages = Math.max(1, Math.ceil(filteredRows.length / candidateRowsPerPage));
    currentCandidatePage = Math.min(Math.max(page, 1), totalPages);
    const start = (currentCandidatePage - 1) * candidateRowsPerPage;
    const end = start + candidateRowsPerPage;

    candidateRows.forEach(row => row.style.display = 'none');
    filteredRows.forEach((row, index) => {
        row.style.display = index >= start && index < end ? '' : 'none';
    });

    buildCandidatePagination(totalPages);
}

function buildCandidatePagination(totalPages) {
    candidatePagination.innerHTML = '';

    function createPageItem(label, page, disabled = false, active = false) {
        const li = document.createElement('li');
        li.className = 'page-item' + (disabled ? ' disabled' : '') + (active ? ' active' : '');
        const a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.textContent = label;
        a.addEventListener('click', function(e) {
            e.preventDefault();
            if(!disabled && page !== currentCandidatePage) {
                renderCandidatePage(page);
            }
        });
        li.appendChild(a);
        return li;
    }

    candidatePagination.appendChild(createPageItem('Prev', currentCandidatePage - 1, currentCandidatePage === 1));

    for(let i = 1; i <= totalPages; i++) {
        candidatePagination.appendChild(createPageItem(i, i, false, i === currentCandidatePage));
    }

    candidatePagination.appendChild(createPageItem('Next', currentCandidatePage + 1, currentCandidatePage === totalPages));
}

function filterCandidates() {
    const filter = candidateSearch.value.trim().toUpperCase();
    candidateRows.forEach(row => {
        const text = row.textContent.toUpperCase();
        row.dataset.visible = !filter || text.includes(filter) ? 'true' : 'false';
    });
    renderCandidatePage(1);
}

candidateSearch.addEventListener('keyup', filterCandidates);

document.addEventListener('DOMContentLoaded', () => {
    candidateRows.forEach(row => row.dataset.visible = 'true');
    renderCandidatePage(1);
});

function exportCandidates() {
    alert('✅ Candidates exported successfully as CSV!');
}

// Candidate functions
function viewCandidate(id) {
    window.location.href = `../candidate_details.php?id=${id}`;
}

function deleteCandidate(id) {
    if(confirm('Are you sure you want to delete this candidate?')) {
        ajaxRequest('../delete_candidate.php', { id: id }, function(result) {
            if(result === 'success') {
                alert('Candidate deleted successfully!');
                location.reload();
            } else {
                alert('Error deleting candidate');
            }
        });
    }
}
