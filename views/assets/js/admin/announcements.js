/*VUE INSTANCE*/
moment.locale('es')
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      barAlert: false,
      barTimeout: 1000,
      barMessage: '',
      barType: '',
      loading: false,
      join_loading: false,
      dialog: false,
      dialogDelete: false,
      viewDialog: false,
      all_announcements: true,
      user_id: -1,
      uid: uid,
      editedIndex: -1,
      announcements: [],
      author: {},
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

      filterByDate () {
        if (!this.all_announcements) {
          var user_id = this.user_id
          var my_announcements = this.announcements.filter(announcement => {
            return announcement.user_id == user_id 
          })  
          var my_announcements = my_announcements.sort((a, b) => (a.published_at < b.published_at) ? 1 : -1)
          return my_announcements
        }
        return this.announcements.sort((a, b) => (a.published_at < b.published_at) ? 1 : -1)
      },

      announcementBtnTitle () {
        return this.all_announcements ? 'Mis anuncios' : 'Todos los anuncios'
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
          this.announcements = res.body;
        }, err => {

        })
      },

      editItem (item) {
        this.editedIndex = this.announcements.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      joinChat (item) {
        var app = this
        app.join_loading = true
        var url = api_url + 'group-chat/join-group'
        var data = {group_id: app.author.group_chat, user_id: uid}
        app.$http.post(url, data).then(res => {
          app.join_loading = false
          if (res.body.status == 'success') {
            app.author.user_member = uid
          }
        }, err => {

        })
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
        if (app.editedIndex > -1) {
          var url = api_url + 'announcements/update'
          app.$http.post(url, announcement).then(res => {
            if (res.body.status == 'success') 
              Object.assign(app.announcements[editedIndex], app.editedItem)
            activateAlert(res.body.message, res.body.status)
          }, err => {

          })
        } else {
          var url = api_url + 'group-chat/create-group'
          app.$http.post(url, {group_name: app.editedItem.title}).then(res => {
            if (res.body.status == "success") {
              var group_id = res.body.data
              var url = api_url + 'announcements/create'
              app.editedItem.group_chat = group_id
              app.$http.post(url, app.editedItem).then(res => {
                app.editedItem.published_at = moment()
                app.editedItem.user_id = res.body.data.user_id
                app.editedItem.announcement_id = res.body.data.announcement_id
                app.announcements.push(app.editedItem)
                activateAlert(res.body.message, res.body.status)
              }, err => {

              })
            }
          })
        }
        app.close()
      },

      switchAnnouncenments(user) {
        if (this.all_announcements) this.all_announcements = false
        else this.all_announcements = true
        this.user_id = user
      },

      get_announcement (item) {
        var app = this
        app.author = {}  
        var url = api_url + 'announcements/get-author'
        app.viewDialog = true
        app.editedItem = Object.assign({}, item)
        var data = {announcement_id: item.announcement_id, group_id: item.group_chat}
        app.$http.post(url, data).then(res => {
          app.author = res.body;
        }, err => {

        })
      },

      fromNow (date) {
        return moment(date).fromNow();
      },
    }
});