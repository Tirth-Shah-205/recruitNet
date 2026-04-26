const chartData = window.chartData || {
    applicationsTrend: [0,0,0,0,0,0],
    jobCategories: [],
    jobCounts: [],
    candidateGrowth: [0,0,0,0,0,0],
    companyGrowth: [0,0,0,0,0,0]
};

// Charts
window.onload = () => {
    // Applications Bar Chart
    new Chart(document.getElementById('appChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{ 
                label: 'Applications', 
                data: chartData.applicationsTrend, 
                backgroundColor: '#f97316', 
                borderRadius: 12 
            }]
        },
        options: { 
            responsive: true, 
            plugins: { legend: { display: false } }, 
            scales: { y: { grid: { color: '#e2e8f0' } } }
        }
    });

    // Jobs by Category Doughnut Chart
    new Chart(document.getElementById('categoryChart'), {
        type: 'doughnut',
        data: {
            labels: chartData.jobCategories,
            datasets: [{ 
                data: chartData.jobCounts, 
                backgroundColor: ['#0f172a','#f97316','#22c55e','#8b5cf6','#f59e0b','#ef4444'] 
            }]
        },
        options: { 
            cutout: '65%', 
            plugins: { legend: { position: 'bottom' } } 
        }
    });

    // Candidate Growth Line Chart
    new Chart(document.getElementById('candidateChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{ 
                label: 'Candidates', 
                data: chartData.candidateGrowth, 
                borderColor: '#0f172a', 
                tension: 0.4, 
                fill: true, 
                backgroundColor: 'rgba(15,23,42,0.1)' 
            }]
        },
        options: { 
            responsive: true, 
            plugins: { legend: { display: false } } 
        }
    });

    // Companies Joined Bar Chart
    new Chart(document.getElementById('companyChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{ 
                label: 'Companies', 
                data: chartData.companyGrowth, 
                backgroundColor: '#0f172a', 
                borderRadius: 12 
            }]
        },
        options: { 
            responsive: true, 
            plugins: { legend: { display: false } } 
        }
    });
};

// AJAX helper function
function ajaxRequest(url, data, callback) {
    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams(data)
    })
    .then(response => response.text())
    .then(result => {
        if(callback) callback(result);
    })
    .catch(error => console.error('Error:', error));
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

// Application functions
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

// Export functions
function exportCandidates() {
    window.location.href = 'export_candidates.php';
}

function exportCompanies() {
    window.location.href = 'export_companies.php';
}

function exportJobs() {
    window.location.href = 'export_jobs.php';
}

function exportApplications() {
    window.location.href = 'export_applications.php';
}

// Refresh dashboard
function refreshAll() {
    location.reload();
}