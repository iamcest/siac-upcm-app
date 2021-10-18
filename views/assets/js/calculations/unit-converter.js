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
      conversion_units: 
      [
        {
          text: 'GLUCOSA: Convertir mmol/l a mg/dl',
          val: '/ 18',
        },
        {
          text: 'GLUCOSA: Convertir mg/dl a mmol/l',
          val: ' * 18',
          op: 'multiply'
        },
        {
          text: 'HDL y LDL: Convertir mmol/l a mg/dl',
          val: ' * 39',
        },
        {
          text: 'HDL y LDL: Convertir mg/dl a mmol/l',
          val: ' / 39',
        },
        {
          text: 'TRIGLICERIDOS: Convertir mmol/l a mg/dl',
          val: ' / 8',
        },
        {
          text: 'TRIGLICERIDOS: Convertir mg/dl a mmol/l',
          val: ' * 89',
        },
        {
          text: 'COLESTEROL: Convertir mmol/l a mg/dl',
          val:  '/ 0.025868',
        },
        {
          text: 'COLESTEROL: Convertir mg/dl a mmol/l',
          val: ' * 0.02586',
        },
        {
          text: 'CREATININA: Convertir mg/dl a umol/l',
          val: ' / 0.025868',
        },
        {
          text: 'CREATININA: Convertir umol/l a mg/dl',
          val: ' * 0.02586',
        },
      ],
      vars: {
        amount: 0,
        unit_selected: '',      
      },

    },

    computed: {
      calc () {
        var amount = this.vars.amount
        if (amount == '' || amount == 0) return ''
        amount += this.vars.unit_selected
        return eval(amount).toFixed(2)
      }
    },

    created () {
    },

    mounted () {
    },

    methods: {

    }
});