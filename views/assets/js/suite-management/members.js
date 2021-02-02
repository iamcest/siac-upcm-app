/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      barAlert: false,
      barTimeout: 1000,
      barMessage: '',
      barType: '',
      dialog: false,
      image_loading: false,
      upload_button: false,
      dialogDelete: false,
      menu: '',
      previewImage: '',
      headers: [
        { text: 'Nombre Completo', align: 'start', value: 'full_name' },
        { text: 'Rol', value: 'rol' },
        { text: 'Email', value: 'email' },
        { text: 'Teléfono', value: 'telephone' },
        { text: 'Acciones', value: 'actions', align:'center', sortable: false },
      ],
      members: [],
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
        whatsapp: "0",
        telegram: "0",
        sms: "0",
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
        var url = api_url + 'members/upcm-members'
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
            this.members.splice(this.editedIndex, 1)
            this.closeDelete()
            activateAlert(res.body.message, res.body.status)
          }, err => {
          this.closeDelete()
        })
      },

      close () {
        this.dialog = false
        this.previewImage = ''
        this.upload_button = false
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

      prevImage(e){
        const image = e.target.files[0]
        const reader = new FileReader()
        reader.readAsDataURL(image)
        reader.onload = e =>{
            this.editedItem.avatar = image;
            this.previewImage = e.target.result
            this.upload_button = true
        };
      },

       uploadImage(event) {
        var app = this
        let data = new FormData()
        var url = api_url + 'members/update-member-avatar'
        app.image_loading = true
        data.append('avatar', app.editedItem.avatar);
        data.append('user_id', app.editedItem.user_id);
        app.$http.post(url, data).then(res => {
          app.image_loading = false
          activateAlert(res.body.message, res.body.status)
        }, err => {

        })
      },

      save () {
        var app = this
        var member = app.editedItem
        var editedIndex = app.editedIndex
        var url = api_url + 'members/update'
        app.$http.post(url, member).then(res => {
          Object.assign(app.members[editedIndex], member)
          activateAlert(res.body.message, res.body.status)
        }, err => {

        })
        this.close()
      },
    }
});