<v-row>
  <v-col cols="12">
    <h3 class="black--text text-h5 text-center">Enfermedad Renal Crónica</h3>
  </v-col>
</v-row>
<v-row class="factor-risk-container">
  <v-col cols="12">
    <label class="font-weight-bold black--text">Estadío: {{ patient_history.form.history_content.cronic_kidney_disease.stadium }} </label>
  </v-col>
  <v-col cols="12" class="mt-n4">
    <label class="font-weight-bold black--text">Diálisis:
      <template v-if="patient_history.form.history_content.cronic_kidney_disease.dialysis">
        Sí
      </template>
      <template v-else>
        No
      </template>
    </label>
  </v-col>
</v-row>
