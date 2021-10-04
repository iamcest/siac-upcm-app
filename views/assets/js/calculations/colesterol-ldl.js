/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patients: 
      [
        {
          name: 'John Doe',
          id: 1
        },
        {
          name: 'Sam Smith',
          id: 2
        }
      ],
      vars: {
        total_cholesterol: 0.00,
        triglyceride_level: 0.00,
        c_HDL: 0.00
      },
    },

    computed: {
      calc () {
        return parseInt(this.vars.total_cholesterol) - parseInt(this.vars.c_HDL) 
        - parseInt(this.vars.triglyceride_level / 5)
      }
    },

    created () {
    },

    mounted () {
    },

    methods: {
      reserve () {
      },
    }
});