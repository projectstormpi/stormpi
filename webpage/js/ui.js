(function (window, document) {

    var layout = document.getElementById('layout'),
        menu = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink'),
        content = document.getElementById('main');

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for (; i < length; i++) {
            if (classes[i] === className) {
                classes.splice(i, 1);
                break;
            }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    function toggleAll(e) {
        var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(menuLink, active);
    }

    menuLink.onclick = function (e) {
        toggleAll(e);
    };

    content.onclick = function (e) {
        if (menu.className.indexOf('active') !== -1) {
            toggleAll(e);
        }
    };

}(this, this.document));


var buttons = document.querySelectorAll(".tablink");
for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', openCity);
}

document.querySelector(".default").click();

function openCity(evt) {
    // Hide all elements with class="tabcontent" by default
    var tabcontent = document.querySelectorAll(".tabcontent");
    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    var tablinks = document.querySelectorAll(".tablink");
    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    var cityName = "#" + evt.currentTarget.textContent;
    document.querySelector(cityName).style.display = "block";
    var color = getRandomColor();
    console.log(color);
    document.querySelector(cityName).style.backgroundColor = color;
    evt.currentTarget.style.backgroundColor = color;
}


function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}

var canvas = document.getElementById("day");
var ctx = canvas.getContext('2d');

var canvas2 = document.getElementById("day2");
var ctx2 = canvas2.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'white';
Chart.defaults.global.defaultFontSize = 16;


// Data with datasets options

function getData(array, mode) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            JSON.parse(this.response).forEach(e => {
                array.push(parseFloat(e))
            });
            day.update();
            day2.update();
        }
    };
    xmlhttp.open("GET", "getData.php?mode=" + mode, true);
    xmlhttp.send();
}

let data1 = [];
let data2 = [];
getData(data1, 'tem');
getData(data2, 'hum');


var data11 = {
    labels: ["00:00", "02:00", "04:00", "06:00", "08:00", "10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00", "24:00"],
    datasets: [
        {
            label: "Temperature",
            fill: false,
            backgroundColor: "red",
            borderColor: "red",
            data: data1,
        }
    ]
};

var data22 = {
    labels: ["00:00", "02:00", "04:00", "06:00", "08:00", "10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00", "24:00"],
    datasets: [
        {
            label: "Humidity",
            fill: false,
            backgroundColor: "blue",
            borderColor: "blue",
            data: data2,
        }
    ]
};
// Chart declaration with some options:
var day = new Chart(ctx, {
    type: 'line',
    data: data11,
    options: {
        responsive: true,
        title: {
            fontSize: 16,
            display: true,
            text: 'Current Day'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Hour'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: '°C'
                }
            }]
        }
    }
});

var day2 = new Chart(ctx2, {
    type: 'line',
    data: data22,
    options: {
        responsive: true,
        title: {
            fontSize: 16,
            display: true,
            text: 'Current Day'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Hour'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: '%'
                }
            }]
        }
    }
});