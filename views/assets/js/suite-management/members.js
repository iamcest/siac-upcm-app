/*VUE INSTANCE*/
Vue.use(VueTelInputVuetify, {
  vuetify,
});
let vm = new Vue({
  vuetify,
  el: '#siac-suite-container',
  data: {
    barAlert: false,
    barTimeout: 1000,
    barMessage: '',
    barType: '',
    dialog: false,
    dialogAccess: false,
    viewInvitationsDialog: false,
    image_loading: false,
    upload_button: false,
    dialogDelete: false,
    dialogAccess: false,
    menu: '',
    previewImage: '',
    headers: [
      { text: 'Nombre Completo', align: 'start', value: 'full_name' },
      { text: 'Rol', value: 'rol' },
      { text: 'Correo electrónico', value: 'email' },
      { text: 'Teléfono', value: 'telephone' },
      { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
    ],
    members: [],
    upcm_invitations: {
      dialog: false,
      loading: false,
      create_loading: false,
      items: [],
      headers: [
        {
          text: 'Nombre completo', align: 'start', value: 'full_name'
        },
        { text: 'Correo electrónico', value: 'user_email' },
        { text: 'Rol', value: 'rol' },
        { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
      ],
      editedItem: {
        first_name: '',
        last_name: '',
        user_email: '',
        user_type: 'miembro',
        rol: 'Cardiólogo',
        created_at: '',
        already_used: 0
      },
      defaultItem: {
        first_name: '',
        last_name: '',
        user_email: '',
        user_type: 'miembro',
        rol: 'Cardiólogo',
        created_at: '',
        already_used: 0
      }
    },
    rols: ['Cardiólogo', 'Enfermera', 'Enfermero', 'Secretaria'],
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
    access: {
      loading: false,
      defaultItem: {
        patient_management_access: {
          access: 1,
          sections: [
            {
              name: 'Pacientes',
              page: 'patients',
              permissions: {
                create: 0,
                read: 0,
                update: 0,
                delete: 0,
              }
            },
            {
              name: 'Citas',
              page: 'appointments',
              permissions: {
                create: 0,
                read: 0,
                update: 0,
                delete: 0,
              }
            }
          ]
        },
        calculations_and_algorithms_access: {
          access: 1,
        },
        patient_material_access: {
          access: 1,
          sections: [
            {
              name: 'Materiales para pacientes',
              page: 'patients',
              permissions: {
                create: 0,
                read: 0,
                delete: 0,
              }
            },
            {
              name: 'Plantillas',
              page: 'templates',
              permissions: {
                create: 0,
                read: 0,
                delete: 0,
              }
            }
          ]
        },
        notifications_access: {
          access: 1,
          publish: 1,
        },
      }
    },
    editedIndex: -1,
    user: {},
    editedItem: {
      full_name: '',
      rol: '',
      email: '',
      telephone: '',
      meta: {},
    },
    defaultItem: {
      full_name: '',
      rol: '',
      email: '',
      telephone: '',
      whatsapp: "0",
      telegram: "0",
      sms: "0",
      meta: {},
    },
  },

  computed: {
    formTitle() {
      return 'Editar Miembro'
    },
  },

  watch: {
    dialog(val) {
      val || this.close()
    },
    dialogDelete(val) {
      val || this.closeDelete()
    },
    upcmInvitationsDialog(val) {
      val || this.closeInvitation()
    },
  },

  created() {
    this.initialize()
    this.initializeInvitations()
  },

  mounted() {

  },

  methods: {
    initialize() {
      var url = api_url + 'members/upcm-members'
      this.$http.get(url).then(res => {
        res.body.forEach(e => {
          if (Array.isArray(e.meta)) {
            e.meta = {}
          }
        })
        this.members = res.body
      }, err => {

      })
    },

    initializeInvitations() {
      var url = api_url + 'upcm-invitations/get'
      this.$http.get(url).then(res => {
        this.upcm_invitations.items = res.body
      }, err => {

      })
    },

    editItem(item) {
      this.editedIndex = this.members.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    editAccessItem(item) {
      this.editedIndex = this.members.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.editedItem.meta = Object.keys(item.meta).length === 0 ? Object.assign({}, this.access.defaultItem) : Object.assign({}, item.meta)
      this.dialogAccess = true
    },

    editInvitationItem() {
      this.upcm_invitations.editedItem = Object.assign({}, this.upcm_invitations.defaultItem)
      this.upcmInvitationsDialog = true
    },

    deleteItem(item) {
      this.editedIndex = this.members.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteItemConfirm() {
      var id = this.editedItem.user_id
      var url = api_url + 'members/delete'
      this.$http.post(url, { user_id: id }).then(res => {
        this.members.splice(this.editedIndex, 1)
        this.closeDelete()
        activateAlert(res.body.message, res.body.status)
      }, err => {
        this.closeDelete()
      })
    },

    close() {
      this.dialog = false
      this.previewImage = ''
      this.upload_button = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeAccess() {
      this.dialogAccess = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeInvitation() {
      this.upcmInvitationsDialog = false
      this.$nextTick(() => {
        this.upcm_invitations.editedItem = Object.assign({}, this.upcm_invitations.defaultItem)
        this.upcm_invitations.editedIndex = -1
      })
    },

    closeDelete() {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    prevImage(e) {
      const image = e.target.files[0]
      const reader = new FileReader()
      reader.readAsDataURL(image)
      reader.onload = e => {
        this.editedItem.avatar = image
        this.previewImage = e.target.result
        this.upload_button = true
      }
    },

    uploadImage(event) {
      var app = this
      let data = new FormData()
      var url = api_url + 'members/update-member-avatar'
      app.image_loading = true
      data.append('avatar', app.editedItem.avatar)
      data.append('user_id', app.editedItem.user_id)
      app.$http.post(url, data).then(res => {
        app.image_loading = false
        activateAlert(res.body.message, res.body.status)
      }, err => {

      })
    },

    save() {
      var app = this
      var member = app.editedItem
      var editedIndex = app.editedIndex
      var url = api_url + 'members/update'
      app.$http.post(url, member).then(res => {
        if (res.body.status == 'success') {
          Object.assign(app.members[editedIndex], member)  
        }
        app.close()
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.close()
      })
    },

    saveAccess() {
      var app = this
      var member = app.editedItem
      var editedIndex = app.editedIndex
      var url = api_url + 'user-access/update'

      app.access.loading = true
      app.$http.post(url, member).then(res => {
        app.access.loading = false
        if (res.body.status == 'success') {
          Object.assign(app.members[editedIndex], member)  
        }
        app.closeAccess()
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.closeAccess()
      })
    },

    saveInvitation() {
      var app = this
      var data = app.upcm_invitations.editedItem
      data.upcm_id = app.editedItem.upcm_id
      data.upcm_name = app.editedItem.upcm_name
      app.upcm_invitations.create_loading = true
      var url = api_url + 'upcm-invitations/create'
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          data.created_at = current_date
          data.upcm_invitation_id = res.body.data.upcm_invitation_id
          data.invitation_code = res.body.data.invitation_code
          app.upcm_invitations.items.push(data)
        }
        app.upcm_invitations.create_loading = false
        activateAlert(res.body.message, res.body.status)
        app.closeInvitation()
      }, err => {
        app.upcm_invitations.create_loading = false
        app.closeInvitation()
      })
    },

    editInvitationItem() {
      this.upcm_invitations.editedItem = Object.assign({}, this.upcm_invitations.defaultItem)
      this.upcmInvitationsDialog = true
    },

    deleteInvitation(item) {
      var app = this
      var index = app.upcm_invitations.items.indexOf(item)
      var url = api_url + 'upcm-invitations/delete/' + item.upcm_invitation_id
      app.$http.get(url).then(res => {
        if (res.body.status == 'success') {
          app.upcm_invitations.items.splice(index, 1)
        }
      }, err => {
      })
    },

    getTelephoneInput(text, data) {
      this.editedItem.telephone = data.number.international
    },

    filterAccessByRol() {
      if (app.editedItem == 'miembro') {
        var roles = [
          {
            rol_obj: 'cardiologist',
            rol: 'Cardiólogo'
          },
          {
            rol_obj: 'nurse',
            rol: 'Enfermera'
          },
          {
            rol_obj: 'nurse',
            rol: 'Enfermero'
          },
          {
            rol_obj: 'secretary',
            rol: 'Secretaria'
          },
        ]
        var rol_data = roles.find( e => {
          return e.rol == app.editedItem.rol
        })
        if (rol_data.hasOwnProperty('rol_obj')) {
          app.editedItem.meta = Object.assign({}, user_roles[rol_data['rol_obj']])
        }
      }
    },

    copyToClipboard(text) {
      navigator.clipboard.writeText(text)
    },

  }
})