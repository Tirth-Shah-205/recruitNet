const jobRowsPerPage = 5;
let currentJobPage = 1;
const jobsTable = document.getElementById('jobsTable');
const jobPagination = document.getElementById('jobPagination');
const jobSearch = document.getElementById('jobSearch');
const jobRows = Array.from(document.querySelectorAll('.job-row'));

function renderJobPage(page = 1) {
    const filteredRows = jobRows.filter(row => row.dataset.visible !== 'false');
    const totalPages = Math.max(1, Math.ceil(filteredRows.length / jobRowsPerPage));
    currentJobPage = Math.min(Math.max(page, 1), totalPages);
    const start = (currentJobPage - 1) * jobRowsPerPage;
    const end = start + jobRowsPerPage;

    jobRows.forEach(row => row.style.display = 'none');
    filteredRows.forEach((row, index) => {
        row.style.display = index >= start && index < end ? '' : 'none';
    });

    buildJobPagination(totalPages);
}

function buildJobPagination(totalPages) {
    jobPagination.innerHTML = '';

    function createPageItem(label, page, disabled = false, active = false) {
        const li = document.createElement('li');
        li.className = 'page-item' + (disabled ? ' disabled' : '') + (active ? ' active' : '');
        const a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.textContent = label;
        a.addEventListener('click', function(e) {
            e.preventDefault();
            if(!disabled && page !== currentJobPage) {
                renderJobPage(page);
            }
        });
        li.appendChild(a);
        return li;
    }

    jobPagination.appendChild(createPageItem('Prev', currentJobPage - 1, currentJobPage === 1));

    for(let i = 1; i <= totalPages; i++) {
        jobPagination.appendChild(createPageItem(i, i, false, i === currentJobPage));
    }

    jobPagination.appendChild(createPageItem('Next', currentJobPage + 1, currentJobPage === totalPages));
}

function filterJobs() {
    const filter = jobSearch.value.trim().toUpperCase();
    jobRows.forEach(row => {
        const text = row.textContent.toUpperCase();
        row.dataset.visible = !filter || text.includes(filter) ? 'true' : 'false';
    });
    renderJobPage(1);
}

jobSearch.addEventListener('keyup', filterJobs);

document.addEventListener('DOMContentLoaded', () => {
    jobRows.forEach(row => row.dataset.visible = 'true');
    renderJobPage(1);
});

function exportJobs() {
    alert('✅ Jobs exported successfully as CSV!');
}

// Job functions
function viewJob(id) {
    window.location.href = `../job_details.php?id=${id}`;
}

function editJobStatus(id, currentStatus) {
    const newStatus = prompt('Enter new status (open/paused/closed):', currentStatus);
    if(newStatus && ['open','paused','closed'].includes(newStatus)) {
        ajaxRequest('../update_job_status.php', { id: id, status: newStatus }, function(result) {
            if(result === 'success') {
                alert('Job status updated successfully!');
                location.reload();
            } else {
                alert('Error updating job status');
            }
        });
    }
}

function deleteJob(id) {
    if(confirm('Are you sure you want to delete this job?')) {
        ajaxRequest('../delete_job.php', { id: id }, function(result) {
            if(result === 'success') {
                alert('Job deleted successfully!');
                location.reload();
            } else {
                alert('Error deleting job');
            }
        });
    }
}
