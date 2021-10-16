
<v-row>
  <v-col cols="12">
    <h3 class="black--text text-h5">Toma antiplaquetarios</h3>
  </v-col>
</v-row>
<v-row class="factor-risk-container" style="max-height: 80vh;overflow-y: auto;">
  <v-col cols="12">
     <v-select v-model="patient_history.form.history_content.antiplatelet.active" :items="patient_history.select" item-text="text" item-value="value" outlined dense>
    </v-select>
  </v-col>
  <template v-if="patient_history.form.history_content.antiplatelet.active">

    <template>
      <v-col cols="12">
        <v-divider></v-divider>
      </v-col>
      <v-col cols="12">
        <label class="font-weight-bold black--text">Aspirina:</label>
        <v-select v-model="patient_history.form.history_content.antiplatelet.treatments.aspirin.active" :items="patient_history.select" item-text="text" item-value="value" outlined dense>
      </v-col>
      <v-col class="mt-n8" cols="12" v-if="patient_history.form.history_content.antiplatelet.treatments.aspirin.active">
        <label class="font-weight-bold black--text">Dosis:</label>
        <v-text-field v-model="patient_history.form.history_content.antiplatelet.treatments.aspirin.dosis" class="mt-3" outlined dense></v-text-field>
      </v-col>
    </template>

    <template>
      <v-col cols="12">
        <v-divider></v-divider>
      </v-col>
      <v-col cols="12">
        <label class="font-weight-bold black--text">Clopidogrel:</label>
        <v-select v-model="patient_history.form.history_content.antiplatelet.treatments.clopidogrel.active" :items="patient_history.select" item-text="text" item-value="value" outlined dense>
      </v-col>
      <v-col class="mt-n8" cols="12" v-if="patient_history.form.history_content.antiplatelet.treatments.clopidogrel.active">
        <label class="font-weight-bold black--text">Dosis:</label>
        <v-text-field v-model="patient_history.form.history_content.antiplatelet.treatments.clopidogrel.dosis" class="mt-3" outlined dense></v-text-field>
      </v-col>
    </template>

    <template>
      <v-col cols="12">
        <v-divider></v-divider>
      </v-col>
      <v-col cols="12">
        <label class="font-weight-bold black--text">Ticagrelor:</label>
        <v-select v-model="patient_history.form.history_content.antiplatelet.treatments.ticagrelor.active" :items="patient_history.select" item-text="text" item-value="value" outlined dense>
      </v-col>
      <v-col class="mt-n8" cols="12" v-if="patient_history.form.history_content.antiplatelet.treatments.ticagrelor.active">
        <label class="font-weight-bold black--text">Dosis:</label>
        <v-text-field v-model="patient_history.form.history_content.antiplatelet.treatments.ticagrelor.dosis" class="mt-3" outlined dense></v-text-field>
      </v-col>
    </template>

    <template>
      <v-col cols="12">
        <v-divider></v-divider>
      </v-col>
      <v-col cols="12">
        <label class="font-weight-bold black--text">Prasugrel:</label>
        <v-select v-model="patient_history.form.history_content.antiplatelet.treatments.prasugel.active" :items="patient_history.select" item-text="text" item-value="value" outlined dense>
      </v-col>
      <v-col class="mt-n8" cols="12" v-if="patient_history.form.history_content.antiplatelet.treatments.prasugel.active">
        <label class="font-weight-bold black--text">Dosis:</label>
        <v-text-field v-model="patient_history.form.history_content.antiplatelet.treatments.prasugel.dosis" class="mt-3" outlined dense></v-text-field>
      </v-col>
    </template>

  </template>
</v-row>
