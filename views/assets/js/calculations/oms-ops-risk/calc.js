/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      result: '',
      cholesterol: [],
      mp: [],
      patient: {},
      patients: [
        {
          full_name: "",
          birthdate: moment().format('YYYY-MM-DD'),
          gender: "M",
        }
      ],
      genders: 
      [
        {
          gender: 'Masculino',
          abbr: 'M'
        },
        {
          gender: 'Femenino',
          abbr: 'F'
        }
      ],
      risks: risks,
      vars: {
        gender: '',
        age: 0,
        smoking: '',
        max_pressure: 0,
        diabete: '',
        total_cholesterol: null,

      },
      true_false: [
        {
          text: 'Sí',
          val: true
        },
        {
          text: 'No',
          val: false
        },
      ],
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
          risk: 'Riesgo muy alto',
          valuation: '30% - 39%'
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
      this.mpVals()
      this.cholesterolVals()
      var app = this
      var url = api_url + 'patients/get-patient-general-info'
      app.loading = true
      app.$http.get(url).then(res => {
        app.loading = false
        res.body.forEach( (e, i) => {
          app.patients.push(e)
        });
      }, err => {
        app.loading = false
      })
    },

    mounted () {
    },

    methods: {
      calc () {
        var gender = this.vars.gender
        var age = this.vars.age
        var smoking = this.vars.smoking
        var diabete = this.vars.diabete
        var total_cholesterol = this.vars.total_cholesterol
        var max_pressure = parseInt(this.vars.max_pressure)

        var key = this.generateSearchKey(age, total_cholesterol, max_pressure, smoking, gender, diabete);
        
        key = key.replace(/^0+(?!\.|$)/, '');
        console.log(key);
        var risk_number = '';
        if(total_cholesterol == null)
          risk_number = this.getRiskNoCholesterol(key);
      
        else
          risk_number = this.getRiskCholesterol(key);
        switch (risk_number) {
          case 1:
            this.result = '< 10%'
            break;

          case 2:
            this.result = '10% - 20%'
            break;

          case 3:
            this.result = '21% - 29%'
            break;

          case 4:
            this.result = '30% - 39%'
            break;

          case 5:
            this.result = '> 40%'
            break;
        }
      },

      generateSearchKey (age, cholesterol, max_pressure, smoking, gender, diabete) {
        var key = "";

        // Diabete
        key += (diabete == true) ? "1" : "0"

        // Gender
        key += (gender == "M") ? "1" : "0"

        // Smoking
        key += (smoking == true) ? "1" : "0"

        // Age  
        {
          if(age < 50) {
            key += "1";
          } else if(age < 60) {
            key += "2";
          } else if(age < 70) {
            key += "3";
          } else {
            key += "4";
          }
        }

        //Max pressure
        {
          if(max_pressure < 131) {
            key += "1";
          } else if(max_pressure < 151) {
            key += "2";
          } else if(max_pressure < 171) {
            key += "3";
          } else {
            key += "4";
          }
        }
        
        //Cholesterol
        if(cholesterol != null) {
          if(cholesterol < 175) {
            key += "1";
          } else if(cholesterol < 213) {
            key += "2";
          } else if(cholesterol < 251) {
            key += "3";
          } else if(cholesterol < 291) {
            key += "4";
          } else {
            key += "5";
          }
        }
        return key
      },

      getRiskNoCholesterol (key) {
        var app = this.risks
        console.log(app.no_cholesterol[key])
        return app.no_cholesterol[key]
      },

      getRiskCholesterol (key) {
        var app = this.risks
        console.log(app.cholesterol[key])
        return app.cholesterol[key]
      },

      cholesterolVals() {
        var app = this
        var val = '';
        var total = 98;
        for (var i = 99; i < 450; i++) {
          total++
          if (total === 99) {
            val = {text: 'No sé', val: null}
          }
          else{
            val = {text: total, val: total}
          }
          app.cholesterol.push(val)
        }
      },

      mpVals() {
        var app = this
        var val = '';
        var total = 69;
        for (var i = 70; i < 260; i++) {
          total++
          val = {text: total, val: total}
          app.mp.push(val)
        }
      },

      assignGeneralVars () {
        var app = this
        var age = moment(app.patient.birthdate, "YYYY-MM-DD").fromNow().split(" ")[0]
        app.vars.age = age
        app.vars.gender = app.patient.gender
      },

    },
});