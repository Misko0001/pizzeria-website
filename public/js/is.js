
Chart.defaults.global.defaultFontFamily = "Trebuchet MS, sans-serif";
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = "black";

fetch("./public/js/daily-earnings.json")
    .then((response) => response.json())
    .then((json) => {
        let is = document.getElementById("is1").getContext("2d");
        let arr = Object.entries(json);

        let obj = {
            type: "horizontalBar",
            data: {
                labels: [],
                datasets: [{
                    label: "",
                    data: [],
                    backgroundColor: "rgb(214, 65, 65)",
                    hoverBackgroundColor: "rgb(230, 65, 65)"
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Dnevna zarada picerije",
                    fontSize: 23,
                    padding: 30
                },
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            }
        };

        for (let i = 0; i < arr.length; i++) {
            obj.data.labels.push(arr[i][0]);
            obj.data.datasets[0].data.push(arr[i][1]);
        }

        let averageEarnings = new Chart(is, obj);
    });

fetch("./public/js/monthly-amount.json")
    .then((response) => response.json())
    .then((json) => {
        let is = document.getElementById("is2").getContext("2d");
        let arr = Object.entries(json);

        position = "right";
        if (arr.length > 23) {
            position = "bottom";
        }

        let obj = {
            type: "doughnut",
            data: {
                labels: [],
                datasets: [{
                    label: "",
                    data: [],
                    backgroundColor: [],
                    borderWidth: 0
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Broj prodatih proizvoda u prethodnom mesecu",
                    fontSize: 23,
                },
                legend: {
                    display: true,
                    position: position
                },
                layout: {
                    padding: 20
                }
            }
        };

        let colors = [
            "rgb(255, 105, 97)", 
            "rgb(119, 221, 119)", 
            "rgb(108, 160, 220)", 
            "rgb(86, 108, 248)", 
            "rgb(215, 201, 38)", 
            "rgb(166, 42, 4)", 
            "rgb(10, 171, 161)", 
            "rgb(108, 244, 160)"
        ]

        for (let i = 0; i < arr.length; i++) {
            obj.data.labels.push(arr[i][0]);
            obj.data.datasets[0].data.push(arr[i][1]);
            obj.data.datasets[0].backgroundColor.push(colors[i % colors.length]);
        }

        let averageEarnings = new Chart(is, obj);
    });