// Charts
window.onload = () => {
    // Applications Bar
    new Chart(document.getElementById('appChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{ label: 'Applications', data: [420,580,490,720,850,920], backgroundColor: '#f97316', borderRadius: 12 }]
        },
        options: { responsive:true, plugins:{legend:{display:false}}, scales:{y:{grid:{color:'#e2e8f0'}}}}
    });

    // Doughnut
    new Chart(document.getElementById('categoryChart'), {
        type: 'doughnut',
        data: {
            labels: ['IT','Finance','Marketing','Others'],
            datasets: [{ data: [45,20,18,17], backgroundColor: ['#0f172a','#f97316','#22c55e','#8b5cf6'] }]
        },
        options: { cutout: '65%', plugins:{legend:{position:'bottom'}} }
    });

    // Line - Candidate
    new Chart(document.getElementById('candidateChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{ label:'Candidates', data:[180,240,310,280,420,510], borderColor:'#0f172a', tension:0.4, fill:true, backgroundColor:'rgba(15,23,42,0.1)' }]
        },
        options: { responsive:true, plugins:{legend:{display:false}} }
    });

    // Companies Bar
    new Chart(document.getElementById('companyChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{ label:'Companies', data:[12,18,15,22,19,27], backgroundColor:'#0f172a', borderRadius:12 }]
        },
        options: { responsive:true, plugins:{legend:{display:false}} }
    });
};

function refreshAll() {
    alert("Dashboard refreshed with latest real-time data! 🚀");
}
