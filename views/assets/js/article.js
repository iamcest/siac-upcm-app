/*VUE INSTANCE*/
moment.locale('es')
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      articles: [],
    },

    computed: {

    },

    created () {
    },

    mounted () {
    },

    methods: {

      fromNow (date) {
        return moment(date).format('LL');
      },

  	}
});