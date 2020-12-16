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
        age: 1,
        gender: '',
        race: '',
        total_cholesterol: 0,
        hdl_cholesterol: 0,
        tas: 0,
        hipertension_treatment: '',
        diabetes: '',
        smoking: '',
      },

      table: [
        {
          risk: 'Riesgo bajo',
          valuation: '< 5%'
        },
        {
          risk: 'Riesgo moderado',
          valuation: '5% - 7.4%'
        },
        {
          risk: 'Riesgo intermedio',
          valuation: '7.5% - 19.9%'
        },
        {
          risk: 'Riesgo elevado',
          valuation: '> 20%'
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