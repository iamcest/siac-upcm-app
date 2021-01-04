/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,     
      dialog: false,
      dialogDelete: false,
      headers: [
        {
          text: 'Nombre', align: 'start', value: 'upcm_name' },
        { text: 'Provincia / País', value: 'location' },
        { text: 'Clave de certificación', value: 'upcm_key' },
        { text: 'Fecha de registro', value: 'upcm_registered' },
        { text: 'Actions', value: 'actions', align:'center', sortable: false },
      ],
      upcms: [],
      countries: [],
      states: [],
      country_states: [],
      editedIndex: -1,
      editedItem: {},
      defaultItem: {
        upcm_registered: current_date
      },
    },

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Registrar UPCM' : 'Editar UPCM'
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
      this.loadCountries()
    },

    methods: {

      initialize () {
        var url = api_url + 'upcms/get'
        this.$http.get(url).then(res => {
          console.log(res)
          this.upcms = res.body;
        }, err => {

        })
      },

      editItem (item) {
        this.editedIndex = this.upcms.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.upcms.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        var id = this.editedItem.upcm_id;
        var url = api_url + 'upcms/delete'
        this.$http.post(url, {upcm_id: id}).then(res => {
          if (res.body.status == "success") 
            this.upcms.splice(this.editedIndex, 1)
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
          var url = api_url + 'upcms/update'
          this.$http.post(url, upcm).then(res => {
            Object.assign(app.upcms[editedIndex], upcm)
          }, err => {

          })
        } else {
          var url = api_url + 'upcms/create'
          this.$http.post(url, upcm).then(res => {
            upcm.upcm_registered = current_date
            upcm.upcm_id = res.body.data
            this.upcms.push(upcm)
          }, err => {

          })
        }
        this.close()
      },

      formatDate (d) {
        var upcm_date = new Date(d)
        return upcm_date.toLocaleString('es-ES', date_options)
      },

      loadCountries () {
        this.$http.get('/public/js/countries.min.json').then(res => {
          this.countries = res.body.countries
        }, err => {

        })
        this.$http.get('/public/js/states.min.json').then(res => {
          this.states = res.body.states
        }, err => {

        })
      },

      filterStates() {
        var states = this.states
        var country = this.editedItem.country_selected
        var results = states.filter(function (state) { 
          return state.id_country == country
        });
        return this.country_states = results
      },

      getCountryName() {
        var app = this;
        var countries = app.countries
        var country_selected = app.editedItem.country_selected
        var results = countries.filter(function (country) { 
          return country.id == country_selected
        });
        return app.editedItem.upcm_country = results[0].name;
      },

      getStateName() {
        var app = this;
        var states = app.states
        var state_selected = app.editedItem.state_selected
        var results = states.filter(function (state) { 
          return state.id == state_selected
        });
        return app.editedItem.upcm_state = results[0].name;
      },

      getLocation() {
        this.getCountryName();
        this.getStateName();
      }
  	}
});