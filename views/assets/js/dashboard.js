/*VUE INSTANCE*/
moment.locale('es')
Vue.use(VueTelInputVuetify, {
  vuetify,
});
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      barAlert: false,
      barTimeout: 1000,
      barMessage: '',
      barType: '',
      select: false,
      patient_select: false,
      loading: false,
      loading_form: false,
      patient_create_loading: false,
      dialog: false,
      create_dialog: false,
      patient_dialog: false,
      appointment_date_modal: false,
      appointment_time_modal: false,
      entry_date_modal: false,
      birthdate_modal: false,
      appointment_date_dialog: '',
      appointment_time_dialog: '',
      entry_date_dialog: '',
      search: '',
      appointments: [],
      patient_appointments: [],
      headers: [
        {text: 'Fecha de la cita', align: 'start', value: 'appointment_date' },
        { text: 'Hora de la cita', value: 'appointment_time' },
        { text: 'Doctor', value: 'full_name' },
        { text: 'Tipo de cita', value: 'appointment_type' },
        { text: 'Motivo de la cita', value: 'appointment_reason' },
      ],
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
      doctors: [],
      patients: [],
      patients_list: [],
      appointment_types: [
        {
          text: 'Primera vez',
        },
        {
          text: 'Consulta de chequeo',
        }
      ],
      patient: {
        first_name: '',
        last_name: '',
        document_type: '',
        document_id: '',
        birthdate: '',
        gender: '',
        address: '',
        email: '',
        telephone: '',
        whatsapp: '0',
        telegram: '0',
        sms: '0',
        entry_date: ''
      },
      patient_default: {
        first_name: '',
        last_name: '',
        document_type: '',
        document_id: '',
        birthdate: '',
        gender: '',
        address: '',
        email: '',
        telephone: '',
        whatsapp: '0',
        telegram: '0',
        sms: '0',
        entry_date: ''        
      },
      form: {
        patient_id: '',
        doctor: '',
        appointment_reason: '',
        appointment_type: '',
        appointment_date: '',
        appointment_time: '',
      },
      appointment_selected: {},
    },

    computed: {
    },

    created () {
      this.getDoctors()
      this.getPatients()
      this.initialize()
    },

    mounted () {
    },

    methods: {
      initialize() {
        var app = this
        var url = api_url + "appointments/get-upcm-appointments/"
        app.$http.get(url).then(res => {
          if (res.body.length > 0) {
            var appointments = []
            res.body.forEach( (e, i) => {
              var appointment = {
                appointment_id: e.appointment_id,
                start: moment(e.appointment_date + " " + e.appointment_time).toISOString(),
                appointment_date: e.appointment_date,
                appointment_time: e.appointment_time,
                appointment_reason: e.appointment_reason,
                appointment_type: e.appointment_type,
                title: e.patient,
                doctor: e.doctor,
                patient_id: e.patient_id,
                user_id: e.user_id
              }
              appointments.push(appointment)
            });
            app.appointments = appointments
          }
          app.renderCalendar()
        }, err => {

        })
      },

      renderCalendar () {
        var app = this
        document.getElementById('siac-suite-container').style.display = 'inline'
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          eventClick: info => {
            var props = info.event.extendedProps
            var item = {
              patient: info.event.title,
              appointment_date: info.event.startStr,
              props
            }
            app.appointmentDetails(item)
          },
          dateClick: info => {
            app.form.appointment_date = info.dateStr
            app.create_dialog = true
          },
          themeSystem: 'Materia',
          initialView: 'dayGridMonth',
          dayMaxEventRows: true,
          headerToolbar: { left: "prev,next today", center: 'title', right: 'dayGridMonth,timeGridWeek,dayGridDay' },
          locale: 'es',
          events: app.appointments,
        });
        calendar.render();
      },

      appointmentDetails (item) {
        var app = this
        app.appointment_selected = item
        var url = api_url + 'appointments/get/'+app.appointment_selected.props.patient_id
        app.dialog = true

        app.$http.get(url).then( res => {
          app.patient_appointments = res.body
        }, err => {

        })
      },

      getDoctors () {
        var app = this
        var url = api_url + 'members/get-doctors'
        if (app.doctors.length == 0) {
          app.select = true
          app.$http.get(url).then(res => {
            app.select = false
            app.doctors = res.body
          }, err => {
            app.select = false
          })
        }
      },

      getPatients () {
        var app = this
        var url = api_url + 'patients/get-list'
          app.patient_select = true
          app.$http.get(url).then(res => {
            app.patient_select = false
            app.patients = res.body
            app.patients_list = res.body
          }, err => {
            app.patient_select = false
          })
      },

      searchPatients(e) {
        var app = this
        if (!app.search) {
          app.patients = app.patients_list;
        }

        app.patients = app.patients_list.filter((patient) => {
          return patient.full_name.toLowerCase().indexOf(app.search.toLowerCase()) > -1;
        });
      },

      saveAppointment () {
        var app = this
        var obj = app.form
        app.loading_form = true
        var url = api_url + 'appointments/create'
        app.$http.post(url, obj).then( res => {
          app.loading_form = false
          if (res.body.status == "success") 
            app.create_dialog = false
            app.initialize()
          activateAlert(res.body.message, res.body.status)
        }, err => {
          app.loading_form = false
        })
      },

      savePatient () {
        var app = this
        var url = api_url + 'patients/create'
        app.patient_create_loading = true
        app.$http.post(url, app.patient).then( res => {
          app.patient_create_loading = false
          if (res.body.status == "success") {
            app.patient.patient_id = res.body.data.patient_id
            var p = {
              full_name: app.patient.first_name + " " +app.patient.last_name,
              patient_id: app.patient.patient_id
            }
            app.patients.push(p)
            app.patients_list.push(p)
            app.search = ''
            app.searchPatients()
            app.form.patient_id = p.patient_id
            app.patient_dialog = false
          }
          activateAlert(res.body.message, res.body.status)
        }, err => {
          app.patient_create_loading = false
        })
      },

      getTelephoneInput (text, data) {
        this.patient.telephone = data.number.international
      },

      fromNow (date) {
        return moment(date).format('LL');
      },
  	}
});