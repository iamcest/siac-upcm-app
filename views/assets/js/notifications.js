/*VUE INSTANCE*/
moment.locale('es')
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      dialog: false,
      dialogDelete: false,
      announcements: [
        {
          announcement_id: 1,
          title: 'Caso clínico',
          content: 'Contenido de prueba',
          user_id: 1,
          published_at: '2020-12-19 01:00:09',
        },
        {
          announcement_id: 2,
          title: 'Caso clínico',
          content: 'Lorem Ipsum',
          user_id: 1,
          published_at: '2020-12-19 00:10:09',
        },
        {
          announcement_id: 3,
          title: 'Caso clínico',
          content: 'Lorem ipsum dolor asit me',
          user_id: 1,
          published_at: '2020-12-19 01:10:09',
        },
      ],
      editedIndex: -1,
      editedItem: {},
      defaultItem: {
        title: '',
        content: '',
        published_at: moment()
      },
    },

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Crear anuncio' : 'Editar anuncio'
      },    
    },

    created () {
      this.initialize()
    },

    mounted () {
    },

    methods: {
      initialize () {
        var url = api_url + 'announcements/get'
        this.$http.get(url).then(res => {
          console.log(res)
          this.announcements = res.body;
        }, err => {

        })
      },

      editItem (item) {
        this.editedIndex = this.announcements.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.announcements.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        var id = this.editedItem.announcement_id;
        var url = api_url + 'announcements/delete'
        this.$http.post(url, {announcement_id: id}).then(res => {
          if (res.body.status == "success") 
            this.announcements.splice(this.editedIndex, 1)
            this.closeDelete()
            
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
        var upcm = app.editedItem
        if (this.editedIndex > -1) {
          var url = api_url + 'announcements/update'
          this.$http.post(url, upcm).then(res => {
            Object.assign(app.announcements[editedIndex], upcm)
          }, err => {

          })
        } else {
          var url = api_url + 'announcements/create'
          this.$http.post(url, upcm).then(res => {
            upcm.published_at = moment()
            upcm.announcement_id = res.body.data
            this.announcements.push(upcm)
          }, err => {

          })
        }
        this.close()
      },
      fromNow (date) {
        return moment(date).fromNow();
      },
  	}
});