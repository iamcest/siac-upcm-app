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
        gender: '',
        age: 0,
        smoking: '',
        max_pressure: 0,
        diabete: '',
        total_cholesterol: 0,

      },

      table: [
        {
          risk: 'Riesgo bajo',
          valuation: '< 10%'
        },
        {
          risk: 'Riesgo moderado',
          valuation: '10% - 20%'
        },
        {
          risk: 'Riesgo alto',
          valuation: '21% - 29%'
        },
        {
          risk: 'Riesgo crítico',
          valuation: '> 40%'
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