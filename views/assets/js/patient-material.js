/*VUE INSTANCE*/

let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
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
      headers: [
        { text: 'Fecha del material enviado', align: 'start', value: 'registered_at', width:"auto" },
        { text: 'Nombre del material', value: 'title', width:"auto" },
        { text: 'Acciones', value: 'actions', align:'center', sortable: false },
      ],
      patients_material: [],
      editedItem: {
        title: '',
        message: '',
        content: '',
        material_type: '',
        file: '',
      },
      defaulItem: {
        title: '',
        message: '',
        content: '',
        material_type: '',
        file: '',
      },
      patient: {},
      editedIndex: -1,
    },

    watch: {
      isSelected () {
        this.getPatientMaterial(this.isSelected)
      },
    },

    computed: {
      searchPatient () {
        return this.patients_results = this.patients.filter(patient => {
          return patient.full_name.toLowerCase().includes(this.search.toLowerCase())
        })
      },
    },

    created () {
      this.initialize()
    },

    mounted () {
    },

    methods: {

      initialize () {
        var url = api_url + 'patients/get'
        this.$http.get(url).then( res => {
          if (res.body.length > 0) {
            var patients = []
            res.body.forEach((e) => {
              var patient = {}
              patient.patient_id = e.patient_id
              patient.first_name = e.first_name
              patient.last_name = e.last_name
              patient.full_name = e.first_name + ' ' + e.last_name
              patient.email = e.email
              patient.birthregistered_at = e.birthregistered_at

              patients.push(patient)
            })
            this.patients = patients            
          }
        }, err => {

        })
      },

      getPatientMaterial (isSelected) {
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

      resetSearch () {
        this.searched = false
        this.isSelected = false
        this.patient_id = ''
        this.patient = {}
      },

      showItem (item) {
        this.editedIndex = this.patients_material.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.viewDialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.patients_material.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        var app = this
        var url = api_url + 'patients-material/delete'
        app.$http.post(url, {patient_material_id: app.editedItem.patient_material_id}).then( res => {
          if (res.body.status == "success") {
            app.patients_material.splice(app.editedIndex, 1)
          }
          app.closeDelete()
        }, err => {
          app.closeDelete()
        })
      },

      close () {
        this.dialog = false
        this.materialFormDialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeViewDialog () {
        this.dialog = false
        this.viewDialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
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
        var url = api_url + 'patients-material/create'
        app.$http.post(url, data).then(res => {
          if (res.body.status == "success") 
            app.editedItem.registered_at = moment().format("YYYY-MM-DD")
            app.editedItem.patient_material_id = res.body.data.patient_material_id
            app.editedItem.file = res.body.data.file
            app.patients_material.push(app.editedItem)
            app.material_loading = false
            app.close()
        }, err => {

        })
      },
  	}
});