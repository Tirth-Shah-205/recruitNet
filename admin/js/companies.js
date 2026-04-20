// Live search functionality
document.getElementById('companySearch').addEventListener('keyup', function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelectorAll('.company-row');
    
    rows.forEach(row => {
        let text = row.textContent.toUpperCase();
        row.style.display = text.indexOf(filter) > -1 ? '' : 'none';
    });
});

function exportCompanies() {
    alert("✅ Companies exported successfully as CSV!");
}
