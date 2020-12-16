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
      calc: {
        height: 0.00,
        weight: 0.00
      },
      table: [
        {
          valuation: 'Peso inferior al normal',
          body_mass_index: 'Menos de 18.5'
        },
        {
          valuation: 'Normal',
          body_mass_index: '18.5 - 24.9'
        },
        {
          valuation: 'Peso superior al normal',
          body_mass_index: '25 - 29.9'
        },
        {
          valuation: 'Obesidad',
          body_mass_index: 'Más de 30'
        },
      ],
    },

    computed: {
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