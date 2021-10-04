/*VUE INSTANCE*/
moment.locale('es');
let vm = new Vue({
  vuetify,
  el: '#siac-suite-container',
  data: {
    uid: uid,
    search_member: '',
    search_external_member: '',
    is_opened: false,
    getting_messages_loading: false,
    privateMessagesInterval: '',
    group_dialog: false,
    dialog_kick: false,
    dialog_member_type: false,
    dialog_delete_group: false,
    dialog_leave_group: false,
    dialog_add_external_member: false,
    private_chat: false,
    external_upcm_dialog: false,
    loading: false,
    group_loading: false,
    upload_file: false,
    edit_group_name: false,
    user_group_admin: false,
    tab: null,
    message: ' ',
    file_media: null,
    files: [],
    chat: [],
    chat_copy: [],
    upcm_chats: [],
    upcm_members: [],
    upcm_external_members: [],
    group_chats: [],
    group_members: [],
    external_chats: [],
    external_members: [],
    selected_member: [],
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
      telephone: '',
      messages: [],
    },
    external_selected_member: {},
    member_index: -1,
    group_index: -1,
  },

  computed: {
  },

  created() {
    this.initialize()
  },

  mounted() {
  },

  methods: {

    initialize() {
      this.getUPCMChats()
      this.getExternalChats()
      this.getGroupChats()
    },

    getUPCMChats() {
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

    getAllMembers() {
      var app = this
      var url = api_url + "chat/get-all-upcm-members"
      app.dialog_add_external_member = true
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          var upcm_members = []
          res.body.forEach((e) => {
            var member = {
              first_name: e.first_name,
              avatar: e.avatar,
              last_name: e.last_name,
              full_name: e.first_name + ' ' + e.last_name,
              user_id: e.user_id,
              email: e.email,
              telephone: e.telephone,
              rol: e.rol,
            }
            upcm_members.push(member)
          })
          app.upcm_external_members = upcm_members
          app.upcm_external_members_list = upcm_members
        }
      }, err => {

      })
    },

    getExternalChats() {
      var app = this
      var url = api_url + "chat/get-external-upcm-chats"
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          app.external_chats = res.body
        }
      }, err => {

      })
    },

    getGroupChats() {
      var app = this
      var url = api_url + "group-chat/get"
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          app.group_chats = res.body
        }
      }, err => {

      })
    },

    getGroupMembers() {
      var app = this
      var url = api_url + "group-chat/get-members"
      var id = { group_id: app.opened_chat.group_id }
      app.user_group_admin = false
      app.$http.post(url, id).then(res => {
        if (res.body.length > 0) {
          app.group_members = res.body
          res.body.forEach((e) => {
            if (e.user_id == uid && e.member_type == 'administrador')
              app.user_group_admin = true
          })
        }
      }, err => {

      })
    },

    getMessages() {
      var app = this
      var url = api_url + "chat/get-messages"
      data = { sender: app.opened_chat.user_id, receiver: uid }
      app.chat = []
      app.getting_messages_loading = true
      app.$http.post(url, data).then(res => {
        if (res.body.length > 0) {
          app.chat = res.body
          app.chat_copy = app.filterMessagesByDate(res.body)
          app.markAsSeen(data)
        }
        else {
          app.chat = []
          app.chat_copy = []
        }
        if (app.MessagesInterval != '') {
          clearInterval(app.MessagesInterval)
        }
        (function () {
          vm.getUnreadMessages()
          vm.$data.MessagesInterval = setTimeout(arguments.callee, 2000);
        })();
        app.getting_messages_loading = false
      }, err => {

      })
    },

    getGroupMessages() {
      var app = this
      var url = api_url + "group-chat/get-messages"
      data = { group_id: app.opened_chat.group_id }
      app.chat = []
      app.$http.post(url, data).then(res => {
        if (res.body.length > 0) {
          app.chat = res.body
          app.chat_copy = app.filterMessagesByDate(res.body)
        }
        else {
          app.chat = []
          app.chat_copy = []
        }
        app.getGroupMembers()
        if (app.MessagesInterval != '') {
          clearInterval(app.MessagesInterval)
        }
        (function () {
          vm.getUnreadMessages()
          vm.$data.MessagesInterval = setTimeout(arguments.callee, 2000);
        })();
        app.getting_messages_loading = false
      }, err => {

      })
    },

    getUnreadMessages() {
      var app = this
      if (!app.getting_messages_loading) {
        if (app.private_chat) {
          app.getting_messages_loading = true
          var data = { sender: app.opened_chat.user_id, receiver: uid }
          var url = api_url + "chat/get-unread-messages"
          app.$http.post(url, data).then(res => {
            if (res.body.length > 0) {
              res.body.forEach( e => {
                if (parseInt(e.receiver) == uid) {
                  app.chat.push(e)
                }
              });
              app.chat_copy = app.filterMessagesByDate(app.chat)
              app.markAsSeen(data, true)
            }
            app.getting_messages_loading = false
          }, err => {
            app.getting_messages_loading = false
          })
        }
        else if (!app.private_chat && app.opened_chat.hasOwnProperty('group_name')) {
          var url = api_url + "group-chat/get-unread-messages"
          var data = {
            group_id: app.opened_chat.group_id,
            sender: uid, 
            date: app.chat[app.chat.length - 1].message_date,
            time: app.chat[app.chat.length - 1].message_time,
          }
          app.$http.post(url, data).then(res => {
            if (!app.getting_messages_loading) {
              if (res.body.length > 0) {
                res.body.forEach( e => {
                  app.chat.push(e)
                });
                app.chat_copy = app.filterMessagesByDate(app.chat)
              }
              app.getting_messages_loading = false
            }
          }, err => {
            app.getting_messages_loading = false
          })
        }
      }
    },

    saveGroup() {
      var app = this
      var url = api_url + 'group-chat/create-group'
      if (app.group_form.group_name == '' || app.group_form.members.length == 0) {
        return false
      }
      app.group_loading = true
      app.$http.post(url, app.group_form).then(res => {
        app.group_loading = false
        if (res.body.status == 'success') {
          var data = {
            group_id: res.body.data,
            group_name: app.group_form.group_name
          }
          app.group_chats.push(data)
          app.group_dialog = false
        }
      }, err => {
        app.group_loading = false
      })
    },

    saveGroupTitle() {
      var app = this
      var data = {}
      var url = api_url + 'group-chat/edit-group-name'
      data = { group_id: app.opened_chat.group_id, group_name: app.opened_chat.group_name_copy }
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          app.opened_chat.group_name = data.group_name
          app.group_chats[app.group_index].group_name = data.group_name
          app.edit_group_name = false
        }
      }, err => {

      })
    },

    sendMessage() {
      var app = this
      var data = []
      var current_date = moment().format('YYYY-MM-DD')
      var current_time = moment().format("hh:mm:ss")
      if (app.message == "" && !upload_file)
        return false
      var raw = {
        receiver: app.opened_chat.user_id,
        sender: uid,
        message: app.message,
        message_time: current_time,
        message_date: current_date,
        file: null,
      }
      data = new FormData();
      app.loading = true
      data.append('receiver', app.opened_chat.user_id)
      data.append('message', app.message)
      data.append('file', app.file_media)
      var url = api_url + "chat/send-message"
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          raw.file = res.body.data
          app.file_media = null
          app.loading = false
          app.upload_file = false
          app.chat.push(raw)
          app.chat_copy = app.filterMessagesByDate(app.chat)
          app.message = ''
        }
      }, err => {
        app.loading = false
      })
    },

    markAsSeen(data, noScroll = false) {
      var app = this
      var url = api_url + "chat/read-messages"
      app.$http.post(url, data).then(res => {
        if(!noScroll) {
          app.scrollChat()
        }
      }, err => {
        if(!noScroll) {
          app.scrollChat()
        }
      })
    },

    sendGroupMessage() {
      var app = this
      var data = []
      var current_date = moment().format('YYYY-MM-DD')
      var current_time = moment().format("hh:mm:ss")
      if (app.message == "" && !upload_file)
        return false
      var raw = {
        group_id: app.opened_chat.group_id,
        sender: uid,
        message: app.message,
        message_time: current_time,
        message_date: current_date,
        file: null,
      }
      data = new FormData();
      app.loading = true
      data.append('group_id', app.opened_chat.group_id)
      data.append('message', app.message)
      data.append('file', app.file_media)
      var url = api_url + "group-chat/send-message"
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          raw.file = res.body.data.file
          raw.message_time = res.body.data.message_time
          raw.message_date = res.body.data.message_date
          app.file_media = null
          app.loading = false
          app.upload_file = false
          app.chat.push(raw)
          app.chat_copy = app.filterMessagesByDate(app.chat)
          app.message = ''
        }
      }, err => {
        app.loading = false
      })
    },

    getTimeHour(d) {
      return moment(d).format("h:mm")
    },

    openChat(item) {
      var app = this
      app.opened_chat = Object.assign({}, item)
      app.dialog_add_external_member = false
      app.private_chat = true
      app.is_opened = true
      app.getMessages()
    },

    openGroupChat(item) {
      var app = this
      app.private_chat = false
      app.is_opened = true
      app.group_index = app.group_chats.indexOf(item)
      app.opened_chat = Object.assign({}, item)
      app.opened_chat.group_name_copy = app.opened_chat.group_name
      app.getGroupMessages()
    },

    scrollChat() {
      var container = document.getElementById('chat_container')
      container.scroll(0, window.innerHeight * 4)
    },

    getExt(file_name) {
      var ext = file_name.split('.')
      return ext[1]
    },

    getExtIcon(file_name) {
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

    prevImage(src, title) {
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
        hidden: function () {
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

    searchExternalMembers(e) {
      var app = this
      if (!app.search_external_member) {
        app.upcm_external_members = app.upcm_external_members_list;
      }

      app.upcm_external_members = app.upcm_external_members_list.filter((member) => {
        return member.full_name.toLowerCase().indexOf(app.search_external_member.toLowerCase()) > -1;
      });
    },

    assign_member(item) {
      var app = this
      app.member_index = app.group_members.indexOf(item)
      app.selected_member = Object.assign({}, item)
    },

    deleteMember() {
      var app = this
      var data = { group_id: app.opened_chat.group_id, user_id: app.selected_member.user_id }
      var url = api_url + 'group-chat/kick-member'
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          app.group_members.splice(app.member_index, 1)
          app.closeDialogs()
        }
      }, err => {

      })
    },

    deleteGroup() {
      var app = this
      var data = { group_id: app.opened_chat.group_id }
      var url = api_url + 'group-chat/delete-group'
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          app.group_chats.splice(app.group_index, 1)
          app.is_opened = false
          app.closeGroupDialog()
        }
      }, err => {

      })
    },

    leaveGroup() {
      var app = this
      var data = { group_id: app.opened_chat.group_id, user_id: uid }
      var url = api_url + 'group-chat/leave'
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          app.group_chats.splice(app.group_index, 1)
          app.is_opened = false
          app.dialog_delete_group = false
        }
      }, err => {

      })
    },

    openMemberTypeDialog(item) {
      var app = this
      app.assign_member(item)
      app.dialog_member_type = true
    },

    openKickDialog(item) {
      var app = this
      app.assign_member(item)
      app.dialog_kick = true
    },

    closeGroupDialog() {
      var app = this
      app.dialog_delete_group = false
      app.group_index = -1
      app.opened_chat = Object.assign({}, {})
      app.group_members = []
    },

    closeDialogs() {
      var app = this
      app.dialog_kick = false
      app.dialog_member_type = false
      app.member_index = -1
      app.selected_member = Object.assign({}, {})
    },

    changeMemberType() {
      var app = this
      var data = { group_id: app.opened_chat.group_id, user_id: app.selected_member.user_id, rol: app.selected_member.member_type }
      var url = api_url + 'group-chat/change-member-type'
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          app.selected_member.member_type = app.selected_member.member_type == 'administrador' ? 'miembro' : 'administrador'
          Object.assign(app.group_members[app.member_index], app.selected_member)
          app.closeDialogs()
        }
      }, err => {

      })
    },

    filterMessagesByDate(messages) {
      var results = _.chain(messages).groupBy('message_date').value()
      return results
    },

    formatDate(d) {
      var format_date = moment(d).format('DD [de] MMMM')
      var date = moment(d).calendar().split(" ")
      if (date[0] == 'hoy' || date[0] == 'ayer') {
        format_date = date[0]
      }
      return format_date
    },

  }
});