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
        bmi: '',
        gender: '',
        perimeter: 0,
        workout: 0,
        healthy_food: 0,
        high_glucose: '',
        family_diabete: '',
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