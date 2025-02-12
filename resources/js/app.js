require('./bootstrap');
import 'bootstrap/dist/js/bootstrap.min.js';
import '@popperjs/core';
import "./script.js";

import feather from 'feather-icons';

// Pastikan DOM telah dimuat sebelum mengganti elemen icon
document.addEventListener('DOMContentLoaded', () => {
    feather.replace();
});