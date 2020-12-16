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
      european_score: [
        {
          region: 'Sudeste asiático',
          factor: 1.4
        },
        {
          region: 'África Subsahariana',
          factor: 1.3
        },
        {
          region: 'Caribe',
          factor: 1.3
        },
        {
          region: 'Asia Occidental',
          factor: 1.2
        },
        {
          region: 'Norte de África',
          factor: 0.9
        },
        {
          region: 'Asia Oriental',
          factor: 0.7
        },
        {
          region: 'Ámerica del Sur',
          factor: 0.7
        },
      ],
      table: [
        {
          valuation: 'Riesgo Bajo',
          points: '< 4'
        },
        {
          valuation: 'Riesgo moderado',
          points: '5 - 9'
        },
        {
          valuation: 'Riesgo alto',
          points: '>= 10'
        },
      ],
      calc: {
        region: '',
        age: 1,
        gender: '',
        smoking: '',
        smoking_exposition: '',
        diabetes: '',
        hipertension: '',
        waist_index: '',
        free_time_activity: '',
        high_glucose: '',
        salt_snack_food_daily: '',
        fast_food_weekly: '',
        eat_fruits: '',
        eat_vegetables: '',
        eat_meat: '',
      },
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