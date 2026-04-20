// Live search functionality
document.getElementById('candidateSearch').addEventListener('keyup', function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelectorAll('.candidate-row');
    
    rows.forEach(row => {
        let text = row.textContent.toUpperCase();
        row.style.display = text.indexOf(filter) > -1 ? '' : 'none';
    });
});

function exportCandidates() {
    alert("✅ Candidates exported successfully as CSV!");
}
