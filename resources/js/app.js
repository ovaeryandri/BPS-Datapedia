import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// resources/js/app.js

import "./bootstrap";

// Impor Chart.js
import Chart from "chart.js/auto";

// Daftarkan Chart ke objek window agar bisa diakses dari script di Blade
window.Chart = Chart;
