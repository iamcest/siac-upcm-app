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
      search: '',
      searched: false,
      title: '',
      material_type: '',
      message_content: '',
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
      patients_material: [
        {
          id: 1,
          title: 'Remedios caseros',
          registered_at: '2020-05-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
        {
          id: 2,
          title: 'Dieta',
          registered_at: '2020-09-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
        {
          id: 3,
          title: 'Remedios caseros',
          registered_at: '2020-05-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
        {
          id: 4,
          title: 'Dieta',
          registered_at: '2020-09-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
      ],
      editedItem: {
        title: '',
        message: '',
        content: '',
        material_type: '',
        file: null,
      },
      defaulItem: {
        title: '',
        message: '',
        content: '',
        material_type: '',
        file: null,
      },
      patient: {},
      editedIndex: -1,
    },

    watch: {
      isSelected () {
        this.getPatientMaterial(this.isSelected)
      }
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

      deleteItem (item) {
        this.editedIndex = this.members.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        this.desserts.splice(this.editedIndex, 1)
        this.closeDelete()
      },

      close () {
        this.dialog = false
        this.materialFormDialog = false
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
        var material = app.editedItem
        var data = new FormData();
        data.append('patient_id', app.patient.patient_id);
        data.append('email', app.patient.email);
        data.append('first_name', app.patient.first_name);
        data.append('last_name', app.patient.last_name);
        data.append('full_name', app.patient.full_name);
        data.append('file', material.file);
        data.append('title', material.title);
        data.append('material', material.material_type);
        data.append('content', material.content);
        data.append('message', material.message);
        var url = api_url + 'patients-material/create'
        this.$http.post(url, data).then(res => {
          if (res.body.status == "success") 
            app.editedItem.registered_at = moment().format("YYYY-MM-DD")
            app.editedItem.patient_material_id = res.body.data.patient_material_id
            app.editedItem.file = res.body.data.file
            this.patients_material.push(app.editedItem)
            app.material_loading = false
            this.close()
        }, err => {

        })
      },
  	}
});