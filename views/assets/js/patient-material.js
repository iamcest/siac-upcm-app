/*VUE INSTANCE*/

let vm = new Vue({
  vuetify,
  el: '#siac-suite-container',
  data: {
    barAlert: false,
    barTimeout: 1000,
    barMessage: '',
    barType: '',
    loading: false,
    material_loading: false,
    dialog: false,
    dialogDelete: false,
    materialFormDialog: false,
    viewDialog: false,
    search: '',
    searched: false,
    title: '',
    material_type: '',
    editor1Content: '',
    editor2Content: '',
    template_selected: [],
    options: {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    },
    isSelected: false,
    patient_id: '',
    patient_fullname: '',
    patient_results: [],
    patients: [],
    templates: {
      loading: false,
      create_loading: false,
      list_loading: false,
      create_form_valid: false,
      rules: {
        nameRules: [
          v => !!v || 'El nombre de la plantilla es requerido',
        ],
        fileRules: [
          v => !!v || 'El archivo de la plantilla es requerido',
        ],
      },
      search: '',
      headers: [
        { text: 'Material', align: 'start', value: 'material_name', width: "auto" },
        { text: 'Acción', align: 'center', value: 'actions', width: "auto" },
      ],
      items: [],
      editedItem: {},
      editedIndex: -1,
      defaultItem: {
        material_id: '',
        type: 'C',
        material_name: '',
        source: undefined,
      }
    },
    headers: [
      { text: 'Fecha del material enviado', align: 'start', value: 'registered_at', width: "auto" },
      { text: 'Nombre del material', value: 'title', width: "auto" },
      { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
    ],
    patients_material: [],
    materials_sent: {
      dialog: false,
      loading: false,
      headers: [
        { text: 'Fecha', align: 'start', value: 'registered_at', width: "auto" },
        { text: 'Paciente', value: 'full_name', width: "auto" },
        { text: 'Acciones', value: 'actions', width: "auto" },
      ],
      items: [],
      editedItem: {
        material_name: ''
      },
    },
    editedItem: {
      title: '',
      message: '',
      content: '',
      material_type: '',
      file: '',
    },
    defaulItem: {
      title: '',
      message: '<p> </p>',
      content: '<p> </p>',
      material_type: '',
      file: '',
    },
    patient: {},
    editedIndex: -1,
  },

  watch: {
    isSelected() {
      this.getPatientMaterial(this.isSelected)
    },
  },

  computed: {
    searchPatient() {
      return this.patients_results = this.patients.filter(patient => {
        return patient.full_name.toLowerCase().includes(this.search.toLowerCase())
      })
    },
  },

  created() {
    this.initialize()
  },

  mounted() {
  },

  methods: {

    initialize() {
      var url = api_url + 'patients/get'
      var app = this
      app.templates.list_loading = true
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          var patients = []
          res.body.forEach((e) => {
            var patient = {}
            patient.patient_id = e.patient_id
            patient.first_name = e.first_name
            patient.last_name = e.last_name
            patient.full_name = e.first_name + ' ' + e.last_name
            patient.email = e.email
            patient.birthdate = e.birthdate

            patients.push(patient)
          })
          app.patients = patients
        }
      }, err => {

      }).then(res => {
        url = api_url + 'material-templates/get'
        app.$http.get(url).then(res => {
          app.templates.list_loading = false
          if (res.body.length > 0) {
            app.templates.items = res.body
          }
        }, err => {

        })
      }, err => {

      })
    },

    getPatientMaterial(isSelected) {
      var app = this
      if (isSelected) {
        app.patients_material = []
        var url = api_url + 'patients-material/get/' + app.patient.patient_id
        app.$http.get(url).then(res => {
          if (res.body.length > 0) {
            app.patients_material = res.body
          }
        }, err => {

        })
      }
    },

    getMaterialsSent() {
      var app = this
      app.materials_sent.loading = true
      app.materials_sent.items = []
      var url = api_url + 'patients-material/get-sent/' + app.materials_sent.editedItem.material_id
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          app.materials_sent.items = res.body
        }
        app.materials_sent.loading = false
      }, err => {
        app.materials_sent.loading = false
      })
    },

    resetSearch() {
      this.searched = false
      this.isSelected = false
      this.patient_id = ''
      this.patient = {}
    },

    filterPatient(id) {
      var result = this.patients.find(patient => patient.patient_id == id)
      if (result != null) {
        this.patient = result
        this.getPatientMaterial()
        this.materials_sent.dialog = false
        this.isSelected = true
        this.$refs.patient_materials_title.scrollIntoViewIfNeeded({behavior: "smooth"})
      }
      else {
        activateAlert('No se ha encontrado este paciente, intente de nuevo.', 'warning')
      }
      return result
    },

    showItem(item) {
      this.editedIndex = this.patients_material.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.viewDialog = true
    },

    showMaterialsSent(item) {
      this.materials_sent.editedItem = Object.assign({}, item)
      this.materials_sent.dialog = true
      this.getMaterialsSent()
    },

    showCreateMaterialDialog() {
      this.templates.editedItem = Object.assign({}, this.templates.defaulItem)
      this.templates.create_dialog = true
    },

    deleteItem(item) {
      this.editedIndex = this.patients_material.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteItemConfirm() {
      var app = this
      var url = api_url + 'patients-material/delete'
      app.$http.post(url, { patient_material_id: app.editedItem.patient_material_id }).then(res => {
        if (res.body.status == "success")
          app.patients_material.splice(app.editedIndex, 1)
        activateAlert(res.body.message, res.body.status)
        app.closeDelete()
      }, err => {
        app.closeDelete()
      })
    },

    deleteMaterialItem(item) {
      this.templates.editedIndex = this.templates.items.indexOf(item)
      this.templates.editedItem = Object.assign({}, item)
      this.templates.delete_dialog = true
    },

    deleteMaterialItemConfirm() {
      var app = this
      var url = api_url + 'material-templates/delete'
      app.$http.post(url, app.templates.editedItem).then(res => {
        if (res.body.status == "success") {
          app.templates.items.splice(app.templates.editedIndex, 1)
          app.template_selected = []
        }
        activateAlert(res.body.message, res.body.status)
        app.closeMaterialDelete()
      }, err => {
        app.closeMaterialDelete()
      })
    },

    close() {
      this.dialog = false
      this.materialFormDialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeViewDialog() {
      this.dialog = false
      this.viewDialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeCreateMaterialDialog() {
      this.templates.create_dialog = false
      this.$nextTick(() => {
        this.templates.editedItem = Object.assign({}, this.templates.defaultItem)
      })
    },

    closeDelete() {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeMaterialDelete() {
      this.templates.delete_dialog = false
      this.$nextTick(() => {
        this.templates.editedItem = Object.assign({}, this.templates.defaultItem)
        this.templates.editedIndex = -1
      })
    },

    save() {
      var app = this
      app.material_loading = true
      var editedIndex = app.editedIndex
      var data = new FormData()
      data.append('patient_id', app.patient.patient_id)
      data.append('email', app.patient.email)
      data.append('first_name', app.patient.first_name)
      data.append('last_name', app.patient.last_name)
      data.append('full_name', app.patient.full_name)
      data.append('file', app.editedItem.file)
      data.append('title', app.editedItem.title)
      data.append('material', app.editedItem.material_type)
      data.append('content', app.editedItem.content)
      data.append('message', app.editedItem.message)
      if (app.editedItem.material_type == 'template') {
        data.append('templates', JSON.stringify(app.template_selected))
      }
      var url = api_url + 'patients-material/create'
      app.$http.post(url, data).then(res => {
        app.material_loading = false
        if (res.body.status == "success")
          app.editedItem.registered_at = moment().format("YYYY-MM-DD")
        app.editedItem.patient_material_id = res.body.data.patient_material_id
        app.editedItem.file = res.body.data.file
        app.editedItem.files = res.body.data.files
        app.patients_material.push(app.editedItem)
        app.close()
        activateAlert(res.body.message, res.body.status)
      }, err => {
        activateAlert('Ocurrió un error inesperado, intente de nuevo.', 'error')
        app.material_loading = false
      })
    },

    saveMaterialTemplate() {
      var app = this
      var material = app.templates.editedItem
      if (app.$refs.material_template_form.validate()) {
        app.templates.create_loading = true
        var data = new FormData()
        data.append('material_name', material.material_name)
        data.append('source', material.source)

        var url = api_url + 'material-templates/create'
        app.$http.post(url, data).then(res => {
          app.templates.create_loading = false
          if (res.body.status == "success") {
            app.templates.create_dialog = false
            material.material_id = res.body.data.material_id
            material.source = res.body.data.source
            material.type = 'C'
            app.templates.items.push(material)
          }
          activateAlert(res.body.message, res.body.status)
        }, err => {
          activateAlert('Ocurrió un error inesperado, intente de nuevo.', 'error')
          app.templates.create_loading = false
        })
      }

    },

    downloadMaterialExample(item) {
      var app = this
      var url = api_url + 'patients-material/get-standard-example'
      app.$http.post(url, item).then( res => {
        if (res.body.status == 'success') {
          app.pdf_loading = false
          var pdf_doc = res.body
          var a = document.createElement('a')
          a.href = pdf_doc.content
          document.body.append(a)
          a.download = item.material_name + ".pdf"
          a.click()
          a.remove()
        }
      }, err => {

      })
    },
  }
});