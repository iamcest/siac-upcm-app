/*VUE INSTANCE*/
moment.locale('es')
Vue.use(VueTelInputVuetify, {
  vuetify,
});
Vue.component('line-chart', {
  extends: VueChartJs.Bar,
  mixins: VueChartJs.mixins.reactiveProp,
  props: ['chartdata', 'options'],
  mounted() {
    this.renderChart(this.chartdata, {
      responsive: true,
      maintainAspectRatio: true,
    })
  }
})
let vm = new Vue({
  vuetify,
  el: '#siac-suite-container',
  data: {
    barAlert: false,
    tab: null,
    view_tab: null,
    view_comparison_tab: null,
    view_dialog: false,
    view_comparison_dialog: false,
    appointment_dialog: false,
    ph_cd_heart_failure_dx_year_modal: false,
    ph_cd_ischemic_cardiopathy_sca_year_modal: false,
    ph_cd_ischemic_cardiopathy_sca_im_year_modal: false,
    ph_cd_ischemic_cardiopathy_sca_ua_year_modal: false,
    ph_cd_ischemic_cardiopathy_scai_ua_year_modal: false,
    ph_cd_ischemic_cardiopathy_surgery_year_modal: false,
    ph_cd_ischemic_cardiopathy_percutaneous_year_modal: false,
    ph_polipildora_date_modal: false,
    smoking_start_year_modal: false,
    smoking_quit_year_modal: false,
    cv_disease_year_modal: false,
    arritmia_year_modal: false,
    recipe_reports_dialog: false,
    historic_records_dialog: false,
    dialog: false,
    dialogDelete: false,
    finishOptionsDialog: false,
    FollowUpAppointmentsDialog: false,
    viewPatientsComparisonDialog: false,
    viewPatientsAverageComparisonDialog: false,
    viewPatientsStatisticsDialog: false,
    ComparisonPatientsDialog: false,
    general_save: false,
    upload_button: false,
    image_loading: false,
    previewImage: '',
    barTimeout: 1000,
    barMessage: '',
    barType: '',
    empty_message: 'No hay datos disponibles',
    birthdate_modal: '',
    entry_date_modal: '',
    birthdate_dialog: '',
    entry_date_dialog: '',
    appointment_date_dialog: '',
    appointment_time_dialog: '',
    exam_date_dialog: '',
    exam_file_date_dialog: '',
    menu: '',
    patients_search: '',
    template_search: '',
    ref_index: 0,
    templates: [],
    filtered_templates: [],
    templates_loading: false,
    appointment_calendar: new AppointmentCalendar(),
    comparison: {
      active: 0,
      external_loading: false,
      type_selected: 1,
      types: [
        {
          text: 'Pacientes de la misma unidad',
          value: 1,
        },
        /*
        {
          text: 'Pacientes de otras unidades',
          value: 2,
        },
        */
      ],
      patients: [],
      external_patients: [],
      patients_filtered: [],
      external_patients_filtered: [],
      patient_selected: {},
      patient_to_compare: {},
      appointments: {
        loading: false,
        current_patient: {
        },
        patient_to_compare: {
        },
      },
      history: {
        loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        current_patient: {},
        patient_to_compare: {},
      },
      anthropometry: {
        loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        current_patient: {
        },
        patient_to_compare: {
        },
      },
      physical_exams: {
        loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        current_patient: {},
        patient_to_compare: {},
      },
      electro_cardiogram: {
        loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        current_patient: {},
        patient_to_compare: {},
      },
      echocardiogram: {
        loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        current_patient: {},
        patient_to_compare: {},
      },
      laboratory_exams: {
        loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        examsListed: false,
        selectedExam: {},
        current_patient: [],
        patient_to_compare: [],
      },
      diagnostics: {
        loading: false,
        rf_loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        items: {
          current_patient: [],
          patient_to_compare: [],
        },
        risk_factors: {
          current_patient: [],
          patient_to_compare: [],
        },
      },
      vital_signs: {
        loading: false,
        average_loading: false,
        patients: [],
        external_patients: [],
        patients_filtered: [],
        external_patients_filtered: [],
        current_patient: {},
        patient_to_compare: {},
      },
    },
    statistics: {
      male: {
        age_average: 0,
        total_patients: 0,
      },
      female: {
        age_average: 0,
        total_patients: 0,
      },
      anthropometry: {
        loading: false,
        items: [],
        weight: 0,
        height: 0,
        abdominal_waist: 0,
        cs: 0,
        bmi: 0
      },
      life_style: {
        loading: false,
        items: [],
        smoking: {
          active: 0,
          inactive: 0
        },
        alcohol_consumption: {
          active: 0,
          inactive: 0
        },
        sedentary: {
          active: 0,
          inactive: 0
        },
        exercises: {
          aerobics: 0,
          resistance: 0,
          time_weekly_avg: 0
        }
      },
      diseases: {
        loading: false,
        histories: [],
        hta: {
          controlled: 0,
          no_controlled: 0
        },
        dmt2: {
          controlled: 0,
          no_controlled: 0
        },
        dyslipidemia: {
          controlled: 0,
          no_controlled: 0
        },
        obesity: {
          total: 120
        },
        smoking: 0,
      },
      laboratory_exam: {
        loading: false,
        items: [
          {
            name: 'Colesterol Total',
            nomenclature: 'mg/dL',
            items: 0,
            total: 0
          },
          {
            name: 'Triglicérídos',
            nomenclature: 'mg/dL',
            items: 0,
            total: 0
          },
          {
            name: 'Colesterol HDL',
            nomenclature: 'mg/dL',
            items: 0,
            total: 0
          },
          {
            name: 'Colesterol No HDL',
            nomenclature: 'mg/dL',
            items: 0,
            total: 0
          },
          {
            name: 'Glicemia en ayunas',
            nomenclature: 'mg/dL',
            items: 0,
            total: 0
          },
          {
            name: 'Glicemia postprandial',
            nomenclature: 'mg/dL',
            items: 0,
            total: 0
          },
        ],
      },
      chart: {
        loading: false,
        monthly_data: {
          current_year: moment().format('YYYY'),
          months: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12',],
          labels: [
            'Enero', 'Febrero', 'Marzo',
            'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
          ],
          datasets: [
            {
              label: 'Total',
              backgroundColor: vuetify.preset.theme.themes.light.secondary,
              data: []
            },
            {
              label: 'Mujeres',
              backgroundColor: '#e91e63',
              data: []
            },
            {
              label: 'Hombres',
              backgroundColor: vuetify.preset.theme.themes.light.primary,
              data: []
            },
          ]
        },
        weekly_data: {
          current_day: moment().format('YYYY-MM-DD'),
          labels: [],
          datasets: [
            {
              label: 'Total',
              backgroundColor: vuetify.preset.theme.themes.light.secondary,
              data: []
            },
            {
              label: 'Mujeres',
              backgroundColor: '#e91e63',
              data: []
            },
            {
              label: 'Hombres',
              backgroundColor: vuetify.preset.theme.themes.light.primary,
              data: []
            },
          ]
        },
      }
    },
    patients: [],
    headers: [
      { text: 'N° de historia', align: 'start', value: 'patient_id', width: "auto" },
      { text: 'Nombre y Apellido', value: 'full_name', width: "auto" },
      { text: 'Teléfono', value: 'telephone', width: "auto" },
      { text: 'Email', value: 'email', width: "auto" },
      { text: 'Dirección', value: 'address', width: "auto" },
      { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
    ],
    views: {
      patient_appointments: {
        headers: [
          { text: 'Fecha de la cita', align: 'start', value: 'appointment_date' },
          { text: 'Hora de la cita', value: 'appointment_time' },
          { text: 'Doctor', value: 'full_name' },
          { text: 'Tipo de cita', value: 'appointment_type' },
          { text: 'Motivo de la cita', value: 'appointment_reason' },
        ],
      },
      patient_anthropometry: {
        headers: [
          { text: 'Fecha', align: 'start', value: 'created_at' },
          { text: 'Peso', value: 'weight' },
          { text: 'Talla', value: 'height' },
          { text: 'Cintura Abdominal', value: 'abdominal_waist' },
          {
            text: 'Índice Masa Corporal',
            value: 'bmi'
          },
          { text: 'Superficie Corporal', value: 'corporal_surface' },
        ],
      },
      patient_laboratory_exams: {
        exam_headers: [
          { text: 'Fecha del examen', align: 'start', value: 'exam_date', width: "auto" },
          { text: 'Resultado', value: 'results', width: "auto" },
        ],
        exam_file_headers: [
          { text: 'Fecha', align: 'start', value: 'exam_date', width: "auto" },
          { text: 'Archivo', align: 'center', value: 'file_result', width: "auto" },
        ],
      },
    },
    patient_appointments: {
      finish_loading: false,
      dialog: false,
      outside_dialog: false,
      dialogDelete: false,
      date_modal: false,
      time_modal: false,
      select: false,
      current_appointment: {},
      previous_appointment: {},
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
        { text: 'Fecha de la cita', align: 'start', value: 'appointment_date' },
        { text: 'Hora de la cita', value: 'appointment_time' },
        { text: 'Doctor', value: 'full_name' },
        { text: 'Tipo de cita', value: 'appointment_type' },
        { text: 'Motivo de la cita', value: 'appointment_reason' },
        { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
      ],
      appointments: [],
      editedItem: {},
      defaultItem: {
        appointment_date: '',
        appointment_reason: '',
        appointment_time: '',
        appointment_type: '',
      },
      editedIndex: -1,
    },
    recipes: {
      dialog: false,
      dialogDelete: false,
      date_modal: false,
      next_date_modal: false,
      select: false,
      headers: [
        { text: 'Fecha de creación', align: 'start', value: 'registered_at' },
        { text: 'Fecha de consulta', align: 'start', value: 'appointment_date' },
        { text: 'Próxima cita', align: 'start', value: 'next_appointment' },
        { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
      ],
      diagnostic_headers: [
        { text: 'Diagnóstico', align: 'center', value: 'diagnostic' },
        { text: 'Metas de Tratamiento', align: 'center', value: 'treatment_goal' },
        { text: '', align: 'start', value: 'action' },
      ],
      instruction_headers: [
        { text: 'Tratamiento', align: 'center', value: 'treatment' },
        { text: 'Dosis', align: 'center', value: 'dosis' },
        { text: 'Horario', align: 'center', value: 'schedule' },
        { text: 'Observaciones', align: 'center', value: 'observations' },
        { text: '', align: 'start', value: 'action' },
      ],
      items: [],
      editedItem: {},
      defaultItem: {
        appointment_date: '',
        diagnostics: [],
        instructions: [],
        next_appointment: '',
      },
      editedIndex: -1,
    },
    reports: {
      dialog: false,
      dialogDelete: false,
      date_modal: false,
      next_date_modal: false,
      headers: [
        { text: 'Fecha de creación', align: 'start', value: 'registered_at' },
        { text: 'Fecha de consulta', align: 'start', value: 'appointment_date' },
        { text: 'Acciones', value: 'actions', align: 'center', sortable: false },
      ],
      treatments: [
        { text: 'Tratamiento', align: 'center', value: 'treatment' },
        { text: 'Dosis', align: 'center', value: 'dosis' },
        { text: 'Intervalo', align: 'center', value: 'interval' },
        { text: '', align: 'start', value: 'action' },
      ],
      items: [],
      editedItem: {
        appointment_date: '',
        next_appointment: '',
        ecg: '',
        meta: {
          diagnostics: [],
          plan: {},
          treatments: [],
          anthropometry: {
            active: '1',
            item: {},
          },
          physical_exam: {
            active: '0'
          },
          echocardiogram: {
            active: '0',
            item: '',
          },
          electro_cardiogram: {
            active: '0',
            item: {},
          },
          laboratory_exam: {
            active: '0',
            items: [],
          },
          vital_signs: {
            active: '1',
            items: {},
          },
        }
      },
      defaultItem: {
        appointment_date: '',
        next_appointment: '',
        ecg: '',
        meta: {
          diagnostics: [],
          plan: {},
          treatments: [],
          anthropometry: {
            active: '1',
            item: {},
          },
          physical_exam: {
            active: '0'
          },
          echocardiogram: {
            active: '0',
            item: '',
          },
          electro_cardiogram: {
            active: '0',
            item: {},
          },
          laboratory_exam: {
            active: '0',
            items: [],
          },
          vital_signs: {
            active: '1',
            items: {},
          },
        }
      },
      editedIndex: -1,
    },
    patient_anthropometry: {
      editedItem: {
        weight: '0',
        weight_suffix: 'kg',
        height: '0',
        height_suffix: 'cm',
        abdominal_waist: '0',
        abdominal_waist_suffix: 'cm',
      },
      defaultItem: {
        weight: '0',
        weight_suffix: 'kg',
        height: '0',
        height_suffix: 'cm',
        abdominal_waist: '0',
        abdominal_waist_suffix: 'cm',
      },
      editedIndex: -1,
      history: [],
    },
    patient_laboratory_exams: {
      add_file_loading: false,
      laboratory_exam: false,
      dialog: false,
      dialogDelete: false,
      dialogFileDelete: false,
      modal: false,
      file_modal: false,
      formulas: {
        cholesterol_ldl: {
          form_valid: false,
          rules: {
            required: [
              v => !!v || 'Este campo es requerido',
            ],
          },
          vars: {
            total_cholesterol: 0,
            c_HDL: 0,
            triglyceride_level: 0,
          },
          results: 0,
        },
        cholesterol_no_hdl: {
          vars: {
            total_cholesterol: 0,
            c_HDL: 0,
          },
          results: 0,
        },
        egfr_mdr_ckdepi: {
          vars: {
            race: 1,
            serum_creatinine: 0,
            metodology: 'CKD-EPI',
          },
          results: 0,
        },
        filt_glom: {
          vars: {
            race: 1,
            serum_creatinine: 0
          },
          results: 0,
        }
      },
      headers: [
        { text: 'Laboratorio', align: 'start', value: 'name', width: "auto" },
        { text: 'Acción', value: 'action', width: "auto" },
      ],
      table_options: {
        disablePagination: true,
        itemsPerPage: 15,
        hideDefaultFooter: true,
      },
      exam_headers: [
        { text: 'Fecha del examen', align: 'start', value: 'exam_date', width: "auto" },
        { text: 'Resultado', value: 'results', width: "auto" },
        { text: 'Acción', value: 'action', width: "auto" },
      ],
      exam_files_headers: [
        { text: 'Fecha', align: 'start', value: 'exam_date', width: "auto" },
        { text: 'Archivo', value: 'file_result', width: "auto" },
        { text: 'Acción', value: 'action', width: "auto" },
      ],
      exam_files: [],
      exam_results: [],
      exams: [],
      editedItem: {
        exam_date: moment().format('YYYY-MM-DD'),
        results: ''
      },
      editedFileItem: {
        exam_date: moment().format('YYYY-MM-DD')
      },
      defaultItem: {
        exam_date: moment().format('YYYY-MM-DD')
      },
      selectedExam: {},
      editedIndex: -1,
      editedFileIndex: -1,
    },
    patient_vital_signs: {
      show_results: false,
      temperature: 35,
      sat: 75,
      defaultItem: [
        {
          frc: 30,
          breathing_rate: 10,
          pa_left_arm1_average: '',
          pa_left_arm2_average: '',
          pa_right_arm1_average: '',
          pa_right_arm2_average: '',
          0: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          1: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          2: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
        },
        {
          frc: 30,
          breathing_rate: 10,
          pa_left_arm1_average: '',
          pa_left_arm2_average: '',
          pa_right_arm1_average: '',
          pa_right_arm2_average: '',
          0: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          1: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          2: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
        },
        {
          frc: 30,
          breathing_rate: 10,
          pa_left_arm1_average: '',
          pa_left_arm2_average: '',
          pa_right_arm1_average: '',
          pa_right_arm2_average: '',
          0: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          1: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          2: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
        },
      ],
      takes: [
        {
          frc: 30,
          breathing_rate: 10,
          pa_left_arm1_average: '',
          pa_left_arm2_average: '',
          pa_right_arm1_average: '',
          pa_right_arm2_average: '',
          0: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          1: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          2: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
        },
        {
          frc: 30,
          breathing_rate: 10,
          pa_left_arm1_average: '',
          pa_left_arm2_average: '',
          pa_right_arm1_average: '',
          pa_right_arm2_average: '',
          0: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          1: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          2: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
        },
        {
          frc: 30,
          breathing_rate: 10,
          pa_left_arm1_average: '',
          pa_left_arm2_average: '',
          pa_right_arm1_average: '',
          pa_right_arm2_average: '',
          0: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          1: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
          2: {
            pa_right_arm1: '',
            pa_right_arm2: '',
            pa_left_arm1: '',
            pa_left_arm2: '',
          },
        },
      ],
      headers: [
        { text: 'Fecha', align: 'center', value: 'created_at', width: "auto" },
        { text: '', align: 'center', value: 'heart_frecuency', width: "auto" },
        { text: 'Frecuencia Cardiaca', align: 'center', value: 'frc', width: "auto" },
        { text: 'Presión Arterial del Brazo Derecho', align: 'center', value: 'pa_right', width: "auto" },
        { text: 'Presión Arterial del Brazo Izquierdo', align: 'center', value: 'pa_left', width: "auto" },
        { text: 'Frecuencia respiratoria', align: 'center', value: 'breathing_rate', width: "auto" },
        { text: 'Temperatura (°C)', align: 'center', value: 'temperature', width: "auto" },
        { text: 'SAT (%)', align: 'center', value: 'sat', width: "auto" },
      ],
      headers_result: [
        { text: ' ', align: 'center', value: 'heart_frecuency', width: "auto" },
        { text: 'Frecuencia cardíaca', align: 'center', value: 'frc', width: "auto" },
        { text: 'Presión Arterial del Brazo Derecho', align: 'center', value: 'pa_right', width: "auto" },
        { text: 'Presión Arterial del Brazo Izquierdo', align: 'center', value: 'pa_left', width: "auto" },
        { text: 'Frecuencia respiratoria', align: 'center', value: 'breathing_rate', width: "auto" },
        { text: 'Temperatura (°C)', align: 'center', value: 'temperature', width: "auto" },
        { text: 'SAT O (%)', align: 'center', value: 'sat', width: "auto" },
      ],
      results: [],
      records: [],
    },
    patient_echocardiogram: {
      loading: false,
      content: '',
      item: [],
      defaultItem: '',
    },
    patient_physical_exam: {
      loading: false,
      options: {
        general_aspect: ['Bueno', 'Regular', 'Mal'],
        soplo: ['Sistólico', 'Diastólico', 'Continuo'],
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
      },
      items: [],
      content: {
        general_aspect: '',
        apex: {
          is_palpated: 1,
          displaced: 0,
          characteristic: 'Normokinético',
        },
        pvy: {
          morphology_breastx: 1,
          cvy: 1,
          swivel_stop: 1,
          other: '',
        },
        carotid_beats: {
          symmetrical: 1,
          homochroto: 1,
          normal_amplitude: 1,
        },
        auscultation: {
          rhythmic_heart_sounds: 1,
          regular: 1,
          unfolded_r1: 1,
          r1_type: '',
          unfolded_r2: 1,
          r2_type: '',
          unfolded_r3: 1,
          unfolded_r4: 1,
          gallop_rhythm: 0,
          soplo: {
            active: 1,
            foco_options: ['Aórtico', 'Mitral', 'Tricuspideo', 'Pulmonar'],
            items: [
              {
                type: '',
                foco: '',
                intensity_foco: ''
              }
            ],
          }
        },
        peripheral_pulses: {
          symmetrical: 1,
          symmetrical_range: 1,
          mid: '',
          mii: ''
        },
        edema: {
          active: 0,
          range: ''
        },
        aai: {
          range: 0
        },
      },
      defaultItem: {
        general_aspect: '',
        pvy: {
          morphology_breastx: 1,
          cvy: 1,
          swivel_stop: 1,
          other: '',
        },
        apex: {
          is_palpated: 1,
          displaced: 0,
          characteristic: 'Normokinético',
        },
        carotid_beats: {
          symmetrical: 1,
          homochroto: 1,
          normal_amplitude: 1,
        },
        auscultation: {
          rhythmic_heart_sounds: 1,
          regular: 1,
          unfolded_r1: 1,
          unfolded_r2: 1,
          unfolded_r3: 1,
          unfolded_r4: 1,
          gallop_rhythm: 0,
          soplo: {
            active: 1,
            foco_options: ['Aórtico', 'Mitral', 'Tricuspideo', 'Pulmonar'],
            items: [
              {
                type: '',
                foco: '',
                intensity_foco: ''
              }
            ],
          }
        },
        peripheral_pulses: {
          symmetrical: 1,
          symmetrical_range: 1,
          mid: '',
          mii: ''
        },
        edema: {
          active: 0,
          range: ''
        },
        aai: {
          range: 0
        },
      },
    },
    patient_life_style: {
      loading: false,
      exercise_start_date_modal: false,
      headers: [
        { text: 'Fecha', align: 'center', value: 'created_at', width: "auto" },
        { text: 'Sedentario', align: 'center', value: 'sedentary', width: "auto" },
        { text: 'Ejercicio', align: 'center', value: 'exercise', width: "auto" },
        { text: 'Consumo de alcohol', align: 'center', value: 'alcohol_consumption', width: "auto" },
        { text: 'Fumador', align: 'center', value: 'smoking', width: "auto" },
      ],
      calc: {
        fagerstrom: {
          form_dialog: 0,
          vars: {
            input1: 0,
            input2: 0,
            input3: 0,
            input4: 0,
            input5: 0,
            input6: 0,
          },
          options: {
            input1: [
              {
                text: 'Hasta 5 minutos',
                value: 3
              },
              {
                text: 'De 6 a 30 minutos',
                value: 2
              },
              {
                text: 'De 31 a 60 minutos',
                value: 1
              },
              {
                text: 'Más de 60 minutos',
                value: 0
              },
            ],
            input3: [
              {
                text: 'El primero de la mañana',
                value: 1
              },
              {
                text: 'Cualquier otro',
                value: 0
              },
            ],
            input4: [
              {
                text: '31 o más cigarrillos',
                value: 3
              },
              {
                text: 'Entre 21 y 30 cigarrillos/día',
                value: 2
              },
              {
                text: 'Entre 11 y 20 cigarrillos/día',
                value: 1
              },
              {
                text: 'Menos de 10 cigarrillos/día',
                value: 0
              },
            ],
          },
          result: 0,
        }
      },
      options: {
        select: [
          {
            text: 'Sí',
            value: '1'
          },
          {
            text: 'No',
            value: '0'
          },
        ],
        smoking_select: [
          {
            text: 'Sí',
            value: 1
          },
          {
            text: 'No',
            value: 0
          },
        ],
        exercises: {
          type: ['Aeróbico', 'Resistencia'],
          aerobic: ['Caminar', 'Correr', 'Trotar', 'Nadar', 'Bailar', 'Ciclismo', 'Yoga', 'Tenis'],
          resistance: ['Pesas', 'Funcionales', 'Abdominales']
        },
        alcohol_consumption: ['1', '2 a 3', 'Más de 4']
      },
      items: [],
      editedItem: {
        sedentary: '1',
        sedentary_material: {
          material_name: ''
        },
        physical_exercise: '0',
        exercise_weekly_minutes: 30,
        exercise_activity_before: '0',
        exercise_start_date: '',
        exercise: {
          type: [],
          aerobic_exercises: [],
          resistance_exercises: [],
        },
        smoking: {
          active: '1',
          did_smoke: '0',
          start_year: '',
          quit_year: '',
          cigarettes_per_day: '',
          fagerstrom_test: '',
          no_smoking_frecuency: '0',
          last_time: '',
          how_many_times: '',
          smoking_wish: '0',
          short_advice: {
            done: 0,
            material: {
              material_id: '',
              material_name: '',
              source: '',
              type: '',
            }
          },
        },
        alcohol_consumption: '0',
        alcohol_daily_consumption: 0,
      },
      defaultItem: {
        sedentary: '1',
        sedentary_material: {
          material_name: '',
        },
        physical_exercise: '0',
        exercise_weekly_minutes: 30,
        exercise_activity_before: '0',
        exercise_start_date: '',
        exercise: {
          type: [],
          aerobic_exercises: [],
          resistance_exercises: [],
        },
        smoking: {
          active: '0',
          did_smoke: '0',
          start_year: '',
          quit_year: '',
          cigarettes_per_day: '',
          fagerstrom_test: '',
          no_smoking_frecuency: 0,
          last_time: '',
          how_many_times: '',
          smoking_wish: 0,
          short_advice: {
            done: 0,
            material: {
              material_id: '',
              material_name: '',
              source: '',
              type: '',
            }
          },
        },
        alcohol_consumption: '0',
        alcohol_daily_consumption: 0,
      },
    },
    patient_electro_cardiogram: {
      loading: false,
      form_dialog: false,
      valid: false,
      qtc_edit_results_menu: false,
      qtc_view_results_menu: false,
      options: {
        rhythm: ['Sinusal', 'No sinusal'],
        qtc_list: [
          {
            text: 'RR',
            value: 'rr'
          },
          {
            text: 'QTc (Rautaharju)',
            value: 'qtrau'
          },
          {
            text: 'QTc (Bazett)',
            value: 'qtbaz'
          },
          {
            text: 'QTc (Framingham)',
            value: 'qtfra'
          },
          {
            text: 'QTc (Friderica)',
            value: 'qtfri'
          },
          {
            text: 'QTC (Call)',
            value: 'qtcal'
          },
        ],
      },
      rules: {
        frecuency: [
          v => (v && v >= 30 && v <= 300) || 'Debe estar en un rango entre 30 y 300',
        ],

        pr: [
          v => (v && v >= 90 && v <= 240) || 'Debe estar en un rango entre 90 y 240',
        ],

        qrs: [
          v => (v && v >= 60 && v <= 200) || 'Debe estar en un rango entre 60 y 200',
        ],
      },
      content: {
        rhythm: 'Sinusal',
        arritmia_type: '',
        frecuency: 30,
        pr: '',
        axes: {
          p: '',
          qrs: '',
          t: '',
        },
        detail: '',
        qtc: '',
        qt: '',
        fc: '',
        rr: '',
        qtrau: '',
        qtbaz: '',
        qtfra: '',
        qtfri: '',
        qtcal: '',
        qtc_formula_selected: {
          text: 'RR',
          value: 'rr',
        },
        diagnostic: 'No',
      },
      items: [],
      defaultItem: {
        rhythm: 'Sinusal',
        arritmia_type: '',
        frecuency: 30,
        pr: '',
        axes: {
          p: '',
          qrs: '',
          t: '',
        },
        detail: '',
        qtc: '',
        qt: '',
        fc: '',
        rr: '',
        qtrau: '',
        qtbaz: '',
        qtfra: '',
        qtfri: '',
        qtcal: '',
        qtc_formula_selected: {
          text: 'RR',
          value: 'rr',
        },
        diagnostic: 'No',
      },
    },
    patient_history: {
      loading: false,
      modals: {
        ischemic_cardiopathy: {
          current: 1
        }
      },
      options: {
        treatment_frecuency: [1, 2, 3, '+3'],
        ischemic_cardiopathy: {
          chronic_crown_syndrome: ['', 'Angina inestable'],
          general_select: [1, 2, 3, '+ de 3'],
          functional_class_canada: [1, 2, 3, 4]
        },
        arritmia: {
          type: ['', 'FA', 'ESV', 'Otra'],
          anticoagulated_type: ['Antagonistas Vitamina K', 'ACOD'],
          general_select: [' ', 1, 2, 3, '+ de 3'],
          functional_class_canada: [1, 2, 3, 4]
        },
        peripheral_artery_disease: {
          territory: ['Miembros inferiores', 'Carotidea']
        },
        electro_cardiogram: {
          rhythm: ['Sinusal', 'No sinusal']
        },
        family: ['Padre', 'Madre', 'Hermano', 'Hermana'],
        diseases: [
          'HTA', 'DMt2', 'Dislipidemia',
          'Enfermedad arterial coronaria precoz (hombres < 55, mujeres < 65)',
          'Muerte súbita', 'Hipercolesterolemia familiar homocigótica', 'ICTUS'
        ],
      },
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
      interval_times: [
        {
          text: 'Menos de un año',
          value: 'Menos de un año'
        },
        {
          text: 'Entre 1 y 2 años',
          value: 'Entre 1 y 2 años'
        },
        {
          text: '3 a 4 años',
          value: '3 a 4 años'
        },
        {
          text: '4 a 5 años',
          value: '4 a 5 años'
        },
        {
          text: 'Más de 5 años',
          value: 'Más de 5 años'
        },
        {
          text: 'Más de 10 años',
          value: 'Más de 10 años'
        },
      ],
      items: [],
      form: {
        history_content: {
          family_history: [],
          diseases: {
            hta: {
              active: 0,
              controlled: 0,
              detected_previously: 1,
              diagnostic_date: '',
            },
            dtm2: {
              active: 0,
              controlled: 0,
              detected_previously: 1,
              diagnostic_date: '',
            },
            pre_dtm2: {
              active: 0,
              controlled: 0,
              detected_previously: 1,
              diagnostic_date: '',
            },
            dyslipidemia: {
              active: 0,
              controlled: 0,
              detected_previously: 1,
              diagnostic_date: '',
              treatment: '',
            },
          },
          emergency_hta_history: 0,
          emergency_diabetes_history: 0,
          cardiovascular_diseases: {
            ischemic_cardiopathy: {
              active: 0,
              revascularized: {
                active: 0,
                surgery: {
                  active: 1,
                  bridge: '',
                  year: moment().format('YYYY-MM-DD'),
                },
                percutaneous: {
                  active: 1,
                  vessels: '',
                  year: moment().format('YYYY-MM-DD'),
                  stent: '',
                  medicated: 1,
                },
              },
              functional_class_canada: '',
              sca: {
                active: 0,
                year: moment().format('YYYY-MM-DD'),
                im: [{
                  q: 1,
                  no_q: 1,
                  year: moment().format('YYYY-MM-DD'),
                  localization: '',
                }],
              },
              scai: {
                active: 0,
                year: moment().format('YYYY-MM-DD'),
              },
            },
            arritmia: {
              active: 0,
              items: [
                {
                  type: '',
                  treatment: 0,
                  treatment_type: '',
                  treatments: [''],
                  dosis: '',
                  daily_dosis: '',
                  ablation: 0,
                  ablation_age: '',
                  cdi_holder: 0,
                  cdi_age: '',
                }
              ]
            },
            heart_failure: {
              active: 0,
              dx_age: moment().format('YYYY-MM-DD'),
              functional_class: '',
              treatment: {
                iecas: {
                  active: 0,
                  treatment: '',
                  frecuency: '',
                  dosis: '',
                  daily_dosis: '',
                  has_secondary_effects: 0,
                  secondary_effects: ''
                },
                arni: {
                  active: 0,
                },
                dioxin: {
                  active: 0,
                },
                bra: {
                  active: 0,
                  treatment: '',
                  frecuency: '',
                  dosis: '',
                  daily_dosis: '',
                  has_secondary_effects: 0,
                  secondary_effects: ''
                },
                diuretic: {
                  active: 0,
                  treatment: '',
                  frecuency: '',
                  dosis: '',
                  daily_dosis: '',
                  has_secondary_effects: 0,
                  secondary_effects: ''
                },
                arn: {
                  active: 0,
                },
                i_slgt2: {
                  active: 0,
                  treatment: '',
                  frecuency: '',
                  dosis: '',
                  daily_dosis: '',
                  has_secondary_effects: 0,
                  secondary_effects: ''
                },
              },
            },
            peripheral_artery_disease: {
              active: 0,
              territory: '',
            },
          },
          cronic_kidney_disease: {
            active: 0,
            stadium: '',
            dialysis: 0,
          },
          cerebrovascular_disease: {
            active: 0,
            items: [
              {
                year: moment().format('YYYY-MM-DD'),
                type: 'Isquémico',
                ischemic_type: '',
              }
            ],
          },
          treatments: {
            antihypertensives: {
              treatments_list: {
                iecas:
                  [
                    'Benazepril', 'Captopril', 'Cilazapril',
                    'Enalapril', 'Espirapril', 'Fosinopril', 'Lisinopril',
                    'Imidapril', 'Moexipril', 'Perindopril', 'Quinapril',
                    'Ramipril', 'Espirapril', 'Trandolapril', 'Zofenopril'
                  ],
                bra:
                  [
                    'Candesartan', 'Eprosartan',
                    'Irbesartan', 'Losartan', 'Olmesartan medoxomilo',
                    'Telmisartan', 'Valsartan'
                  ],
                diuretic:
                  [
                    { header: 'Tiazidas y similares' },
                    { name: 'Clorotiazida', group: 'Group 1' },
                    { name: 'Clortalidona', group: 'Group 1' },
                    { name: 'Hidroclorotiazida', group: 'Group 1' },
                    { name: 'Metolazona', group: 'Group 1' },
                    { divider: true },
                    { header: 'Asa' },
                    { name: 'Azetazolamida', group: 'Group 2' },
                    { name: 'Bumetamida', group: 'Group 2' },
                    { name: 'Furosemida', group: 'Group 2' },
                    { name: 'Torsemida', group: 'Group 2' },
                    { divider: true },
                    { header: 'Ahorradores de potasio' },
                    { name: 'Metolazona', group: 'Group 3' },
                    { name: 'Espironolactona', group: 'Group 3' },
                    { name: 'Triametereno', group: 'Group 3' },
                    { divider: true },
                    { header: 'Otros' },
                  ],
                ca:
                  [
                    'Amlodipina', 'Felodipina', 'Isradipina',
                    'Nicardipina', 'Nifedipina', 'Nifedipina OROS',
                    'Nimodipina', 'Nisoldipina', 'Lacidipina',
                    'Manidipina', 'Barnidipina', 'Lecardipina',
                    'Clevadipina', 'Verapamilo', 'Diltiazem'
                  ],
                ir: [
                  'Candesartan', 'Eprosartan',
                  'Irbesartan', 'Losartan', 'Olmesartan medoxomilo',
                  'Telmisartan', 'Valsartan'
                ],
                block_beta:
                  [
                    'Atenolol', 'Bisoprolol', 'Carvedilol',
                    'Metoprolol', 'Nebivolol', 'Torsemida'
                  ],
                arni:
                  [
                    'Sacubitril / Valsartan'
                  ],
                fdc:
                  [
                    { header: 'Calcioantagonistas y diuréticos' },
                    { name: 'Amlodipina + indapamida', group: 'Group 1' },
                    { name: 'Amlodipina + hidroclorotiazida', group: 'Group 1' },
                    { divider: true },
                    { name: 'IECAS + diuréticos' },
                    { name: 'IECAS + calcioantagonitas' },
                    { name: 'IECAS + betabloqueantes' },
                    { name: 'Betabloqueante + diurético' },
                    { name: 'Betabloqueante + calcioantagonista' },
                    { name: 'BRA + diurético + calcioantagonista ' }
                  ],
                ant_mineralocorticoids:
                  [
                    'Espironolactona', 'Esplerenona'
                  ],
              },
              secondary_effects: {
                iecas: ['Tos', 'Edema', 'Angio neurótico'],
                bra: ['Tos', 'Edema', 'Angio neurótico'],
                ca: ['Cefalea', 'Edema'],
                diuretic: [
                  'Transtornos HE', 'Hiperglicemia',
                  'Bradicardia', 'Disfunción eréctil'
                ],
                ir: ['Tos', 'Edema', 'Angio neurótico'],
                block_beta: [
                  'Bradicardia',
                  'Disfunción eréctil',
                  'Broncoespasmo'
                ],
                arni: [],
                ant_mineralocorticoids: [],
              },
              iecas: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              bra: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              ca: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              ir: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              diuretic: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              arni: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              ant_mineralocorticoids: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              fdc: {
                active: 0,
                selected: [],
              },
              block_beta: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              block: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
            },
            antidiabetics: {
              treatments_list: {
                metformin: [],
                insulin: [
                  'Rápida (regular)', 'Intermedia: NPH'
                ],
                a_insulin: [
                  'Aspart', 'Degludec', 'Detemir',
                  'Glargina', 'Glulisina', 'Lispro',
                  'NPA', 'NPL'
                ],
                insulin_mixtures: ['Rápida + NPH', 'Aspart + NPA', 'Lispro – NPL',],
                metformin: [],
                sulfonylureas: [
                  'Glibenclamida (gliburida)', 'Glipizida', 'Gliclazida',
                  'Gliclazida retard', 'Glimepirida', 'Glisentida'
                ],
                glinidas: ['Repaglinida'],
                pioglitazona: [],
                inh_dpp: [
                  'Sitagliptina', 'Vildagliptina', 'Saxagliptina',
                  'Linagliptina', 'Alogliptina'
                ],
                i_slgt2: [
                  'Dapaglifozina', 'Canaglifozina', 'Empaglifozina'
                ],
                gl: [
                  'Exenatide', 'Exenatide LAR', 'Lixisenatide',
                  'Liraglutide', 'Dulaglutide'
                ],
                fdc: [
                  { name: 'Metformina + Sulfonilúreas' },
                  { name: 'Metformina + I DPP-4' },
                ],
              },
              secondary_effects: {
                metformin: ['Trastornos digestivos'],
                insulin: [],
                a_insulin: ['Hipoglicemia'],
                sulfonylureas: ['Hipoglicemia'],
                glinidas: ['Hipoglicemia'],
                pioglitazona: [],
                inh_dpp: [],
                i_slgt2: [],
                gl: [],
              },
              metformin: {
                active: 0,
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              insulin: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              a_insulin: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              insulin_mixtures: {
                selected: [],
              },
              sulfonylureas: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              glinidas: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              pioglitazona: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              inh_dpp: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              i_slgt2: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              gl: {
                treatment: '',
                frecuency: '',
                dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              fdc: {
                active: 0,
                selected: [],
              },
            },
            antithrombotics: {
              treatments_list: {
                antiplatelet_agents: [
                  'Aspirina', 'Clopidogrel', 'Prasugrel',
                  'Ticagrelor'
                ],
                oral_anticoagulants: [
                  'Apixaban', 'Dabigatran', 'Rivaroxaban',
                  'Warfarina'
                ],
              },
              secondary_effects: {
                antiplatelet_agents: [
                  'Alergias',
                  'Hemorragias digestivas',
                  'Hematomas',
                ]
              },
              antiplatelet_agents: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              oral_anticoagulants: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
            },
            hypolipidemic: {
              treatments_list: {
                statins:
                  [
                    'Atorvastatina', 'Lovastatina', 'Simvastatina',
                    'Pitavastatina', 'Pravastatina', 'Rosuvastatina ',
                  ],
                ezt: [],
                fibratos:
                  [
                    'Gembribrozil', 'Bezafibrato', 'Fenofibrato'
                  ],
                omega3: ['EPA', 'EPA-DHA'],
                ipcsk9: [],
              },
              secondary_effects: {
                statins: ['Dolores musculares'],
                ezt: ['Dolores musculares'],
                fibratos: ['Dolores musculares'],
                omega3: [],
                ipcsk9: [],
              },
              statins: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              ezt: {
                active: 0,
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              fibratos: {
                active: 0,
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              omega3: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              ipcsk9: {
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
            },
            polipildora: {
              treatments_list: {
                polipildora: [
                  {
                    name: 'AAS/Atorvastatina/Ramipril',
                    dosis_selected: '',
                    dosis: [
                      '100/20/2.5mg',
                      '100/20/5mg',
                      '100/20/10mg'
                    ]
                  },
                  {
                    name: 'Amlodipino/Atorvastatina',
                    dosis_selected: '',
                    dosis: [
                      '2.5/20mg',
                      '2.5/40mg',
                      '5/10mg',
                      '5/20mg',
                      '5/40mg',
                      '10/10mg',
                      '10/20mg',
                    ]
                  },
                  {
                    name: 'Bisoprolol, Candesartan, Hidroclorotiazyd, Rosuvastatin, AAS',
                    dosis_selected: '',
                    dosis: [
                      '2.5mg/8mg/6.25mg/10mg/81mg',
                    ]
                  }
                ],
                polipildora_reason: [
                  'Controlar los factores de riesgo', 'Evitar eventos recurrentes',
                  'Disminuir polimedicación', 'Mejorar adherencia'
                ],
              },
              active: 0,
              reason: [],
              selected: [],
            },
          }
        },

      },
      defaultItem: {
        family_history: [],
        diseases: {
          hta: {
            active: 0,
            controlled: 0,
            detected_previously: 1,
            diagnostic_date: '',
          },
          dtm2: {
            active: 0,
            controlled: 0,
            detected_previously: 1,
            diagnostic_date: '',
          },
          pre_dtm2: {
            active: 0,
            controlled: 0,
            detected_previously: 1,
            diagnostic_date: '',
          },
          dyslipidemia: {

            active: 0,
            controlled: 0,
            detected_previously: 1,
            diagnostic_date: '',
            treatment: '',

          },
        },
        emergency_hta_history: 0,
        emergency_diabetes_history: 0,
        cardiovascular_diseases: {
          ischemic_cardiopathy: {
            active: 0,
            revascularized: {
              active: 0,
              surgery: {
                active: 1,
                bridge: '',
                year: moment().format('YYYY-MM-DD'),
              },
              percutaneous: {
                active: 1,
                vessels: '',
                year: moment().format('YYYY-MM-DD'),
                stent: '',
                medicated: 1,
              },
            },
            functional_class_canada: '',
            sca: {
              active: 0,
              year: moment().format('YYYY-MM-DD'),
              revascularized: 1,
              surgery: 1,
              bridge: '',
              percutaneous: 1,
              stent: 1,
              type: '',
              medicated: 1,
              im: [{
                q: 1,
                no_q: 1,
                year: moment().format('YYYY-MM-DD'),
                localization: '',
              }],
            },
            scai: {
              active: 0,
              year: moment().format('YYYY-MM-DD'),
            },
          },
          arritmia: {
            active: 0,
            items: [
              {
                type: '',
                treatment: 0,
                treatment_type: '',
                treatments: [''],
                dosis: '',
                daily_dosis: '',
                ablation: 0,
                ablation_age: '',
                cdi_holder: 0,
                cdi_age: '',
              }
            ]
          },
          heart_failure: {
            active: 0,
            dx_age: moment().format('YYYY-MM-DD'),
            functional_class: '',
            treatment: {
              iecas: {
                active: 0,
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              arni: {
                active: 0,
              },
              dioxin: {
                active: 0,
              },
              bra: {
                active: 0,
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              diuretic: {
                active: 0,
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
              arn: {
                active: 0,
              },
              i_slgt2: {
                active: 0,
                treatment: '',
                frecuency: '',
                dosis: '',
                daily_dosis: '',
                has_secondary_effects: 0,
                secondary_effects: ''
              },
            },
          },
          peripheral_artery_disease: {
            active: 0,
            territory: '',
          },
        },
        cronic_kidney_disease: {
          active: 0,
          stadium: '',
          dialysis: 0,
        },
        cerebrovascular_disease: {
          active: 0,
          items: [
            {
              year: moment().format('YYYY-MM-DD'),
              type: 'Isquémico',
              ischemic_type: '',
            }
          ],
        },
        treatments: {
          antihypertensives: {
            treatments_list: {
              iecas:
                [
                  'Benazepril', 'Captopril', 'Cilazapril',
                  'Enalapril', 'Espirapril', 'Fosinopril', 'Lisinopril',
                  'Imidapril', 'Moexipril', 'Perindopril', 'Quinapril',
                  'Ramipril', 'Espirapril', 'Trandolapril', 'Zofenopril'
                ],
              bra:
                [
                  'Candesartan', 'Eprosartan',
                  'Irbesartan', 'Losartan', 'Olmesartan medoxomilo',
                  'Telmisartan', 'Valsartan'
                ],
              diuretic:
                [
                  { header: 'Tiazidas y similares' },
                  { name: 'Clorotiazida', group: 'Group 1' },
                  { name: 'Clortalidona', group: 'Group 1' },
                  { name: 'Hidroclorotiazida', group: 'Group 1' },
                  { name: 'Metolazona', group: 'Group 1' },
                  { divider: true },
                  { header: 'Asa' },
                  { name: 'Azetazolamida', group: 'Group 2' },
                  { name: 'Bumetamida', group: 'Group 2' },
                  { name: 'Furosemida', group: 'Group 2' },
                  { name: 'Torsemida', group: 'Group 2' },
                  { divider: true },
                  { header: 'Ahorradores de potasio' },
                  { name: 'Metolazona', group: 'Group 3' },
                  { name: 'Espironolactona', group: 'Group 3' },
                  { name: 'Triametereno', group: 'Group 3' },
                  { divider: true },
                  { header: 'Otros' },
                ],
              ca:
                [
                  'Amlodipina', 'Felodipina', 'Isradipina',
                  'Nicardipina', 'Nifedipina', 'Nifedipina OROS',
                  'Nimodipina', 'Nisoldipina', 'Lacidipina',
                  'Manidipina', 'Barnidipina', 'Lecardipina',
                  'Clevadipina', 'Verapamilo', 'Diltiazem'
                ],
              ir: [
                'Candesartan', 'Eprosartan',
                'Irbesartan', 'Losartan', 'Olmesartan medoxomilo',
                'Telmisartan', 'Valsartan'
              ],
              block_beta:
                [
                  'Atenolol', 'Bisoprolol', 'Carvedilol',
                  'Metoprolol', 'Nebivolol', 'Torsemida'
                ],
              arni:
                [
                  'Sacubitril / Valsartan'
                ],
              fdc:
                [
                  { header: 'Calcioantagonistas y diuréticos' },
                  { name: 'Amlodipina + indapamida', group: 'Group 1' },
                  { name: 'Amlodipina + hidroclorotiazida', group: 'Group 1' },
                  { divider: true },
                  { name: 'IECAS + diuréticos' },
                  { name: 'IECAS + calcioantagonitas' },
                  { name: 'IECAS + betabloqueantes' },
                  { name: 'Betabloqueante + diurético' },
                  { name: 'Betabloqueante + calcioantagonista' },
                  { name: 'BRA + diurético + calcioantagonista ' }
                ],
              ant_mineralocorticoids:
                [
                  'Espironolactona', 'Esplerenona'
                ],
            },
            secondary_effects: {
              iecas: ['Tos', 'Edema', 'Angio neurótico'],
              bra: ['Tos', 'Edema', 'Angio neurótico'],
              ca: ['Cefalea', 'Edema'],
              diuretic: [
                'Transtornos HE', 'Hiperglicemia',
                'Bradicardia', 'Disfunción eréctil'
              ],
              ir: ['Tos', 'Edema', 'Angio neurótico'],
              block_beta: [
                'Bradicardia',
                'Disfunción eréctil',
                'Broncoespasmo'
              ],
              arni: [],
              ant_mineralocorticoids: [],
            },
            iecas: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            bra: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            ca: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            ir: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            diuretic: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            arni: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            ant_mineralocorticoids: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            fdc: {
              active: 0,
              selected: [],
            },
            block_beta: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            block: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
          },
          antidiabetics: {
            treatments_list: {
              metformin: [],
              insulin: [
                'Rápida (regular)', 'Intermedia: NPH'
              ],
              a_insulin: [
                'Aspart', 'Degludec', 'Detemir',
                'Glargina', 'Glulisina', 'Lispro',
                'NPA', 'NPL'
              ],
              insulin_mixtures: ['Rápida + NPH', 'Aspart + NPA', 'Lispro – NPL',],
              metformin: [],
              sulfonylureas: [
                'Glibenclamida (gliburida)', 'Glipizida', 'Gliclazida',
                'Gliclazida retard', 'Glimepirida', 'Glisentida'
              ],
              glinidas: ['Repaglinida'],
              pioglitazona: [],
              inh_dpp: [
                'Sitagliptina', 'Vildagliptina', 'Saxagliptina',
                'Linagliptina', 'Alogliptina'
              ],
              i_slgt2: [
                'Dapaglifozina', 'Canaglifozina', 'Empaglifozina'
              ],
              gl: [
                'Exenatide', 'Exenatide LAR', 'Lixisenatide',
                'Liraglutide', 'Dulaglutide'
              ],
              fdc: [
                { name: 'Metformina + Sulfonilúreas' },
                { name: 'Metformina + I DPP-4' },
              ],
            },
            secondary_effects: {
              metformin: ['Trastornos digestivos'],
              insulin: [],
              a_insulin: ['Hipoglicemia'],
              sulfonylureas: ['Hipoglicemia'],
              glinidas: ['Hipoglicemia'],
              pioglitazona: [],
              inh_dpp: [],
              i_slgt2: [],
              gl: [],
            },
            metformin: {
              active: 0,
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            insulin: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            a_insulin: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            insulin_mixtures: {
              selected: [],
            },
            sulfonylureas: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            glinidas: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            pioglitazona: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            inh_dpp: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            i_slgt2: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            gl: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            fdc: {
              active: 0,
              selected: [],
            },
          },
          antithrombotics: {
            treatments_list: {
              antiplatelet_agents: [
                'Aspirina', 'Clopidogrel', 'Prasugrel',
                'Ticagrelor'
              ],
              oral_anticoagulants: [
                'Apixaban', 'Dabigatran', 'Rivaroxaban',
                'Warfarina'
              ],
            },
            secondary_effects: {
              antiplatelet_agents: [
                'Alergias',
                'Hemorragias digestivas',
                'Hematomas',
              ]
            },
            antiplatelet_agents: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            oral_anticoagulants: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
          },
          hypolipidemic: {
            treatments_list: {
              statins:
                [
                  'Atorvastatina', 'Lovastatina', 'Simvastatina',
                  'Pitavastatina', 'Pravastatina', 'Rosuvastatina ',
                ],
              ezt: [],
              fibratos:
                [
                  'Gembribrozil', 'Bezafibrato', 'Fenofibrato'
                ],
              omega3: ['EPA', 'EPA-DHA'],
              ipcsk9: [],
            },
            secondary_effects: {
              statins: ['Dolores musculares'],
              ezt: ['Dolores musculares'],
              fibratos: ['Dolores musculares'],
              omega3: [],
              ipcsk9: [],
            },
            statins: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            ezt: {
              active: 0,
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            fibratos: {
              active: 0,
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            omega3: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
            ipcsk9: {
              treatment: '',
              frecuency: '',
              dosis: '',
              has_secondary_effects: 0,
              secondary_effects: ''
            },
          },
          polipildora: {
            treatments_list: {
              polipildora: [
                {
                  name: 'AAS/Atorvastatina/Ramipril',
                  dosis_selected: '',
                  dosis: [
                    '100/20/2.5mg',
                    '100/20/5mg',
                    '100/20/10mg'
                  ]
                },
                {
                  name: 'Amlodipino/Atorvastatina',
                  dosis_selected: '',
                  dosis: [
                    '2.5/20mg',
                    '2.5/40mg',
                    '5/10mg',
                    '5/20mg',
                    '5/40mg',
                    '10/10mg',
                    '10/20mg',
                  ]
                },
                {
                  name: 'Bisoprolol, Candesartan, Hidroclorotiazyd, Rosuvastatin, AAS',
                  dosis_selected: '',
                  dosis: [
                    '2.5mg/8mg/6.25mg/10mg/81mg',
                  ]
                }
              ],
              polipildora_reason: [
                'Controlar los factores de riesgo', 'Evitar eventos recurrentes',
                'Disminuir polimedicación', 'Mejorar adherencia'
              ],
            },
            active: 0,
            reason: [],
            selected: [],
          },
        }
      },
    },
    patient_risk_factors: {
      loading: false,
      diagnostic_loading: false,
      risk_factors_loaded: false,
      selectedForm: {
        calc_name: '',
        obj: {
          results: '',
        }
      },
      detail_table_rf_selected: {
        nomenclature: '',
        calc_name: 'FINDRISK',
        obj: findrisk_vars
      },
      headers: [
        { text: ' ', align: 'start', value: 'name' },
        { text: 'Diagnóstico', value: 'diagnostic' },
        { text: 'Tratamiento', value: 'comment' },
      ],
      risk_factor_headers: [
        { text: 'Fecha', align: 'start', value: 'created_at' },
        { text: 'Fórmula de Cálculo de Riesgo', align: 'start', value: 'name' },
        { text: 'Resultado', value: 'results' },
      ],
      rf: {
        appointment_id: '',
        treatment_dialog: false,
        treatment_view_dialog: false,
        treatment_selected: {
          name: ''
        },
        risk_factors: [
          {
            name: 'HTA',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Dislipidemia',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Sobrepeso',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Obesidad',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Pre DMt2',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'DMt2',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Arritmia',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Cardiopatía Isquémica',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Insuficiencia Cardíaca',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
          {
            name: 'Tabaquismo',
            diagnostic: 'No',
            has_treatment: 'No',
            same_treatment: '',
            comment: ''
          },
        ],
      },
      risk_factors_diagnostics: [],
      form_risk_factors: [
        {
          nomenclature: '',
          calc_name: 'FINDRISK',
          obj: findrisk_vars
        },
        {
          nomenclature: '',
          calc_name: 'Riesgo OMS/OPS',
          obj: oms_ops_vars
        },
        {
          nomenclature: '',
          calc_name: 'Inter Heart',
          obj: inter_heart_vars
        },
        {
          nomenclature: '%',
          calc_name: 'Evaluación del riesgo cardiovascular (10 años, Framingham 2008)',
          obj: heart_risk_framingham_vars
        },
      ],
      risk_factors_list: {
        current_list: [],
        previous_list: [],
        items: []
      },
      risk_factors_calc_list: [],
      defaultItems: {
        risk_factors: {
          appointment_id: '',
          treatment_dialog: false,
          treatment_selected: {
            name: ''
          },
          risk_factors: [
            {
              name: 'HTA',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Dislipidemia',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Sobrepeso',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Obesidad',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Pre DMt2',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'DMt2',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Arritmia',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Cardiopatía Isquémica',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Insuficiencia Cardíaca',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
            {
              name: 'Tabaquismo',
              diagnostic: 'No',
              has_treatment: 'No',
              same_treatment: '',
              comment: ''
            },
          ],
        }
      }
    },
    patient_plan: {
      loading: false,
      treatment_edit_dialog: false,
      treatment_view_dialog: false,
      save_loading: false,
      alreadySaved: false,
      items: [],
      select: [
        {
          text: 'Sí',
          value: '1'
        },
        {
          text: 'No',
          value: '0'
        },
      ],
      headers: [
        { text: 'Fecha', value: 'created_at' },
        { text: 'Nutrición', align: 'start', value: 'nutrition' },
        { text: 'Plan de ejercicio', value: 'exercise_plan' },
        { text: 'Exámenes paraclínicos', value: 'clinics_exams' },
        { text: 'Materiales', value: 'materials' },
      ],
      editedItem: {
        nutrition: '',
        exercise_plan: '',
        previous_treatments: '0',
        clinics_exams: [
          {
            name: 'Laboratorio',
            value: '0'
          },
          {
            name: 'Rayos X de Torax',
            value: '0'
          },
          {
            name: 'Ecocardiograma',
            value: '0'
          },
          {
            name: 'Duplex arterial',
            value: '0'
          },
          {
            name: 'Angio-Tac coronaria',
            value: '0'
          },
        ],
        materials: [],
        registered_at: moment().format('YYYY-MM-DD')
      },
      defaultItem: {
        nutrition: '',
        exercise_plan: '',
        previous_treatments: '0',
        clinics_exams: [
          {
            name: 'Laboratorio',
            value: '0'
          },
          {
            name: 'Rayos X de Torax',
            value: '0'
          },
          {
            name: 'Ecocardiograma',
            value: '0'
          },
          {
            name: 'Duplex arterial',
            value: '0'
          },
          {
            name: 'Angio-Tac coronaria',
            value: '0'
          },
        ],
        registered_at: moment().format('YYYY-MM-DD')
      },
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
    document_types: [
      {
        text: 'DNI',
        value: 'DNI'
      },
      {
        text: 'RUT',
        value: 'RUT'
      },
      {
        text: 'Cédula',
        value: 'cédula'
      },
      {
        text: 'Pasaporte',
        value: 'pasaporte'
      },
    ],
    editedIndex: -1,
    editedViewIndex: -1,
    editedItem: {
      meta: {
        instagram: '',
        facebook: '',
        twitter: '',
      },
    },
    defaultItem: {
      meta: {
        instagram: '',
        facebook: '',
        twitter: '',
      },
      telegram: '0',
      whatsapp: '0',
      sms: '0',
    },
  },

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'Añadir nuevo paciente' : 'Editar ficha del paciente - N° de historia: ' + this.editedItem.patient_id
    },
    AppointmentFormTitle() {
      const obj = this.patient_appointments
      return obj.editedIndex === -1 ? 'Añadir nueva cita' : 'Editar cita del paciente '
    },

    RecipesFormTitle() {
      const obj = this.recipes
      return obj.editedIndex === -1 ? 'Añadir nuevo récipe' : 'Editar récipe '
    },

    ReportsFormTitle() {
      const obj = this.reports
      return obj.editedIndex === -1 ? 'Añadir nuevo informe' : 'Editar informe '
    },

  },

  watch: {

    tab() {
      if (this.$refs.edit_tabs !== undefined)
        this.$refs.edit_tabs.$el.scrollIntoView({ behavior: 'smooth' })
    },

    dialog(val) {
      val || this.close()
    },

    dialogDelete(val) {
      val || this.closeDelete()
    },

    appointmentDialog(val) {
      val || this.closeAppointment()
    },

    appointmentDialogDelete(val) {
      val || this.closeAppointmentDelete()
    },

    birthdate_modal(val) {
      val && this.$nextTick(() => (this.$refs.register_patient_bd.activePicker = 'YEAR'))
    },

    ph_cd_heart_failure_dx_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_heart_failure_datepicker.activePicker = 'YEAR'))
    },

    ph_cd_ischemic_cardiopathy_sca_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_ischemic_cardiopathy_sca_datepicker.activePicker = 'YEAR'))
    },

    ph_cd_ischemic_cardiopathy_sca_im_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_ischemic_cardiopathy_sca_im_datepicker[this.ref_index].activePicker = 'YEAR'))
    },

    ph_cd_ischemic_cardiopathy_sca_ua_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_ischemic_cardiopathy_sca_ua_datepicker[this.ref_index].activePicker = 'YEAR'))
    },
    ph_cd_ischemic_cardiopathy_scai_ua_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_ischemic_cardiopathy_sca_ua_datepicker[this.ref_index].activePicker = 'YEAR'))
    },

    ph_cd_ischemic_cardiopathy_scai_ua_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_ischemic_cardiopathy_scai_ua_datepicker.activePicker = 'YEAR'))
    },

    smoking_start_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.smoking_start_year_datepicker.activePicker = 'YEAR'))
    },

    smoking_quit_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.smoking_quit_year_datepicker.activePicker = 'YEAR'))
    },

    ph_cd_ischemic_cardiopathy_surgery_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_ischemic_cardiopathy_surgery_year_datepicker.activePicker = 'YEAR'))
    },

    ph_cd_ischemic_cardiopathy_percutaneous_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cd_ischemic_cardiopathy_percutaneous_year_datepicker.activePicker = 'YEAR'))
    },

    cv_disease_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.cv_disease_year_datepicker[this.ref_index].activePicker = 'YEAR'))
    },

    arritmia_year_modal(val) {
      val && this.$nextTick(() => (this.$refs.arritmia_year_datepicker[this.ref_index].activePicker = 'YEAR'))
    },

  },

  created() {
    this.initialize()
  },

  mounted() {
  },

  methods: {
    initialize() {
      var url = api_url + 'patients/get'
      var app = this
      app.$http.get(url).then(res => {
        res.body.forEach(e => {
          if (Array.isArray(e.meta)) {
            e.meta = {}
          }
        })
        app.patients = res.body
        app.comparison.patients = res.body
        app.comparison.patients_filtered = res.body
        app.initializeMaterialTemplates()
      }, err => {

      })
        .then(res => {
          url += '-external'
          app.comparison.external_loading = true
          app.$http.get(url).then(res => {
            app.comparison.external_loading = false
            app.comparison.external_patients = res.body
            app.comparison.external_patients_filtered = res.body
          }, err => {
            app.comparison.external_loading = false
          })
        })
    },

    initializeMaterialTemplates() {
      var app = this
      url = api_url + 'material-templates/get'
      app.templates_loading = true
      app.$http.get(url).then(res => {
        app.templates_loading = false
        if (res.body.length > 0) {
          app.templates = res.body
          app.filtered_templates = res.body
        }
      }, err => {
        app.templates_loading = false
      })
    },

    initializeRecipes() {
      var app = this
      var url = api_url + 'recipes/get/' + app.editedItem.patient_id
      app.recipes.items = []
      app.$http.get(url).then(res => {
        res.body.forEach((e, i) => {
          item = e
          item.diagnostics = JSON.parse(e.diagnostics)
          item.instructions = JSON.parse(e.instructions)
          app.recipes.items.push(item)
        });
      }, err => {

      })
    },

    initializeReports() {
      var app = this
      var url = api_url + 'reports/get/' + app.editedItem.patient_id
      app.reports.items = []
      app.$http.get(url).then(res => {
        res.body.forEach(e => {
          app.reports.items.push(e)
        });
      }, err => {

      })
    },

    initializeExams() {
      var app = this
      var url = api_url + 'medical-exams/get-exams-list'
      app.$http.get(url).then(res => {
        app.patient_laboratory_exams.exams = res.body
      }, err => {

      })
    },

    initializeExamsFiles() {
      var app = this
      var url = api_url + 'medical-exams/get-exam-files/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        app.patient_laboratory_exams.exam_files = res.body
        app.views.patient_laboratory_exams.exam_files = res.body
      }, err => {

      })
    },

    initializeAppointments(appointment_id) {
      var app = this
      app.general_save = false
      app.getDoctors()
      if (app.patient_appointments.appointments.length == 0) {
        app.patient_appointments.current_appointment = {}
        app.patient_appointments.previous_appointment = {}
        var url = api_url + 'appointments/get/' + app.editedItem.patient_id
        app.$http.get(url).then(res => {
          app.patient_appointments.appointments = res.body
          if (res.body.length > 0) {
            var obj = app.patient_appointments
            var filtered_appointment = appointment_id !== undefined ?
              obj.appointments.find(e => e.appointment_id == appointment_id) : {}
            var total_length = obj.appointments.length
            var current_appointment_i = Object.keys(filtered_appointment).length > 0 ? filtered_appointment : obj.appointments[total_length - 1]
            current_appointment_i.patient_id = app.editedItem.patient_id
            if (total_length > 1) {
              var previous_appointment_i = Object.keys(filtered_appointment).length > 0 && obj.appointments.indexOf(filtered_appointment) !== 0 ?
                obj.appointments[obj.appointments.indexOf(filtered_appointment) - 1] : obj.appointments[total_length - 2]
              previous_appointment_i.patient_id = app.editedItem.patient_id
              app.patient_appointments.previous_appointment = previous_appointment_i
            }
            app.patient_appointments.current_appointment = appointment_id !== undefined ?
              obj.appointments.find(e => e.appointment_id == appointment_id) : current_appointment_i
          }
        }, err => {

        }).then(() => {
          app.initializeHistory()
        })
      }
    },

    initializeComparisonAppointments() {
      var app = this
      var obj = app.comparison.appointments
      obj.loading = true
      obj.current_patient = {}
      obj.patient_to_compare = {}
      var url = api_url + 'appointments/get/comparison'
      var data = {
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }

      app.$http.post(url, data).then(res => {

        if (res.body.hasOwnProperty('current_patient_appointments')
          && res.body.hasOwnProperty('patient_to_compare_appointments')) {
          obj.current_patient = res.body.current_patient_appointments.length > 1 ?
            res.body.current_patient_appointments[res.body.current_patient_appointments.length - 1] : res.body.current_patient_appointments[0]

          obj.current_patient.patient_id = app.comparison.patient_selected.patient_id

          obj.patient_to_compare = res.body.patient_to_compare_appointments.length > 1 ?
            res.body.patient_to_compare_appointments[res.body.patient_to_compare_appointments.length - 1] : res.body.patient_to_compare_appointments[0]

          obj.patient_to_compare.patient_id = app.comparison.patient_to_compare.patient_id

          app.initializeComparisonHistory()
        }
        obj.loading = false
      }, err => {
        obj.loading = false
      })
    },

    openExternalAppointmentForm(item) {
      var app = this
      app.general_save = false
      app.getDoctors()
      app.editedIndex = app.patients.indexOf(item)
      app.editedItem = Object.assign({}, item)
      app.patient_appointments.editedItem = Object.assign({}, app.patient_appointments.defaultItem)
      app.patient_appointments.outside_dialog = true
    },

    initializeAnthropometry(add_to_report = false) {
      var app = this
      app.general_save = false
      var url = api_url + 'anthropometry/get'
      var data = {
        patient_id: app.editedItem.patient_id,
        appointment_id: app.patient_appointments.current_appointment.appointment_id
      }
      app.$http.post(url, data).then(res => {
        app.patient_anthropometry.editedItem = res.body.hasOwnProperty('current_anthropometry')
          && res.body.current_anthropometry.hasOwnProperty('appointment_id') ?
          res.body.current_anthropometry :
          Object.assign({}, app.patient_anthropometry.defaultItem)
        res.body.antropometry_history.forEach(item => {
          item.created_at = app.patient_appointments.appointments.find(e => e.appointment_id == item.appointment_id).appointment_date
        });
        app.patient_anthropometry.history = res.body.antropometry_history
        if (add_to_report) {
          app.reports.editedItem.meta.anthropometry.item = app.patient_anthropometry.editedItem
        }
      }, err => {

      })
    },

    initializeComparisonAnthropometry(get_all = false) {
      var app = this
      var obj = app.comparison.anthropometry
      if (get_all) {
        obj.average_loading = true
        var url = api_url + 'anthropometry/get/comparison-average'
        var patient_ids = []
        var external_patient_ids = []

        app.comparison.patients_filtered.forEach(e => {
          patient_ids.push(e.patient_id)
        })
        app.comparison.external_patients_filtered.forEach(e => {
          external_patient_ids.push(e.patient_id)
        })

        var data = {
          patient_ids,
          external_patient_ids
        }
        app.$http.post(url, data).then(res => {
          if (res.body.hasOwnProperty('current_patient_items')
            && res.body.hasOwnProperty('patient_to_compare_items')) {
            obj.current_patient = res.body.current_patient_items.length > 1
              ? res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]
            obj.patient_to_compare = res.body.patient_to_compare_items.length > 1
              ? res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]
          }
          obj.average_loading = false
        }, err => {
          obj.average_loading = false
        })
      }
      else {
        obj.loading = true
        var url = api_url + 'anthropometry/get/comparison'
        var data = {
          current_patient_id: app.comparison.patient_selected.patient_id,
          patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
        }
        app.$http.post(url, data).then(res => {
          if (res.body.hasOwnProperty('current_patient_items')
            && res.body.hasOwnProperty('patient_to_compare_items')) {
            obj.current_patient = res.body.current_patient_items.length > 1
              ? res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]
            obj.patient_to_compare = res.body.patient_to_compare_items.length > 1
              ? res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]
          }
          obj.loading = false
        }, err => {
          obj.loading = false
        })
      }
    },

    setAnthropometryVars() {
      var app = this
      var anthropometry = app.patient_anthropometry
      var url = api_url + 'anthropometry/get'
      var data = {
        patient_id: app.editedItem.patient_id,
        appointment_id: app.patient_appointments.current_appointment.appointment_id
      }
      app.$http.post(url, data).then(res => {
        anthropometry.editedItem = res.body.hasOwnProperty('current_anthropometry')
          && res.body.current_anthropometry.hasOwnProperty('appointment_id') ?
          res.body.current_anthropometry :
          Object.assign({}, anthropometry.defaultItem)
        app.patient_risk_factors.selectedForm.obj.vars.weight = anthropometry.editedItem.weight
        app.patient_risk_factors.selectedForm.obj.vars.weight_suffix = anthropometry.editedItem.weight_suffix
        app.patient_risk_factors.selectedForm.obj.vars.height = anthropometry.editedItem.height
        app.patient_risk_factors.selectedForm.obj.vars.height_suffix = anthropometry.editedItem.height_suffix
        app.patient_risk_factors.selectedForm.obj.vars.perimeter = anthropometry.editedItem.abdominal_waist
        app.patient_risk_factors.selectedForm.obj.vars.perimeter_suffix = anthropometry.editedItem.abdominal_waist_suffix
        app.patient_risk_factors.selectedForm.obj.vars.bmi = app.getBMI(
          app.patient_risk_factors.selectedForm.obj.vars.weight,
          app.patient_risk_factors.selectedForm.obj.vars.height,
          app.patient_risk_factors.selectedForm.obj.vars.weight_suffix,
          app.patient_risk_factors.selectedForm.obj.vars.height_suffix
        ).split(" ")[0]
      }, err => {

      })
    },

    initializeHistory() {
      var app = this
      var obj = app.patient_history
      app.general_save = false
      obj.form.history_content = Object.assign({}, obj.defaultItem)
      var url = api_url + 'history/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          var records = []
          res.body.forEach((record) => {
            var e = {
              appointment_id: record.appointment_id,
              history_content: JSON.parse(record.history_content),
              created_at: record.created_at,
              updated_at: record.updated_at
            }
            records.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.form.history_content = e.history_content
            }
          })
          obj.items = records
        }
      }, err => {

      })
    },

    initializeComparisonHistory() {
      var app = this
      var obj = app.comparison.history
      obj.loading = true
      obj.current_patient = {}
      obj.patient_to_compare = {}
      var url = api_url + 'history/get/comparison'
      var data = {
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }

      app.$http.post(url, data).then(res => {

        if (res.body.hasOwnProperty('current_patient_items')
          && res.body.hasOwnProperty('patient_to_compare_items')) {
          obj.current_patient = res.body.current_patient_items.length > 1 ?
            res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]

          if (obj.current_patient !== undefined) {
            obj.current_patient.history_content = JSON.parse(obj.current_patient.history_content)
          }

          obj.patient_to_compare = res.body.patient_to_compare_items.length > 1 ?
            res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]

          if (obj.patient_to_compare !== undefined) {
            obj.patient_to_compare.history_content = JSON.parse(obj.patient_to_compare.history_content)
          }
        }
        obj.loading = false
      }, err => {
        obj.loading = false
      })
    },

    initializePhysicalExams(add_to_report = false) {
      var app = this
      var obj = app.patient_physical_exam
      obj.content = Object.assign({}, obj.defaultItem)
      obj.loading = true
      var url = api_url + 'patient-physical-exams/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        obj.loading = false
        if (res.body.length > 0) {
          var records = []
          res.body.forEach((record) => {
            var e = {
              appointment_id: record.appointment_id,
              content: JSON.parse(record.content),
              created_at: record.created_at,
              updated_at: record.updated_at
            }
            records.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.content = e.content
            }
          })
          obj.items = records
        }
        if (add_to_report) {
          app.reports.editedItem.meta.physical_exam.item = obj.content
        }

      }, err => {

      })
    },

    initializeComparisonPhysicalExams() {
      var app = this
      var obj = app.comparison.physical_exams
      obj.loading = true
      obj.current_patient = {}
      obj.patient_to_compare = {}
      var url = api_url + 'patient-physical-exams/get/comparison'
      var data = {
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }

      app.$http.post(url, data).then(res => {

        if (res.body.hasOwnProperty('current_patient_items')
          && res.body.hasOwnProperty('patient_to_compare_items')) {
          obj.current_patient = res.body.current_patient_items.length > 1 ?
            res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]

          obj.current_patient.content = JSON.parse(obj.current_patient.content)

          obj.patient_to_compare = res.body.patient_to_compare_items.length > 1 ?
            res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]

          obj.patient_to_compare.content = JSON.parse(obj.patient_to_compare.content)

        }
        obj.loading = false
      }, err => {
        obj.loading = false
      })
    },

    initializeElectroCardiograms(add_to_report = false) {
      var app = this
      var obj = app.patient_electro_cardiogram
      obj.content = Object.assign({}, obj.defaultItem)
      obj.loading = true
      var url = api_url + 'patient-electro-cardiograms/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        obj.loading = false
        if (res.body.length > 0) {
          var records = []
          res.body.forEach((record) => {
            var e = {
              appointment_id: record.appointment_id,
              content: JSON.parse(record.content),
              created_at: record.created_at,
              updated_at: record.updated_at
            }
            records.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.content = e.content
            }
          })
          obj.items = records
        }
        if (add_to_report) {
          app.reports.editedItem.meta.electro_cardiogram.item = obj.content
        }
      }, err => {

      })
    },

    initializeComparisonElectroCardiogram() {
      var app = this
      var obj = app.comparison.electro_cardiogram
      obj.loading = true
      obj.current_patient = {}
      obj.patient_to_compare = {}
      var url = api_url + 'patient-electro-cardiograms/get/comparison'
      var data = {
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }

      app.$http.post(url, data).then(res => {

        if (res.body.hasOwnProperty('current_patient_items')
          && res.body.hasOwnProperty('patient_to_compare_items')) {
          obj.current_patient = res.body.current_patient_items.length > 1 ?
            res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]

          obj.current_patient.content = JSON.parse(obj.current_patient.content)

          obj.patient_to_compare = res.body.patient_to_compare_items.length > 1 ?
            res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]

          obj.patient_to_compare.content = JSON.parse(obj.patient_to_compare.content)

        }
        obj.loading = false
      }, err => {
        obj.loading = false
      })
    },

    initializeEchocardiograms(add_to_report = false) {
      var app = this
      var obj = app.patient_echocardiogram
      obj.content = obj.defaultItem
      obj.loading = true
      var url = api_url + 'patient-echocardiograms/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        if (res.body.length > 0) {
          var records = []
          res.body.forEach((record) => {
            var e = {
              appointment_id: record.appointment_id,
              content: record.content,
              created_at: record.created_at,
              updated_at: record.updated_at
            }
            records.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.content = e.content
            }
          })
          obj.items = records
          if (add_to_report) {
            app.reports.editedItem.meta.echocardiogram.item = obj.content
          }
        }
      }, err => {

      })
    },

    initializeComparisonEchocardiograms() {
      var app = this
      var obj = app.comparison.echocardiogram
      obj.loading = true
      obj.current_patient = {}
      obj.patient_to_compare = {}
      var url = api_url + 'patient-echocardiograms/get/comparison'
      var data = {
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }

      app.$http.post(url, data).then(res => {

        if (res.body.hasOwnProperty('current_patient_items')
          && res.body.hasOwnProperty('patient_to_compare_items')) {
          obj.current_patient = res.body.current_patient_items.length > 1 ?
            res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]

          obj.patient_to_compare = res.body.patient_to_compare_items.length > 1 ?
            res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]

        }
        obj.loading = false
      }, err => {
        obj.loading = false
      })
    },

    initializeLifeStyle() {
      var app = this
      var obj = app.patient_life_style
      obj.loading = true
      obj.items = []
      obj.editedItem = Object.assign({}, obj.defaultItem)
      var url = api_url + 'patient-life-style/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        obj.loading = false
        if (res.body.length > 0) {
          var items = []
          res.body.forEach((e, i) => {
            e.exercise = JSON.parse(e.exercise)
            e.smoking = JSON.parse(e.smoking)
            e.sedentary_material = JSON.parse(e.sedentary_material)
            e.created_at = app.patient_appointments.appointments.find(item => item.appointment_id == e.appointment_id).appointment_date
            items.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.editedItem = e
            }
          });
          if(!obj.editedItem.hasOwnProperty('appointment_id')) {
            obj.editedItem = Object.assign({}, obj.items[obj.items.length - 1])
            obj.editedItem.appointment_id = app.patient_appointments.current_appointment.appointment_id
          } 
          obj.items = items
        }
      }, err => {
        obj.loading = false
      })
    },

    initializePlans() {
      var app = this
      var obj = app.patient_plan
      app.alreadySaved = false
      obj.loading = true
      obj.save_loading = true
      obj.editedItem = Object.assign({}, obj.defaultItem)
      var url = api_url + 'patient-plans/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        obj.save_loading = false
        obj.loading = false
        if (res.body.length > 0) {
          var items = []
          res.body.forEach((e, i) => {
            e.clinics_exams = JSON.parse(e.clinics_exams)
            e.materials = JSON.parse(e.materials)
            items.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.editedItem = e
            }
          });
          if(!obj.editedItem.hasOwnProperty('appointment_id')) {
            obj.editedItem = Object.assign({}, obj.items[obj.items.length - 1])
            obj.editedItem.appointment_id = app.patient_appointments.current_appointment.appointment_id
          }
          obj.items = items
        }
      }, err => {
        obj.loading = false
        obj.save_loading = false
      })
    },

    initializeFactorsRisk(get_risk_factors) {
      var app = this
      var obj = app.patient_risk_factors
      obj.loading = true
      var data = {
        patient_id: app.editedItem.patient_id,
        current_appointment: app.patient_appointments.current_appointment.appointment_id,
        previous_appointment: app.patient_appointments.previous_appointment.appointment_id
      }
      if (get_risk_factors) {
        obj.risk_factors_list.current_list = []
        obj.risk_factors_list.previous_list = []
        obj.risk_factors_list.items = []
        obj.risk_factors_loaded = true
        var url = api_url + 'patient-risk-factors/get/'
        app.$http.post(url, data).then(res => {
          if (res.body.hasOwnProperty('current_list')) {
            res.body.current_list.forEach(e => {
              e.created_at = app.patient_appointments.appointments.find(item => item.appointment_id == e.appointment_id).appointment_date
            })
            obj.risk_factors_list.current_list = res.body.current_list
          }
          if (res.body.hasOwnProperty('previous_list')) {
            res.body.previous_list.forEach(e => {
              e.created_at = app.patient_appointments.appointments.find(item => item.appointment_id == e.appointment_id).appointment_date
            })
            obj.risk_factors_list.previous_list = res.body.previous_list
          }
          if (res.body.hasOwnProperty('items')) {
            res.body.items.forEach(e => {
              e.created_at = app.patient_appointments.appointments.find(item => item.appointment_id == e.appointment_id).appointment_date
            })
            obj.risk_factors_list.items = res.body.items
          }
          /*
          if (res.body.hasOwnProperty('current_risk_factors_diagnostics')) {
            obj.risk_factors_list = res.body
          }
          */
          obj.risk_factors_loaded = false
        }, err => {

        })
      }
      obj.selectedForm = { calc_name: '', obj: { results: '' } }
      var url = api_url + 'patient-risk-factors-diagnostic/get/'
      obj.risk_factors = Object.assign({}, obj.defaultItems.risk_factors)
      obj.risk_factors_diagnostics = []
      app.$http.post(url, data).then(res => {
        if (res.body.hasOwnProperty('current_risk_factors_diagnostics') &&
          res.body.current_risk_factors_diagnostics.hasOwnProperty('risk_factors')) {
          res.body.current_risk_factors_diagnostics.risk_factors =
            JSON.parse(res.body.current_risk_factors_diagnostics.risk_factors)
          var rf = res.body.current_risk_factors_diagnostics
          rf.patient_id = data.patient_id
          rf.appointment_id = data.current_appointment
          obj.rf.appointment_id = rf.appointment_id
          obj.rf.risk_factors = rf.risk_factors
          obj.rf.created_at = rf.created_at
          obj.rf.updated_at = rf.updated_at
        }
        else {
          var history = app.patient_history.form.history_content
          obj.rf.risk_factors.forEach(e => {
            if (e.name == 'HTA') {
              e.diagnostic = parseInt(history.diseases.hta.active) ? 'Sí' : 'No'
            }
            else if (e.name == 'Dislipidemia') {
              e.diagnostic = parseInt(history.diseases.dyslipidemia.active) ? 'Sí' : 'No'
            }
            else if (e.name == 'Pre DMt2') {
              e.diagnostic = parseInt(history.diseases.pre_dtm2.active) ? 'Sí' : 'No'
            }
            else if (e.name == 'DMt2') {
              e.diagnostic = parseInt(history.diseases.dtm2.active) ? 'Sí' : 'No'
            }
            else if (e.name == 'Cardiopatía Isquémica') {
              e.diagnostic = parseInt(history.cardiovascular_diseases.ischemic_cardiopathy.sca.active) ? 'Sí' : 'No'
            }
            else if (e.name == 'Arritmia') {
              e.diagnostic = history.cardiovascular_diseases.arritmia.type != '' ? 'Sí' : 'No'
            }
            else if (e.name == 'Insuficiencia Cardíaca') {
              e.diagnostic = parseInt(history.cardiovascular_diseases.heart_failure.active) ? 'Sí' : 'No'
            }
            else {
              e.diagnostic = 'No'
            }
          })
        }
        if (res.body.hasOwnProperty('risk_factors_diagnostics') &&
          res.body.risk_factors_diagnostics.length > 0) {
          var items = []
          res.body.risk_factors_diagnostics.forEach((i) => {
            var item = i
            item.risk_factors = JSON.parse(item.risk_factors)
            items.push(item)
          })
          obj.risk_factors_diagnostics = items
        }
        obj.loading = false
      }, err => {

      })
    },

    initializeComparisonFactorsRisk(get_risk_factors) {
      var app = this
      var obj = app.comparison.diagnostics

      obj.loading = true
      obj.rf_loading = true

      obj.items.current_patient = []
      obj.items.patient_to_compare = []
      obj.risk_factors.current_patient = []
      obj.risk_factors.patient_to_compare = []

      var data = {
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }
      if (get_risk_factors) {
        app.patient_risk_factors.rf_loading = true
        var url = api_url + 'patient-risk-factors/get/comparison'
        app.$http.post(url, data).then(res => {
          if ((res.body.hasOwnProperty('current_patient_items')
            && res.body.current_patient_items.length > 1) || (res.body.hasOwnProperty('patient_to_compare_items')
              && res.body.patient_to_compare_items.length > 1)) {
            var current_factor_risk = []
            var factor_risk_to_compare = []
            app.patient_risk_factors.form_risk_factors.forEach(rf => {
              var rfc_results = res.body.current_patient_items.filter(item => {
                return item.name == rf.calc_name
              });
              var rtfc_results = res.body.patient_to_compare_items.filter(item => {
                return item.name == rf.calc_name
              });
              if (rfc_results.length > 0) {
                current_factor_risk.push(rfc_results.length >= 2 ? rfc_results[rfc_results.length - 1] : rfc_results[0])
              }
              if (rtfc_results.length > 0) {
                factor_risk_to_compare.push(rtfc_results.length >= 2 ? rtfc_results[rtfc_results.length - 1] : rtfc_results[0])
              }
            });
            obj.risk_factors.current_patient = current_factor_risk
            obj.risk_factors.patient_to_compare = factor_risk_to_compare
          }
          obj.rf_loading = false
        }, err => {
          obj.rf_loading = false
        })
      }
      var url = api_url + 'patient-risk-factors-diagnostic/get/comparison'
      app.$http.post(url, data).then(res => {
        if (res.body.hasOwnProperty('current_patient_items')
          && res.body.hasOwnProperty('patient_to_compare_items')) {
          var dx_current_patient = res.body.current_patient_items.length > 1 ?
            res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]

          obj.items.current_patient = dx_current_patient === undefined ? [] : JSON.parse(dx_current_patient.risk_factors)

          dx_patient_to_compare = res.body.patient_to_compare_items.length > 1 ?
            res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]

          obj.items.patient_to_compare = dx_patient_to_compare === undefined ? [] : JSON.parse(dx_patient_to_compare.risk_factors)
        }
        obj.loading = false
      }, err => {

      })
    },

    initializeVitalSigns(add_to_report = false) {
      var app = this
      var obj = app.patient_vital_signs
      obj.takes = obj.defaultItem
      obj.temperature = 35
      obj.sat = 75
      app.general_save = false
      var url = api_url + 'vital-signals/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        obj.records = []
        if (res.body.length > 0) {
          var patient_records = []
          obj.records = res.body.forEach((record) => {
            var e = {
              appointment_id: record.appointment_id,
              sitting: JSON.parse(record.sitting),
              lying_down: JSON.parse(record.lying_down),
              standing: JSON.parse(record.standing),
              takes: JSON.parse(record.takes),
              created_at: app.patient_appointments.appointments.find(e => e.appointment_id == record.appointment_id).appointment_date,
              updated_at: record.updated_at
            }
            patient_records.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.takes = e.takes
              obj.temperature = e.sitting.temperature
              obj.sat = e.sitting.sat
              obj.appointment_id = e.appointment_id

              if (add_to_report) {
                var item = {
                  takes: e.takes,
                  temperature: e.sitting.temperature,
                  sat: e.sitting.sat
                }
                app.reports.editedItem.meta.vital_signs = item
              }
            }
          })
          obj.records = patient_records
        }
      }, err => {

      })
    },

    initializeComparisonVitalSigns() {
      var app = this
      var obj = app.comparison.vital_signs
      obj.loading = true
      obj.current_patient = {}
      obj.patient_to_compare = {}
      var url = api_url + 'vital-signals/get/comparison'
      var data = {
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }

      app.$http.post(url, data).then(res => {

        if (res.body.hasOwnProperty('current_patient_items')
          && res.body.hasOwnProperty('patient_to_compare_items')) {
          obj.current_patient = res.body.current_patient_items.length > 1 ?
            res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]

          obj.current_patient.takes = JSON.parse(obj.current_patient.takes)
          obj.current_patient.sitting = JSON.parse(obj.current_patient.sitting)
          obj.current_patient.lying_down = JSON.parse(obj.current_patient.lying_down)
          obj.current_patient.standing = JSON.parse(obj.current_patient.standing)
          obj.current_patient.sat = JSON.parse(obj.current_patient.standing.sat)
          obj.current_patient.temperature = JSON.parse(obj.current_patient.standing.temperature)

          obj.patient_to_compare = res.body.patient_to_compare_items.length > 1 ?
            res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]

          obj.patient_to_compare.takes = JSON.parse(obj.patient_to_compare.takes)
          obj.patient_to_compare.sitting = JSON.parse(obj.patient_to_compare.sitting)
          obj.patient_to_compare.lying_down = JSON.parse(obj.patient_to_compare.lying_down)
          obj.patient_to_compare.standing = JSON.parse(obj.patient_to_compare.standing)
          obj.patient_to_compare.sat = JSON.parse(obj.patient_to_compare.standing.sat)
          obj.patient_to_compare.temperature = JSON.parse(obj.patient_to_compare.standing.temperature)

        }
        obj.loading = false
      }, err => {
        obj.loading = false
      })
    },

    loadGeneralStatistics() {
      var app = this
      var age_male_count = 0
      var age_female_count = 0
      var age_female_average = 0
      var age_male_average = 0

      var female_patients = app.patients.filter(e => {
        return e.gender == 'F'
      })

      female_patients.forEach(e => {
        age_female_count = age_female_count + 1
        age_female_average = age_female_average + app.getTimeDiff(e.birthdate)
      })

      var male_patients = app.patients.filter(e => {
        return e.gender == 'M'
      })

      male_patients.forEach(e => {
        age_male_count = age_male_count + 1
        age_male_average = age_male_average + app.getTimeDiff(e.birthdate)
      })

      if (age_female_count > 0) {
        app.statistics.female.age_average = Math.round(age_female_average / age_female_count)
      }

      if (age_male_count > 0) {
        app.statistics.male.age_average = Math.round(age_male_average / age_male_count)
      }

      app.statistics.male.total_patients = male_patients.length
      app.statistics.female.total_patients = female_patients.length

    },

    loadPatientsEntryStatistics() {
      var app = this
      app.statistics.chart.loading = true

      for (var i = 0; i < 8; i++) {
        app.statistics.chart.weekly_data.labels[i] = moment(app.statistics.chart.weekly_data.current_day).subtract(7 - i, 'days').format('MM-DD')
      }
      app.statistics.chart.weekly_data.labels.forEach((e, i) => {
        var filtered_date = app.patients.filter(p => {
          return p.entry_date == moment().format('YYYY-') + e
        });
        app.statistics.chart.weekly_data.datasets[0].data[i] = filtered_date.length
        app.statistics.chart.weekly_data.datasets[1].data[i] = filtered_date.filter(f => {
          return f.gender == 'M'
        }).length
        app.statistics.chart.weekly_data.datasets[2].data[i] = filtered_date.filter(f => {
          return f.gender == 'F'
        }).length

      })

      app.statistics.chart.monthly_data.months.forEach((e, i) => {
        var filtered_month = app.patients.filter(p => {
          return p.entry_date.includes(moment().format('YYYY-') + e)
        });
        app.statistics.chart.monthly_data.datasets[0].data[i] = filtered_month.length
        app.statistics.chart.monthly_data.datasets[1].data[i] = filtered_month.filter(f => {
          return f.gender == 'M'
        }).length
        app.statistics.chart.monthly_data.datasets[2].data[i] = filtered_month.filter(f => {
          return f.gender == 'F'
        }).length

      })

      app.statistics.chart.loading = false
      app.$refs.monthly_chart !== undefined ? app.$refs.monthly_chart.renderChart(app.statistics.chart.monthly_data) : ''
      app.$refs.weekly_chart !== undefined ? app.$refs.weekly_chart.renderChart(app.statistics.chart.weekly_data) : ''
    },

    loadAnthropometryStatistics() {
      var app = this
      var obesity = app.statistics.diseases.obesity
      var count = 0
      var weight_average = 0
      var height_average = 0
      var abdominal_waist_average = 0
      obesity.total = 0

      app.statistics.anthropometry.loading = true
      var url = api_url + 'anthropometry/get-by-list'

      app.$http.post(url, app.patients).then(res => {
        res.body.forEach(e => {
          var weight = e.weight_suffix == 'lb' ? parseFloat(weight / 2.205).toFixed(2) : parseFloat(e.weight).toFixed(2)
          var height = e.height_suffix == 'in' ? parseFloat(height / 2.54).toFixed(2) : parseFloat(e.height).toFixed(2)
          var abdominal_waist = e.abdominal_waist_suffix == 'in' ? parseFloat(abdominal_waist / 2.54).toFixed(2) : parseFloat(e.abdominal_waist).toFixed(2)
          if (weight > 0 || height > 0) {
            count = count + 1
            app.getBMI(weight, height, 'kg', 'cm').replace(' kg/m2', '') >= 30 ? obesity.total++ : ''
            weight_average = weight_average + parseFloat(weight)
            height_average = height_average + parseFloat(height)
            abdominal_waist_average = abdominal_waist_average + parseFloat(abdominal_waist)
          }
        })
        app.statistics.anthropometry.items = res.body
        if (count > 0) {
          app.statistics.anthropometry.weight = parseFloat(weight_average / count)
          app.statistics.anthropometry.height = parseFloat(height_average / count)
          app.statistics.anthropometry.abdominal_waist = parseFloat(abdominal_waist_average / count)

          app.statistics.anthropometry.bmi = app.getBMI(app.statistics.anthropometry.weight, app.statistics.anthropometry.height, 'kg', 'cm').replace(' kg/m2', '')
          app.statistics.anthropometry.cs = app.getCS(app.statistics.anthropometry.weight, app.statistics.anthropometry.height, 'kg', 'cm').replace(' m2', '')
        }
        app.statistics.anthropometry.loading = false
      }, err => {
        app.statistics.anthropometry.loading = false
      })

    },

    loadLifeStyleStatistics() {
      var app = this
      var life_style = app.statistics.life_style
      var exercise_weekly_minutes_count = 0
      var exercise_weekly_minutes_total = 0

      life_style.loading = true
      var url = api_url + 'patient-life-style/get-by-list'

      app.$http.post(url, app.patients).then(res => {
        res.body.forEach(e => {
          e.exercise = JSON.parse(e.exercise)
          e.smoking = JSON.parse(e.smoking)
          parseInt(e.smoking.active) ? life_style.smoking.active++ : life_style.smoking.inactive++
          parseInt(e.alcohol_consumption) ? life_style.alcohol_consumption.active++ : life_style.alcohol_consumption.inactive++
          parseInt(e.sedentary) ? life_style.sedentary.active++ : life_style.sedentary.inactive++
          e.exercise.type.includes('Aeróbico') ? life_style.exercises.aerobics++ : ''
          e.exercise.type.includes('Resistencia') ? life_style.exercises.resistance++ : ''
          if (!parseInt(e.sendetary) && parseInt(e.exercise_weekly_minutes) > 0) {
            exercise_weekly_minutes_count = exercise_weekly_minutes_count + 1
            exercise_weekly_minutes_total = exercise_weekly_minutes_total + parseInt(e.exercise_weekly_minutes)
          }
        })
        exercise_weekly_minutes_count > 0 ? life_style.exercises.time_weekly_avg =
          Math.round(exercise_weekly_minutes_total / exercise_weekly_minutes_count) : ''
        life_style.loading = false
      }, err => {
        life_style.loading = false
      })

    },

    loadDiseasesStatistics() {
      var app = this

      var hta_average = {
        controlled: 0,
        no_controlled: 0
      }
      var dyslipidemia_average = {
        controlled: 0,
        no_controlled: 0
      }
      var dmt2_average = {
        controlled: 0,
        no_controlled: 0
      }
      app.statistics.diseases.loading = true
      var url = api_url + 'history/get-by-list'

      app.$http.post(url, app.patients).then(res => {
        res.body.forEach(e => {
          e.history_content = JSON.parse(e.history_content).diseases
          var hta = e.history_content.hta
          var dyslipidemia = e.history_content.dyslipidemia
          var dmt2 = e.history_content.dtm2
          if (hta.active) {
            if (hta.controlled) {
              hta_average.controlled = hta_average.controlled + 1
            } else {
              hta_average.no_controlled = hta_average.no_controlled + 1
            }
          }

          if (dyslipidemia.active) {
            if (dyslipidemia.controlled) {
              dyslipidemia_average.controlled = dyslipidemia_average.controlled + 1
            } else {
              dyslipidemia_average.no_controlled = dyslipidemia_average.no_controlled + 1
            }
          }

          if (dmt2.active) {
            if (dmt2.controlled) {
              dmt2_average.controlled = dmt2_average.controlled + 1
            } else {
              dmt2_average.no_controlled = dmt2_average.no_controlled + 1
            }
          }

        })

        app.statistics.diseases.hta = hta_average
        app.statistics.diseases.dyslipidemia = dyslipidemia_average
        app.statistics.diseases.dmt2 = dmt2_average
        app.statistics.diseases.histories = res.body

        app.statistics.diseases.loading = false
      }, err => {
        app.statistics.diseases.loading = false
      })

    },

    loadLaboratoryExamsStatistics() {
      var app = this
      app.statistics.laboratory_exam.loading = true

      var data = {
        patients: app.patients,
        exams: app.statistics.laboratory_exam.items
      }

      var url = api_url + 'medical-exams/get-exams-by-patient-list'
      app.$http.post(url, data).then(res => {
        app.statistics.laboratory_exam.items.forEach(e => {
          var items = res.body.filter(i => {
            return i.name == e.name
          })
          e.items = items.length
          items.forEach(item => {
            e.total = e.total + parseInt(item.results)
          })
          if (e.items > 0) {
            e.total = parseInt(e.total / items.length)
          }
        })
        app.statistics.laboratory_exam.loading = false
      }, err => {
        app.statistics.laboratory_exam.loading = false
      })

    },

    initializeBasicStatistics() {
      this.loadPatientsEntryStatistics()
      this.loadGeneralStatistics()
      this.loadAnthropometryStatistics()
      this.loadLifeStyleStatistics()
      this.loadDiseasesStatistics()
      this.loadLaboratoryExamsStatistics()
    },

    loadDiagnosticsToRecipe() {
      var app = this
      if (app.recipes.editedIndex == -1) {
        var items = []
        var keys = [
          {
            name: 'HTA',
            key: 'antihypertensives'
          },

          {
            name: 'Cardiopatía Isquémica',
            key: 'antithrombotics'
          },

          {
            name: 'Insuficiencia Cardíaca',
            key: 'antihypertensives'
          },

          {
            name: 'Dislipidemia',
            key: 'hypolipidemic'
          },

          {
            name: 'DMt2',
            key: 'antidiabetics'
          },

          {
            name: 'Pre DMt2',
            key: 'antidiabetics'
          },
        ]
        var treatments = [
          {
            name: 'antihypertensives',
            imported: false,
          },

          {
            name: 'antithrombotics',
            imported: false,
          },

          {
            name: 'hypolipidemic',
            imported: false,
          },

          {
            name: 'antidiabetics',
            imported: false,
          },
        ]
        app.patient_risk_factors.rf.risk_factors.forEach(e => {
          if (e.diagnostic == 'Sí') {
            items.push({ diagnostic: e.name, treatment_goal: '' })
            var key = keys.find(item => item.name == e.name)
            if (key !== undefined) {
              var treatment = app.patient_history.form.history_content.treatments[key.key]
              treatment_imported = treatments.find(item => item.name == key.key)
              treatment_imported_index = treatments.indexOf(treatment_imported)
              if (!treatment_imported.imported) {
                Object.entries(treatment).forEach(item => {
                  item[0] == 'metformin' && item[1].active ? item[1].treatment = 'Metformina' : '';
                  item[0] == 'ezt' && item[1].active ? item[1].treatment = 'EZT' : '';
                  item[1].hasOwnProperty('treatment') && item[1].treatment !== '' ? app.recipes.editedItem.instructions.push(
                    {
                      dosis: item[1].dosis,
                      observations: "",
                      schedule: `${item[1].frecuency} dosis diarias`,
                      treatment: item[1].treatment
                    }
                  ) : ''
                })
                treatments[treatment_imported_index].imported = true
              }
            }
          }
        });
        app.recipes.editedItem.diagnostics = items
      }
    },

    loadDiagnosticsToReport() {
      var app = this
      if (app.reports.editedIndex == -1) {
        var items = []
        app.patient_risk_factors.rf.risk_factors.forEach(e => {
          e.diagnostic == 'Sí' ? items.push(e.name) : ''
        })
        app.reports.editedItem.meta.diagnostics = items
      }
    },

    loadPlanToReport() {
      var app = this
      var obj = app.patient_plan
      var url = api_url + 'patient-plans/get/' + app.editedItem.patient_id
      app.$http.get(url).then(res => {
        obj.save_loading = false
        obj.loading = false
        if (res.body.length > 0) {
          var items = []
          res.body.forEach((e, i) => {
            e.clinics_exams = JSON.parse(e.clinics_exams)
            e.materials = JSON.parse(e.materials)
            items.push(e)
            if (parseInt(e.appointment_id) == parseInt(app.patient_appointments.current_appointment.appointment_id)) {
              obj.editedItem = e
            }
          });
          obj.items = items
        }
        app.reports.editedItem.meta.plan = obj.editedItem
      }, err => {
        obj.loading = false
        obj.save_loading = false
      })
    },

    loadTreatmentsToReport() {
      var app = this
      if (app.recipes.items.length < 1) {
        var url = api_url + 'recipes/get/' + app.editedItem.patient_id
        app.recipes.items = []
        app.$http.get(url).then(res => {
          res.body.forEach((e, i) => {
            item = e
            item.diagnostics = JSON.parse(e.diagnostics)
            item.instructions = JSON.parse(e.instructions)
            app.recipes.items.push(item)
          });
          if (app.recipes.items.length > 0) {
            var recipe = app.recipes.items[app.recipes.items.length - 1]
            recipe.instructions.forEach(e => {
              var item = {
                treatment: e.treatment,
                dosis: e.dosis,
                interval: e.schedule
              }
              app.reports.editedItem.meta.treatments.push(item)
            })
          }
        }, err => {

        })
      }
      else {
        var recipe = app.recipes.items[app.recipes.items.length - 1]
        recipe.instructions.forEach(e => {
          var item = {
            treatment: e.treatment,
            dosis: e.dosis,
            interval: e.schedule
          }
          app.reports.editedItem.meta.treatments.push(item)
        })
      }
    },

    loadLaboratoryExamsToReport() {
      var app = this
      var url = api_url + 'medical-exams/get-exams-appointment-results/' + app.patient_appointments.current_appointment.appointment_id
      app.$http.get(url).then(res => {
        app.reports.editedItem.meta.laboratory_exam.items = res.body
      }, err => {

      })
    },

    loadExtrasToReport() {
      this.loadDiagnosticsToReport()
      this.loadTreatmentsToReport()
      this.loadPlanToReport()
      this.initializeAnthropometry(true)
      this.initializePhysicalExams(true)
      this.initializeEchocardiograms(true)
      this.initializeElectroCardiograms(true)
      this.initializeVitalSigns(true)
      this.loadLaboratoryExamsToReport()
    },

    getCurrentFactorRisk() {
      var app = this
      var obj = app.patient_risk_factors
      obj.risk_factors_calc_list = []
      var data = {
        name: obj.selectedForm.calc_name,
        patient_id: app.editedItem.patient_id,
        appointment_id: app.patient_appointments.current_appointment.appointment_id,
      }
      obj.selectedForm.obj.results = 0
      if (obj.selectedForm.hasOwnProperty('appointment_id')) {
        delete obj.selectedForm['appointment_id']
      }
      var url = api_url + 'patient-risk-factors/get-current-risk-factor/'
      app.$http.post(url, data).then(res => {
        if (Array.isArray(res.body.current_rf) && res.body.current_rf.length > 0) {
          var item = res.body.current_rf[0]
          obj.selectedForm.obj.vars = Object.assign({}, JSON.parse(item.vars))
          obj.selectedForm.patient_id = item.patient_id
          obj.selectedForm.appointment_id = item.appointment_id
          obj.selectedForm.obj.results = item.results
          if (obj.selectedForm.obj.hasOwnProperty('normalize')) {
            obj.selectedForm.obj.normalize()
          }
        }
        if (Array.isArray(res.body.risk_factors) && res.body.risk_factors.length > 0) {
          obj.risk_factors_calc_list = res.body.risk_factors
        }
      }, err => {

      })
    },

    editRecipeItem(item) {
      var app = this
      app.recipes.editedIndex = app.recipes.items.indexOf(item)
      app.recipes.editedItem = Object.assign({}, item)
      app.recipes.dialog = true
    },

    editReportItem(item) {
      var app = this
      app.reports.editedIndex = app.reports.items.indexOf(item)
      app.reports.editedItem = Object.assign({}, item)
      app.reports.dialog = true
    },

    editItem(item) {
      var app = this
      app.general_save = true
      app.editedIndex = app.patients.indexOf(item)
      app.editedItem = Object.assign({}, item)
      app.dialog = true
    },

    showItem(item) {
      var app = this
      app.editedItem = Object.assign({}, item)
      app.editedViewIndex = app.patients.indexOf(item)
      app.view_dialog = true
    },

    editAppointmentItem(item) {
      var obj = this.patient_appointments
      obj.editedIndex = obj.appointments.indexOf(item)
      obj.editedItem = Object.assign({}, item)
      obj.dialog = true
    },

    deleteItem(item) {
      this.editedIndex = this.patients.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteAppointmentItem(item) {
      var obj = this.patient_appointments
      obj.editedIndex = obj.appointments.indexOf(item)
      obj.editedItem = Object.assign({}, item)
      obj.dialogDelete = true
    },

    deleteExamItem(item) {
      var obj = this.patient_laboratory_exams
      obj.editedIndex = obj.exam_results.indexOf(item)
      obj.editedItem = Object.assign({}, item)
      obj.dialogDelete = true
    },

    deleteExamFileItem(item) {
      var obj = this.patient_laboratory_exams
      obj.dialogFileDelete = true
      obj.editedFileIndex = obj.exam_files.indexOf(item)
      obj.editedFileItem = Object.assign({}, item)
    },

    deleteRecipeItem(item) {
      var obj = this.recipes
      obj.dialogDelete = true
      obj.editedIndex = obj.items.indexOf(item)
      obj.editedItem = Object.assign({}, item)
    },

    deleteReportItem(item) {
      var obj = this.reports
      obj.dialogDelete = true
      obj.editedIndex = obj.items.indexOf(item)
      obj.editedItem = Object.assign({}, item)
    },

    deleteItemConfirm() {
      var app = this
      var url = api_url + 'patients/delete'
      app.$http.post(url, app.editedItem).then(res => {
        app.loading = false
        if (res.body.status == "success")
          app.patients.splice(app.editedIndex, 1)
        app.closeDelete()
        activateAlert(res.body.message, res.body.status)
      }, err => {

      })
    },

    deleteRecipeItemConfirm() {
      var app = this
      var url = api_url + 'recipes/delete'
      app.$http.post(url, app.recipes.editedItem).then(res => {
        if (res.body.status == "success") {
          app.recipes.items.splice(app.recipes.editedIndex, 1)
          app.closeRecipeDelete()
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {

      })
    },

    deleteReportItemConfirm() {
      var app = this
      var url = api_url + 'reports/delete'
      app.$http.post(url, app.reports.editedItem).then(res => {
        if (res.body.status == "success") {
          app.reports.items.splice(app.reports.editedIndex, 1)
          app.closeReportDelete()
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {

      })
    },

    deleteAppointmentItemConfirm() {
      var app = this
      var obj = app.patient_appointments
      var url = api_url + 'appointments/delete'
      app.$http.post(url, { appointment_id: obj.editedItem.appointment_id, patient_id: app.editedItem.patient_id }).then(res => {
        app.loading = false
        if (res.body.status == "success")
          obj.appointments.splice(obj.editedIndex, 1)
        activateAlert(res.body.message, res.body.status)
        app.closeAppointmentDelete()
      }, err => {
        app.closeAppointmentDelete()
      })
    },

    deleteExamItemConfirm() {
      var app = this
      var obj = app.patient_laboratory_exams
      var url = api_url + 'medical-exams/delete'
      obj.editedItem.exam_name = obj.selectedExam.name
      obj.editedItem.patient_id = app.editedItem.patient_id
      app.$http.post(url, obj.editedItem).then(res => {
        if (res.body.status == 'success') {
          obj.exam_results.splice(obj.editedIndex, 1)
        }
        app.closeExamDelete()
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.closeExamDelete()
      })
    },

    deleteExamFileItemConfirm() {
      var app = this
      var obj = app.patient_laboratory_exams
      var url = api_url + 'medical-exams/delete-file'
      obj.editedFileItem.patient_id = app.editedItem.patient_id
      app.$http.post(url, obj.editedFileItem).then(res => {
        if (res.body.status == 'success') {
          obj.exam_files.splice(obj.editedFileIndex, 1)
        }
        app.closeFileExamDelete()
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.closeFileExamDelete()
      })
    },

    close(clean_input = true) {
      this.dialog = false
      if (clean_input) {
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      }
    },

    closeView() {
      this.view_dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeAppointment() {
      var obj = this.patient_appointments
      obj.dialog = false
      this.$nextTick(() => {
        obj.editedItem = Object.assign({}, this.defaultItem)
        obj.editedIndex = -1
      })
    },

    closeRecipe() {
      var obj = this.recipes
      obj.dialog = false
      this.$nextTick(() => {
        obj.editedItem = Object.assign({}, this.defaultItem)
        obj.editedIndex = -1
      })
    },

    closeReport() {
      var obj = this.reports
      obj.dialog = false
      this.$nextTick(() => {
        obj.editedItem = Object.assign({}, this.defaultItem)
        obj.editedIndex = -1
      })
    },

    closeExam() {
      var obj = this.patient_laboratory_exams
      this.$nextTick(() => {
        obj.defaultItem.exam_date = obj.editedItem.exam_date
        obj.editedItem = Object.assign({}, obj.defaultItem)
        obj.editedIndex = -1
      })
    },

    closeFileExam() {
      var obj = this.patient_laboratory_exams
      this.$nextTick(() => {
        obj.defaultItem.exam_date = obj.editedFileItem.exam_date
        obj.editedFileItem = Object.assign({}, obj.defaultItem)
        obj.editedFileIndex = -1
      })
    },

    closeDelete() {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeRecipeDelete() {
      this.recipes.dialogDelete = false
      this.$nextTick(() => {
        this.recipes.editedItem = Object.assign({}, this.defaultItem)
        this.recipes.editedIndex = -1
      })
    },

    closeReportDelete() {
      this.reports.dialogDelete = false
      this.$nextTick(() => {
        this.reports.editedItem = Object.assign({}, this.reports.defaultItem)
        this.reports.editedIndex = -1
      })
    },

    closeAppointmentDelete() {

      var obj = this.patient_appointments
      obj.dialogDelete = false
      this.$nextTick(() => {
        obj.editedItem = Object.assign({}, this.defaultItem)
        obj.editedIndex = -1
      })
    },

    closeExamDelete() {

      var obj = this.patient_laboratory_exams
      obj.dialogDelete = false
      this.$nextTick(() => {
        obj.editedItem = Object.assign({}, obj.defaultItem)
        obj.editedIndex = -1
      })
    },

    closeFileExamDelete() {

      var obj = this.patient_laboratory_exams
      this.$nextTick(() => {
        obj.editedFileItem = Object.assign({}, obj.defaultItem)
        obj.editedFileIndex = -1
      })
      obj.dialogFileDelete = false
    },

    save() {
      var app = this
      app.loading = true
      if (app.editedIndex > -1) {
        var url = api_url + 'patients/update'
        app.$http.post(url, app.editedItem).then(res => {
          app.loading = false
          if (res.body.status == "success") {
            Object.assign(app.patients[app.editedIndex], app.editedItem)
            app.tab = "tab-2"
            app.initializeAppointments()
          }
          activateAlert(res.body.message, res.body.status)
        }, err => {

        })
      } else {
        var url = api_url + 'patients/create'
        app.$http.post(url, app.editedItem).then(res => {
          app.loading = false
          if (res.body.status == "success") {
            app.editedItem.patient_id = res.body.data.patient_id
            app.editedItem.full_name = app.editedItem.first_name + ' ' + app.editedItem.last_name
            app.patients.push(app.editedItem)
            app.close(false)
            app.editItem(app.editedItem)
          }
          app.upload_button = false
          activateAlert(res.body.message, res.body.status)
        }, err => {
          app.loading = false
        })
      }
    },

    saveAppointment() {
      var app = this
      var obj = app.patient_appointments
      obj.editedItem.patient_id = app.editedItem.patient_id
      obj.editedItem.full_name = app.getDoctorFullName(obj.editedItem.user_id)
      app.loading = true
      if (obj.editedIndex > -1) {
        var url = api_url + 'appointments/update'
        app.$http.post(url, obj.editedItem).then(res => {
          app.loading = false
          if (res.body.status == "success")
            Object.assign(obj.appointments[obj.editedIndex], obj.editedItem)
          activateAlert(res.body.message, res.body.status)
          app.closeAppointment()
        }, err => {
          app.loading = false
          app.closeAppointment()
        })
      } else {
        var url = api_url + 'appointments/create'
        app.$http.post(url, obj.editedItem).then(res => {
          app.loading = false
          if (res.body.status == "success")
            obj.editedItem.appointment_id = res.body.data.appointment_id
          obj.editedItem.appointment_finished = 0
          obj.appointments.push(obj.editedItem)
          if (obj.appointments.length == 1) {
            obj.current_appointment = Object.assign({}, obj.editedItem)
          }
          else {
            obj.current_appointment = Object.assign({}, obj.editedItem)
            obj.previous_appointment = obj.appointments[obj.appointments.length - 2]
          }
          activateAlert(res.body.message, res.body.status)
          app.closeAppointment()
        }, err => {
          app.loading = false
          app.closeAppointment()
        })
      }
    },

    finishAppointment() {
      var app = this
      var obj = app.patient_appointments
      app.finish_loading = true
      var url = api_url + 'appointments/finish'
      app.$http.post(url, obj.current_appointment).then(res => {
        app.finish_loading = false
        if (res.body.status == "success")
          app.patient_plan.alreadySaved = false
        obj.current_appointment.appointment_finished = 1
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.finish_loading = false
      })
    },

    finishAppointmentAndCreateNext() {
      var app = this
      var obj = app.patient_appointments
      app.finish_loading = true
      var url = api_url + 'appointments/finish'
      app.$http.post(url, obj.current_appointment).then(res => {
        app.finish_loading = false
        if (res.body.status == "success")
          app.patient_plan.alreadySaved = false
        obj.current_appointment.appointment_finished = 1
        app.finishOptionsDialog = false
        app.tab = 'tab-2'
        obj.editedItem = {}
        obj.dialog = true
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.finish_loading = false
      })
    },

    saveAnthropometry() {
      var app = this
      var obj = app.patient_anthropometry
      app.loading = true
      var url = api_url + 'anthropometry/create'
      var data = obj.editedItem
      data.appointment_id = !data.hasOwnProperty('appointment_id') ?
        app.patient_appointments.current_appointment.appointment_id : data.appointment_id
      data.patient_id = app.editedItem.patient_id
      if (data.hasOwnProperty('created_at')) {
        url = api_url + 'anthropometry/update'
      }
      app.$http.post(url, data).then(res => {
        app.loading = false
        if (res.body.status == 'success') {
          if (!obj.editedItem.hasOwnProperty('created_at')) {
            obj.editedItem.created_at = moment().format('YYYY-MM-DD')
          }
          app.tab = 'tab-5'
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.loading = false
      })
    },

    saveHistory(change_tab = true) {
      var app = this
      var obj = app.patient_history
      obj.loading = true
      var url = api_url + 'history/update'
      obj.form.patient_id = app.editedItem.patient_id
      obj.form.appointment_id = app.patient_appointments.current_appointment.appointment_id
      app.$http.post(url, obj.form).then(res => {
        obj.loading = false
        if (!change_tab) {
          app.patient_risk_factors.rf.treatment_dialog = false
          if (res.body.status == 'success') {
            res.body.message = 'Tratamientos actualizados'
          }
        }
        else {
          if (res.body.status == 'success') {
            app.tab = 'tab-4'
            app.initializeAnthropometry()
          }
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {
        obj.loading = false
      })
    },

    saveFactorRisk() {
      var app = this
      var obj = app.patient_risk_factors
      obj.loading = true
      var url = api_url + 'patient-risk-factors/update'
      var data = {
        appointment_id: obj.selectedForm.obj.hasOwnProperty['appointment_id'] ?
          obj.selectedForm.obj.appointment_id :
          app.patient_appointments.current_appointment.appointment_id,
        patient_id: app.editedItem.patient_id,
        name: obj.selectedForm.calc_name,
        results: obj.selectedForm.obj.results,
        nomenclature: obj.selectedForm.obj.nomenclature,
        vars: obj.selectedForm.obj.vars,
      }
      app.$http.post(url, data).then(res => {
        obj.loading = false
        activateAlert(res.body.message, res.body.status)
      }, err => {
        obj.loading = false
      })
    },

    saveFactorRiskDiagnostic() {
      var app = this
      app.patient_risk_factors.diagnostic_loading = true
      var url = api_url + 'patient-risk-factors-diagnostic/update'
      data = {
        patient_id: app.editedItem.patient_id,
        risk_factors: app.patient_risk_factors.rf.risk_factors,
        appointment_id: app.patient_appointments.current_appointment.appointment_id
      }
      app.$http.post(url, data).then(res => {
        app.patient_risk_factors.diagnostic_loading = false
        activateAlert(res.body.message, res.body.status)
      }, err => {
        app.patient_history.loading = false
      })
    },

    saveExam(storeVars, vars) {
      var app = this
      var obj = app.patient_laboratory_exams
      var url = api_url + "medical-exams/create"
      obj.editedItem.appointment_id = app.patient_appointments.current_appointment.appointment_id
      obj.editedItem.patient_id = app.editedItem.patient_id
      obj.editedItem.exam_name = obj.selectedExam.name
      obj.editedItem.exam_id = obj.selectedExam.exam_id

      if (storeVars) {
        obj.editedItem.vars = vars
      }

      app.$http.post(url, obj.editedItem).then(res => {
        if (res.body.status == 'success')
          obj.editedItem.patient_exam_id = res.body.data.patient_exam_id
        obj.exam_results.push(obj.editedItem)
        activateAlert(res.body.message, res.body.status)
        app.closeExam()
      }, err => {
        app.closeExam()
      })
    },

    savePhysicalExam() {
      var app = this
      var obj = app.patient_physical_exam
      var data = {}
      var url = api_url + "patient-physical-exams/update"
      obj.loading = true
      data.content = obj.content
      data.appointment_id = app.patient_appointments.current_appointment.appointment_id
      data.patient_id = app.editedItem.patient_id

      app.$http.post(url, data).then(res => {
        obj.loading = false
        if (res.body.status == 'success') {
          app.tab = 'tab-7'
          app.initializeElectroCardiograms()
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {
        obj.loading = false
        activateAlert('Error inesperado, intente de nuevo', 'error')
      })
    },

    saveElectroCardiogram() {
      var app = this
      var obj = app.patient_electro_cardiogram
      var data = {
        content: obj.content,
        appointment_id: app.patient_appointments.current_appointment.appointment_id,
        patient_id: app.editedItem.patient_id,
      }
      var url = api_url + "patient-electro-cardiograms/update"
      obj.loading = true
      app.$http.post(url, data).then(res => {
        obj.loading = false
        if (res.body.status == 'success') {
          app.tab = 'tab-8'
          app.initializeEchocardiograms()
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {
        obj.loading = false
        activateAlert('Error inesperado, intente de nuevo', 'error')
      })
    },

    saveEchocardiogram() {
      var app = this
      var obj = app.patient_echocardiogram
      var data = {
        appointment_id: app.patient_appointments.current_appointment.appointment_id,
        patient_id: app.editedItem.patient_id,
        content: obj.content
      }
      var url = api_url + "patient-echocardiograms/update"
      obj.loading = true

      app.$http.post(url, data).then(res => {
        obj.loading = false
        if (res.body.status == 'success') {
          app.tab = 'tab-9'
          app.initializeExams()
          app.initializeExamsFiles()
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {
        obj.loading = false
        activateAlert('Error inesperado, intente de nuevo', 'error')
      })
    },

    saveLifeStyle() {
      var app = this
      var obj = app.patient_life_style
      var url = api_url + "patient-life-style/update"
      obj.save_loading = true
      obj.editedItem.patient_id = app.editedItem.patient_id
      obj.editedItem.appointment_id = app.patient_appointments.current_appointment.appointment_id

      app.$http.post(url, obj.editedItem).then(res => {
        obj.save_loading = false
        if (res.body.status == 'success') {
          app.tab = 'tab-12'
          app.initializeFactorsRisk()
          app.initializePlans()
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {
        obj.save_loading = false
        activateAlert('Error inesperado, intente de nuevo', 'error')
      })
    },

    savePlan() {
      var app = this
      var obj = app.patient_plan
      var url = api_url + "patient-plans/create"
      obj.save_loading = true
      obj.editedItem.patient_id = app.editedItem.patient_id
      obj.editedItem.appointment_id = app.patient_appointments.current_appointment.appointment_id

      app.$http.post(url, obj.editedItem).then(res => {
        obj.save_loading = false
        if (res.body.status == 'success') {
          obj.alreadySaved = true
          app.finishOptionsDialog = true
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {
        obj.save_loading = false
        activateAlert('Error inesperado, intente de nuevo', 'error')
      })
    },

    saveFileExam() {
      var app = this
      var obj = app.patient_laboratory_exams
      obj.add_file_loading = true
      var url = api_url + "medical-exams/create-file"
      let data = new FormData()
      data.append('file_result', obj.editedFileItem.file_result)
      data.append('exam_date', obj.editedFileItem.exam_date)
      data.append('patient_id', app.editedItem.patient_id)

      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          obj.editedFileItem.patient_exam_file_id = res.body.data.patient_exam_file_id
          obj.editedFileItem.file_result = res.body.data.file_result
          obj.exam_files.push(obj.editedFileItem)
        }
        activateAlert(res.body.message, res.body.status)
        obj.add_file_loading = false
        app.closeFileExam()
      }, err => {
        obj.add_file_loading = false
        app.closeFileExam()
      })
    },

    saveRecipe() {
      var app = this
      var obj = app.recipes
      obj.add_loading = true
      let data = obj.editedItem
      data.patient_id = app.editedItem.patient_id

      if (obj.editedIndex > -1) {
        var url = api_url + "recipes/update"
        app.$http.post(url, data).then(res => {
          activateAlert(res.body.message, res.body.status)
          obj.add_loading = false
          if (res.body.status == 'success') {
            Object.assign(obj.items[obj.editedIndex], obj.editedItem)
            app.closeRecipe()
          }
        }, err => {
          obj.add_loading = false
          app.closeRecipe()
        })
      }
      else {
        var url = api_url + "recipes/create"
        app.$http.post(url, data).then(res => {
          activateAlert(res.body.message, res.body.status)
          obj.add_loading = false
          if (res.body.status == 'success') {
            obj.editedItem.recipe_id = res.body.data.recipe_id
            obj.editedItem.registered_at = moment().format('YYYY-MM-DD')
            obj.items.push(obj.editedItem)
            app.closeRecipe()
          }
        }, err => {
          obj.add_loading = false
          app.closeRecipe()
        })
      }
    },

    saveReport() {
      var app = this
      var obj = app.reports
      obj.add_loading = true
      let data = obj.editedItem
      data.patient_id = app.editedItem.patient_id

      if (obj.editedIndex > -1) {
        var url = api_url + "reports/update"
        app.$http.post(url, data).then(res => {
          activateAlert(res.body.message, res.body.status)
          obj.add_loading = false
          if (res.body.status == 'success') {
            Object.assign(obj.items[obj.editedIndex], obj.editedItem)
            app.closeReport()
          }
        }, err => {
          obj.add_loading = false
          app.closeReport()
        })
      }
      else {
        var url = api_url + "reports/create"
        app.$http.post(url, data).then(res => {
          activateAlert(res.body.message, res.body.status)
          obj.add_loading = false
          if (res.body.status == 'success') {
            obj.editedItem.report_id = res.body.data.report_id
            obj.editedItem.registered_at = moment().format('YYYY-MM-DD')
            obj.items.push(obj.editedItem)
            app.closeReport()
          }
        }, err => {
          obj.add_loading = false
          app.closeReport()
        })
      }
    },

    downloadRecipe(item) {
      var app = this
      var obj = app.recipes
      let data = Object.assign({}, item)
      data.patient = app.editedItem
      data.patient.age = moment().diff(data.patient.birthdate, 'years');

      var url = api_url + "recipes/download"
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          var pdf_doc = res.body.data
          var a = document.createElement('a')
          a.href = pdf_doc.content
          document.body.append(a)
          a.download = "recipe-" + data.appointment_date + ".pdf"
          a.click()
          a.remove()
        }
      }, err => {
      })
    },

    downloadReport(item) {
      var app = this
      var obj = app.reports
      let data = Object.assign({}, item)
      data.meta.anthropometry.item.bmi, data.meta.anthropometry.item.cs = 'N/A'
      if (parseFloat(data.meta.anthropometry.item.weight) > 0 && parseFloat(data.meta.anthropometry.item.height) > 0) {
        data.meta.anthropometry.item.bmi = app.getBMI(
          data.meta.anthropometry.item.weight,
          data.meta.anthropometry.item.height,
          data.meta.anthropometry.item.weight_suffix,
          data.meta.anthropometry.item.height_suffix
        ).replace('kg/m2', '')
        data.meta.anthropometry.item.cs = app.getCS(
          data.meta.anthropometry.item.weight,
          data.meta.anthropometry.item.height,
          data.meta.anthropometry.item.weight_suffix,
          data.meta.anthropometry.item.height_suffix
        ).replace('m2', '')
      }
      var ta_average = 0
      var frc_count = 0
      var frc = 0
      var breathing_rate_count = 0
      var breathing_rate = 0
      var pa_s_average = 0
      var pa_d_average = 0
      data.meta.vital_signs.takes.forEach(e => {
        pa_s_average += (e.pa_left_arm1_average + e.pa_right_arm1_average) / 2
        pa_d_average += (e.pa_left_arm2_average + e.pa_right_arm2_average) / 2
        if (parseInt(e.frc) != 0) {
          frc_count = frc_count + 1
          frc += parseInt(e.frc)
        }
        if (parseInt(e.breathing_rate) != 0) {
          breathing_rate_count++
          breathing_rate += parseInt(e.breathing_rate)
        }
      })
      breathing_rate = breathing_rate_count > 1 ? breathing_rate / breathing_rate_count : breathing_rate
      frc = frc > 1 ? frc / frc_count : frc
      pa_s_average = pa_s_average / 3
      pa_d_average = pa_d_average / 3
      ta_average = `${pa_s_average} / ${pa_d_average}`

      data.meta.vital_signs.ta_average = ta_average
      data.meta.vital_signs.breathing_rate = breathing_rate
      data.meta.vital_signs.frc = frc

      data.patient = app.editedItem
      data.patient.age = moment().diff(data.patient.birthdate, 'years');

      var url = api_url + "reports/download"
      app.$http.post(url, data).then(res => {
        if (res.body.status == 'success') {
          var pdf_doc = res.body.data
          var a = document.createElement('a')
          a.href = pdf_doc.content
          document.body.append(a)
          a.download = "informe-" + data.appointment_date + ".pdf"
          a.click()
          a.remove()
        }
      }, err => {
      })
    },

    calcVitalSigns() {
      var app = this
      var results = {
        sitting: {
          pa_suffix: 'mmHg',
          br_suffix: 'rpm',
          t_suffix: '°C',
          frc_suffix: 'lat x min',
          frc: app.patient_vital_signs.takes[0].frc,
          pa_right_arm1: app.patient_vital_signs.takes[0].pa_right_arm1_average,
          pa_right_arm2: app.patient_vital_signs.takes[0].pa_right_arm2_average,
          pa_left_arm1: app.patient_vital_signs.takes[0].pa_left_arm1_average,
          pa_left_arm2: app.patient_vital_signs.takes[0].pa_left_arm2_average,
          breathing_rate: app.patient_vital_signs.takes[0].breathing_rate,
          temperature: app.patient_vital_signs.temperature,
          sat: app.patient_vital_signs.sat
        },
        lying_down: {
          pa_suffix: 'mmHg',
          br_suffix: 'rpm',
          t_suffix: '°C',
          frc_suffix: 'lat x min',
          frc: app.patient_vital_signs.takes[1].frc,
          pa_right_arm1: app.patient_vital_signs.takes[1].pa_right_arm1_average,
          pa_right_arm2: app.patient_vital_signs.takes[1].pa_right_arm2_average,
          pa_left_arm1: app.patient_vital_signs.takes[1].pa_left_arm1_average,
          pa_left_arm2: app.patient_vital_signs.takes[1].pa_left_arm2_average,
          breathing_rate: app.patient_vital_signs.takes[1].breathing_rate,
          temperature: app.patient_vital_signs.temperature,
          sat: app.patient_vital_signs.sat
        },
        standing: {
          pa_suffix: 'mmHg',
          br_suffix: 'rpm',
          t_suffix: '°C',
          frc_suffix: 'lat x min',
          frc: app.patient_vital_signs.takes[0].frc,
          pa_right_arm1: app.patient_vital_signs.takes[0].pa_right_arm1_average,
          pa_right_arm2: app.patient_vital_signs.takes[2].pa_right_arm2_average,
          pa_left_arm1: app.patient_vital_signs.takes[2].pa_left_arm1_average,
          pa_left_arm2: app.patient_vital_signs.takes[2].pa_left_arm2_average,
          breathing_rate: app.patient_vital_signs.takes[2].breathing_rate,
          temperature: app.patient_vital_signs.temperature,
          sat: app.patient_vital_signs.sat
        }
      }

      var url = api_url + 'vital-signals/update'
      results.patient_id = app.editedItem.patient_id
      results.appointment_id = app.patient_appointments.current_appointment.appointment_id
      results.takes = app.patient_vital_signs.takes
      app.$http.post(url, results).then(res => {
        activateAlert(res.body.message, res.body.status)
        if (res.body.status == 'success') {
          app.patient_vital_signs.results[0] = results
          app.patient_vital_signs.show_results = true
        }
      }, err => {

      })
    },

    getDoctors() {
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

    getDoctorFullName(id) {
      var obj = this.patient_appointments
      var results = obj.doctors.filter((doctor) => {
        return doctor.user_id == id;
      });
      return results[0]['full_name'];
    },

    getRiskFactorData(name) {
      var obj = this.patient_risk_factors.risk_factors_list.items
      var results = obj.filter((risk_factor) => {
        return risk_factor.name == name;
      });
      return results;
    },

    filterExamsByName(name) {
      var exam = this.patient_laboratory_exams.exams.find(e => e.name == name);
      return exam
    },

    showExamInfo(item) {
      this.showExamResults(item)
      switch (item.name) {
        case 'Colesterol LDL':
          var app = this
          var url = api_url + "medical-exams/get"
          var total_cholesterol = { exam_id: app.filterExamsByName('Colesterol Total').exam_id, patient_id: app.editedItem.patient_id }
          var c_HDL = { exam_id: app.filterExamsByName('Colesterol HDL').exam_id, patient_id: app.editedItem.patient_id }
          var triglycerides = { exam_id: app.filterExamsByName('Triglicérídos').exam_id, patient_id: app.editedItem.patient_id }


          app.$http.post(url, total_cholesterol).then(res => {
            app.patient_laboratory_exams.formulas.cholesterol_ldl.vars.total_cholesterol =
              res.body.length > 0 ? res.body[res.body.length - 1].results : 0
          }, err => {

          })
          app.$http.post(url, c_HDL).then(res => {
            app.patient_laboratory_exams.formulas.cholesterol_ldl.vars.c_HDL =
              res.body.length > 0 ? res.body[res.body.length - 1].results : 0
          }, err => {

          })
          app.$http.post(url, triglycerides).then(res => {
            app.patient_laboratory_exams.formulas.cholesterol_ldl.vars.triglyceride_level =
              res.body.length > 0 ? res.body[res.body.length - 1].results : 0
          }, err => {

          })
          break;
        case 'Colesterol No HDL':
          var app = this
          var url = api_url + "medical-exams/get"
          var total_cholesterol = { exam_id: app.filterExamsByName('Colesterol Total').exam_id, patient_id: app.editedItem.patient_id }
          var c_no_HDL = { exam_id: app.filterExamsByName('Colesterol No HDL').exam_id, patient_id: app.editedItem.patient_id }


          app.$http.post(url, total_cholesterol).then(res => {
            app.patient_laboratory_exams.formulas.cholesterol_no_hdl.vars.total_cholesterol =
              res.body.length > 0 ? res.body[res.body.length - 1].results : 0
          }, err => {

          })
          app.$http.post(url, c_no_HDL).then(res => {
            app.patient_laboratory_exams.formulas.cholesterol_no_hdl.vars.c_HDL =
              res.body.length > 0 ? res.body[res.body.length - 1].results : 0
          }, err => {

          })
          break;
      }
    },

    showExamResults(item) {
      var app = this
      var obj = app.patient_laboratory_exams
      obj.laboratory_exam = true
      obj.selectedExam = item
      var url = api_url + "medical-exams/get"
      var data = { exam_id: item.exam_id, patient_id: this.editedItem.patient_id }
      app.$http.post(url, data).then(res => {
        obj.exam_results = res.body
      }, err => {

      })
    },

    showComparisonExamResults(item) {
      var app = this
      var obj = app.comparison.laboratory_exams
      obj.loading = true
      obj.selectedExam = item
      obj.examsListed = true
      obj.current_patient = []
      obj.patient_to_compare = []
      var url = api_url + 'medical-exams/get/comparison'
      var data = {
        exam_id: item.exam_id,
        current_patient_id: app.comparison.patient_selected.patient_id,
        patient_to_compare_id: app.comparison.patient_to_compare.patient_id,
      }

      app.$http.post(url, data).then(res => {

        if (res.body.hasOwnProperty('current_patient_items')
          && res.body.hasOwnProperty('patient_to_compare_items')) {
          var current_items = res.body.current_patient_items.length > 1 ?
            res.body.current_patient_items[res.body.current_patient_items.length - 1] : res.body.current_patient_items[0]

          obj.current_patient.push(current_items)

          var compare_items = res.body.patient_to_compare_items.length > 1 ?
            res.body.patient_to_compare_items[res.body.patient_to_compare_items.length - 1] : res.body.patient_to_compare_items[0]

          obj.patient_to_compare.push(compare_items)
        }
        obj.loading = false
      }, err => {
        obj.loading = false
      })
    },

    showFileExamResults(item) {
      var app = this
      var obj = app.patient_laboratory_exams
      obj.laboratory_exam = true
      obj.selectedExam = item
      var url = api_url + "medical-exams/get-exam-files"
      var data = { exam_id: item.exam_id, patient_id: this.editedItem.patient_id }
      app.$http.post(url, data).then(res => {
        obj.exam_files = res.body
      }, err => {

      })
    },

    assignGeneralVars() {
      var app = this
      var obj = app.patient_risk_factors
      if (obj.selectedForm.calc_name != '') {
        app.getCurrentFactorRisk()
      }
      obj.detail_table_rf_selected = Object.assign({}, obj.selectedForm)
      app.setAnthropometryVars()
      obj.selectedForm.obj.vars.age = moment(app.editedItem.birthdate, "YYYY-MM-DD").fromNow().split(" ")[1]
      obj.selectedForm.obj.vars.gender = app.editedItem.gender
    },

    getBMI(weight, height, w_suffix, h_suffix) {
      if (height != 0 && weight != 0) {
        weight = w_suffix == 'lb' ? (weight / 2.205) : weight
        height = h_suffix == 'in' ? (height * 2.54) : height
        height = Math.pow(height / 100, 2)
        var result = Math.round(weight * 10 / height) / 10
        if (typeof result != NaN) {
          result += ' kg/m2'
        }
        return result
      }
      return ''
    },

    getCS(weight, height, w_suffix, h_suffix) {
      if (height != 0 && weight != 0) {
        weight = w_suffix == 'lb' ? (weight / 2.205) : weight
        height = h_suffix == 'in' ? (height * 2.54) : height
        var fixed = 3600
        var partial = Math.pow((height * weight / fixed), 0.5)
        var result = Math.round(partial * 100) / 100
        if (typeof result != NaN) {
          result += ' m2'
        }
        return result
      }
      return ''
    },

    getVitalSignalsAverage(item, arm) {
      var count = 0
      sitting = item.sitting
      lying_down = item.lying_down
      standing = item.standing
      if (arm == "left") {
        if (parseInt(sitting.pa_left_arm1) != 0 || parseInt(sitting.pa_left_arm2) != 0) {
          count++
        }
        if (parseInt(lying_down.pa_left_arm1) != 0 || parseInt(lying_down.pa_left_arm2) != 0) {
          count++
        }
        if (parseInt(standing.pa_left_arm1) != 0 || parseInt(standing.pa_left_arm2) != 0) {
          count++
        }
        var tas = Math.round((parseInt(sitting.pa_left_arm1) +
          parseInt(lying_down.pa_left_arm1) + parseInt(standing.pa_left_arm1)) / count)
        var tad = Math.round((parseInt(sitting.pa_left_arm2) +
          parseInt(lying_down.pa_left_arm2) + parseInt(standing.pa_left_arm2)) / count)

        var pulse_pressure = tas - tad

        var pam = Math.round(tad - (-(tas - tad) / count))
        return { pulse_pressure: pulse_pressure, pam: pam }
      }
      else if (arm == "right") {
        if (parseInt(sitting.pa_right_arm1) != 0 || parseInt(sitting.pa_right_arm2) != 0) {
          count++
        }
        if (parseInt(lying_down.pa_right_arm1) != 0 || parseInt(lying_down.pa_right_arm2) != 0) {
          count++
        }
        if (parseInt(standing.pa_right_arm1) != 0 || parseInt(standing.pa_right_arm2) != 0) {
          count++
        }
        var tas = Math.round((parseInt(sitting.pa_right_arm1) +
          parseInt(lying_down.pa_right_arm1) + parseInt(standing.pa_right_arm1)) / count)
        var tad = Math.round((parseInt(sitting.pa_right_arm2) +
          parseInt(lying_down.pa_right_arm2) + parseInt(standing.pa_right_arm2)) / count)
        var pulse_pressure = tas - tad
        var pam = Math.round(tad - (-(tas - tad) / count))
        return { pulse_pressure: pulse_pressure, pam: pam }
      }
    },

    getAverage(items, index, target) {
      var app = this
      var count = 0
      var total = 0

      items.forEach((item) => {
        if (parseInt(item) == 0 || typeof item == undefined || item == '') {
          return false
        }
        else {
          count++
          var q = parseInt(item)
          total = total + q
        }
      });

      if (count > 0) {
        total = Math.round(total / count)
      }

      app.patient_vital_signs.takes[index][target] = total
      return total
    },

    getFRCAverage(items) {
      var app = this
      var count = 0
      var total = 0

      items.forEach((item) => {
        if (parseInt(item) == 0 || typeof item == undefined || item == '') {
          return false
        }
        else {
          count++
          var q = parseInt(item)
          total = total + q
        }
      });

      if (count > 0) {
        total = Math.round(total / count)
      }

      return total
    },

    getSDverage(items) {
      var app = this
      var count = 0
      var total = 0

      items.forEach((item) => {
        if (parseInt(item) == 0 || typeof item == undefined || item == '') {
          return false
        }
        else {
          count++
          var q = parseInt(item)
          total = total + q
        }
      });

      if (count > 0) {
        total = Math.round(total / count)
      }

      return total
    },

    calcCholesterolLDL() {
      var app = this
      if (!app.$refs.ple_formulas_cholesterol_ldl.validate()) {
        return false
      }
      var formula = app.patient_laboratory_exams.formulas.cholesterol_ldl
      app.patient_laboratory_exams.formulas.cholesterol_ldl.results = parseInt(formula.vars.total_cholesterol) - parseInt(formula.vars.c_HDL)
      app.patient_laboratory_exams.editedItem.results =
        parseInt(formula.vars.total_cholesterol) -
        parseInt(formula.vars.c_HDL) - parseInt(formula.vars.triglyceride_level / 5)
    },

    calcCholesterolNoHDL() {
      var app = this
      var formula = app.patient_laboratory_exams.formulas.cholesterol_no_hdl
      app.patient_laboratory_exams.formulas.cholesterol_ldl.results = parseInt(formula.vars.total_cholesterol) - parseInt(formula.vars.c_HDL)
      app.patient_laboratory_exams.editedItem.results =
        parseInt(formula.vars.total_cholesterol) - parseInt(formula.vars.c_HDL)
    },

    calcQTC() {
      var app = this
      var content = app.patient_electro_cardiogram.content

      var qt = content.qt
      var fc = content.fc

      content.rr = 60 / parseInt(fc);
      content.rr = parseFloat(content.rr);
      content.qtrau = 656 / (1 + (parseInt(fc) / 100));
      content.qtrau = parseInt(content.qtrau);
      content.qtbaz = parseInt(qt) / Math.sqrt(parseFloat(content.rr));
      content.qtbaz = parseInt(content.qtbaz);
      content.qtfra = parseInt(qt) + (0.154 * (1 - parseFloat(content.rr)));
      content.qtfra = parseInt(content.qtfra);
      content.qtfri = parseInt(qt) / Math.pow(parseFloat(content.rr), 1 / 3);
      content.qtfri = parseInt(content.qtfri);
      content.qtcal = parseInt(qt) / Math.pow((parseFloat(content.rr) * parseFloat(content.rr)), 1 / 5);
      content.qtcal = parseInt(content.qtcal);
    },

    fagerstromTest() {
      var app = this
      var fagerstrom = app.patient_life_style.calc.fagerstrom
      var vars = fagerstrom.vars

      var result = vars.input1 + vars.input2 + vars.input3 + vars.input4 + vars.input5 + vars.input6
      fagerstrom.result = result

      return result
    },

    getFagerStromScoreDescription(calc) {
      var app = this
      var fagerstrom_result = calc ? parseInt(app.patient_life_style.calc.fagerstrom.result) : parseInt(app.patient_life_style.editedItem.smoking.fagerstrom_test)
      var description = ''

      if (fagerstrom_result == '') {
        description = ''
      }
      else if (fagerstrom_result >= 0 && fagerstrom_result <= 2) {
        description = 'Dependencia MUY BAJA'
      }
      else if (fagerstrom_result >= 3 && fagerstrom_result <= 4) {
        description = 'Dependencia BAJA'
      }
      else if (fagerstrom_result == 5) {
        description = 'Dependencia MODERADA'
      }
      else if (fagerstrom_result >= 6 && fagerstrom_result <= 7) {
        description = 'Dependencia ALTA'
      }
      else if (fagerstrom_result >= 8 && fagerstrom_result <= 10) {
        description = 'Dependencia ALTA'
      }
      else {
        description = ''
      }

      return description
    },

    pregnancyAlert(obj) {
      var app = this
      var combination_selected = obj
      var condition = ''
      var bra_ieca_found = combination_selected.find(e => e.includes('BRA') || e.includes('IECAS'))
      if (bra_ieca_found != undefined && bra_ieca_found.length > 0 && app.editedItem.gender == 'F') {
        condition = true
      }
      else {
        condition = false
      }

      return condition
    },

    gfrCkdEpiFx() {
      var app = this

      var patient = app.editedItem
      var gender = patient.gender
      var formula = app.patient_laboratory_exams.formulas.filt_glom

      var sex = gender == 'M' ? 1 : 1.018
      var alpha = gender == 'M' ? -0.411 : -0.329
      var kappa = gender == 'M' ? 0.9 : 0.7
      var serum_creatinine = formula.vars.serum_creatinine
      var race = formula.vars.race

      var age = parseFloat(moment().diff(patient.birthdate, 'years'))

      var GFR = 141 * Math.pow(Math.min(serum_creatinine / kappa, 1), alpha)
        * Math.pow(Math.max(serum_creatinine / kappa, 1), -1.209)
        * Math.pow(0.993, age) * sex * race

      app.patient_laboratory_exams.formulas.filt_glom.results = GFR.toFixed(2)
      app.patient_laboratory_exams.editedItem.results = GFR.toFixed(2)

      return GFR.toFixed(2)

    },

    gfrRrmdFx() {
      var app = this

      var patient = app.editedItem
      var gender = patient.gender
      var formula = app.patient_laboratory_exams.formulas.egfr_mdr_ckdepi

      var sex = gender == 'M' ? 1 : 0.742
      var serum_creatinine = formula.vars.serum_creatinine
      var race = formula.vars.race

      var age = parseFloat(moment().diff(patient.birthdate, 'years'))

      175 * Math.pow(serum_creatinine, -1.154) * Math.pow(age, -0.203)
        * sex * race;

      var GFR = 175 * Math.pow(serum_creatinine, -1.154) * Math.pow(age, -0.203)
        * sex * race;

      app.patient_laboratory_exams.formulas.egfr_mdr_ckdepi.results = GFR.toFixed(2)
      app.patient_laboratory_exams.editedItem.results = GFR.toFixed(2)

      return GFR.toFixed(2)

    },

    assignGFRVars(metodology) {
      var formulas = this.patient_laboratory_exams.formulas
      var mdrd = this.patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars
      if (metodology == 'CKD-EPI') {
        formulas.filt_glom.vars.serum_creatinine = mdrd.serum_creatinine
        formulas.filt_glom.vars.race = mdrd.race == 1.21 ? 1.159 : 1
      }
    },

    prevImage(e) {
      const image = e.target.files[0]
      const reader = new FileReader()
      reader.readAsDataURL(image)
      reader.onload = e => {
        this.editedItem.avatar = image;
        this.previewImage = e.target.result
        this.upload_button = true
      };
    },

    uploadImage(event) {
      var app = this
      let data = new FormData()
      var url = api_url + 'patients/update-avatar'
      app.image_loading = true
      app.image_loading = true
      data.append('patient_id', app.editedItem.patient_id);
      data.append('avatar', app.editedItem.avatar);
      app.$http.post(url, data).then(res => {
        app.image_loading = false
        if (res.body.status == 'success') {
          app.upload_button = false
          app.editedItem.avatar = res.body.data.avatar
        }
        activateAlert(res.body.message, res.body.status)
      }, err => {

      })
    },

    diagnosticDateCheck(disease) {
      if (!disease.detected_previously) {
        if (disease.diagnostic_date == 'Menos de un año'
          || disease.diagnostic_date == 'Entre 1 y 2 años'
          || disease.diagnostic_date == '3 a 4 años'
          || disease.diagnostic_date == '4 a 5 años'
          || disease.diagnostic_date == 'Más de 5 años'
          || disease.diagnostic_date == 'Más de 10 años') {
          disease.diagnostic_date = moment().format('YYYY[-]MM[-]DD')
          return true
        }
        disease.diagnostic_date = disease.diagnostic_date == '' ? moment().format('YYYY[-]MM[-]DD') : disease.diagnostic_date
      }
    },

    fromNow(date) {
      return moment(date).format('LL');
    },

    getCurrentDate(date) {
      return moment().format('YYYY-MM-DD')
    },

    addItemToArray(val, options) {
      if (val != '' || typeof val != undefined) {
        options.push(val)
      }
    },

    addObjectToArray(val, options) {
      if (val != '' || typeof val != undefined) {
        options.push({ name: val, group: 'Group 4' })
      }
    },

    getClinicExamsActive(items) {
      var clinic_exams = items.filter((e, i) => {
        return parseInt(e.value)
      })
      return clinic_exams
    },

    getTimeDiff(d) {
      return moment().diff(d, 'years')
    },

    getOnlyYear(d) {
      if (d == '') {
        return ''
      }
      return moment(d).format('YYYY')
    },

    displayOnlyYear(d) {
      return d.substring(0, 4)
    },

    resetPatientInformation() {
      this.patient_appointments.appointments = []
    },

    searchFRTreatment(name) {
      var app = this
      var obj = app.patient_risk_factors

      if (obj.rf.hasOwnProperty('created_at') && obj.risk_factors_diagnostics.length > 1) {
        var index = obj.risk_factors_diagnostics.length
        var diagnostic_index = obj.rf.hasOwnProperty('created_at') ? index - 2 : index - 1
        var diagnostic = obj.risk_factors_diagnostics[diagnostic_index].risk_factors.find((e) => {
          return e.name == name
        })
        if (diagnostic !== undefined &&
          diagnostic.diagnostic == 'Sí' &&
          diagnostic.has_treatment == 'Sí') {
          return diagnostic.comment
        }
        else {
          return ''
        }
      }
      return ''
    },

    hasPreviousFRTreatment(name) {
      var app = this
      var obj = app.patient_risk_factors

      if (app.patient_appointments.previous_appointment.hasOwnProperty('appointment_id')) {
        if (obj.risk_factors_diagnostics.length > 1) {
          var index = obj.risk_factors_diagnostics.length
          var diagnostic_index = obj.rf.hasOwnProperty('created_at') ? index - 2 : index - 1
          var diagnostic = obj.risk_factors_diagnostics[diagnostic_index].risk_factors.find((e) => {
            return e.name == name
          })
          if (diagnostic !== undefined &&
            diagnostic.diagnostic == 'Sí' &&
            diagnostic.has_treatment == 'Sí') {
            return true
          }
          return false
        }
      }
      else {
        return false
      }

    },

    previousFRTreatmentDescription(name, treatment, show_pt = false) {
      var app = this
      var obj = app.patient_risk_factors
      if (obj.rf.hasOwnProperty('created_at') && obj.risk_factors_diagnostics.length > 1) {
        var index = obj.risk_factors_diagnostics.length
        var diagnostic = obj.risk_factors_diagnostics[index - 2]
          .risk_factors.find((e) => {
            return e.name == name
          })
        if (diagnostic !== undefined &&
          diagnostic.diagnostic == 'Sí' &&
          diagnostic.has_treatment == 'Sí' && diagnostic.comment != treatment && treatment != '') {
          if (show_pt) {
            return "Previo: " + diagnostic.comment
          }
          else {
            return "Tratamiento cambiado de " + diagnostic.comment + " a " + treatment
          }
        }
        else {
          return ''
        }
      }
      else {
        var index = obj.risk_factors_diagnostics.length
        if (obj.risk_factors_diagnostics[index - 1] !== undefined) {
          diagnostic = obj.risk_factors_diagnostics[index - 1]
            .risk_factors.find((e) => {
              return e.name == name
            })
          if (diagnostic !== undefined &&
            diagnostic.diagnostic == 'Sí' &&
            diagnostic.has_treatment == 'Sí' && diagnostic.comment != treatment && treatment != '') {
            if (show_pt) {
              return "Previo: " + diagnostic.comment
            }
            else {
              return "Tratamiento cambiado de " + diagnostic.comment + " a " + treatment
            }
          }
          else {
            return ''
          }
        }
        else {
          return ''
        }
      }
    },

    getPercentDifference(section, params, comparison = false) {
      var app = this
      var appointment = app.patient_appointments
      params = params === undefined ? {} : params
      switch (section) {
        case 'anthropometry':
          if (comparison) {
            var obj = app.comparison.anthropometry
            if (obj.current_patient.hasOwnProperty('patient_id') && obj.patient_to_compare.hasOwnProperty('patient_id')) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient : obj.patient_to_compare
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare : obj.current_patient

              var current_abdominal_waist = parseInt(patient_selected.abdominal_waist)
              var current_height = parseInt(patient_selected.height)
              var current_weight = parseInt(patient_selected.weight)
              var current_bmi = parseFloat(app.getBMI(
                current_weight, current_height,
                patient_selected.weight_suffix, patient_selected.height_suffix).replace(' kg/m2', ''))
              var current_cs = parseFloat(app.getCS(
                current_weight, current_height,
                patient_selected.weight_suffix, patient_selected.height_suffix).replace(' m2', ''))

              var previous_abdominal_waist = parseInt(patient_to_compare.abdominal_waist)
              var previous_height = parseInt(patient_to_compare.height)
              var previous_weight = parseInt(patient_to_compare.weight)
              var previous_bmi = parseFloat(app.getBMI(
                previous_weight, previous_height,
                patient_to_compare.weight_suffix, patient_to_compare.height_suffix).replace(' kg/m2', ''))
              var previous_cs = parseFloat(app.getCS(
                previous_weight, previous_height,
                patient_to_compare.weight_suffix, patient_to_compare.height_suffix).replace(' m2', ''))

              var weight_difference = {
                numeric: current_weight - previous_weight,
                percent: (((current_weight - previous_weight) / previous_weight) * 100),
              }

              var height_difference = {
                numeric: current_height - previous_height,
                percent: (((current_height - previous_height) / previous_height) * 100),
              }

              var abdominal_waist_difference = {
                numeric: current_abdominal_waist - previous_abdominal_waist,
                percent: (((current_abdominal_waist - previous_abdominal_waist) / previous_abdominal_waist) * 100),
              }

              var bmi_difference = {
                numeric: current_bmi - previous_bmi,
                percent: (((current_bmi - previous_bmi) / previous_bmi) * 100),
              }

              var cs_difference = {
                numeric: current_cs - previous_cs,
                percent: (((current_cs - previous_cs) / previous_cs) * 100),
              }

              return {
                weight: weight_difference,
                height: height_difference,
                abdominal_waist: abdominal_waist_difference,
                bmi: bmi_difference,
                cs: cs_difference
              }
            }
            else {
              return {}
            }
          }
          else {
            var obj = app.patient_anthropometry
            var general_results = {
              weight: 0,
              height: 0,
              abdominal_waist: 0,
              bmi: 0,
              cs: 0
            }
            if (obj.history.length > 1) {
              var current_anthropometry = params !== undefined && params.hasOwnProperty('anthropometry') ? params.anthropometry : obj.editedItem
              var current_appointment_index = appointment.appointments.indexOf(appointment.appointments.find(e => e.appointment_id == current_anthropometry.appointment_id))
              var previous_appointment = appointment.appointments[current_appointment_index - 1]
              if (previous_appointment == undefined) {
                return general_results
              }
              var previous_anthropometry = obj.history.find(
                (e) => {
                  return e.appointment_id == previous_appointment.appointment_id
                })
              var anthropometry_index = obj.history.indexOf(current_anthropometry)
              previous_anthropometry = previous_anthropometry == undefined ? obj.history[anthropometry_index - 1] : previous_anthropometry
              if (previous_anthropometry !== undefined && previous_anthropometry.hasOwnProperty('appointment_id')) {
                if (params.hasOwnProperty('anthropometry')) {

                }
                var current_abdominal_waist = parseInt(current_anthropometry.abdominal_waist)
                var current_height = parseInt(current_anthropometry.height)
                var current_weight = parseInt(current_anthropometry.weight)
                var current_bmi = parseFloat(app.getBMI(
                  current_weight, current_height,
                  obj.editedItem.weight_suffix, obj.editedItem.height_suffix).replace(' kg/m2', ''))
                var current_cs = parseFloat(app.getCS(
                  current_weight, current_height,
                  obj.editedItem.weight_suffix, obj.editedItem.height_suffix).replace(' m2', ''))

                var previous_abdominal_waist = parseInt(previous_anthropometry.abdominal_waist)
                var previous_height = parseInt(previous_anthropometry.height)
                var previous_weight = parseInt(previous_anthropometry.weight)
                var previous_bmi = parseFloat(app.getBMI(
                  previous_weight, previous_height,
                  previous_anthropometry.weight_suffix, previous_anthropometry.height_suffix).replace(' kg/m2', ''))
                var previous_cs = parseFloat(app.getCS(
                  previous_weight, previous_height,
                  previous_anthropometry.weight_suffix, previous_anthropometry.height_suffix).replace(' m2', ''))

                var weight_difference = {
                  numeric: current_weight - previous_weight,
                  percent: (((current_weight - previous_weight) / previous_weight) * 100),
                }

                var height_difference = {
                  numeric: current_height - previous_height,
                  percent: (((current_height - previous_height) / previous_height) * 100),
                }

                var abdominal_waist_difference = {
                  numeric: current_abdominal_waist - previous_abdominal_waist,
                  percent: (((current_abdominal_waist - previous_abdominal_waist) / previous_abdominal_waist) * 100),
                }

                var bmi_difference = {
                  numeric: current_bmi - previous_bmi,
                  percent: (((current_bmi - previous_bmi) / previous_bmi) * 100),
                }

                var cs_difference = {
                  numeric: current_cs - previous_cs,
                  percent: (((current_cs - previous_cs) / previous_cs) * 100),
                }

                return {
                  weight: weight_difference,
                  height: height_difference,
                  abdominal_waist: abdominal_waist_difference,
                  bmi: bmi_difference,
                  cs: cs_difference
                }
              }
              else {
                return general_results
              }
            }
            else {
              return general_results
            }
          }

          break;
        case 'vital-signals':
          if (comparison) {
            var obj = app.comparison.vital_signs
            if (obj.current_patient.hasOwnProperty('patient_id') && obj.patient_to_compare.hasOwnProperty('patient_id')) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient : obj.patient_to_compare
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare : obj.current_patient

              var current_temperature = parseInt(patient_selected.sat)
              var current_sat = parseInt(patient_selected.sat)

              var previous_temperature = parseInt(patient_to_compare.lying_down.temperature)
              var previous_sat = parseInt(patient_to_compare.lying_down.sat)

              var temperature_difference = {
                numeric: current_temperature - previous_temperature,
                percent: ((current_temperature - previous_temperature) / previous_temperature) * 100,
              }
              var sat_difference = {
                numeric: current_sat - previous_sat,
                percent: ((current_sat - previous_sat) / previous_sat) * 100,
              }
              takes = {}
              if (params.hasOwnProperty('index')) {
                var current_take = patient_selected.takes[params.index]
                var previous_take = patient_to_compare.takes[params.index]

                var current_br = parseInt(current_take.breathing_rate)
                var current_frc = parseInt(current_take.frc)

                var previous_br = parseInt(previous_take.breathing_rate)
                var previous_frc = parseInt(previous_take.frc)

                var arm_difference = {}
                if (params.hasOwnProperty('arm')) {
                  var current_arm = parseInt(current_take[params.arm])
                  var previous_arm = parseInt(previous_take[params.arm])
                  arm_difference = {
                    numeric: current_arm - previous_arm,
                    percent: ((current_arm - previous_arm) / previous_arm) * 100,
                  }
                }
                var br_difference = {
                  numeric: current_br - previous_br,
                  percent: ((current_br - previous_br) / previous_br) * 100,
                }
                var frc_difference = {
                  numeric: current_frc - previous_frc,
                  percent: ((current_frc - previous_frc) / previous_frc) * 100,
                }

                takes = {
                  br: br_difference,
                  frc: frc_difference,
                  arm: arm_difference
                }

              }

              return {
                temperature: temperature_difference,
                sat: sat_difference,
                take: takes
              }
            }
            else {
              return {}
            }
          }
          else {
            var obj = app.patient_vital_signs
            var takes = {
              br: {
                numeric: 0,
                percent: 0,
              },
              frc: {
                numeric: 0,
                percent: 0,
              },
              arm: {
                numeric: 0,
                percent: 0,
              }
            }
            var average = {
              pam: {
                left: {
                  numeric: 0,
                  percent: 0,
                },
                right: {
                  numeric: 0,
                  percent: 0,
                }
              },
              pulse_pressure: {
                left: {
                  numeric: 0,
                  percent: 0,
                },
                right: {
                  numeric: 0,
                  percent: 0,
                }
              },
              br: {
                numeric: 0,
                percent: 0,
              },
              frc: {
                numeric: 0,
                percent: 0,
              }
            }
            if (obj.records.length > 0) {
              var current_vs = params.hasOwnProperty('vital_signals') ? params.vital_signals : {
                appointment_id: obj.appointment_id,
                takes: obj.takes
              }
              var current_vs_index = current_vs.appointment_id === undefined ? null : obj.records.indexOf(obj.records.find(
                (e) => {
                  return e.appointment_id == current_vs.appointment_id
                }))
              var previous_vs = current_vs_index != null ? obj.records[current_vs_index - 1] : obj.records[obj.records.length - 1]

              if (previous_vs !== undefined && current_vs.appointment_id != previous_vs.appointment_id) {
                var current_temperature = current_vs.temperature === undefined
                  ? parseInt(current_vs.temperature) : parseInt(current_vs.lying_down.temperature)

                var current_sat = current_vs.sat === undefined ?
                  parseInt(current_vs.sat) : parseInt(current_vs.lying_down.sat)

                var previous_temperature = parseInt(previous_vs.lying_down.temperature)
                var previous_sat = parseInt(previous_vs.lying_down.sat)

                var temperature_difference = {
                  numeric: current_temperature - previous_temperature,
                  percent: ((current_temperature - previous_temperature) / previous_temperature) * 100,
                }
                var sat_difference = {
                  numeric: current_sat - previous_sat,
                  percent: ((current_sat - previous_sat) / previous_sat) * 100,
                }
                if (params.hasOwnProperty('method') && params.method == 'average') {
                  var current_vs_pam_left_average = app.getVitalSignalsAverage(current_vs, 'left').pam
                  var previous_vs_pam_left_average = app.getVitalSignalsAverage(previous_vs, 'left').pam

                  var current_vs_pam_right_average = app.getVitalSignalsAverage(current_vs, 'right').pam
                  var previous_vs_pam_right_average = app.getVitalSignalsAverage(previous_vs, 'right').pam

                  var current_vs_frc_average = app.getFRCAverage([current_vs.takes[0].frc, current_vs.takes[1].frc, current_vs.takes[2].frc])
                  var previous_vs_frc_average = app.getFRCAverage([current_vs.standing.frc, current_vs.sitting.frc, current_vs.lying_down.frc])

                  var current_vs_br_average = app.getFRCAverage([current_vs.takes[0].breathing_rate, current_vs.takes[1].breathing_rate, current_vs.takes[2].breathing_rate])
                  var previous_vs_br_average = app.getFRCAverage([current_vs.standing.breathing_rate, current_vs.sitting.breathing_rate, current_vs.lying_down.breathing_rate])

                  var current_vs_pulse_pressure_left_average = app.getVitalSignalsAverage(current_vs, 'left').pulse_pressure
                  var previous_vs_pulse_pressure_left_average = app.getVitalSignalsAverage(previous_vs, 'left').pulse_pressure

                  var current_vs_pulse_pressure_right_average = app.getVitalSignalsAverage(current_vs, 'right').pulse_pressure
                  var previous_vs_pulse_pressure_right_average = app.getVitalSignalsAverage(previous_vs, 'right').pulse_pressure

                  var total_pam_left_average = current_vs_pam_left_average - previous_vs_pam_left_average
                  var total_pam_right_average = current_vs_pam_right_average - previous_vs_pam_right_average
                  var total_br_average = current_vs_br_average - previous_vs_br_average
                  var total_frc_average = current_vs_frc_average - previous_vs_frc_average
                  var total_pulse_pressure_left_average = current_vs_pulse_pressure_left_average - previous_vs_pulse_pressure_left_average
                  var total_pulse_pressure_right_average = current_vs_pulse_pressure_right_average - previous_vs_pulse_pressure_right_average

                  var pam_left_average = {
                    numeric: total_pam_left_average,
                    percentage: (total_pam_left_average / previous_vs_pam_left_average) * 100,
                  }

                  var pam_right_average = {
                    numeric: total_pam_right_average,
                    percentage: (total_pam_right_average / previous_vs_pam_right_average) * 100,
                  }

                  var br_average_difference = {
                    numeric: total_br_average,
                    percentage: (total_br_average / previous_vs_br_average) * 100,
                  }

                  var frc_average_difference = {
                    numeric: total_frc_average,
                    percentage: (total_frc_average / previous_vs_frc_average) * 100,
                  }

                  var pulse_pressure_left_average_difference = {
                    numeric: total_pulse_pressure_left_average,
                    percentage: (total_pulse_pressure_left_average / previous_vs_pulse_pressure_left_average) * 100,
                  }

                  var pulse_pressure_right_average_difference = {
                    numeric: total_pulse_pressure_right_average,
                    percentage: (total_pulse_pressure_right_average / previous_vs_pulse_pressure_right_average) * 100,
                  }

                  return {
                    temperature: temperature_difference,
                    sat: sat_difference,
                    take: takes,
                    averages: {
                      pam: {
                        left: pam_left_average,
                        right: pam_right_average
                      },
                      pulse_pressure: {
                        left: pulse_pressure_left_average_difference,
                        right: pulse_pressure_right_average_difference
                      },
                      br: br_average_difference,
                      frc: frc_average_difference
                    }
                  }

                } else if (params.hasOwnProperty('index')) {
                  var current_take = current_vs.takes[params.index]
                  var previous_take = previous_vs.takes[params.index]

                  var current_br = parseInt(current_take.breathing_rate)
                  var current_frc = parseInt(current_take.frc)

                  var previous_br = parseInt(previous_take.breathing_rate)
                  var previous_frc = parseInt(previous_take.frc)

                  var arm_difference = {}
                  if (params.hasOwnProperty('arm')) {
                    var current_arm = parseInt(current_take[params.arm])
                    var previous_arm = parseInt(previous_take[params.arm])
                    arm_difference = {
                      numeric: current_arm - previous_arm,
                      percent: ((current_arm - previous_arm) / previous_arm) * 100,
                    }
                  }
                  var br_difference = {
                    numeric: current_br - previous_br,
                    percent: ((current_br - previous_br) / previous_br) * 100,
                  }
                  var frc_difference = {
                    numeric: current_frc - previous_frc,
                    percent: ((current_frc - previous_frc) / previous_frc) * 100,
                  }

                  takes = {
                    br: br_difference,
                    frc: frc_difference,
                    arm: arm_difference
                  }

                }
                return {
                  temperature: temperature_difference,
                  sat: sat_difference,
                  take: takes,
                  averages: average
                }
              }
              else {
                return {
                  temperature: {
                    numeric: 0,
                    percent: 0,
                  },
                  sat: {
                    numeric: 0,
                    percent: 0,
                  },
                  take: takes,
                  averages: average
                }
              }
            }
            else {
              return {
                temperature: {
                  numeric: 0,
                  percent: 0,
                },
                sat: {
                  numeric: 0,
                  percent: 0,
                },
                take: takes,
                averages: average
              }
            }
          }

          break;
        case 'physical-exam':
          if (comparison) {
            var obj = app.comparison.physical_exams
            if (obj.current_patient.hasOwnProperty('patient_id') && obj.patient_to_compare.hasOwnProperty('patient_id')) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient : obj.patient_to_compare
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare : obj.current_patient

              var current_pvy_swivel_stop = parseInt(patient_selected.content.pvy.swivel_stop)
              var current_edema = parseInt(patient_selected.content.edema.range)

              var previous_pvy_swivel_stop = parseInt(patient_to_compare.content.pvy.swivel_stop)
              var previous_edema = parseInt(patient_to_compare.content.edema.range)

              var soplo_if = {}
              var pp = {
                mid: {},
                mii: {},
                symmetrical_range: {}
              }

              if (params.hasOwnProperty('soplo')) {
                var current_soplo = params.soplo
                var previous_soplo = patient_to_compare.content.auscultation.soplo.items[params.i]
                if (previous_soplo !== undefined) {
                  var current_soplo_if = parseInt(current_soplo.intensity_foco)
                  var previous_soplo_if = parseInt(previous_soplo.intensity_foco)

                  var numeric_difference_soplo = current_soplo_if - previous_soplo_if

                  var auscultation_soplo_if_difference = {
                    numeric: numeric_difference_soplo,
                    percent: (((numeric_difference_soplo) /
                      (Math.sign(numeric_difference_soplo) == -1 ? current_soplo_if : previous_soplo_if)) * 100),
                  }
                  soplo_if = auscultation_soplo_if_difference
                }
                else {
                  soplo_if = {
                    numeric: 0,
                    percent: 0,
                  }
                }
              }

              if (params.hasOwnProperty('pp')) {
                var current_pp_mii = parseInt(patient_selected.content.peripheral_pulses.mii)
                var current_pp_mid = parseInt(patient_selected.content.peripheral_pulses.mid)
                var current_pp_sr = parseInt(patient_selected.content.peripheral_pulses.symmetrical_range)

                var previous_pp_mii = parseInt(patient_to_compare.content.peripheral_pulses.mii)
                var previous_pp_mid = parseInt(patient_to_compare.content.peripheral_pulses.mid)
                var previous_pp_sr = parseInt(patient_to_compare.content.peripheral_pulses.symmetrical_range)

                var pp_mii_numeric_difference = current_pp_mii - previous_pp_mii
                var pp_mid_numeric_difference = current_pp_mid - previous_pp_mid
                var pp_sr_numeric_difference = current_pp_sr - previous_pp_sr


                var pp_mii_difference = {
                  numeric: pp_mii_numeric_difference,
                  percent: (((pp_mii_numeric_difference) /
                    (Math.sign(pp_mii_numeric_difference) == -1 ? current_pp_mii : previous_pp_mii)) * 100),
                }
                var pp_mid_difference = {
                  numeric: pp_mid_numeric_difference,
                  percent: (((pp_mid_numeric_difference) /
                    (Math.sign(pp_mid_numeric_difference) == -1 ? current_pp_mid : previous_pp_mid)) * 100),
                }
                var pp_sr_difference = {
                  numeric: pp_sr_numeric_difference,
                  percent: (((pp_sr_numeric_difference) /
                    (Math.sign(pp_sr_numeric_difference) == -1 ? current_pp_sr : previous_pp_sr)) * 100),
                }
                pp = {
                  mid: pp_mid_difference,
                  mii: pp_mii_difference,
                  symmetrical_range: pp_sr_difference
                }
              }

              var pvy_swivel_numeric_difference = current_pvy_swivel_stop - previous_pvy_swivel_stop
              var edema_numeric_difference = current_edema - previous_edema

              var pvy_swivel_difference = {
                numeric: pvy_swivel_numeric_difference,
                percent: (((pvy_swivel_numeric_difference) /
                  (Math.sign(pvy_swivel_numeric_difference) == -1 ? current_pvy_swivel_stop : previous_pvy_swivel_stop)) * 100),
              }
              var edema_difference = {
                numeric: edema_numeric_difference,
                percent: (((edema_numeric_difference) /
                  (Math.sign(edema_numeric_difference) == -1 ? current_edema : previous_edema)) * 100),
              }
              return {
                pvy: {
                  swivel_stop: pvy_swivel_difference
                },
                auscultation: {
                  soplo: soplo_if
                },
                pp: pp,
                edema: edema_difference
              }
            }
            else {
              return {}
            }
          }
          else {
            var obj = app.patient_physical_exam
            if (appointment.previous_appointment.hasOwnProperty('appointment_id')) {
              var previous_pe = obj.items[obj.items.length - 2]
              if (previous_pe.hasOwnProperty('appointment_id')) {
                var current_pvy_swivel_stop = parseInt(obj.content.pvy.swivel_stop)
                var current_edema = parseInt(obj.content.edema.range)

                var previous_pvy_swivel_stop = parseInt(previous_pe.content.pvy.swivel_stop)
                var previous_edema = parseInt(previous_pe.content.edema.range)

                var soplo_if = {}
                var pp = {
                  mid: {},
                  mii: {},
                  symmetrical_range: {}
                }

                if (params.hasOwnProperty('soplo')) {
                  var current_soplo_if = parseInt(params.soplo.intensity_foco)
                  var previous_soplo_if = parseInt(previous_pe.content.auscultation.soplo.
                    items[params.i].intensity_foco)

                  var auscultation_soplo_if_difference = {
                    numeric: current_soplo_if - previous_soplo_if,
                    percent: (((current_soplo_if - previous_soplo_if) / previous_soplo_if) * 100),
                  }
                  soplo_if = auscultation_soplo_if_difference
                }

                if (params.hasOwnProperty('pp')) {
                  var current_pp_mii = parseInt(obj.content.peripheral_pulses.mii)
                  var current_pp_mid = parseInt(obj.content.peripheral_pulses.mid)
                  var current_pp_sr = parseInt(obj.content.peripheral_pulses.symmetrical_range)

                  var previous_pp_mii = parseInt(previous_pe.content.peripheral_pulses.mii)
                  var previous_pp_mid = parseInt(previous_pe.content.peripheral_pulses.mid)
                  var previous_pp_sr = parseInt(previous_pe.content.peripheral_pulses.symmetrical_range)

                  var pp_mii_difference = {
                    numeric: current_pp_mii - previous_pp_mii,
                    percent: (((current_pp_mii - previous_pp_mii) / previous_pp_mii) * 100),
                  }
                  var pp_mid_difference = {
                    numeric: current_pp_mid - previous_pp_mid,
                    percent: (((current_pp_mid - previous_pp_mid) / previous_pp_mid) * 100),
                  }
                  var pp_sr_difference = {
                    numeric: current_pp_sr - previous_pp_sr,
                    percent: (((current_pp_sr - previous_pp_sr) / previous_pp_sr) * 100),
                  }
                  pp = {
                    mid: pp_mid_difference,
                    mii: pp_mii_difference,
                    symmetrical_range: pp_sr_difference
                  }
                }

                var pvy_swivel_difference = {
                  numeric: current_pvy_swivel_stop - previous_pvy_swivel_stop,
                  percent: (((current_pvy_swivel_stop - previous_pvy_swivel_stop) / previous_pvy_swivel_stop) * 100),
                }
                var edema_difference = {
                  numeric: current_edema - previous_edema,
                  percent: (((current_edema - previous_edema) / previous_edema) * 100),
                }
                return {
                  pvy: {
                    swivel_stop: pvy_swivel_difference
                  },
                  auscultation: {
                    soplo: soplo_if
                  },
                  pp: pp,
                  edema: edema_difference
                }
              }
              else {
                return {}
              }
            }
            else {
              return {}
            }
          }

          break
        case 'electro-cardiogram':
          if (comparison) {
            var obj = app.comparison.electro_cardiogram
            if (obj.current_patient.hasOwnProperty('patient_id')) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient : obj.patient_to_compare
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare : obj.current_patient

              var current_frecuency = parseInt(patient_selected.content.frecuency)
              var current_pr = parseInt(patient_selected.content.pr)
              var current_qtc = parseInt(patient_selected.content.axes.qtc)
              var current_axes_p = parseInt(patient_selected.content.axes.p)
              var current_axes_qrs = parseInt(patient_selected.content.axes.qrs)
              var current_axes_t = parseInt(patient_selected.content.axes.t)

              var previous_frecuency = parseInt(patient_to_compare.content.frecuency)
              var previous_pr = parseInt(patient_to_compare.content.pr)
              var previous_qtc = parseInt(patient_to_compare.content.axes.qtc)
              var previous_axes_p = parseInt(patient_to_compare.content.axes.p)
              var previous_axes_qrs = parseInt(patient_to_compare.content.axes.qrs)
              var previous_axes_t = parseInt(patient_to_compare.content.axes.t)

              var qtc_formula = {
                qtba: {},
                qtcal: {},
                qtfra: {},
                qtfri: {},
                qtrau: {},
                rr: {},
              }

              if (params.hasOwnProperty('qtc_calc')) {
                var current_qtbaz = parseInt(patient_selected.content.qtbaz)
                var current_qtcal = parseInt(patient_selected.content.qtcal)
                var current_qtfra = parseInt(patient_selected.content.qtfra)
                var current_qtfri = parseInt(patient_selected.content.qtfri)
                var current_qtrau = parseInt(patient_selected.content.qtrau)
                var current_rr = parseFloat(patient_selected.content.rr)

                var previous_qtbaz = parseInt(patient_to_compare.content.qtbaz)
                var previous_qtcal = parseInt(patient_to_compare.content.qtcal)
                var previous_qtfra = parseInt(patient_to_compare.content.qtfra)
                var previous_qtfri = parseInt(patient_to_compare.content.qtfri)
                var previous_qtrau = parseInt(patient_to_compare.content.qtrau)
                var previous_rr = parseFloat(patient_to_compare.content.rr)


                qtbaz_numeric_difference = current_qtbaz - previous_qtbaz
                qtcal_numeric_difference = current_qtcal - previous_qtcal
                qtfra_numeric_difference = current_qtfra - previous_qtfra
                qtfri_numeric_difference = current_qtfri - previous_qtfri
                qtrau_numeric_difference = current_qtrau - previous_qtrau
                rr_numeric_difference = current_rr - previous_rr

                var qtbaz_difference = {
                  numeric: qtbaz_numeric_difference,
                  percent: (qtbaz_numeric_difference
                    / (Math.sign(qtbaz_numeric_difference) == -1 ? current_qtbaz : previous_qtbaz) * 100),
                }

                var qtcal_difference = {
                  numeric: qtbaz_numeric_difference,
                  percent: (qtbaz_numeric_difference
                    / (Math.sign(qtbaz_numeric_difference) == -1 ? current_qtcal : previous_qtcal) * 100),
                }

                var qtfra_difference = {
                  numeric: qtfra_numeric_difference,
                  percent: ((qtfra_numeric_difference
                    / (Math.sign(qtbaz_numeric_difference) == -1 ? current_qtfra : previous_qtfra)) * 100),
                }

                var qtfri_difference = {
                  numeric: qtfri_numeric_difference,
                  percent: (qtfri_numeric_difference
                    / (Math.sign(qtfri_numeric_difference) == -1 ? current_qtfri : previous_qtfri) * 100),
                }

                var qtrau_difference = {
                  numeric: qtrau_numeric_difference,
                  percent: (qtrau_numeric_difference
                    / (Math.sign(qtrau_numeric_difference) == -1 ? current_qtrau : previous_qtrau) * 100),
                }

                var rr_difference = {
                  numeric: rr_numeric_difference,
                  percent: ((rr_numeric_difference
                    / (Math.sign(rr_numeric_difference) == -1 ? current_rr : previous_rr)) * 100),
                }

                qtc_formula = {
                  qtcal: qtcal_difference,
                  qtbaz: qtbaz_difference,
                  qtfra: qtfra_difference,
                  qtfri: qtfri_difference,
                  qtrau: qtrau_difference,
                  rr: rr_difference,
                }
              }

              frecuency_numeric_difference = current_frecuency - previous_frecuency
              pr_numeric_difference = current_pr - previous_pr
              qtc_numeric_difference = current_qtc - previous_qtc
              axes_p_numeric_difference = current_axes_p - previous_axes_p
              axes_qrs_numeric_difference = current_axes_qrs - previous_axes_qrs
              axes_t_numeric_difference = current_axes_t - previous_axes_t

              var frecuency_difference = {
                numeric: frecuency_numeric_difference,
                percent: (frecuency_numeric_difference
                  / (Math.sign(frecuency_numeric_difference) == -1 ? current_frecuency : previous_frecuency) * 100),
              }
              var pr_difference = {
                numeric: pr_numeric_difference,
                percent: (pr_numeric_difference
                  / (Math.sign(pr_numeric_difference) == -1 ? current_pr : previous_pr) * 100),
              }
              var qtc_difference = {
                numeric: qtc_numeric_difference,
                percent: (qtc_numeric_difference
                  / (Math.sign(pr_numeric_difference) == -1 ? current_pr : previous_pr) * 100),
              }
              var axes_p_difference = {
                numeric: axes_p_numeric_difference,
                percent: (axes_p_numeric_difference
                  / (Math.sign(axes_p_numeric_difference) == -1 ? current_axes_p : previous_axes_p) * 100),
              }
              var axes_qrs_difference = {
                numeric: axes_qrs_numeric_difference,
                percent: (axes_qrs_numeric_difference
                  / (Math.sign(pr_numeric_difference) == -1 ? current_axes_qrs : previous_axes_qrs) * 100),
              }
              var axes_t_difference = {
                numeric: axes_t_numeric_difference,
                percent: (axes_t_numeric_difference
                  / (Math.sign(axes_t_numeric_difference) == -1 ? current_axes_t : previous_axes_t) * 100),
              }

              return {
                frecuency: frecuency_difference,
                qtc_r: qtc_formula,
                pr: pr_difference,
                qtc: qtc_difference,
                axes: {
                  p: axes_p_difference,
                  qrs: axes_qrs_difference,
                  t: axes_t_difference,
                },
              }
            }
            else {
              return {}
            }
          }
          else {
            var obj = app.patient_electro_cardiogram
            if (appointment.previous_appointment.hasOwnProperty('appointment_id')) {
              var previous_pe = obj.items[obj.items.length - 2]
              if (previous_pe.hasOwnProperty('appointment_id')) {
                var current_frecuency = parseInt(obj.content.frecuency)
                var current_pr = parseInt(obj.content.pr)
                var current_qtc = parseInt(obj.content.axes.qtc)
                var current_axes_p = parseInt(obj.content.axes.p)
                var current_axes_qrs = parseInt(obj.content.axes.qrs)
                var current_axes_t = parseInt(obj.content.axes.t)

                var previous_frecuency = parseInt(previous_pe.content.frecuency)
                var previous_pr = parseInt(previous_pe.content.pr)
                var previous_qtc = parseInt(previous_pe.content.axes.qtc)
                var previous_axes_p = parseInt(previous_pe.content.axes.p)
                var previous_axes_qrs = parseInt(previous_pe.content.axes.qrs)
                var previous_axes_t = parseInt(previous_pe.content.axes.t)

                var qtc_formula = {
                  qtba: {},
                  qtcal: {},
                  qtfra: {},
                  qtfri: {},
                  qtrau: {},
                  rr: {},
                }

                if (params.hasOwnProperty('qtc_calc')) {
                  var current_qtbaz = parseInt(obj.content.qtbaz)
                  var current_qtcal = parseInt(obj.content.qtcal)
                  var current_qtfra = parseInt(obj.content.qtfra)
                  var current_qtfri = parseInt(obj.content.qtfri)
                  var current_qtrau = parseInt(obj.content.qtrau)
                  var current_rr = parseFloat(obj.content.rr)

                  var previous_qtbaz = parseInt(previous_pe.content.qtbaz)
                  var previous_qtcal = parseInt(previous_pe.content.qtcal)
                  var previous_qtfra = parseInt(previous_pe.content.qtfra)
                  var previous_qtfri = parseInt(previous_pe.content.qtfri)
                  var previous_qtrau = parseInt(previous_pe.content.qtrau)
                  var previous_rr = parseFloat(previous_pe.content.rr)

                  var qtbaz_difference = {
                    numeric: current_qtbaz - previous_qtbaz,
                    percent: (((current_qtbaz - previous_qtbaz) / previous_qtbaz) * 100),
                  }

                  var qtcal_difference = {
                    numeric: current_qtcal - previous_qtcal,
                    percent: (((current_qtcal - previous_qtcal) / previous_qtcal) * 100),
                  }

                  var qtfra_difference = {
                    numeric: current_qtfra - previous_qtfra,
                    percent: (((current_qtfra - previous_qtfra) / previous_qtfra) * 100),
                  }

                  var qtfri_difference = {
                    numeric: current_qtfri - previous_qtfri,
                    percent: (((current_qtfri - previous_qtfri) / previous_qtfri) * 100),
                  }

                  var qtrau_difference = {
                    numeric: current_qtrau - previous_qtrau,
                    percent: (((current_qtrau - previous_qtrau) / previous_qtrau) * 100),
                  }

                  var rr_difference = {
                    numeric: current_rr - previous_rr,
                    percent: (((current_rr - previous_rr) / previous_rr) * 100),
                  }

                  qtc_formula = {
                    qtcal: qtcal_difference,
                    qtbaz: qtbaz_difference,
                    qtfra: qtfra_difference,
                    qtfri: qtfri_difference,
                    qtrau: qtrau_difference,
                    rr: rr_difference,
                  }
                }

                var frecuency_difference = {
                  numeric: current_frecuency - previous_frecuency,
                  percent: (((current_frecuency - previous_frecuency) / previous_frecuency) * 100),
                }
                var pr_difference = {
                  numeric: current_pr - previous_pr,
                  percent: (((current_pr - previous_pr) / previous_pr) * 100),
                }
                var qtc_difference = {
                  numeric: current_qtc - previous_qtc,
                  percent: (((current_qtc - previous_qtc) / previous_qtc) * 100),
                }
                var axes_p_difference = {
                  numeric: current_axes_p - previous_axes_p,
                  percent: (((current_axes_p - previous_axes_p) / previous_axes_p) * 100),
                }
                var axes_qrs_difference = {
                  numeric: current_axes_qrs - previous_axes_qrs,
                  percent: (((current_axes_qrs - previous_axes_qrs) / previous_axes_qrs) * 100),
                }
                var axes_t_difference = {
                  numeric: current_axes_t - previous_axes_t,
                  percent: (((current_axes_t - previous_axes_t) / previous_axes_t) * 100),
                }

                return {
                  frecuency: frecuency_difference,
                  qtc_r: qtc_formula,
                  pr: pr_difference,
                  qtc: qtc_difference,
                  axes: {
                    p: axes_p_difference,
                    qrs: axes_qrs_difference,
                    t: axes_t_difference,
                  },
                }
              }
              else {
                return {}
              }
            }
            else {
              return {}
            }
          }
          break;
        case 'history':
          var general = { numeric: 0, percent: 0 }

          if (comparison) {
            var obj = app.comparison.history
            var results = {
              dosis: general,
              daily_dosis: general
            }
            if (obj.current_patient !== undefined || obj.patient_to_compare !== undefined) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient : obj.patient_to_compare
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare : obj.current_patient

              if (patient_selected !== undefined && patient_to_compare !== undefined) {
                if (params.hasOwnProperty('dosis')) {
                  var current_dosis = patient_selected.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis != '' ? parseInt(patient_selected.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis) : 0

                  var previous_dosis = patient_to_compare.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis != '' ? parseFloat(patient_to_compare.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis) : 0

                  var dosis_numeric_difference = current_dosis - previous_dosis

                  var dosis_difference = {
                    numeric: dosis_numeric_difference,
                    percent: (dosis_numeric_difference
                      / (Math.sign(dosis_numeric_difference) == -1 ? current_dosis : previous_dosis) * 100),
                  }

                  results.dosis = dosis_difference

                }

                else if (params.hasOwnProperty('daily_dosis')) {
                  var current_dd = parseInt(patient_selected.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].daily_dosis)

                  var previous_dd = parseFloat(patient_to_compare.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].daily_dosis)

                  var dd_numeric_difference = current_dd - previous_dd

                  var dd_difference = {
                    numeric: dd_numeric_difference,
                    percent: (dd_numeric_difference
                      / (Math.sign(dd_numeric_difference) == -1 ? current_dd : previous_dd) * 100),
                  }

                  results.daily_dosis = dd_difference

                }

                return results
              }
              else {
                return { dosis: general, daily_dosis: general }
              }
            }
            else {
              return { dosis: general, daily_dosis: general }
            }
          }
          else {
            if (appointment.previous_appointment.hasOwnProperty('appointment_id')) {
              var obj = app.patient_history
              var previous_ph = obj.items.find(
                (e) => {
                  return e.appointment_id == appointment.previous_appointment.appointment_id
                })
              var results = {
                dosis: general,
                daily_dosis: general
              }
              if (previous_ph.hasOwnProperty('appointment_id')) {

                if (params.hasOwnProperty('dosis')) {
                  var current_dosis = obj.form.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis != '' ? parseInt(obj.form.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis) : 0

                  var previous_dosis = previous_ph.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis != '' ? parseFloat(previous_ph.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].dosis) : 0

                  var dosis_difference = {
                    numeric: current_dosis - previous_dosis,
                    percent: (((current_dosis - previous_dosis) / previous_dosis) * 100),
                  }

                  results.dosis = dosis_difference

                }

                else if (params.hasOwnProperty('daily_dosis')) {
                  var current_dd = parseInt(obj.form.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].daily_dosis)

                  var previous_dd = parseFloat(previous_ph.history_content.
                    treatments[params.treatment.group]
                  [params.treatment.treatment].daily_dosis)

                  var dd_difference = {
                    numeric: current_dd - previous_dd,
                    percent: (((current_dd - previous_dd) / previous_dd) * 100),
                  }

                  results.daily_dosis = dd_difference

                }

                return results
              }
              else {
                return { dosis: general, daily_dosis: general }
              }
            }
          }
          break;
        case 'laboratory-exam':
          if (comparison) {
            var obj = app.comparison.laboratory_exams
            var general = {
              numeric: 0,
              percent: 0
            }
            if (obj.current_patient[0] != undefined && obj.current_patient[0].hasOwnProperty('patient_id')
              && obj.patient_to_compare[0] != undefined && obj.patient_to_compare[0].hasOwnProperty('patient_id')) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient[0] : obj.patient_to_compare[0]
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare[0] : obj.current_patient[0]

              var results = {
                exam: general,
              }
              var current_result = parseInt(patient_selected.results)

              var previous_result = parseFloat(patient_to_compare.results)

              var ple_numeric_difference = current_result - previous_result

              var ple_difference = {
                numeric: ple_numeric_difference,
                percent: (ple_numeric_difference
                  / (Math.sign(ple_numeric_difference) == -1 ? current_result : previous_result) * 100),
              }

              results.exam = ple_difference

              return results
            }
            else {
              return { exam: general }
            }
          }
          else {
            var obj = app.patient_laboratory_exams
            var general = {
              numeric: 0,
              percent: 0
            }
            if (appointment.previous_appointment.hasOwnProperty('appointment_id')) {
              var index = obj.exam_results.indexOf(params.item)
              var current_ple = obj.exam_results[index]
              var previous_ple = obj.exam_results[index - 1]
              var results = {
                exam: general,
              }
              if (previous_ple !== undefined && previous_ple.hasOwnProperty('appointment_id')) {
                var current_result = parseInt(current_ple.results)

                var previous_result = parseFloat(previous_ple.results)

                var ple_difference = {
                  numeric: current_result - previous_result,
                  percent: (((current_result - previous_result) / previous_result) * 100),
                }

                results.exam = ple_difference

                return results
              }
              else {
                return { exam: general }
              }
            }
            else {
              return { exam: general }
            }
          }
          break;
        case 'risk-factor-calc-list':
          var general = {
            numeric: 0,
            percent: 0
          }
          if (comparison) {
            var obj = app.comparison.diagnostics.risk_factors
            var results = {
              dosis: general,
              daily_dosis: general
            }
            if (obj.current_patient.length > 0 || obj.patient_to_compare.length > 0) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient : obj.patient_to_compare
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare : obj.current_patient

              if (patient_selected !== undefined && patient_to_compare !== undefined) {
                var current_rfc = params.item
                var previous_rfc = patient_to_compare.find(
                  (e) => {
                    return e.name == current_rfc.name
                  })
                var results = {
                  calc: general,
                }
                if (previous_rfc !== undefined && previous_rfc.hasOwnProperty('appointment_id')) {

                  var current_result = parseFloat(current_rfc.results)
                  var previous_result = parseFloat(previous_rfc.results)

                  var rfc_numeric_difference = current_result - previous_result

                  var rfc_difference = {
                    numeric: rfc_numeric_difference,
                    percent: (rfc_numeric_difference
                      / (Math.sign(rfc_numeric_difference) == -1 ? current_result : previous_result) * 100),
                  }

                  results.calc = rfc_difference

                  return results
                }
                else {
                  return { calc: general }
                }
              }
              else {
                return { dosis: general, daily_dosis: general }
              }
            }
            else {
              return { dosis: general, daily_dosis: general }
            }
          }
          else {
            var obj = app.patient_risk_factors
            if (obj.risk_factors_list.items.length > 1) {
              var current_rfc = params.item
              var current_rfc_index = appointment.appointments.indexOf(appointment.appointments.find(e => e.appointment_id == current_rfc.appointment_id))
              var previous_rfc_appointment = appointment.appointments[current_rfc_index - 1]
              console.log(current_rfc, previous_rfc_appointment)
              if (previous_rfc_appointment == undefined) {
                return { calc: general }
              }
              var previous_rfc = obj.risk_factors_list.items.find(
                (e) => {
                  return e.appointment_id == previous_rfc_appointment.appointment_id && e.name == current_rfc.name
                })
              var rfc_index = obj.risk_factors_list.items.indexOf(obj.risk_factors_list.items.find( e => e.appointment_id == current_rfc.appointment_id))
              previous_rfc = previous_rfc == undefined ? !rfc_index ? undefined : obj.items[rfc_index - 1] : previous_rfc
              var results = {
                calc: general,
              }
              if (previous_rfc !== undefined && previous_rfc.hasOwnProperty('appointment_id')) {

                var current_result = parseFloat(current_rfc.results)
                var previous_result = parseFloat(previous_rfc.results)

                var total_result = current_result - previous_result

                var rfc_difference = {
                  numeric: total_result,
                  percent: (total_result / previous_result) * 100,
                }

                results.calc = rfc_difference

                return results
              }
              else {
                return { calc: general }
              }
            }
            else {
              return { calc: general }
            }
          }
          break;
        case 'risk-factor-calc':
          var obj = app.patient_risk_factors
          var general = {
            numeric: 0,
            percent: 0
          }
          if (appointment.previous_appointment.hasOwnProperty('appointment_id')) {
            var current_rfc = obj.selectedForm
            var previous_rfc = obj.risk_factors_calc_list.find(
              (e) => {
                return e.appointment_id == appointment.previous_appointment.appointment_id
              })
            var results = {
              calc: general,
            }
            if (previous_rfc !== undefined && previous_rfc.hasOwnProperty('appointment_id')) {

              var current_result = parseFloat(current_rfc.obj.results)
              var previous_result = parseFloat(previous_rfc.results)

              var rfc_difference = {
                numeric: current_result - previous_result,
                percent: (((current_result - previous_result) / previous_result) * 100),
              }

              results.calc = rfc_difference

              return results
            }
            else {
              return { calc: general }
            }
          }
          else {
            return { calc: general }
          }
          break;
        case 'life-style':
          if (comparison) {
            var obj = app.comparison.anthropometry
            if (obj.current_patient.hasOwnProperty('patient_id') && obj.patient_to_compare.hasOwnProperty('patient_id')) {
              var patient_selected = !params.patient_to_compare ? obj.current_patient : obj.patient_to_compare
              var patient_to_compare = !params.patient_to_compare ? obj.patient_to_compare : obj.current_patient

              var current_abdominal_waist = parseInt(patient_selected.abdominal_waist)
              var current_height = parseInt(patient_selected.height)
              var current_weight = parseInt(patient_selected.weight)
              var current_bmi = parseFloat(app.getBMI(
                current_weight, current_height,
                patient_selected.weight_suffix, patient_selected.height_suffix).replace(' kg/m2', ''))
              var current_cs = parseFloat(app.getCS(
                current_weight, current_height,
                patient_selected.weight_suffix, patient_selected.height_suffix).replace(' m2', ''))

              var previous_abdominal_waist = parseInt(patient_to_compare.abdominal_waist)
              var previous_height = parseInt(patient_to_compare.height)
              var previous_weight = parseInt(patient_to_compare.weight)
              var previous_bmi = parseFloat(app.getBMI(
                previous_weight, previous_height,
                patient_to_compare.weight_suffix, patient_to_compare.height_suffix).replace(' kg/m2', ''))
              var previous_cs = parseFloat(app.getCS(
                previous_weight, previous_height,
                patient_to_compare.weight_suffix, patient_to_compare.height_suffix).replace(' m2', ''))

              var weight_difference = {
                numeric: current_weight - previous_weight,
                percent: (((current_weight - previous_weight) / previous_weight) * 100),
              }

              var height_difference = {
                numeric: current_height - previous_height,
                percent: (((current_height - previous_height) / previous_height) * 100),
              }

              var abdominal_waist_difference = {
                numeric: current_abdominal_waist - previous_abdominal_waist,
                percent: (((current_abdominal_waist - previous_abdominal_waist) / previous_abdominal_waist) * 100),
              }

              var bmi_difference = {
                numeric: current_bmi - previous_bmi,
                percent: (((current_bmi - previous_bmi) / previous_bmi) * 100),
              }

              var cs_difference = {
                numeric: current_cs - previous_cs,
                percent: (((current_cs - previous_cs) / previous_cs) * 100),
              }

              return {
                weight: weight_difference,
                height: height_difference,
                abdominal_waist: abdominal_waist_difference,
                bmi: bmi_difference,
                cs: cs_difference
              }
            }
            else {
              return {}
            }
          }
          else {
            var obj = app.patient_life_style
            var general_results = {
              exercise_weekly_minutes: {
                numeric: 0,
                apercentage: 0
              },
              smoking: {
                cigarettes_per_day: {
                  numeric: 0,
                  apercentage: 0
                },
              }
            }
            if (obj.items.length > 1) {
              var current_life_style = params !== undefined && params.hasOwnProperty('life_style') ? params.life_style : obj.editedItem
              var current_appointment_index = appointment.appointments.indexOf(appointment.appointments.find(e => e.appointment_id == current_life_style.appointment_id))
              var previous_appointment = appointment.appointments[current_appointment_index - 1]
              if (previous_appointment == undefined) {
                return general_results
              }
              var previous_life_style = obj.items.find(
                (e) => {
                  return e.appointment_id == previous_appointment.appointment_id
                })
              var anthropometry_index = obj.items.indexOf(current_life_style)
              previous_life_style = previous_life_style == undefined ? obj.items[anthropometry_index - 1] : previous_life_style
              if (previous_life_style !== undefined && previous_life_style.hasOwnProperty('appointment_id')) {

                var current_weekly_exercise_minutes = parseInt(current_life_style.exercise_weekly_minutes)
                var current_smoking_cigarettes_per_day = parseInt(current_life_style.smoking.cigarettes_per_day)

                var previous_weekly_exercise_minutes = parseInt(previous_life_style.exercise_weekly_minutes)
                var previous_smoking_cigarettes_per_day = parseInt(previous_life_style.smoking.cigarettes_per_day)

                var total_exercise_weekly_minutes = current_weekly_exercise_minutes - previous_weekly_exercise_minutes
                var total_smoking_cigarettes_per_day = current_smoking_cigarettes_per_day - previous_smoking_cigarettes_per_day

                var weekly_exercise_minutes_difference = {
                  numeric: total_exercise_weekly_minutes,
                  percent: (total_exercise_weekly_minutes / previous_weekly_exercise_minutes) * 100,
                }

                var smoking_cigarettes_per_day_difference = {
                  numeric: total_smoking_cigarettes_per_day,
                  percent: (total_smoking_cigarettes_per_day / previous_smoking_cigarettes_per_day) * 100,
                }

                return {
                  exercise_weekly_minutes: weekly_exercise_minutes_difference,
                  smoking: {
                    cigarettes_per_day: smoking_cigarettes_per_day_difference
                  }
                }
              }
              else {
                return general_results
              }
            }
            else {
              return general_results
            }
          }

          break;
        default:
          // statements_def
          break
      }
    },

    returnNumberSign(amount) {
      var sign = ''
      if (Math.sign(amount) == 1 && amount !== 0 && amount !== Infinity && amount !== NaN) {
        sign = '+'
      }
      else if (Math.sign(amount) == -1 && amount !== 0 && amount !== Infinity && amount !== NaN) {
        sign = ''
      }
      else {
        sign = ''
        amount = 0
      }
      return sign + amount
    },

    filterFollowUpsAppointments(item, viewMode = false) {
      var app = this
      var obj = app.patient_appointments
      app.FollowUpAppointmentsDialog = false
      var index = obj.appointments.indexOf(item)
      obj.previous_appointment = index > 0 ? obj.appointments[index - 1] : {}
      if (app.view_dialog) {
        switch (app.view_tab) {
          case 'tab-view-3':
            app.initializeHistory()
            break;
          case 'tab-view-4':
            app.initializeAnthropometry()
            break;
          case 'tab-view-5':
            app.initializeVitalSigns()
            break;
          case 'tab-view-6':
            app.initializePhysicalExams()
            break;
          case 'tab-view-7':
            app.initializeElectroCardiograms()
            break;
          case 'tab-view-8':
            app.initializeEchocardiograms()
            break;
          case 'tab-view-9':
            app.initializeExams()
            app.initializeExamsFiles()
            break;
          case 'tab-view-10':
            app.initializeFactorsRisk(true)
            break;
          case 'tab-view-11':
            app.initializeLifeStyle()
            break;
          case 'tab-view-12':
            app.initializePlans()
            break;
        }
      }
      else {
        switch (app.tab) {
          case 'tab-3':
            app.initializeHistory()
            break;
          case 'tab-4':
            app.initializeAnthropometry()
            break;
          case 'tab-5':
            app.initializeVitalSigns()
            break;
          case 'tab-6':
            app.initializePhysicalExams()
            break;
          case 'tab-7':
            app.initializeElectroCardiograms()
            break;
          case 'tab-8':
            app.initializeEchocardiograms()
            break;
          case 'tab-9':
            app.initializeExams()
            app.initializeExamsFiles()
            break;
          case 'tab-10':
            app.initializeFactorsRisk(app.view_dialog)
            break;
          case 'tab-11':
            app.initializeLifeStyle()
            break;
          case 'tab-12':
            app.initializeFactorsRisk()
            app.initializePlans()
            break;
        }
      }
    },

    searchTemplate() {
      return this.filtered_templates = this.templates.filter(template => {
        return template.material_name.toLowerCase().includes(this.template_search.toLowerCase())
      })
    },

    getTelephoneInput(text, data) {
      this.editedItem.telephone = data.number.international
    },

  }
});
