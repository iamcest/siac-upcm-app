var heart_risk_framingham_vars = {
  results: '',
  nomenclature: '%',
  hta_treatment: [
    {text: 'Sí', value: '1.99881'}, 
    {text: 'No', value: '1.93303'}, 
  ],
  smoking: [
    {text: 'Sí', value: '0.65451'},
    {text: 'No', value: '0'}, 
  ],
  diabetes: [
    {text: 'Sí', value: '0.57367'}, 
    {text: 'No', value: '0'},
  ],
  vars: {
    age: 1,
    gender: '',
    ta_sis: '0',
    col_total: '0',
    col_hdl: '0',
    hta_treatment: '1.93303',
    smoking: '0',
    diabetes: '0',
  },

  normalize() {
    this.vars.age = this.vars.age
    this.vars.gender = this.vars.gender
    this.vars.ta_sis = this.vars.ta_sis
    this.vars.col_total = this.vars.col_total
    this.vars.col_hdl = this.vars.col_hdl
    this.vars.hta_treatment = this.vars.hta_treatment
    this.vars.smoking = this.vars.smoking
    this.vars.diabetes = this.vars.diabetes
  },

  fixDP (r, dps) {
    if (isNaN(r)) return "NaN"
    var msign = ''
    if (r < 0) msign = '-'
    x = Math.abs(r);
    if (x > Math.pow(10, 21)) return msign + x.toString()
    var m = Math.round(x * Math.pow(10, dps)).toString()
    if (dps == 0) return msign + m
    while (m.length <= dps) m = "0" + m
    return msign + m.substring(0, m.length - dps) + "." + m.substring(m.length - dps)
  },
  calc () {
    var age = parseInt(this.vars.age)
    var gender = this.vars.gender
    
    var age_factor = gender == 'M' ? 3.06117 : 2.32888
    var col_total_factor = gender == 'M' ? 1.12370 : 1.20904
    var col_hdl_factor = gender == 'M' ? -0.93263 : -0.70833
    var avg_risk = gender == 'M' ? 23.9802 : 26.1931
    var risk_period_factor = gender == 'M' ? 0.88936 : 0.95012 

    var ta_sis = parseFloat(this.vars.ta_sis)
    var col_total = parseFloat(this.vars.col_total)
    var col_hdl = parseFloat(this.vars.col_hdl)
    var hta_treatment = parseFloat(this.vars.hta_treatment)
    var smoking = parseFloat(this.vars.smoking)
    var diabetes = parseFloat(this.vars.diabetes)
    /*
    console.log(
      `age: ${age},
      ta_sis: ${ta_sis},
      col_total: ${col_total},
      col_hdl: ${col_hdl},
      hta_treatment: ${hta_treatment},
      smoking: ${smoking},
      diabetes: ${diabetes}`)

    console.log(
      `age_factor: ${age_factor},
      col_total_factor: ${col_total_factor},
      col_hdl_factor: ${col_hdl_factor},
      avg_risk: ${avg_risk},
      risk_period_factor: ${risk_period_factor}`)
    */
    var risk_factors = (Math.log(age) * age_factor) + (Math.log(col_total) * col_total_factor) + 
    (Math.log(col_hdl) * col_hdl_factor) + 
    (Math.log(ta_sis) * hta_treatment) + smoking + diabetes - avg_risk

    var risk = 100 * (1 - Math.pow(risk_period_factor, Math.exp(risk_factors)))


    this.results = this.fixDP(risk,2)
    /*
    console.log('risk factors: 'risk_factors)
    console.log('risk': risk)
    */
    return this.results
  }
}