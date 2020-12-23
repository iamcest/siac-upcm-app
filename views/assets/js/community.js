/*VUE INSTANCE*/
moment.locale('es')
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      articles: [],
    },

    computed: {

      filterByDate () {
        return this.articles.sort((a, b) => (a.published_at < b.published_at) ? 1 : -1)
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

      fromNow (date) {
        return moment(date).format('LL');
      },

  	}
});