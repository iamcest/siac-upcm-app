/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,     
      dialog: false,
      dialogDelete: false,
      headers: [
        { text: 'Título', align: 'start', value: 'title' },
        { text: 'Descripción', value: 'description' },
        { text: 'Fecha de publicación', value: 'published_at' },
        { text: 'Acciones', value: 'actions', align:'center', sortable: false },
      ],
      articles: [],
      editedIndex: -1,
      editedItem: {},
      defaultItem: {
        content: '',
        published_at: current_date
      },
    },

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Crear artículo para SIAC Comunidad' : 'Editar artículo'
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
        var url = api_url + 'articles/get'
        this.$http.get(url).then(res => {
          this.articles = res.body;
        }, err => {

        })
      },

      editItem (item) {
        this.editedIndex = this.articles.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.articles.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        var id = this.editedItem.article_id;
        var url = api_url + 'articles/delete'
        this.$http.post(url, {article_id: id}).then(res => {
            this.articles.splice(this.editedIndex, 1)
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

      formatDate (d) {
        var article_date = new Date(d)
        return article_date.toLocaleString('es-ES', date_options)
      },

      save () {
        var app = this
        var editedIndex = app.editedIndex
        var article = app.editedItem
        if (this.editedIndex > -1) {
          var url = api_url + 'articles/update'
          this.$http.post(url, article).then(res => {
            Object.assign(app.articles[editedIndex], article)
          }, err => {

          })
        } else {
          var url = api_url + 'articles/create'
          this.$http.post(url, article).then(res => {
            article.published_at = current_date
            this.members.push(article)
          }, err => {

          })
        }
        this.close()
      },

  	}
});