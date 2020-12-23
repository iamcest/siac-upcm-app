/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      vars: {
        tas: 0.00,
        tad: 0.00
      },
    },

    computed: {
      calc () {
        var tas = this.vars.tas
        var tad = this.vars.tad
        return Math.round(tad-(-(tas-tad)/3))
      }
    },

    created () {
    },

    mounted () {
    },

    methods: {
    }
});