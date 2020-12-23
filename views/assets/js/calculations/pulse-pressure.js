/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      vars: {
        systolic: 0.00,
        diastolic: 0.00
      },
    },

    computed: {
      calc () {
        return this.vars.systolic - this.vars.diastolic
      }
    },

    created () {
    },

    mounted () {
    },

    methods: {
    }
});