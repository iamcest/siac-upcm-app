/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      empty_message: 'No hay datos disponibles',
      birthdate_modal: '',
      entry_date_modal: '',
      birthdate_dialog: '',
      appointment_date_dialog: '',
      appointment_time_dialog: '',
      exam_date_dialog: '',
      menu: '',
      tab: null,
      dialog: false,
      dialogDelete: false,
      patients: [],
      headers: [
        {text: 'N° de historia', align: 'start', value: 'history_id', width:"auto" },
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
        types: [
          {
            text: 'Primera vez',
            id: 1
          },
          {
            text: 'Consulta de chequeo',
            id: 2
          }
        ],
        doctors: [
          {
            id: 1,
            full_name: 'Samantha Smith',
          },
          {
            id: 2,
            full_name: 'Dereck Coldman',
          },
          {
            id: 3,
            full_name: 'Cinthia Dominguez',
          },
          {
            id: 4,
            full_name: 'Dimitri Alexander',
          }
        ],
        headers: [
          {text: 'Fecha de la cita', align: 'start', value: 'date' },
          { text: 'Hora de la cita', value: 'time' },
          { text: 'Doctor', value: 'doctor_full_name' },
          { text: 'Tipo de cita', value: 'type' },
          { text: 'Motivo de la cita', value: 'reason' },
          { text: 'Acciones', value: 'actions', align:'center', sortable: false },
        ],
        appointments: [
          {
            date: '2020-10-20',
            time: '10:00',
            doctor_id: 1,
            type: 'Lorem ipsum dolor',
            type_id: 2,
            reason: 'Lorem ipsum dolor sit amet, culpa!'
          },
          {
            date: '2020-10-20',
            time: '10:00',
            doctor_id: 3,
            type: 'Lorem ipsum dolor',
            type_id: 2,
            reason: 'Lorem ipsum dolor asit me'
          },
          {
            date: '2020-10-20',
            time: '10:00',
            doctor_id: 2,
            type: 'Lorem ipsum dolor',
            type_id: 2,
            reason: 'Lorem ipsum dolor asit me'
          },
          {
            date: '2020-10-20',
            time: '10:00',
            doctor_id: 1,
            type: 'Lorem ipsum dolor',
            type_id: 2,
            reason: 'Lorem ipsum dolor asit me'
          },
          {
            date: '2020-10-20',
            time: '10:00',
            doctor_id: 2,
            type: 'Lorem ipsum dolor',
            type_id: 2,
            reason: 'Lorem ipsum dolor asit me'
          }
        ],
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
      },
    },

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Añadir nuevo paciente' : 'Editar ficha del paciente - N° de historia: ' + this.editedItem.history_id
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
        this.patients = [
          {
            history_id: 17092020,
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            telephone: '(+xx) xxx xxxxx',
            email: 'correo_prueba@prueba.com',
            address: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. pariatur ut voluptates, ipsum?',
            platforms: 'whatsapp',
            gender: 'M',
            birthdate: '1998-09-14',
            dates: [],
            anthropometry: [],
            vitals_signs: [],
            history: [],
            laboratory_exams: [],
            risk_factors: [],
          },
          {
            history_id: 17092020,
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            telephone: '(+xx) xxx xxxxx',
            email: 'correo_prueba@prueba.com',
            address: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. pariatur ut voluptates, ipsum?',
            platforms: 'whatsapp',
            gender: 'M',
            birthdate: '1998-09-14',
            dates: [],
            anthropometry: [],
            vitals_signs: [],
            history: [],
            laboratory_exams: [],
            risk_factors: [],
          },
          {
            history_id: 17092020,
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            telephone: '(+xx) xxx xxxxx',
            email: 'correo_prueba@prueba.com',
            address: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. pariatur ut voluptates, ipsum?',
            platforms: 'whatsapp',
            gender: 'M',
            birthdate: '1998-09-14',
            dates: [],
            anthropometry: [],
            vitals_signs: [],
            history: [],
            laboratory_exams: [],
            risk_factors: [],
          },
          {
            history_id: 17092020,
            full_name: '',
            first_name: 'John',
            last_name: 'Doe',
            telephone: '(+xx) xxx xxxxx',
            email: 'correo_prueba@prueba.com',
            address: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. pariatur ut voluptates, ipsum?',
            platforms: 'whatsapp',
            gender: 'M',
            birthdate: '1998-09-14',
            dates: [],
            anthropometry: [],
            vitals_signs: [],
            history: [],
            laboratory_exams: [],
            risk_factors: [],
          },
        ]
      },
      editItem (item) {
        this.editedIndex = this.patients.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
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
        this.patients.splice(this.editedIndex, 1)
        this.closeDelete()
      }, 

      deleteAppointmentItemConfirm () {
        var obj = this.patient_appointments
        obj.appointments.splice(obj.editedIndex, 1)
        this.closeAppointmentDelete()
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
        if (this.editedIndex > -1) {
          Object.assign(this.patients[this.editedIndex], this.editedItem)
        } else {
          this.patients.push(this.editedItem)
        }
        this.close()
      },

      saveAppointment () {
        var obj = this.patient_appointments
        if (obj.editedIndex > -1) {
          Object.assign(obj.appointments[obj.editedIndex], obj.editedItem)
        } else {
          obj.appointments.push(obj.editedItem)
        }
        this.closeAppointment()
      },

      saveExam () {
        var obj = this.patient_laboratory_exams
        obj.exam_results.push(obj.editedItem)
        this.closeExam()
      },

      getDoctorFullName (doctor_id) {
        var obj = this.patient_appointments
        var results = obj.doctors.filter(function (doctor) { 
          return doctor.id == doctor_id;
        });
        return results[0]['full_name'];
      },

      getAppointmentType (appointment_type) {
        var obj = this.patient_appointments
        var results = obj.types.filter(function (type) { 
          return type.id == appointment_type;
        });
        return results[0]['text'];
      },

      showExamResults (item) {
        var obj = this.patient_laboratory_exams
        obj.laboratory_exam = true
        obj.selectedExam = item

      },

    }
});