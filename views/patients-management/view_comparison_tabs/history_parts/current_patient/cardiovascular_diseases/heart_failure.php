
<v-row>
  <v-col cols="12">
    <h3 class="text-center black--text">Insuficiencia Cardíaca</h3>
  </v-col>
  <v-col class="factor-risk-container" cols="12">
    <v-row>
      <v-col cols="12">
        <span class="black--text font-weight-bold">
          <template v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.heart_failure.active">
            Sí
          </template>
          <template v-else>
            No
          </template>
        </span>
      </v-col>
      <template v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.heart_failure.active">
        <v-col cols="12">
          <span class="black--text font-weight-bold">Dx año: {{ getOnlyYear(comparison.history.current_patient.history_content.cardiovascular_diseases.heart_failure.dx_age) }} </span>
        </v-col>
        <v-col cols="12">
          <span class="black--text font-weight-bold">Clase funcional NYHA: {{ comparison.history.current_patient.history_content.cardiovascular_diseases.heart_failure.functional_class }} </span>
        </v-col>
      </template>
    </v-row>
  </v-col>
</v-row>
