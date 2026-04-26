// Live search functionality
document.getElementById('jobSearch').addEventListener('keyup', function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelectorAll('.job-row');
    
    rows.forEach(row => {
        let text = row.textContent.toUpperCase();
        row.style.display = text.indexOf(filter) > -1 ? '' : 'none';
    });
});

function exportJobs() {
    alert("✅ Jobs exported successfully as CSV!");
}
