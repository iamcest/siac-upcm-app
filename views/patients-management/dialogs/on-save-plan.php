<v-dialog v-model="finishOptionsDialog" max-width="75%">
  <v-card>
    <v-toolbar elevation="0">
      <v-toolbar-title>Antes de finalizar...</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
      <v-btn icon dark @click="finishOptionsDialog = false">
        <v-icon color="grey">mdi-close</v-icon>
      </v-btn>
      </v-toolbar-items>
    </v-toolbar>

    <v-divider></v-divider>

    <v-card-text>
      <v-container fluid>
        <v-row>
          <v-col class="d-flex justify-center" cols="12">
            <v-btn color="primary" @click="finishOptionsDialog = false; recipe_reports_dialog = true; initializeRecipes(); initializeFactorsRisk(false);" tile>Crear Informe y Recipe</v-btn>
            <v-btn color="info" @click="finishAppointmentAndCreateNext" :loading="patient_appointments.finish_loading" v-if="patient_plan.alreadySaved && !parseInt(patient_appointments.current_appointment.appointment_finished)" tile>Finalizar cita y crear próxima cita</v-btn>
            <v-btn color="secondary" @click="finishOptionsDialog = false" tile>Continuar en la ficha</v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-card-text>
  </v-card>
</v-dialog>