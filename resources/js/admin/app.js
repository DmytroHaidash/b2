require('./bootstrap');
require('simplebar');
import 'simplebar/dist/simplebar.css';

import Editor from './components/Editor';
import Accountings from './components/Accountings';

new Vue({
  el: '#app',
  components: {
    ...Editor,
    Accountings,
  },
  mounted() {
    require('./modules/notifications');
    require('./modules/phone-mask');
  }
});
