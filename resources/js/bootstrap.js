window._ = require('lodash');


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

try {
    window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.min.js')
} catch (e) { }



