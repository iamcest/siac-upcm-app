<v-dialog v-model="patient_appointments.outside_dialog" max-width="90%" @click:outside="patient_appointments.outside_dialog = false">
  <v-card>
    <v-toolbar elevation="0">
      <v-toolbar-title>{{ AppointmentFormTitle }} - <span v-if="editedItem.hasOwnProperty('first_name')">{{ editedItem.first_name + ' ' + editedItem.last_name }}</span></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
      <v-btn icon dark @click="patient_appointments.outside_dialog = false">
        <v-icon color="grey">mdi-close</v-icon>
      </v-btn>
      </v-toolbar-items>
    </v-toolbar>
    
    <v-divider></v-divider>
    <v-form class="dialog_form">
      <v-row class="px-8">
        <v-col cols="12" sm="6">
          <label>Seleccione el especialista</label>
          <v-select class="mt-3" v-model="patient_appointments.editedItem.user_id" :items="patient_appointments.doctors" item-text="full_name" item-value="user_id" no-data-text='No hay datos disponibles' :loading="patient_appointments.select" outlined></v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <label>Motivo de la cita</label>
          <v-text-field class="mt-3" v-model="patient_appointments.editedItem.appointment_reason" outlined>
          </v-text-field>
        </v-col>
        <v-col cols="12" sm="6">
          <label>Tipo de cita</label>
          <v-select class="mt-3" v-model="patient_appointments.editedItem.appointment_type" :items="patient_appointments.types" outlined></v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <label>Fecha de la cita</label>

          <v-dialog ref="appointment_date_dialog" v-model="patient_appointments.date_modal" :return-value.sync="patient_appointments.editedItem.appointment_date" width="290px">
            <template v-slot:activator="{ on, attrs }">
              <v-text-field class="mt-3" v-model="patient_appointments.editedItem.appointment_date" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
            </template>
            <v-date-picker v-model="patient_appointments.editedItem.appointment_date" locale="es" scrollable>
              <v-spacer></v-spacer>
              <v-btn text color="primary" @click="patient_appointments.date_modal = false">
                Cancel
              </v-btn>
              <v-btn text color="primary" @click="$refs.appointment_date_dialog.save(patient_appointments.editedItem.appointment_date)">
                OK
              </v-btn>
            </v-date-picker>
          </v-dialog>
        </v-col>
        <v-col cols="12" sm="6">
          <label>Hora de la cita</label>
          <v-dialog  ref="appointment_time_dialog" v-model="patient_appointments.time_modal" :return-value.sync="patient_appointments.editedItem.appointment_time" persistent width="290px">
            <template v-slot:activator="{ on, attrs }">
              <v-text-field class="mt-3" v-model="patient_appointments.editedItem.appointment_time" append-icon="mdi-clock-time-four-outline" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
            </template>
            <v-time-picker v-if="patient_appointments.time_modal" v-model="patient_appointments.editedItem.appointment_time" full-width>
              <v-spacer></v-spacer>
              <v-btn text color="primary" @click="patient_appointments.time_modal = false" >
                Cancelar
              </v-btn>
              <v-btn text color="primary" @click="$refs.appointment_time_dialog.save(patient_appointments.editedItem.appointment_time)" >
                OK
              </v-btn>
            </v-time-picker>
          </v-dialog>
        </v-col>
        
      </v-row>
    </v-form>
    <v-card-actions class="px-8">
      <v-spacer></v-spacer>
      <v-btn color="secondary white--text" block @click="saveAppointment">
        Guardar
      </v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>