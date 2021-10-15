<v-row>
  <v-col cols="12">
    <h3 class="black--text text-h5 text-center">Enfermedad Renal Crónica</h3>
  </v-col>
</v-row>
<v-row class="factor-risk-container">
  <v-col cols="12">
    <span class="font-weight-bold black--text">Estadío: {{ patient_history.form.history_content.cronic_kidney_disease.stadium }} </span>
  </v-col>
  <v-col cols="12" class="mt-n4">
    <span class="font-weight-bold black--text">Diálisis:
      <template v-if="patient_history.form.history_content.cronic_kidney_disease.dialysis">
        Sí
      </template>
      <template v-else>
        No
      </template>
    </span>
  </v-col>
</v-row>
