var data = {
    "labels": [
        '26/02/20',
        '27/02/20',
        '28/02/20',
        '29/02/20',
        '01/03/20',
        '02/03/20',
        '03/03/20',
        '04/03/20',
        '05/03/20',
        '06/03/20',
        '07/03/20',
        '08/03/20',
        '09/03/20',
        '10/03/20',
        '11/03/20',
        '12/03/20',
        '13/03/20',
        '14/03/20',
        '15/03/20',
        '16/03/20',
        '17/03/20',
    ],
    "cases": [
        1,
        1,
        1,
        2,
        2,
        2,
        2,
        3,
        8,
        13,
        19,
        25,
        30,
        34,
        52,
        77,
        107,
        121,
        200,
        234,
        291,
    ],
    "serious": [
        0,
        0,
        0,
        1,
        2,
        2,
        2,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        5,
        5,
        5,
        5,
        7,
    ],
    "recovered": [
        1,
        1,
        1,
        2,
        2,
        2,
        2,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        3,
        6,
        6,
        6,
    ],
    "deaths": [
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        1,
        1,
        3,
        4,
    ],
};

var options = {
    maintainAspectRatio: false,
}

var elBrazil = document.getElementById('brazilChart').getContext('2d');
var brazilChart = new Chart(elBrazil, {
    type: 'line',
    data: {
        labels: data.labels,
        datasets: [{
                label: 'Casos',
                lineTension: 0,
                data: data.cases,
                backgroundColor: 'rgba(241, 196, 15, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Casos Graves',
                lineTension: 0,
                data: data.serious,
                backgroundColor: 'rgba(230, 126, 34, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Recuperados',
                lineTension: 0,
                data: data.recovered,
                backgroundColor: 'rgba(39, 174, 96, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Mortes',
                data: data.deaths,
                lineTension: 0,
                backgroundColor: 'rgba(192, 57, 43, 0.8)',
                borderWidth: 1
            }
        ]
    },
    options: options,
});

var elState = document.getElementById('stateChart').getContext('2d');
var stateChart = new Chart(elState, {
    type: 'line',
    data: {
        labels: data.labels,
        datasets: [{
                label: 'Casos',
                lineTension: 0,
                backgroundColor: 'rgba(241, 196, 15, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Casos Graves',
                lineTension: 0,
                backgroundColor: 'rgba(230, 126, 34, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Recuperados',
                lineTension: 0,
                backgroundColor: 'rgba(39, 174, 96, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Mortes',
                lineTension: 0,
                backgroundColor: 'rgba(192, 57, 43, 0.8)',
                borderWidth: 1
            }
        ]
    },
    options: options,
});

var elCity = document.getElementById('cityChart').getContext('2d');
var cityChart = new Chart(elCity, {
    type: 'line',
    data: {
        labels: data.labels,
        datasets: [{
                label: 'Casos',
                lineTension: 0,
                backgroundColor: 'rgba(241, 196, 15, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Casos Graves',
                lineTension: 0,
                backgroundColor: 'rgba(230, 126, 34, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Recuperados',
                lineTension: 0,
                backgroundColor: 'rgba(39, 174, 96, 0.8)',
                borderWidth: 1
            },
            {
                label: 'Mortes',
                lineTension: 0,
                backgroundColor: 'rgba(192, 57, 43, 0.8)',
                borderWidth: 1
            }
        ]
    },
    options: options,
});