
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
      dialog: false,
      dialogDelete: false,
      birthdateDialog: false,
      modal: false,
      headers: [
        { text: 'Nombre completo', align: 'start', value: 'full_name' },
        { text: 'Tipo de usuario', value: 'user_type' },
        { text: 'Correo electrónico', value: 'email' },
        { text: 'Acciones', value: 'actions', align:'center', sortable: false },
      ],
      members: [],
      upcms: [],
      rols: ['Cardiólogo', 'Enfermera', 'Enfermero', 'Secretaria'],
      user_types: ['administrador', 'coordinador', 'miembro'],
      genders: [
        {
          name: 'Masculino',
          gender: 'M',
        },
        {
          name: 'Femenino',
          gender: 'F',
        },
      ],
      password: '',
      password_confirm: '',
      editedIndex: -1,
      editedItem: {},
      defaultItem: {
        date: current_date,
        whatsapp: "0",
        telegram: "0",
        sms: "0",
      },
    },

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Registrar Miembro' : 'Editar Miembro'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
    },

    created () {
      this.initialize()
    },

    mounted () {
    },

    methods: {

      initialize () {
        var url = api_url + 'upcms/upcm-list'
        this.$http.get(url).then(res => {
          this.upcms = res.body;
        }, err => {

        })
        var url = api_url + 'members/get'
        this.$http.get(url).then(res => {
          this.members = res.body;
        }, err => {

        })
      },

      editItem (item) {
        this.editedIndex = this.members.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.members.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        var id = this.editedItem.user_id;
        var url = api_url + 'members/delete'
        this.$http.post(url, {user_id: id}).then(res => {
            if (res.body.status == 'success') 
              this.members.splice(this.editedIndex, 1)
              this.closeDelete()
            activateAlert(res.body.message, res.body.status)
          }, err => {
          this.closeDelete()
        })
      }, 

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        var app = this
        var editedIndex = app.editedIndex
        var member = app.editedItem
        if (this.editedIndex > -1) {
          var url = api_url + 'members/update'
          this.$http.post(url, member).then(res => {
            if (res.body.status == 'success') 
              Object.assign(app.members[editedIndex], member)
            activateAlert(res.body.message, res.body.status)
          }, err => {

          })
        } else {
          var url = api_url + 'members/create'
          this.$http.post(url, member).then(res => {
            if (res.body.status == 'success')
              member.date = current_date
              member.user_id = res.body.data.user_id
              this.members.push(member)
            activateAlert(res.body.message, res.body.status)
          }, err => {

          })
        }
        this.close()
      },

  	}
});