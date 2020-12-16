/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      menu: '',
      form: {
        birthdate: '',
        platforms: {
          telegram: false,
          whatsapp: false,
          sms: false
        }
      },
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
      ]
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