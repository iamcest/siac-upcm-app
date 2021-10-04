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
    send_to_options: [
      {
        text: 'Todas las unidades',
        value: '0'
      },
      {
        text: 'A todos los integrantes de mi unidad',
        value: '1'
      },
      {
        text: 'Integrantes específicos de mi unidad',
        value: '2'
      },
      {
        text: 'Unidades específicas',
        value: '3'
      },
      {
        text: 'Miembros específicos de otra unidad',
        value: '4'
      },
    ],
    announcements: [],
    my_upcm_members: {
      loading: false,
      items: [],
    },
    upcms: {
      loading: false,
      items: [],
      filtered_items: [],
      search: '',
    },
    external_upcm_members: {
      loading: false,
      items: [],
    },
    author: {},
    editedItem: {},
    defaultItem: {
      title: '',
      content: '',
      send_to: 0,
      upcm_id: '',
      upcms: [],
      members: [],
      published_at: moment().format('YYYY-MM-DD hh:mm:ss')
    },
  },

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'Crear anuncio' : 'Editar anuncio'
    },

    filterByDate() {
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

    announcementBtnTitle() {
      return this.all_announcements ? 'Mis anuncios' : 'Todos los anuncios'
    },
  },

  created() {
    this.initializeMyMembers()
    this.initializeUPCMS()
    this.initialize()
  },

  mounted() {
  },

  methods: {
    initialize() {
      var url = api_url + 'announcements/get'
      this.$http.get(url).then(res => {
        res.body.forEach(e => {
          if (e.members.length > 0) {
            e.members.forEach(m => {
              m.text = `${m.first_name} ${m.last_name}`
              m.value = m.user_id
            })
          }
          if (e.upcms.length > 0) {
            e.upcms.forEach(u => {
              u.text = u.upcm_name
              u.value = u.upcm_id
            })
          }
        })
        this.announcements = res.body;
      }, err => {

      })
    },

    initializeUPCMS() {
      var url = api_url + 'upcms/upcm-list'
      this.$http.get(url).then(res => {
        var items = []
        if (res.body.length > 0) {
          res.body.forEach(e => {
            e.text = e.upcm_name
            e.value = e.upcm_id
          });
          items = res.body
        }
        this.upcms.filtered_items = res.body;
        this.upcms.items = res.body;
      }, err => {

      })
    },

    initializeMyMembers() {
      var url = api_url + 'members/upcm-members'
      this.$http.get(url).then(res => {
        var items = []
        if (res.body.length > 0) {
          res.body.forEach(e => {
            if (e.user_id != uid) {
              e.text = `${e.first_name} ${e.last_name}`
              e.value = e.user_id
              items.push(e)
            }
          });
        }
        this.my_upcm_members.items = items;
      }, err => {

      })
    },

    getExternalUPCMMembers() {
      var url = api_url + 'members/upcm-members/' + this.editedItem.upcm_id
      this.$http.get(url).then(res => {
        var items = []
        if (res.body.length > 0) {
          res.body.forEach(e => {
            e.text = `${e.first_name} ${e.last_name}`
            e.value = e.user_id
            items.push(e)
          });
        }
        this.external_upcm_members.items = items;
      }, err => {

      })
    },

    joinChat(item) {
      var app = this
      app.join_loading = true
      var url = api_url + 'group-chat/join-group'
      var data = { group_id: app.author.group_chat, user_id: uid }
      app.$http.post(url, data).then(res => {
        app.join_loading = false
        if (res.body.status == 'success') {
          app.author.user_member = uid
          window.open(window.location.origin + '/suite/chat/', '_blank');
        }
      }, err => {

      })
    },

    editItem(item) {
      this.editedIndex = this.announcements.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem(item) {
      this.editedIndex = this.announcements.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteItemConfirm() {
      var id = this.editedItem.announcement_id;
      var url = api_url + 'announcements/delete'
      this.$http.post(url, { announcement_id: id }).then(res => {
        if (res.body.status == "success")
          this.announcements.splice(this.editedIndex, 1)
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

    save() {
      var app = this
      var editedIndex = app.editedIndex
      if (app.editedIndex > -1) {
        var url = api_url + 'announcements/update'
        app.$http.post(url, app.editedItem).then(res => {
          if (res.body.status == 'success')
            Object.assign(app.announcements[editedIndex], app.editedItem)
          app.close()
          activateAlert(res.body.message, res.body.status)
        }, err => {
          app.close()
        })
      } else {
        var url = api_url + 'group-chat/create-group'
        app.$http.post(url, { group_name: app.editedItem.title }).then(res => {
          if (res.body.status == "success") {
            var group_id = res.body.data
            var url = api_url + 'announcements/create'
            app.editedItem.group_chat = group_id
            app.$http.post(url, app.editedItem).then(res => {
              if (res.body.status == "success") {
                app.editedItem.published_at = moment().format('YYYY-MM-DD hh:mm:ss')
                app.editedItem.user_id = res.body.data.user_id
                app.editedItem.announcement_id = res.body.data.announcement_id
                app.announcements.push(app.editedItem)
              }
              activateAlert(res.body.message, res.body.status)
              app.close()
            }, err => {
              app.close()
            })
          }
        })
      }
    },

    switchAnnouncenments(user) {
      if (this.all_announcements) this.all_announcements = false
      else this.all_announcements = true
      this.user_id = user
    },

    get_announcement(item) {
      var app = this
      app.author = {}
      var url = api_url + 'announcements/get-author'
      app.viewDialog = true
      app.editedItem = Object.assign({}, item)
      var data = { announcement_id: item.announcement_id, group_id: item.group_chat }
      app.$http.post(url, data).then(res => {
        app.author = res.body;
      }, err => {

      })
    },

    searchUPCMS() {
      var app = this
      if (app.upcms.search == '') {
        app.upcms.filtered_items = app.upcms.items;
      }

      app.upcms.filtered_items = app.upcms.items.filter(upcm => {
        return upcm.text.toLowerCase().indexOf(app.upcms.search.toLowerCase()) > -1;
      });
    },

    clearSendToInputs() {
      var item = this.editedItem
      item.upcms = []
      item.members = []
      item.upcm_id = ''
    },

    fromNow(date) {
      return moment(date).fromNow();
    },
  }
});