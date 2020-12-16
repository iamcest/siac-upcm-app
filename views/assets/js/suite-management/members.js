/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      menu: '',
      dialog: false,
      dialogDelete: false,
      headers: [
        {
          text: 'Nombre Completo', align: 'start', value: 'full_name' },
        { text: 'Rol', value: 'rol_text' },
        { text: 'Email', value: 'email' },
        { text: 'Telephone', value: 'telephone' },
        { text: 'Actions', value: 'actions', align:'center', sortable: false },
      ],
      members: [],
      rols: [
        {
          name: 'Cardiólogo',
          id: 1,
        },
        {
          name: 'Enfermera',
          id: 2,
        },
        {
          name: 'Enfermero',
          id: 3,
        },
        {
          name: 'Secretaria',
          id: 4,
        },
      ],
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
      communication_platforms: [
        {
          text: 'Whatsapp',
          val: 'whatsapp',
        },
        {
          text: 'Telegram',
          val: 'telegram',
        },
        {
          text: 'Mensaje de texto',
          val: 'sms',
        },
      ],
      editedIndex: -1,
      editedItem: {
        full_name: '',
        rol: '',
        email: '',
        telephone: '',
      },
      defaultItem: {
        full_name: '',
        rol: '',
        email: '',
        telephone: '',
      },
    },

    computed: {
      formTitle () {
        return 'Editar Miembro'
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
        this.members = [
          {
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            rol_text: 'Enfermera',
            rol_val: 1,
            email: 'correo_prueba@prueba.com',
            telephone: '(+xx) xxx xxxxx',
            platforms: 'whatsapp',
            gender: 'M',
            birthdate: '1998-09-14',
            password: '',
            confirm_password: '',
          },
          {
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            rol_text: 'Cardiólogo',
            rol_val: 1,
            email: 'correo_prueba@prueba.com',
            telephone: '(+xx) xxx xxxxx',
            platforms: 'telegram',
            gender: 'M',
            birthdate: '1998-09-14',
            password: '',
            confirm_password: '',
          },
          {
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            rol_text: 'Secretaria',
            rol_val: 4,
            email: 'correo_prueba@prueba.com',
            telephone: '(+xx) xxx xxxxx',
            platforms: 'whatsapp',
            gender: 'M',
            birthdate: '1998-09-14',
            password: '',
            confirm_password: '',
          },
          {
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            rol: 'Cardiólogo',
            email: 'correo_prueba@prueba.com',
            telephone: '(+xx) xxx xxxxx',
            platforms: 'sms',
            gender: 'M',
            birthdate: '1998-09-14',
            password: '',
            confirm_password: '',
          },
        ]
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
        Object.assign(this.members[this.editedIndex], this.editedItem)
        this.close()
      },
    }
});