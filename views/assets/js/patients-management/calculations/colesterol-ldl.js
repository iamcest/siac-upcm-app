var colesterol_ldl_vars = {
	results: '',
  nomenclature: 'mg/dl',
  vars: {
    total_cholesterol: '',
    triglyceride_level: '',
    c_HDL: ''
  },

  calc () {
  	var app = this
    app.results = parseInt(app.vars.total_cholesterol) - parseInt(app.vars.c_HDL)
  	return app.results
  },
}