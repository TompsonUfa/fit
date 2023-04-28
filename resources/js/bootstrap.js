import _ from 'lodash';
import axios from 'axios';
import * as bootstrap from 'bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

// import "https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"

window._ = _;
window.bootstrap = bootstrap;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
