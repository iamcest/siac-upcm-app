/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      empty_message: 'No hay datos disponibles',
      birthdate_modal: '',
      entry_date_modal: '',
      birthdate_dialog: '',
      entry_date_dialog: '',
      appointment_date_dialog: '',
      appointment_time_dialog: '',
      exam_date_dialog: '',
      menu: '',
      tab: null,
      dialog: false,
      dialogDelete: false,
      patients: [],
      headers: [
        {text: 'N° de historia', align: 'start', value: 'patient_id', width:"auto" },
        { text: 'Nombre y Apellido', value: 'full_name', width:"auto" },
        { text: 'Teléfono', value: 'telephone', width:"auto" },
        { text: 'Email', value: 'email', width:"auto" },
        { text: 'Dirección', value: 'address', width:"auto" },
        { text: 'Acciones', value: 'actions', align:'center', sortable: false },
      ],
      patients: [],
      patient_appointments: {
        dialog: false,
        dialogDelete: false,
        date_modal: false,
        time_modal: false,
        select: false,
        types: [
          {
            text: 'Primera vez',
          },
          {
            text: 'Consulta de chequeo',
          }
        ],
        doctors: [],
        headers: [
          {text: 'Fecha de la cita', align: 'start', value: 'appointment_date' },
          { text: 'Hora de la cita', value: 'appointment_time' },
          { text: 'Doctor', value: 'full_name' },
          { text: 'Tipo de cita', value: 'appointment_type' },
          { text: 'Motivo de la cita', value: 'appointment_reason' },
          { text: 'Acciones', value: 'actions', align:'center', sortable: false },
        ],
        appointments: [],
        editedItem: {},
        editedIndex: -1,
      },
      patient_anthropometry: {
        weight: '',
        height: '',
        abdominal_waist: '',
      },
      patient_laboratory_exams: {
        laboratory_exam: false,
        dialog: false,
        dialogDelete: false,
        modal: false,
        headers: [
          {text: 'Exámen de Laboratorio', align: 'start', value: 'exam', width:"auto" },
          { text: 'Acción', value: 'action', width:"auto" },
        ],
        table_options: {
          disablePagination: true,
          itemsPerPage: 15,
          hideDefaultFooter: true,
        },
        exam_headers: [
          {text: 'Fecha del exámen', align: 'start', value: 'date', width:"auto" },
          { text: 'Resultado', value: 'result', width:"auto" },
          { text: 'Acción', value: 'action', width:"auto" },
        ],
        exam_results: [
          {
            id: 1,
            date: '2020-11-25',
            result: '60',
          },
          {
            id: 2,
            date: '2020-11-10',
            result: '70',
          },
          {
            id: 3,
            date: '2020-11-05',
            result: '50',
          },
          {
            id: 4,
            date: '2020-10-15',
            result: '55',
          },
        ],
        exams: [
          {
            exam: 'Hgb',
            nomenclature: 'g/dl',
          },
          {
            exam: 'Htc',
            nomenclature: '',
          },
          {
            exam: 'Glóbulos Blancos',
            nomenclature: 'mil/mm3',
          },
          {
            exam: 'Glucemia',
            nomenclature: 'mg/dL',
          },
          {
            exam: 'Hgb A1c',
            nomenclature: '%',
          },
          {
            exam: 'Tasa Filt Glom',
            nomenclature: 'mL/min',

          },
          {
            exam: 'Col Total',
            nomenclature: 'mg/dL',
          },
          {
            exam: 'Triglic',
            nomenclature: 'mg/dL',
          },
          {
            exam: 'Colesterol HDL',
            nomenclature: 'mg/dL',
          },
          {
            exam: 'Colesterol LDL',
            nomenclature: 'mg/dL',
          },
          {
            exam: 'Colesterol No HDL',
            nomenclature: 'mg/dL',
          },
        ],
        editedItem: {},
        defaultItem: {},
        selectedExam: {},
        editedIndex: -1,
      },
      patient_vital_signs: {
        takes: [
          {
            sitting: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            lying_down: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            standing: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
          },
          {
            sitting: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            lying_down: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            standing: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
          },
          {
            sitting: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            lying_down: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            standing: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
          },
          {
            sitting: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            lying_down: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
            standing: {
              pa_right_arm1: '',
              pa_right_arm2: '',
              pa_left_arm1: '',
              pa_left_arm2: '',
              breathing_rate: '',
              temperature: ''
            },
          },
        ],
      },
      patient_history: {
        diseases: [
          {
            title: 'HTA',
            item_prop: 'hta',
            form: [
              {
                title: 'IECAS',
                prop: 'iecas',
                cols: 2,
              },
              {
                title: 'BRA',
                prop: '',
                cols: 2,
              },
              {
                title: 'Ca',
                prop: 'ca',
                cols: 2,
              },
              {
                title: 'Diurético',
                prop: 'diuretic',
                cols: 2,
              },
              {
                title: 'Beta bloq',
                prop: 'block_beta',
                cols: 1,
              },
              {
                title: 'Bloq',
                prop: 'block',
                cols: 1,
              },
            ],
          },
          {
            title: 'DMT2',
            item_prop: 'dtm2',
            form: [
              {
                title: 'Metformina',
                prop: 'metformin',
                cols: 2,
              },
              {
                title: 'Insulina',
                prop: 'insulin',
                cols: 2,
              },
              {
                title: 'Sulfonilureas',
                prop: 'sulfonylureas',
                cols: 2,
              },
              {
                title: 'Inh DPP',
                prop: 'inh_dpp',
                cols: 2,
              },
              {
                title: 'I SLGT2',
                prop: 'i_slgt2',
                cols: 1,
              },
              {
                title: 'GL',
                prop: 'gl',
                cols: 1,
              },
            ],
          },
          {
            title: 'Dislipidemia',
            item_prop: 'dyslipidemia',
            form: [
              {
                title: 'Estatinas',
                prop: 'statins',
                cols: 2,
              },
              {
                title: 'EZT',
                prop: 'ezt',
                cols: 2,
              },
              {
                title: 'Fibratos antagonista',
                prop: 'antagonist_fibrates',
                cols: 2,
              },
              {
                title: 'Omega 3',
                prop: 'omega3',
                cols: 2,
              },
            ],
          },
          {
            title: 'Tabaquismo',
            item_prop: 'smoking',
            form: [
              {
                title: 'Números de cigarros al día',
                prop: 'cigarettes_per_day',
                cols: 2,
              },
              {
                title: 'Test de Fageroom',
                prop: 'fageroom_test',
                cols: 2,
              },
              {
                title: 'Ha dejado de fumar alguna vez',
                prop: 'no_smoking_frecuency',
                select: true,
                cols: 2,
              },
              {
                title: 'Desea dejar de fumar',
                select: true,
                prop: 'no_smoking_wish',
                cols: 2,
              },
              {
                title: 'Breve consejería',
                prop: 'short_advice',
                textarea: true,
                cols: 2,
              },
            ],
          },
        ],
        select: [
          {
            text: 'Sí',
            value: 1
          },
          {
            text: 'No',
            value: 0
          },
        ],
        form: {
          hta: {},
          dtm2: {},
          dyslipidemia: {},
          smoking: {},
          emergency_hta_history: '',
          emergency_diabetes_history: '',
        }
      },
      genders: [
        {
          name: 'Masculino',
          gender: 'M',
        },
        {
          name: 'Femenino',
          gender: 'F',
        },
      ],
      communication_platforms: [
        {
          text: 'Whatsapp',
          val: 'whatsapp',
        },
        {
          text: 'Telegram',
          val: 'telegram',
        },
        {
          text: 'Mensaje de texto',
          val: 'sms',
        },
      ],
      document_types: [
        {
          text: 'DNI',
          value: 'DNI'
        },        
        {
          text: 'Pasaporte',
          value: 'pasaporte'
        },
      ],
      editedIndex: -1,
      editedItem: {
      },
      defaultItem: {
        telegram: '0',
        whatsapp: '0',
        sms: '0',
      },
    },

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Añadir nuevo paciente' : 'Editar ficha del paciente - N° de historia: ' + this.editedItem.patient_id
      },
      AppointmentFormTitle () {
        const obj =this.patient_appointments;
        return obj.editedIndex === -1 ? 'Añadir nueva cita' : 'Editar cita del paciente '
      }
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
      appointmentDialog (val) {
        val || this.closeAppointment()
      },
      appointmentDialogDelete (val) {
        val || this.closeAppointmentDelete()
      },
    },

    created () {
      this.initialize()
    },

    mounted () {
    },

    methods: {
      initialize () {
        var url = api_url + 'patients/get'
        this.$http.get(url).then( res => {
          this.patients = res.body
        }, err => {

        })
      },
      initializeAppointments() {
        var app = this
        app.getDoctors()
        var url = api_url + 'appointments/get/'+app.editedItem.patient_id
        app.$http.get(url).then( res => {
          app.patient_appointments.appointments = res.body
        }, err => {

        })
      },
      editItem (item) {
        var app = this
        app.editedIndex = app.patients.indexOf(item)
        app.editedItem = Object.assign({}, item)
        app.dialog = true
      },
      editAppointmentItem (item) {
        var obj = this.patient_appointments
        obj.editedIndex = obj.appointments.indexOf(item)
        obj.editedItem = Object.assign({}, item)
        obj.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.patients.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteAppointmentItem (item) {
        var obj = this.patient_appointments
        obj.editedIndex = obj.appointments.indexOf(item)
        obj.editedItem = Object.assign({}, item)
        obj.dialogDelete = true
      },

      deleteExamItem (item) {
        var obj = this.patient_laboratory_exams
        obj.editedIndex = obj.exam_results.indexOf(item)
        obj.editedItem = Object.assign({}, item)
        obj.dialogDelete = true
      },

      deleteItemConfirm () {
        var app = this
        var url = api_url + 'patients/delete'
        app.$http.post(url, app.editedItem).then( res => {
          app.loading = false
          if (res.body.status == "success") {
              this.patients.splice(this.editedIndex, 1)
              this.closeDelete()
          }
        }, err => {

        })
      }, 

      deleteAppointmentItemConfirm () {
        var app = this
        var obj = app.patient_appointments
        var url = api_url + 'appointments/delete'
        app.$http.post(url, {appointment_id: obj.editedItem.appointment_id}).then( res => {
          app.loading = false
          if (res.body.status == "success") {
            obj.appointments.splice(obj.editedIndex, 1)
          }
          app.closeAppointmentDelete()
        }, err => {
          app.closeAppointmentDelete()
        })
      },

      deleteExamItemConfirm () {
        var obj = this.patient_laboratory_exams
        obj.exam_results.splice(obj.editedIndex, 1)
        this.closeExamDelete()
      },      

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeAppointment () {
        var obj = this.patient_appointments
        obj.dialog = false
        this.$nextTick(() => {
          obj.editedItem = Object.assign({}, this.defaultItem)
          obj.editedIndex = -1
        })
      },

      closeExam () {
        var obj = this.patient_laboratory_exams
        this.$nextTick(() => {
          obj.editedItem = Object.assign({}, this.defaultItem)
          obj.editedIndex = -1
        })
      },

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeAppointmentDelete () {

        var obj = this.patient_appointments
        obj.dialogDelete = false
        this.$nextTick(() => {
          obj.editedItem = Object.assign({}, this.defaultItem)
          obj.editedIndex = -1
        })
      },

      closeExamDelete () {

        var obj = this.patient_laboratory_exams
        obj.dialogDelete = false
        this.$nextTick(() => {
          obj.editedItem = Object.assign({}, this.defaultItem)
          obj.editedIndex = -1
        })
      },

      save () {
        var app = this
        app.loading = true
        if (app.editedIndex > -1) {
          var url = api_url + 'patients/update'
          app.$http.post(url, app.editedItem).then( res => {
            app.loading = false
            if (res.body.status == "success") {
              Object.assign(app.patients[app.editedIndex], app.editedItem)
            }
          }, err => {

          })
        } else {
          var url = api_url + 'patients/create'
          app.$http.post(url, app.editedItem).then( res => {
            app.loading = false
            if (res.body.status == "success") {
              app.editedItem.patient_id = res.body.data.patient_id
              app.patients.push(app.editedItem)
            }
          }, err => {
            app.loading = false
          })
        }
        app.close()
      },

      saveAppointment () {
        var app = this
        var obj = app.patient_appointments
        obj.editedItem.patient_id = app.editedItem.patient_id
        obj.editedItem.full_name = app.getDoctorFullName(obj.editedItem.user_id)
        app.loading = true
        if (obj.editedIndex > -1) {
          var url = api_url + 'appointments/update'
          app.$http.post(url, obj.editedItem).then( res => {
            app.loading = false
            if (res.body.status == "success") {
              Object.assign(obj.appointments[obj.editedIndex], obj.editedItem)
              app.closeAppointment()
              return true
            }
            app.closeAppointment()
          }, err => {
            app.loading = false
            app.closeAppointment()
          })
        } else {
          var url = api_url + 'appointments/create'
          app.$http.post(url, obj.editedItem).then( res => {
            app.loading = false
            if (res.body.status == "success") {
              obj.editedItem.appointment_id = res.body.data.appointment_id
              obj.appointments.push(obj.editedItem)
              app.closeAppointment()
              return true
            }
            app.closeAppointment()
          }, err => {
            app.loading = false
            app.closeAppointment()
          })
        }
      },

      saveExam () {
        var obj = this.patient_laboratory_exams
        obj.exam_results.push(obj.editedItem)
        this.closeExam()
      },

      getDoctors () {
        var app = this
        var url = api_url + 'members/get-doctors'
        if (app.patient_appointments.doctors.length == 0) {
          app.patient_appointments.select = true
          app.$http.get(url).then(res => {
            app.patient_appointments.select = false
            app.patient_appointments.doctors = res.body
          }, err => {
            app.patient_appointments.select = false
          })
        }
      },

      getDoctorFullName (id) {
        var obj = this.patient_appointments
        var results = obj.doctors.filter( (doctor) => { 
          return doctor.user_id == id;
        });
        return results[0]['full_name'];
      },

      showExamResults (item) {
        var obj = this.patient_laboratory_exams
        obj.laboratory_exam = true
        obj.selectedExam = item

      },

    }
});