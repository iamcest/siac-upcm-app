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
      valid: false,     
      dialog: false,
      dialogDelete: false,
      rules: [
        value => !value || value.size < 3000000 || 'La imágen no debe tener un tamaño mayor a 3 MB!',
      ],
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
      }
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
      editedItem: {
        deep: true,
        handler: () => {
          if (this.editedIndex == -1)
            vm.$refs.form.validate()
        }
      }
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
        this.editedItem.image = null
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
            if (res.body.status == 'success') 
              this.articles.splice(this.editedIndex, 1)              
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

      formatDate (d) {
        var article_date = new Date(d)
        return article_date.toLocaleString('es-ES', date_options)
      },

      save () {
        var app = this
        var editedIndex = app.editedIndex
        var article = app.editedItem
        var data = new FormData();
        data.append('image', article.image);
        data.append('title', article.title);
        data.append('description', article.description);
        data.append('content', article.content);
        if (this.editedIndex > -1) {
          data.append('article_id', article.article_id);
          var url = api_url + 'articles/update'
          this.$http.post(url, data, { headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}}).then(res => {
            if (res.body.status == "success")
              article.slug = res.body.data.slug
              Object.assign(app.articles[editedIndex], article)
            activateAlert(res.body.message, res.body.status)
          }, err => {

          })
        } else {
          var url = api_url + 'articles/create'
          this.$http.post(url, data).then(res => {
            if (res.body.status == "success") 
              app.editedItem.title = article.title
              app.editedItem.content = article.content
              app.editedItem.description = article.description
              app.editedItem.image = null
              app.editedItem.published_at = current_date
              app.editedItem.article_id = res.body.data.article_id
              app.editedItem.slug = res.body.data.slug
              this.articles.push(app.editedItem)
            activateAlert(res.body.message, res.body.status)
          }, err => {

          })
        }
        this.close()
      },

  	}
});