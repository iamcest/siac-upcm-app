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
        { text: 'Fecha de publicación', value: 'date' },
        { text: 'Acciones', value: 'actions', align:'center', sortable: false },
      ],
      editedIndex: -1,
      editedItem: {},
      defaultItem: {
        date: current_date
      },
    },

    computed: {
    },

    watch: {
    },

    created () {
    },

    mounted () {
    },

    methods: {

  	}
});