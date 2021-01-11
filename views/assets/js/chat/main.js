/*VUE INSTANCE*/
let vm = new Vue({
  vuetify,
  el: '#siac-suite-container',
  data: {
    uid: uid,
    search_member: '',
    search_external_member: '',
    group_dialog: false,
    private_chat: false,
    external_upcm_dialog: false,
    loading: false,
    group_loading: false,
    upload_file: false,
    tab: null,
    message: '',
    file_media: null,
    upcm_chats: [],
    upcm_members: [],
    group_chats: [],
    external_chats: [],
    external_members: [],
    group_form: {
      group_name: '',
      members: [],
      external_members: []
    },
    opened_chat: {
      user_id: '',
      first_name: '',
      last_name: '',
      email: '',
      rol: '',
      messages: [],
    },
    files: [],
    chat: [],
  },

  computed: {
  },

  created () {
    this.initialize()
  },

  mounted () {
  },

  methods: {

    initialize () {
      this.getUPCMChats()
      this.getExternalChats()
      this.getGroupChats()
    },

    getUPCMChats () {
      var app = this
      var url = api_url + "chat/get-upcm-chats"
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          app.upcm_chats = res.body
          var upcm_members = []
          res.body.forEach((e) => {
            if (e.user_id != uid) {
              var member = {
                full_name: e.first_name + ' ' + e.last_name,
                user_id: e.user_id,
              }
              upcm_members.push(member)
            }
          })
          app.upcm_members = upcm_members
          app.upcm_members_list = upcm_members
        }
      }, err => {

      })
    },

    getExternalChats () {
      var app = this
      var url = api_url + "chat/get-external-upcm-chats"
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          app.external_chats = res.body
        }
      }, err => {

      })
    },

    getGroupChats () {
      var app = this
      var url = api_url + "group-chat/get"
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          app.group_chats = res.body
        }
      }, err => {

      })
    },

    getMessages () {
      var app = this
      var url = api_url + "chat/get-messages"
      data = {sender: app.opened_chat.user_id, receiver: uid}
      app.chat = []
      app.$http.post(url, data).then(res => {
        if (res.body.length > 0) {
          app.chat = res.body
        }
      }, err => {

      })
    },

    getGroupMessages () {
      var app = this
      var url = api_url + "group-chat/get-messages"
      data = {group_id: app.opened_chat.group_id}
      app.chat = []
      app.$http.post(url, data).then(res => {
        if (res.body.length > 0) {
          app.chat = res.body
        }
      }, err => {

      })
    },

    saveGroup () {
      var app = this
      var url = api_url + 'group-chat/create-group'
      if (app.group_form.group_name == '' || app.group_form.members.length == 0) {
        return false
      }
      app.group_loading = true
      app.$http.post(url, app.group_form).then(res => {
        app.group_loading = false
        if (res.body.status == 'success') {
          app.group_chats.push(app.group_form)
          app.group_dialog = false
        }
      }, err => {
        app.group_loading = false
      })
    },

    sendMessage() {
      var app = this
      var data = []
      var current = moment().format("YYYY-MM-DD hh:mm:ss")
      if (app.message == "" && !upload_file) 
        return false
      var raw = {
        receiver: app.opened_chat.user_id,
        sender: uid,
        message: app.message,
        message_time: current,
        file: null,
      }
      data = new FormData();
      app.loading = true
      data.append('receiver', app.opened_chat.user_id)
      data.append('message', app.message)
      data.append('file', app.file_media)
      var url = api_url + "chat/send-message"
      app.$http.post(url, data).then( res => {
        if (res.body.status == 'success') {
          raw.file = res.body.data
          app.file_media = null
          app.loading = false
          app.upload_file = false
          app.chat.push(raw)
          app.message = ''
        }
      }, err => {
        app.loading = false
      })
    },

    sendGroupMessage() {
      var app = this
      var data = []
      var current = moment().format("YYYY-MM-DD hh:mm:ss")
      if (app.message == "" && !upload_file) 
        return false
      var raw = {
        group_id: app.opened_chat.group_id,
        sender: uid,
        message: app.message,
        message_time: current,
        file: null,
      }
      data = new FormData();
      app.loading = true
      data.append('group_id', app.opened_chat.group_id)
      data.append('message', app.message)
      data.append('file', app.file_media)
      var url = api_url + "group-chat/send-message"
      app.$http.post(url, data).then( res => {
        if (res.body.status == 'success') {
          raw.file = res.body.data
          app.file_media = null
          app.loading = false
          app.upload_file = false
          app.chat.push(raw)
          app.message = ''
        }
      }, err => {
        app.loading = false
      })
    },

    getTimeHour (d) {
      return moment(d).format("h:mm")
    },

    openChat (item) {
      var app = this
      app.opened_chat = Object.assign({}, item)
      app.private_chat = true
      app.getMessages()
    },

    openGroupChat (item) {
      var app = this
      app.private_chat = false
      app.opened_chat = Object.assign({}, item)
      app.getGroupMessages()
    },

    scrollChat () {
      var container = document.getElementById('chat_container')
      container.scroll(0, window.innerHeight * 4)
    },

    getExt (file_name) {
      var ext = file_name.split('.')
      return ext[1]
    },

    getExtIcon (file_name) {
      var ext = file_name.split('.')
      var file_icon = ''
      switch (ext[1]) {
        case 'pdf':
          file_icon = 'pdf'
          break;
        case 'docx':
          file_icon = 'word'
          break;
        case 'doc':
          file_icon = 'word'
          break;
        case 'ppt':
          file_icon = 'powerpoint'
          break;
        case 'pptx':
          file_icon = 'powerpoint'
          break;
        case 'ppt':
          file_icon = 'powerpoint'
          break;
        case 'xls':
          file_icon = 'excel'
          break;
        default:
          file_icon = 'document'
          break;
      }
      return file_icon
    },

    prevImage (src, title) {
      if (!src) return false
      var image = new Image();
      var protocol = window.location.protocol;
      var domain = protocol + '//' + window.location.hostname;
      if (window.location.hostname == 'localhost') {
        domain += ":" + window.location.port
      }
      image.src = domain + "/public/media/chat/" + src;
      if (!this.private_chat) {
        image.src = domain + "/public/media/group_chat/" + src;
      }
      var viewer = new Viewer(image, {
        hidden: function() {
          viewer.destroy();
        },
        title: [1, (image, imageData) => title],
      });

      viewer.show();
    },

    searchMembers(e) {
      var app = this
      if (!app.search_member) {
        app.upcm_members = app.upcm_members_list;
      }

      app.upcm_members = app.upcm_members_list.filter((member) => {
        return member.full_name.toLowerCase().indexOf(app.search_member.toLowerCase()) > -1;
      });
    },

  }
});