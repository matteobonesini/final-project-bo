import Chart from 'chart.js/auto';

const periodSelect = document.getElementById('period');
const messagesChartPage = document.getElementById('messages');
const reviewsChartPage = document.getElementById('reviews');

// messages
let messagesChart = new Chart(messagesChartPage, {
    type: 'bar',
    data: {
      labels: messagesArr['labels'],
      datasets: [{
        label: 'Messaggi',
        data: messagesArr['data'],
        borderWidth: 1,
        backgroundColor: '#1A3B03'
      }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Messaggi',
                font: {
                    size: 25
                }
            },
            legend: {
                display: false
            }
        },
        layout: {
            padding: 20
        },
        scales: {
            y: {
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});

// reviews
let reviewsChart = new Chart(reviewsChartPage, {
    type: 'bar',
    data: {
      labels: reviewsArr['labels'],
      datasets: [{
        label: 'Recensioni',
        data: reviewsArr['data'],
        borderWidth: 1,
        backgroundColor: '#1A3B03'
      }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Recensioni',
                font: {
                    size: 25
                }
            },
            legend: {
                display: false
            }
        },
        layout: {
            padding: 20
        },
        scales: {
            y: {
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});

periodSelect.addEventListener("change", (event) => {
    messagesChart.destroy();
    reviewsChart.destroy();
    messagesChart = new Chart(messagesChartPage, {
        type: 'bar',
        data: {
          labels: messagesArr['labels'].slice(event.target.value, 12),
          datasets: [{
            label: 'Messaggi',
            data: messagesArr['data'].slice(event.target.value, 12),
            borderWidth: 1,
            backgroundColor: '#1A3B03'
          }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Messaggi',
                    font: {
                        size: 25
                    }
                },
                legend: {
                    display: false
                }
            },
            layout: {
                padding: 20
            },
            scales: {
                y: {
                    ticks: {
                        stepSize: 1
                    }
                }
            }
		}
    });
    reviewsChart = new Chart(reviewsChartPage, {
        type: 'bar',
        data: {
          labels: reviewsArr['labels'].slice(event.target.value, 12),
          datasets: [{
            label: 'Recensioni',
            data: reviewsArr['data'].slice(event.target.value, 12),
            borderWidth: 1,
            backgroundColor: '#1A3B03'
          }]
        },
        options: {
			plugins: {
                title: {
                    display: true,
                    text: 'Recensioni',
                    font: {
                        size: 25
                    }
                },
                layout: {
                    padding: 20
                },
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
