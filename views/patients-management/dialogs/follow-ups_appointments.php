<v-dialog v-model="FollowUpAppointmentsDialog" max-width="400px">
  <v-card>
    <v-toolbar elevation="0">
      <v-toolbar-title>Seleccione una cita</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
      <v-btn icon dark @click="FollowUpAppointmentsDialog = false">
        <v-icon color="grey">mdi-close</v-icon>
      </v-btn>
      </v-toolbar-items>
    </v-toolbar>

    <v-divider></v-divider>

    <v-card-text>
      <v-container fluid>
        <v-row>
          <v-col class="d-flex justify-center" cols="12">
            <v-select v-model="patient_appointments.current_appointment" :items="patient_appointments.appointments" :item-text="item => item.appointment_reason + ' ' + item.appointment_date" @change="filterFollowUpsAppointments" return-object>
            </v-select>
          </v-col>
        </v-row>
      </v-container>
    </v-card-text>
  </v-card>
</v-dialog>