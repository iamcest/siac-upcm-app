/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patient: {},
      patients: [],
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
      race: 
      [
        {
          text: 'Blanca',
          val: 0
        },
        {
          text: 'Afroamericana',
          val: 1
        },
        {
          text: 'Otra',
          val: 1.000000001
        },
      ],
      true_false: [
        {
          text: 'Sí',
          val: 1,
        },
        {
          text: 'No',
          val: 0,
        },
      ],
      vars: {
        age: 1,
        gender: '',
        race: 0,
        total_cholesterol: 130,
        hdl_cholesterol: 20,
        ldl_cholesterol: 30,
        pas: 90,
        pad: 60,
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
      calc () {
        var race = Math.round(this.vars.race)
        var gender = this.vars.gender
        if (gender == 'M') {
          if (race == 0) {
            var C_Age = 17.114; 
            var C_Sq_Age = 0; 
            var C_Total_Chol = 0.94; 
            var C_Age_Total_Chol = 0; 
            var C_HDL_Chol = -18.92; 
            var C_Age_HDL_Chol = 4.475;  
            var C_On_Hypertension_Meds = 29.291; 
            var C_Age_On_Hypertension_Meds = -6.432; 
            var C_Off_Hypertension_Meds = 27.82; 
            var C_Age_Off_Hypertension_Meds = -6.087;  
            var C_Smoker = 0.691;
            var C_Age_Smoker = 0; 
            var C_Diabetes = 0.874; 
            var S10 = 0.9533; 
            var Mean_Terms = 86.61;  
          }
          else if (race == 1) {
            var C_Age = -29.799;
            var C_Sq_Age = 4.884;
            var C_Total_Chol = 13.54;
            var C_Age_Total_Chol = -3.114;
            var C_HDL_Chol = -13.578;
            var C_Age_HDL_Chol = 3.149; 
            var C_On_Hypertension_Meds = 2.019;
            var C_Age_On_Hypertension_Meds = 0;
            var C_Off_Hypertension_Meds = 1.957;
            var C_Age_Off_Hypertension_Meds = 0; 
            var C_Smoker = 7.574;
            var C_Age_Smoker = -1.665;
            var C_Diabetes = 0.661;
            var S10 = 0.9665;
            var Mean_Terms = -29.18;
          }
        }
        else if(gender == 'F') {
          if (race == 0) {
            var C_Age = 2.469
            var C_Sq_Age = 0
            var C_Total_Chol = 0.302
            var C_Age_Total_Chol = 0
            var C_HDL_Chol = -0.307
            var C_Age_HDL_Chol = 0
            var C_On_Hypertension_Meds = 1.916
            var C_Age_On_Hypertension_Meds = 0
            var C_Off_Hypertension_Meds = 1.809
            var C_Age_Off_Hypertension_Meds = 0
            var C_Smoker = 0.549
            var C_Age_Smoker = 0
            var C_Diabetes = 0.645
            var S10 = 0.8954
            var Mean_Terms = 19.54
          }
          else if (race == 1) {
            var C_Age = 12.344
            var C_Sq_Age = 0
            var C_Total_Chol = 11.853
            var C_Age_Total_Chol = -2.664
            var C_HDL_Chol = -7.99
            var C_Age_HDL_Chol = 1.769
            var C_On_Hypertension_Meds = 1.797
            var C_Age_On_Hypertension_Meds = 0
            var C_Off_Hypertension_Meds = 1.764
            var C_Age_Off_Hypertension_Meds = 0
            var C_Smoker = 7.837
            var C_Age_Smoker = -1.795
            var C_Diabetes = 0.658
            var S10 = 0.9144
            var Mean_Terms = 61.18
          }
        }
        var age = this.vars.age
        var total_cholesterol = this.vars.total_cholesterol
        var hdl_cholesterol = this.vars.hdl_cholesterol
        var hipertension_treatment = this.vars.hipertension_treatment
        var pas = this.vars.pas
        var diabetes = this.vars.diabetes
        var smoking = this.vars.smoking

        var Terms =  
        (C_Age * Math.log(age)) + (C_Sq_Age * this.sq(Math.log(age))) +  (C_Total_Chol * Math.log(total_cholesterol)) + 
        (C_Age_Total_Chol * Math.log(age) * Math.log(total_cholesterol)) + (C_HDL_Chol * Math.log(hdl_cholesterol)) + 
        (C_Age_HDL_Chol * Math.log(age) * Math.log(hdl_cholesterol)) +
        (hipertension_treatment * C_On_Hypertension_Meds * Math.log(pas)) +
        (hipertension_treatment * C_Age_On_Hypertension_Meds * Math.log(age) * Math.log(pas)) +
        (!hipertension_treatment * C_Off_Hypertension_Meds * Math.log(pas)) +
        (!hipertension_treatment * C_Age_Off_Hypertension_Meds * Math.log(age) * Math.log(pas)) +
        (C_Smoker * smoking) + (C_Age_Smoker * Math.log(age) * smoking) + (C_Diabetes * diabetes)

        var ten_year_risk = Math.round(100 * (1 - Math.pow(S10, Math.exp(Terms - Mean_Terms))))
        return ten_year_risk
      }
    },

    created () {
      var app = this
      var url = api_url + 'patients/get-patient-general-info'
      app.loading = true
      app.$http.get(url).then(res => {
        app.loading = false
        app.patients = res.body
      }, err => {
        app.loading = false
      })
    },

    mounted () {
    },

    methods: {
      sq (i) {
        return i * i;
      },

      assignGeneralVars () {
        var app = this
        var age = moment(app.patient.birthdate, "YYYY-MM-DD").fromNow().split(" ")[0]
        app.vars.age = age
        app.vars.gender = app.patient.gender
      },

    }
});