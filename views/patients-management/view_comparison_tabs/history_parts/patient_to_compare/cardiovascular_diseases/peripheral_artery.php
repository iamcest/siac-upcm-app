
<v-row>
  <v-col cols="12">
    <h3 class="text-center black--text">Enfermedad Arterial Periférica</h3>
  </v-col>
  <v-col class="factor-risk-container" cols="12">
    <v-row>
      <v-col cols="12">
        <template v-if="comparison.history.patient_to_compare.history_content.cardiovascular_diseases.peripheral_artery_disease.active">
          Sí
        </template>
        <template v-else>
          No
        </template>
      </v-col>
      <v-col cols="12" v-if="comparison.history.patient_to_compare.history_content.cardiovascular_diseases.peripheral_artery_disease.active">
        <span class="black--text font-weight-bold">Territorio: {{ comparison.history.patient_to_compare.history_content.cardiovascular_diseases.peripheral_artery_disease.territory }} </span>
      </v-col>
    </v-row>
  </v-col>
</v-row>
