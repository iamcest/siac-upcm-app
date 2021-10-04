/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      pcsk9_item: false,
      ezt_item: false,
      ao3_fibratos_item: false,
      treatment: {
        active: false,
        text: '',
      },
      diagnostic: '',
      c_ldl: '',
      c_no_hdl: '',
      tg: '',
    },

    watch: {
      c_ldl: {
        handler: 'calc'
      },
      c_no_hdl: {
        handler: 'calc'
      },
      tg: {
        handler: 'calc'
      }
    },

    computed: {
      md_width () {
        if (this.c_ldl >= 70) {
          return 6
        }
        else {
          return 12
        }
      },
    },

    created () {
    },

    mounted () {
    },

    methods: {
      calc () {
        var app = this
        var c_ldl = parseInt(this.c_ldl)
        var c_no_hdl = parseInt(this.c_no_hdl)
        var tg = parseInt(this.tg)

        app.diagnostic = ''
        app.treatment.active = false
        app.treatment.text = ''
        app.ao3_fibratos_item = false
        app.ezt_item = false
        app.pcsk9_item = false

        if (c_ldl >= 70) {
          app.diagnostic = 'No óptimo'
          if (tg >= 200 && c_no_hdl >= 100) {
            app.treatment.active = true
            app.ao3_fibratos_item = true
          }
          else {
            if (tg < 200 && c_no_hdl < 100) {
              app.treatment.active = true
              app.pcsk9_item = true
              app.ezt_item = true
            }
          }
        }
        else if (c_ldl <= 50) {
          app.diagnostic = 'óptimo'
        }
        else if (c_ldl > 50 && c_ldl <= 70) {
          app.diagnostic = 'No óptimo'
          if (tg >= 200 && c_no_hdl >= 100) {
            app.treatment.active = true
            app.ao3_fibratos_item = true
          }
          else{
            if (tg > 0 && c_no_hdl > 0) {
              app.treatment.active = true
              app.pcsk9_item = true
            }
          }
        }
      },
    }
});
