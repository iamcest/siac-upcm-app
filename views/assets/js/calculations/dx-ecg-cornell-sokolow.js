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
          gender: 0,
          wave_r_avl: 0,
          wave_s_v3: 0,
        },
        sokolow_lyon: {
          wave_s_v6: 0,
          wave_r_v5: 0
        },
      },
    },

    computed: {
      calcC () {
        var vars = this.calc.cornell
        return parseInt(vars.wave_r_avl) + parseInt(vars.wave_s_v3)
      },
      calcSL () {
        var vars = this.calc.sokolow_lyon
        return parseInt(vars.wave_s_v6) + parseInt(vars.wave_r_v5)
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