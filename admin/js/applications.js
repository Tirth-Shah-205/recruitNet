// Live search functionality
document.getElementById('applicationSearch').addEventListener('keyup', function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelectorAll('.application-row');
    
    rows.forEach(row => {
        let text = row.textContent.toUpperCase();
        row.style.display = text.indexOf(filter) > -1 ? '' : 'none';
    });
});
