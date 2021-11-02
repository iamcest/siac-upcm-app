class AppointmentCalendar {
    constructor() {
        this.select = false,
        this.barAlert = false,
        this.barMessage = '',
        this.barTimeout = 3000,
        this.patient_select = false,
        this.loading = false,
        this.loading_form = false,
        this.patient_create_loading = false,
        this.dialog = false,
        this.create_dialog = false,
        this.patient_dialog = false,
        this.appointment_date_modal = false,
        this.appointment_time_modal = false,
        this.entry_date_modal = false,
        this.birthdate_modal = false,
        this.appointment_date_dialog = '',
        this.appointment_time_dialog = '',
        this.entry_date_dialog = '',
        this.search = '',
        this.appointments = [],
        this.patient_appointments = [],
        this.headers = [
            { text: 'Fecha de la cita', align: 'start', value: 'appointment_date' },
            { text: 'Hora de la cita', value: 'appointment_time' },
            { text: 'Doctor', value: 'full_name' },
            { text: 'Tipo de cita', value: 'appointment_type' },
            { text: 'Motivo de la cita', value: 'appointment_reason' },
            { text: 'Acción', value: 'actions' },
        ],
        this.genders = [
            {
                name: 'Masculino',
                gender: 'M',
            },
            {
                name: 'Femenino',
                gender: 'F',
            },
        ],
        this.document_types = [
            {
                text: 'DNI',
                value: 'DNI'
            },
            {
                text: 'Pasaporte',
                value: 'pasaporte'
            },
        ],
        this.doctors = [],
        this.patients = [],
        this.patients_list = [],
        this.appointment_types = [
            {
                text: 'Primera vez',
            },
            {
                text: 'Consulta de chequeo',
            }
        ],
        this.patient = {
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
            entry_date: '',
            meta: {

            },
        },
        this.patient_default = {
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
            entry_date: '',
            meta: {

            }
        },
        this.form = {
            appointment_id: '',
            patient_id: '',
            doctor: '',
            appointment_reason: '',
            appointment_type: '',
            appointment_date: '',
            appointment_time: '',
        },
        this.form_default = {
            appointment_id: '',
            patient_id: '',
            doctor: '',
            appointment_reason: '',
            appointment_type: '',
            appointment_date: '',
            appointment_time: '',
        },
        this.appointment_selected = {}

        this.getDoctors()
        this.getPatients()
        this.initialize()
    }

    get FormTitle() {
        return this.form.appointment_id != '' ? 'Editar cita' : 'Añadir cita'
    }

    initialize() {
        var app = this
        var url = api_url + "appointments/get-upcm-appointments/"
        Http.get(url).then(res => {
            if (res.length > 0) {
                var appointments = []
                res.forEach((e, i) => {
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
    }

    renderCalendar() {
        var app = this
        var calendarEl = document.getElementById('calendar');
        if (calendarEl != null) {
            document.getElementById('siac-suite-container').style.display = 'inline'
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
        }

    }

    appointmentDetails(item) {
        var app = this
        app.appointment_selected = item
        var url = api_url + 'appointments/get/' + app.appointment_selected.props.patient_id
        app.dialog = true

        Http.get(url).then(res => {
            app.patient_appointments = res
        }, err => {

        })
    }

    getDoctors() {
        var app = this
        var url = api_url + 'members/get-doctors'
        if (app.doctors.length == 0) {
            app.select = true
            Http.get(url).then(res => {
                app.select = false
                app.doctors = res
            }, err => {
                app.select = false
            })
        }
    }

    getPatients() {
        var app = this
        var url = api_url + 'patients/get-list'
        app.patient_select = true
        Http.get(url).then(res => {
            app.patient_select = false
            app.patients = res
            app.patients_list = res
        }, err => {
            app.patient_select = false
        })
    }

    getTelephoneInput(text, data) {
        this.patient.telephone = data.number.international
    }

    resetAppointmentForm() {
        var app = this
        app.form = Object.assign({}, app.form_default)
    }

    searchPatients(e) {
        var app = this
        if (!app.search) {
            app.patients = app.patients_list;
        }

        app.patients = app.patients_list.filter((patient) => {
            return patient.full_name.toLowerCase().indexOf(app.search.toLowerCase()) > -1;
        });
    }

    saveAppointment() {
        var app = this
        console.log(app)
        var obj = app.form
        app.loading_form = true
        var url = api_url + 'appointments/create'
        if (obj.appointment_id != '') {
            url = api_url + 'appointments/update'
            Http.post(url, obj).then(res => {
                app.loading_form = false
                if (res.status == "success") {
                    app.edit_dialog = false
                    app.barAlert = true
                    app.barMessage = res.message
                    app.appointment_selected.props = Object.assign({}, obj)
                    obj = Object.assign({}, app.form_default)
                    app.closeEditDialog()
                    app.initialize()
                    activateAlert('Se actualizó la cita correctamente')
                }
                else {
                    activateAlert('No fue posible actualizar la cita, intente nuevamente')
                }
            }, err => {
                app.loading_form = false
            })
        }
        else {
            Http.post(url, obj).then(res => {
                app.loading_form = false
                if (res.status == "success") {
                    app.create_dialog = false
                    app.barAlert = true
                    app.barMessage = res.message
                    app.initialize()
                    obj = Object.assign(app.form_default)
                    activateAlert('Se creó la cita correctamente')
                } else {
                    activateAlert('No fue posible crear la cita, intente nuevamente')
                }
            }, err => {
                app.loading_form = false
            })
        }
    }

    savePatient() {
        var app = this
        var url = api_url + 'patients/create'
        app.patient_create_loading = true
        Http.post(url, app.patient).then(res => {
            app.patient_create_loading = false
            if (res.status == "success") {
                app.patient.patient_id = res.data.patient_id
                var p = {
                    full_name: app.patient.first_name + " " + app.patient.last_name,
                    patient_id: app.patient.patient_id
                }
                app.patients.push(p)
                app.patients_list.push(p)
                app.search = ''
                app.searchPatients()
                app.form.patient_id = p.patient_id
                app.patient_dialog = false
            }
        }, err => {
            app.patient_create_loading = false
        })
    }

    editDialog() {
        var app = this
        app.form = Object.assign({}, app.appointment_selected.props)
        app.create_dialog = true
    }

    closeEditDialog() {
        var app = this
        app.form = Object.assign({}, app.form_default)
        app.create_dialog = false
    }

    fromNow(date) {
        return moment(date).format('LL');
    }
}
