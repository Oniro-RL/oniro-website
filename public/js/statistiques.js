window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

var reveMois = document.getElementById('reveMois').getContext('2d');
var chartReveMois = new Chart(reveMois, {
  // The type of chart we want to create
  type: 'line',

  // The data for our dataset
  data: {
    labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet"],
    datasets: [{
      label: "Rêves par Mois",
      backgroundColor: 'transparent',
      borderColor: 'rgb(54, 162, 235)',
      data: [0, 4, 9, 18, 19, 18, 20],
    }, {
      label: "Rêves Lucides par Mois",
      backgroundColor: 'transparent',
      borderColor: window.chartColors.yellow,
      data: [0, 0, 2, 5, 13, 10, 11],
    }]
  },

  // Configuration options go here
  options: {}
});

var reveLucide = document.getElementById('reveLucide').getContext('2d');
var chartReveLucide = new Chart(reveLucide, {
  // The type of chart we want to create
  type: 'doughnut',

  // The data for our dataset
  data: {
    datasets: [{
      data: [2, 9, 5, 1, 6],
      backgroundColor: [
        window.chartColors.blue, 
        window.chartColors.yellow,
        window.chartColors.red,
        window.chartColors.purple,
        window.chartColors.green
      ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
      'Lucides',
      'Normaux',
      'Cauchemard',
      'Récurrent',
      'Faux-Réveils'
    ]
  },

  // Configuration options go here
  options: {}
});
