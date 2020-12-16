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
      genders: 
      [
        {
          gender: 'Masculino',
          abbre: 'M'
        },
        {
          gender: 'Femenino',
          abbre: 'F'
        }
      ],
      calc: {
        gender: 'M',
        height: 0.00,
        weight: 0.00
      },
      table: [
        {
          valuation: 'Normal',
          corporal_surface: 1.7
        },
        {
          valuation: 'Media en hombres',
          corporal_surface: 1.9
        },
        {
          valuation: 'Media en mujeres',
          corporal_surface: 1.6
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