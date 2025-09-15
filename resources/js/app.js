import './bootstrap';
import '@tailwindplus/elements';

import Chart from 'chart.js/auto'; // For Chart.js
import 'flowbite'; // For Flowbite's JavaScript functionality

// If using Flowbite's chart components (based on ApexCharts)
    import ApexCharts from 'apexcharts';
    window.ApexCharts = ApexCharts;

    // Make Chart.js globally available if needed
    window.Chart = Chart;