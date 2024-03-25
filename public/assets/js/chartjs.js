
fetch('graph_1.php')
.then(response => response.json())
.then(data => {

    const labels = data.map(interventions => interventions.nat_panne);
    const quantities = data.map(interventions => interventions.nombre_maintenances);
    const colors = Array.from({ length: labels.length }, () => getRandomColor());

    const ctx = document.getElementById('Chart').getContext('2d');    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'intervention effectuer',
                data: quantities,
                backgroundColor: colors,
                borderColor: 'rgb(255, 255, 255)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              
              title: {
                display: true,
                text: 'resultats d\'intervention par different type d\'equipement'
              }
            }
        }
    });
})
.catch(error => console.error('Erreur lors de la récupération des données : ', error));
function getRandomColor() {
    const r = Math.floor(Math.random() * 250);
    const g = Math.floor(Math.random() * 250);
    const b = Math.floor(Math.random() * 250);
    return `rgba(${r}, ${g}, ${b}, 0.5)`;
}
// graphique circulaire
fetch('graph_2.php')
.then(response => response.json())
.then(data => {
    // Extraire les noms et quantités des produits
    const labels = data.map(interventions => interventions.direction);
    const quantities = data.map(interventions => interventions.int_direction);
    const colors = Array.from({ length: labels.length }, () => getRandomColor());

    // Créer un graphique en bande avec Chart.js
        const cxt = document.getElementById('doughnut').getContext('2d');

    new Chart(cxt, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'intervention effectuer',
                data: quantities,
                backgroundColor: colors,
                borderColor: 'rgb(255, 255, 255)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'resultats d\'intervention par direction'
              }
            }
          },
    });
})
.catch(error => console.error('Erreur lors de la récupération des données : ', error));
function getRandomColor() {
    const r = Math.floor(Math.random() * 250);
    const g = Math.floor(Math.random() * 250);
    const b = Math.floor(Math.random() * 250);
    return `rgba(${r}, ${g}, ${b}, 0.5)`;
}

