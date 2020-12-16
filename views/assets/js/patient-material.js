/*VUE INSTANCE*/

let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      dialog: false,
      dialogDelete: false,
      materialFormDialog: false,
      search: '',
      searched: false,
      title: '',
      material_type: '',
      material_content: '',
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
      patients: [
        {
          id:1,
          full_name:'Samantha Caceres',
        },
        {
          id:2,
          full_name:'Andrea Flores',
        },
        {
          id:3,
          full_name:'John Doe',
        },
      ],
      headers: [
        { text: 'Fecha del material enviado', align: 'start', value: 'date', width:"auto" },
        { text: 'Nombre del material', value: 'material_name', width:"auto" },
        { text: 'Acciones', value: 'actions', align:'center', sortable: false },
      ],
      patients_material: [
        {
          id: 1,
          material_name: 'Remedios caseros',
          date: '2020-05-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file_name: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
        {
          id: 2,
          material_name: 'Dieta',
          date: '2020-09-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file_name: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
        {
          id: 3,
          material_name: 'Remedios caseros',
          date: '2020-05-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file_name: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
        {
          id: 4,
          material_name: 'Dieta',
          date: '2020-09-10',
          content: 'Contenido para ser redactado y convertido a pdf que será enviado al paciente',
          file_name: '',
          message: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur quaerat ipsam vel ea quibusdam, eligendi iusto ad eaque facere corporis dignissimos esse ratione, impedit laborum totam quidem culpa aut necessitatibus.',
        },
      ],
      editedItem: {},
      editedIndex: -1,
    },

    watch: {
      patient_id: function (val) {
        if (this.isSelected) {
          var results = this.patients.filter(function(patient) {
            return patient.id == val
          });
          this.patient_fullname = results[0].full_name
        }
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
    },

    mounted () {
    },

    methods: {

      resetSearch () {
        this.searched = false
        this.isSelected = false
        this.patient_id = ''
        this.patient_fullname = ''
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
        Object.assign(this.patients_material[this.editedIndex], this.editedItem)
        this.close()
      },
  	}
});