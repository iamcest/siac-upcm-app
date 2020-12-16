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
        cornell:{
          gender: 0.00,
          wave_r_avl: 0.00,
          wave_s_v3: 0.00,
        },
        sokolow_lyon: {
          wave_s_v6: 0.00,
          wave_r_v5: 0.00
        },
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