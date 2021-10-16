<v-container class="px-0">
    <v-card>
        <v-col cols="12">
            <h3 class="black--text text-h5 text-center">Enfermedad Renal Crónica</h3>
        </v-col>
        <v-col cols="12">
            <label class="font-weight-bold black--text">Estadío:</label>
            <v-select v-model="patient_history.form.history_content.cronic_kidney_disease.stadium"
                :items="['', 'I', 'II', 'III', 'IV', 'V']" outlined dense></v-select>
        </v-col>
        <v-col cols="12" class="mt-n4">
            <label class="font-weight-bold black--text">Diálisis:</label>
            <v-select v-model="patient_history.form.history_content.cronic_kidney_disease.dialysis"
                :items="patient_history.select" outlined dense></v-select>
        </v-col>
    </v-card>
</v-container>