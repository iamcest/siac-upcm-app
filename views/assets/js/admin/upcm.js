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
    save_loading: false,
    dialog: false,
    dialogDelete: false,
    upcmInvitationsDialog: false,
    viewDialog: false,
    upcm_image: null,
    preview_image: null,
    headers: [
      {
        text: 'Nombre', align: 'start', value: 'upcm_name'
      },
      { text: 'Provincia / País', value: 'location' },
      { text: 'Clave de certificación', value: 'upcm_key' },
      { text: 'Fecha de registro', value: 'upcm_registered' },
      { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
    ],
    upcms: [],
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
        { text: 'Tipo', value: 'user_type' },
        { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
      ],
      editedItem: {
        first_name: '',
        last_name: '',
        user_email: '',
        user_type: 'miembro',
        rol: 'Cardiólogo',
        created_at: '',
        already_used: 0,
        access: {
          patient_management_access: {
            access: 1,
            sections: [
              {
                name: 'Pacientes',
                page: 'patients',
                permissions: {
                  create: 1,
                  read: 1,
                  update: 1,
                  delete: 1,
                }
              },
              {
                name: 'Citas',
                page: 'appointments',
                permissions: {
                  create: 1,
                  read: 1,
                  update: 1,
                  delete: 1,
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
                  create: 1,
                  read: 1,
                  delete: 1,
                }
              },
              {
                name: 'Plantillas',
                page: 'templates',
                permissions: {
                  create: 1,
                  read: 1,
                  delete: 1,
                }
              }
            ]
          },
          notifications_access: {
            access: 1,
            publish: 1,
          },
        },
      },
      defaultItem: {
        first_name: '',
        last_name: '',
        user_email: '',
        user_type: 'miembro',
        rol: 'Cardiólogo',
        created_at: '',
        already_used: 0,
        access: {
          patient_management_access: {
            access: 1,
            sections: [
              {
                name: 'Pacientes',
                page: 'patients',
                permissions: {
                  create: 1,
                  read: 1,
                  update: 1,
                  delete: 1,
                }
              },
              {
                name: 'Citas',
                page: 'appointments',
                permissions: {
                  create: 1,
                  read: 1,
                  update: 1,
                  delete: 1,
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
                  create: 1,
                  read: 1,
                  delete: 1,
                }
              },
              {
                name: 'Plantillas',
                page: 'templates',
                permissions: {
                  create: 1,
                  read: 1,
                  delete: 1,
                }
              }
            ]
          },
          notifications_access: {
            access: 1,
            publish: 1,
          },
        },
      }
    },
    countries: [],
    states: [],
    country_states: [],
    rols: ['Cardiólogo', 'Enfermera', 'Enfermero', 'Secretaria'],
    editedIndex: -1,
    editedItem: {
      upcm_logo: '',
      upcm_name: '',
      upcm_email: '',
      upcm_address: '',
      upcm_country: '',
      upcm_state: '',
      meta: {
        instagram: '',
        twitter: '',
        facebook: '',
      },
      upcm_registered: current_date
    },
    defaultItem: {
      upcm_logo: '',
      upcm_name: '',
      upcm_email: '',
      upcm_address: '',
      upcm_country: '',
      upcm_state: '',
      meta: {
        instagram: '',
        twitter: '',
        facebook: '',
      },
      upcm_registered: current_date
    },
  },

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'Registrar UPCM' : 'Editar UPCM'
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
    }
  },

  created() {
    this.initialize()
  },

  mounted() {
    this.loadCountries()
  },

  methods: {

    initialize() {
      var url = api_url + 'upcms/get'
      this.$http.get(url).then(res => {
        this.upcms = res.body;
      }, err => {

      })
    },

    loadInvitations() {
      var url = api_url + 'upcm-invitations/get/' + this.editedItem.upcm_id
      this.$http.get(url).then(res => {
        res.body.forEach(e => {
          if (Array.isArray(e.access)) {
            e.access = {}
          }
        })
        this.upcm_invitations.items = res.body;
      }, err => {

      })
    },

    editItem(item) {
      this.editedIndex = this.upcms.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    viewItem(item) {
      this.editedIndex = this.upcms.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.viewDialog = true
    },

    editInvitationItem() {
      this.upcm_invitations.editedItem = Object.assign({}, this.upcm_invitations.defaultItem)
      this.upcmInvitationsDialog = true
    },

    deleteItem(item) {
      this.editedIndex = this.upcms.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteItemConfirm() {
      var id = this.editedItem.upcm_id;
      var url = api_url + 'upcms/delete'
      this.$http.post(url, { upcm_id: id }).then(res => {
        if (res.body.status == "success")
          this.upcms.splice(this.editedIndex, 1)
        this.closeDelete()
        activateAlert(res.body.message, res.body.status)
      }, err => {
        this.closeDelete()
      })
    },

    closeDelete() {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    close() {
      this.dialog = false
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

    save() {
      var app = this
      var editedIndex = app.editedIndex
      var upcm = app.editedItem

      var data = new FormData();
      data.append('upcm_name', upcm.upcm_name)
      data.append('upcm_logo', upcm.upcm_logo)
      data.append('upcm_image', app.upcm_image)
      data.append('upcm_email', upcm.upcm_email)
      data.append('upcm_key', upcm.upcm_key)
      data.append('upcm_address', upcm.upcm_address)
      data.append('upcm_country', upcm.upcm_country)
      data.append('upcm_state', upcm.upcm_state)
      data.append('meta', JSON.stringify(upcm.meta))

      app.save_loading = true

      if (app.editedIndex > -1) {
        var url = api_url + 'upcms/update'
        data.append('upcm_id', upcm.upcm_id)
        app.$http.post(url, data).then(res => {
          if (res.body.status == 'success') {
            upcm.upcm_logo = res.body.data.upcm_logo
            Object.assign(app.upcms[editedIndex], upcm)
          }
          app.save_loading = false
          activateAlert(res.body.message, res.body.status)
          app.close()
        }, err => {
          app.close()
        })
      } else {
        var url = api_url + 'upcms/create'
        app.$http.post(url, data).then(res => {
          if (res.body.status == 'success') {
            upcm.upcm_logo = res.body.data.upcm_logo
            upcm.upcm_registered = current_date
            upcm.upcm_id = res.body.data.upcm_id
            app.upcms.push(upcm)
          }
          app.save_loading = false
          activateAlert(res.body.message, res.body.status)
          app.close()
        }, err => {
          app.save_loading = false
          app.close()
        })
      }
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

    formatDate(d) {
      var upcm_date = new Date(d)
      return upcm_date.toLocaleString('es-ES', date_options)
    },

    loadCountries() {
      this.$http.get('/public/js/countries.min.json').then(res => {
        this.countries = res.body.countries
      }, err => {

      })
      this.$http.get('/public/js/states.min.json').then(res => {
        this.states = res.body.states
      }, err => {

      })
    },

    filterStates() {
      var states = this.states
      var country = this.editedItem.country_selected
      var results = states.filter((state) => {
        return state.id_country == country
      });
      return this.country_states = results
    },

    getCountryName() {
      var app = this;
      var countries = app.countries
      var country_selected = app.editedItem.country_selected
      var results = countries.filter((country) => {
        return country.id == country_selected
      });
      return app.editedItem.upcm_country = results[0].name;
    },

    getStateName() {
      var app = this;
      var states = app.states
      var state_selected = app.editedItem.state_selected
      var results = states.filter((state) => {
        return state.id == state_selected
      });
      return app.editedItem.upcm_state = results[0].name;
    },

    prevImage(e) {
      const image = e.target.files[0]
      const reader = new FileReader()
      reader.readAsDataURL(image)
      reader.onload = e => {
        this.upcm_image = image;
        this.preview_image = e.target.result
        this.undone_button = true
      };
    },

    getLocation() {
      this.getCountryName();
      this.getStateName();
    },

    copyToClipboard(text) {
      navigator.clipboard.writeText(text)
    },

    filterAccessByRol() {
      var app = this
      if (app.upcm_invitations.editedItem.user_type == 'miembro') {
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
        var rol_data = roles.find(e => {
          return e.rol == app.upcm_invitations.editedItem.rol
        })

        if (rol_data.hasOwnProperty('rol_obj')) {
          app.upcm_invitations.editedItem.access = Object.assign({}, user_roles[rol_data['rol_obj']])
        }
      }
    },

  }
});