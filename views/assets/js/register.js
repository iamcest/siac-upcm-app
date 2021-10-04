/*VUE INSTANCE*/
Vue.use(VueTelInputVuetify, {
  vuetify,
});
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      isInvitationInvalid: 0,
      dialog: false,
      loading: false,
      invitation_loading: false,
      upcmInvitationsDialog: false,
      alert: false,
      modal: false,
      invitation_code: new URLSearchParams(location.search).get('invitation_code'),
      rols: ['Cardiólogo', 'Enfermera', 'Enfermero', 'Secretaria'],
      genders: [
        {
          text: 'Masculino',
          value: 'M',
        },
        {
          text: 'Femenino',
          value: 'F',
        },
      ],
      register: {
        first_name: '',
        last_name: '',
        birthdate: '',
        gender: '',
        email: '',
        telephone: '',
        sms: '0',
        telegram: '0',
        whatsapp: '0',
        user_type: '',
        password: '',
        password_confirm: '',
        invitations: [],
      },
      invitation: {},
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
      invitation_message: '',
      alert_message: '',
      alert_type: '',
    },

    computed: {
    },

    created () {
      this.verifyInvitation()
    },

    mounted () {
    },

    methods: {

      verifyInvitation () {
        var app = this
        var url = api_url + 'upcm-invitations/check-invitation/' + app.invitation_code
        app.invitation_loading = true
        app.$http.get(url).then(res => {
          app.invitation_message = res.body.message
          if (res.body.status != 'success') {
             app.isInvitationInvalid = 1
          }
          else {
            app.invitation = res.body.data
            app.register.first_name = app.invitation.first_name
            app.register.last_name = app.invitation.last_name
            app.register.email = app.invitation.user_email
            app.register.access = Object.keys(app.invitation.access).length === 0 ? {} : app.invitation.access
          }
          app.invitation_loading = false
        }, err => {

        })
      },

      getTelephoneInput(text, data) {
        this.register.telephone = data.number.international
      },

      deleteInvitation(item) {
        var app = this
        var index = app.upcm_invitations.items.indexOf(item)
        app.upcm_invitations.items.splice(index, 1)
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
  
      saveInvitation() {
        var app = this
        var data = app.upcm_invitations.editedItem
  
        data.created_at = current_date
        app.upcm_invitations.items.push(data)
        app.closeInvitation()
      },
  
      processRegister () {
        var app = this
        var url = api_url + 'members/register-with-invitation'
        var data = app.register
        data.invitation = app.invitation
        data.invitations = app.upcm_invitations.items
        app.loading = true
        app.alert = false
        app.$http.post(url, data).then(res => {
          app.loading = false
          app.alert_message = res.body.message
          app.alert_type = res.body.status
          app.alert = true
          if (res.body.status == 'success') 
            window.location = res.body.data
        }, err => {

        })
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