/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      diagnostic: '',
      tracking: '',
      amount: ''
    },

    watch: {
      amount: {
        handler: 'calc'
      }
    },

    created () {
    },

    mounted () {
    },

    methods: {
      calc () {
        var app = this
        var amount = app.amount
        app.diagnostic = ''
        app.tracking = ''

        if (amount <= 200) {
          app.tracking = 'Perfil lipídico semestral'
          if (amount <= 100) {
            app.diagnostic = 'Óptimo'
          }
          else if (amount > 100 && amount <= 149) {
            app.diagnostic = 'Normal'
          }
          else if (amount >= 150 && amount <= 199) {
            app.diagnostic = 'Limitrofe'
          }
        }
        else {
          app.tracking = 'Evaluar CTEV. Iniciar combo de AGO3 o fibratos.'
          if (amount >= 200 && amount <= 499) {
            app.diagnostic = 'Alto'            
          }
          else {
            app.tracking += ' Algunos pacientes requerirán triple terapia.'
            app.diagnostic = 'Muy Alto'             
          }
        }
      }
    }
});