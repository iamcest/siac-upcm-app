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
      general_save: false,
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
          {text: 'Exámen de Laboratorio', align: 'start', value: 'name', width:"auto" },
          { text: 'Acción', value: 'action', width:"auto" },
        ],
        table_options: {
          disablePagination: true,
          itemsPerPage: 15,
          hideDefaultFooter: true,
        },
        exam_headers: [
          {text: 'Fecha del exámen', align: 'start', value: 'exam_date', width:"auto" },
          { text: 'Resultado', value: 'results', width:"auto" },
          { text: 'Acción', value: 'action', width:"auto" },
        ],
        exam_results: [],
        exams: [],
        editedItem: {},
        defaultItem: {},
        selectedExam: {},
        editedIndex: -1,
      },
      patient_vital_signs: {
        default: {
          sitting: {
            pa_right_arm1: 0,
            pa_right_arm2: 0,
            pa_left_arm1: 0,
            pa_left_arm2: 0,
            breathing_rate: 0,
            temperature: 0
          },
          lying_down: {
            pa_right_arm1: 0,
            pa_right_arm2: 0,
            pa_left_arm1: 0,
            pa_left_arm2: 0,
            breathing_rate: 0,
            temperature: 0
          },
          standing: {
            pa_right_arm1: 0,
            pa_right_arm2: 0,
            pa_left_arm1: 0,
            pa_left_arm2: 0,
            breathing_rate: 0,
            temperature: 0
          },
        },
        takes: [
          {
            sitting: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            lying_down: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            standing: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
          },
          {
            sitting: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            lying_down: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            standing: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
          },
          {
            sitting: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            lying_down: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            standing: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
          },
          {
            sitting: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            lying_down: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
            standing: {
              pa_right_arm1: 0,
              pa_right_arm2: 0,
              pa_left_arm1: 0,
              pa_left_arm2: 0,
              breathing_rate: 0,
              temperature: 0
            },
          },
        ],
      },
      patient_history: {
        loading: false,
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
          history_content:{
            diseases: {
              hta:{
                active: true,
                diagnostic_date: '',
                treatment: '',
                iecas: {
                  frecuency: '',
                  dosis: '',
                },
                bra: {
                  frecuency: '',
                  dosis: '',
                },
                ca: {
                  frecuency: '',
                  dosis: '',
                },

                iecas: {
                  frecuency: '',
                  dosis: '',
                },
                bra: {
                  frecuency: '',
                  dosis: '',
                },
                diuretic: {
                  frecuency: '',
                  dosis: '',
                },
                block_beta: {
                  frecuency: '',
                  dosis: '',
                },
                block: {
                  frecuency: '',
                  dosis: '',
                },
              },
              dtm2:{
                active: true,
                diagnostic_date: '',
                treatment: '',
                metformin: {
                  frecuency: '',
                  dosis: '',
                },
                insulin: {
                  frecuency: '',
                  dosis: '',
                },
                sulfonylureas: {
                  frecuency: '',
                  dosis: '',
                },
                inh_dpp: {
                  frecuency: '',
                  dosis: '',
                },
                i_slgt2: {
                  frecuency: '',
                  dosis: '',
                },
                gl: {
                  frecuency: '',
                  dosis: '',
                },
              },
              dyslipidemia:{
                active: true,
                diagnostic_date: '',
                treatment: '',
                statins: {
                  frecuency: '',
                  dosis: '',
                },
                ezt: {
                  frecuency: '',
                  dosis: '',
                },
                fibratos: {
                  frecuency: '',
                  dosis: '',
                },
                omega3: {
                  frecuency: '',
                  dosis: '',
                },
                i_slgt2: {
                  frecuency: '',
                  dosis: '',
                },
                gl: {
                  frecuency: '',
                  dosis: '',
                },
                block_beta: {
                  frecuency: '',
                  dosis: '',
                },
                block: {
                  frecuency: '',
                  dosis: '',
                },
              },
              smoking:{
                active: true,
                start_year: '',
                quit_year: '',
                cigarettes_per_day: '',
                fageroom_test: '',
                no_smoking_frecuency: '',
                smoking_wish: '',
                short_advice: '',
              },
            },
            emergency_hta_history: '',
            emergency_diabetes_history: '',
            cardiovascular_diseases: {
              ischemic_cardiopathy: {
                im: '',
                age: '',
                angina: '',
                chronic_crown_syndrome: '',
                persist: '',
                functional_class_canada: '',
                revascularized: {
                  active: 0,
                  surgery: '',
                  age: '',
                  bridge: '',
                  percutaneous: '',
                  stent: '',
                  medicated: '',
                }
              },
              arritmia: {
                type: '',
                treatment: '',
                anticoagulant: '',
                anticoagulant_type: '',
                dosis: '',
                ablation: '',
                age: '',
                cdi_holder: '',
              },
              heart_failure: {
                dx_age: '',
                functional_class: '',
                treatment: '',
                dosis: '',
              },
              peripheral_artery_disease: {
                intermittent_claudication: '',
                functional_class: '',
                treatment: '',
              },
            },
            antiplatelet: {
              active: '',
              treatment: '',
            },
            physical_exams: {
              general_aspect: '',
              pvy: {
                morphology_breastx: '',
                cvy: '',
              },
              carotid_beats: '',
              apex: '',
              auscultation: '',
              peripheral_pulses: '',
              edema: '',
            },
            electro_cardiogram: {
              rhythm: '',
              detail: '',
              axes: '',
              diagnostic: '',
            }
          },
        }
      },
      patient_risk_factors: {
        selectedForm: {

        },
        headers: [
          { text: 'Factor de Riesgo', align: 'start', value: 'name' },
          { text: 'Diagnóstico', value: 'diagnostic' },
          { text: 'Comentario', value: 'comment' },
        ],
        risk_factors: 
        [
          {
            name: 'HTA',
            diagnostic: '',
            comment: ''
          },
          {
            name: 'DM',
            diagnostic: '',
            comment: ''
          },
          {
            name: 'Pre DM',
            diagnostic: '',
            comment: ''
          },
          {
            name: 'Dislipidemia',
            diagnostic: '',
            comment: ''
          },
          {
            name: 'Tabaquismo',
            diagnostic: '',
            comment: ''
          },
          {
            name: 'Obesidad',
            diagnostic: '',
            comment: ''
          },
          {
            name: 'Sobre peso',
            diagnostic: '',
            comment: ''
          },
        ],
        form_risk_factors: [
          {
            calc_name: 'FINDRISK',
            findrisk_vars
          },
          {
            calc_name: 'Riesgo 2013 AHA/ACC',
            aha_acc_2013_vars
          },
          {
            calc_name: 'Riesgo OMS/OPS',
            oms_ops_vars
          },
          {
            calc_name: 'CrCI Cockgroft/Gault',
            crci_cockgroft_gault_vars
          },
          {
            calc_name: 'Colesterol LDL',
            colesterol_ldl_vars
          },
          {
            calc_name: 'Inter Heart',
            inter_heart_vars
          },
        ],
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

      initializeExams () {
        var app = this
        app.general_save = false
        var url = api_url + 'medical-exams/get-exams-list'
        app.$http.get(url).then( res => {
          app.patient_laboratory_exams.exams = res.body
        }, err => {

        })
      },

      initializeAppointments() {
        var app = this
        app.general_save = false
        app.getDoctors()
        if (app.patient_appointments.appointments.length == 0) {
          var url = api_url + 'appointments/get/'+app.editedItem.patient_id
          app.$http.get(url).then( res => {
            app.patient_appointments.appointments = res.body
          }, err => {

          })
        }
      },

      initializeAnthropometry() {
        var app = this
        app.general_save = false
        var url = api_url + 'anthropometry/get/'+app.editedItem.patient_id
        app.$http.get(url).then( res => {
          app.patient_anthropometry = res.body[0]
        }, err => {

        })
      },

      initializeHistory() {
        var app = this
        app.general_save = false
        var url = api_url + 'history/get/'+app.editedItem.patient_id
        app.$http.get(url).then( res => {
          if (res.body.length != 0) {
            if (res.body.history_content != null) {
              app.patient_history.form.history_content = JSON.parse(res.body[0].history_content)
            }
          }
        }, err => {

        })
      },

      editItem (item) {
        var app = this
        app.general_save = true
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
        var app = this
        var obj = app.patient_laboratory_exams
        var url = api_url + 'medical-exams/delete'
        app.$http.post(url, obj.editedItem).then(res => {
          if (res.body.status == 'success') {
            obj.exam_results.splice(obj.editedIndex, 1)
            app.closeExamDelete()
          }
        }, err => {
          app.closeExamDelete()
        })
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

      saveAnthropometry () {
        var app = this
        app.loading = true
        var url = api_url + 'anthropometry/create'
        var data = {
          patient_id: app.editedItem.patient_id,
          weight: app.patient_anthropometry.weight,
          height: app.patient_anthropometry.height,
          abdominal_waist: app.patient_anthropometry.abdominal_waist
        }
        app.$http.post(url, data).then( res => {
          app.loading = false
          if (res.body.status == "success") {
            return true
          }
        }, err => {
          app.loading = false
        })
      },

      saveHistory () {
        var app = this
        app.patient_history.loading
        var url = api_url + 'history/update'
        app.patient_history.form.patient_id = app.editedItem.patient_id
        app.$http.post(url, app.patient_history.form).then( res => {
          app.patient_history.loading
          if (res.body.status == "success") {
            return true
          }
        }, err => {
          app.patient_history.loading = false
        })
      },

      calcVitalSigns () {
        var app = this
        var results = {
          sitting: {
            pa_suffix: 'mmHg',
            br_suffix: 'rpm',          
            t_suffix: '°C',          
            pa_right_arm1: 0,
            pa_right_arm2: 0,
            pa_left_arm1: 0,
            pa_left_arm2: 0,
            breathing_rate: 0,
            temperature: 0
          },
          lying_down: {
            pa_suffix: 'mmHg',
            br_suffix: 'rpm',      
            t_suffix: '°C',
            pa_right_arm1: 0,
            pa_right_arm2: 0,
            pa_left_arm1: 0,
            pa_left_arm2: 0,
            breathing_rate: 0,
            temperature: 0
          },
          standing: {
            pa_suffix: 'mmHg',
            br_suffix: 'rpm',      
            t_suffix: '°C',
            pa_right_arm1: 0,
            pa_right_arm2: 0,
            pa_left_arm1: 0,
            pa_left_arm2: 0,
            breathing_rate: 0,
            temperature: 0
          }
        }
        app.patient_vital_signs.takes.forEach( (take, index) => {
          results.sitting.pa_right_arm1 = parseInt(results.sitting.pa_right_arm1) + parseInt(take.sitting.pa_right_arm1)
          results.sitting.pa_right_arm2 = parseInt(results.sitting.pa_right_arm2) + parseInt(take.sitting.pa_right_arm2)
          results.sitting.pa_left_arm1 = parseInt(results.sitting.pa_left_arm1) + parseInt(take.sitting.pa_left_arm1)
          results.sitting.pa_left_arm2 = parseInt(results.sitting.pa_left_arm2) + parseInt(take.sitting.pa_left_arm2)
          results.sitting.breathing_rate = parseInt(results.sitting.breathing_rate) + parseInt(take.sitting.breathing_rate)
          results.sitting.temperature = parseInt(results.sitting.temperature) + parseInt(take.sitting.temperature)

          results.lying_down.pa_right_arm1 = parseInt(results.lying_down.pa_right_arm1) + parseInt(take.lying_down.pa_right_arm1)
          results.lying_down.pa_right_arm2 = parseInt(results.lying_down.pa_right_arm2) + parseInt(take.lying_down.pa_right_arm2)
          results.lying_down.pa_left_arm1 = parseInt(results.lying_down.pa_left_arm1) + parseInt(take.lying_down.pa_left_arm1)
          results.lying_down.pa_left_arm2 = parseInt(results.lying_down.pa_left_arm2) + parseInt(take.lying_down.pa_left_arm2)
          results.lying_down.breathing_rate = parseInt(results.lying_down.breathing_rate) + parseInt(take.lying_down.breathing_rate)
          results.lying_down.temperature = parseInt(results.lying_down.temperature) + parseInt(take.lying_down.temperature)
          
          results.standing.pa_right_arm1 = parseInt(results.standing.pa_right_arm1) + parseInt(take.standing.pa_right_arm1)
          results.standing.pa_right_arm2 = parseInt(results.standing.pa_right_arm2) + parseInt(take.standing.pa_right_arm2)
          results.standing.pa_left_arm1 = parseInt(results.standing.pa_left_arm1) + parseInt(take.standing.pa_left_arm1)
          results.standing.pa_left_arm2 = parseInt(results.standing.pa_left_arm2) + parseInt(take.standing.pa_left_arm2)
          results.standing.breathing_rate = parseInt(results.standing.breathing_rate) + parseInt(take.standing.breathing_rate)
          results.standing.temperature = parseInt(results.standing.temperature) + parseInt(take.standing.temperature)
        })
        results.sitting.pa_right_arm1 = results.sitting.pa_right_arm1 == 0 ? results.sitting.pa_right_arm1 : Math.round(results.sitting.pa_right_arm1 / 4)
        results.sitting.pa_right_arm2 = results.sitting.pa_right_arm2 == 0 ? results.sitting.pa_right_arm2 : Math.round(results.sitting.pa_right_arm2 / 4)
        results.sitting.pa_left_arm1 = results.sitting.pa_left_arm1 == 0 ? results.sitting.pa_left_arm1 : Math.round(results.sitting.pa_left_arm1 / 4)
        results.sitting.pa_left_arm2 = results.sitting.pa_left_arm2 == 0 ? results.sitting.pa_left_arm2 : Math.round(results.sitting.pa_left_arm2 / 4)
        results.sitting.breathing_rate = results.sitting.breathing_rate == 0 ? results.sitting.breathing_rate : Math.round(results.sitting.breathing_rate / 4)
        results.sitting.temperature = results.sitting.temperature == 0 ? results.sitting.temperature : Math.round(results.sitting.temperature / 4)

        results.lying_down.pa_right_arm1 = results.lying_down.pa_right_arm1 == 0 ? results.lying_down.pa_right_arm1 : Math.round(results.lying_down.pa_right_arm1 / 4)
        results.lying_down.pa_right_arm2 = results.lying_down.pa_right_arm2 == 0 ? results.lying_down.pa_right_arm2 : Math.round(results.lying_down.pa_right_arm2 / 4)
        results.lying_down.pa_left_arm1 = results.lying_down.pa_left_arm1 == 0 ? results.lying_down.pa_left_arm1 : Math.round(results.lying_down.pa_left_arm1 / 4)
        results.lying_down.pa_left_arm2 = results.lying_down.pa_left_arm2 == 0 ? results.lying_down.pa_left_arm2 : Math.round(results.lying_down.pa_left_arm2 / 4)
        results.lying_down.breathing_rate = results.lying_down.breathing_rate == 0 ? results.lying_down.breathing_rate : Math.round(results.lying_down.breathing_rate / 4)
        results.lying_down.temperature = results.lying_down.temperature == 0 ? results.lying_down.temperature : Math.round(results.lying_down.temperature / 4)          

        results.standing.pa_right_arm1 = results.standing.pa_right_arm1 == 0 ? results.standing.pa_right_arm1 : Math.round(results.standing.pa_right_arm1 / 4)
        results.standing.pa_right_arm2 = results.standing.pa_right_arm2 == 0 ? results.standing.pa_right_arm2 : Math.round(results.standing.pa_right_arm2 / 4)
        results.standing.pa_left_arm1 = results.standing.pa_left_arm1 == 0 ? results.standing.pa_left_arm1 : Math.round(results.standing.pa_left_arm1 / 4)
        results.standing.pa_left_arm2 = results.standing.pa_left_arm2 == 0 ? results.standing.pa_left_arm2 : Math.round(results.standing.pa_left_arm2 / 4)
        results.standing.breathing_rate = results.standing.breathing_rate == 0 ? results.standing.breathing_rate : Math.round(results.standing.breathing_rate / 4)
        results.standing.temperature = results.standing.temperature == 0 ? results.standing.temperature : Math.round(results.standing.temperature / 4)
        var url = api_url + 'vital-signals/create'
        results.patient_id = app.editedItem.patient_id
        app.$http.post(url, results).then( res => {
          console.log(res.body)
        }, err => {

        })
      },

      saveExam () {
        var app = this
        var obj = app.patient_laboratory_exams
        var url = api_url + "medical-exams/create"
        obj.editedItem.patient_id = app.editedItem.patient_id
        obj.editedItem.exam_id = obj.selectedExam.exam_id

        app.$http.post(url, obj.editedItem).then(res => {
          if (res.body.status == 'success') {
            obj.editedItem.patient_exam_id = res.body.data.exam_id
            obj.exam_results.push(obj.editedItem)
            app.closeExam()
          }
        }, err => {
          app.closeExam()
        })
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
        var app = this
        var obj = app.patient_laboratory_exams
        obj.laboratory_exam = true
        obj.selectedExam = item
        var url = api_url + "medical-exams/get"
        var data = {exam_id: item.exam_id, patient_id : this.editedItem.patient_id}
        app.$http.post(url, data).then(res => {
          obj.exam_results = res.body
        }, err => {

        })

      },

    }
});