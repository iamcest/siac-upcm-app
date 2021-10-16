<v-col cols="12">
    <v-row class="d-flex justify-start">
        <v-col class="mt-6" cols="6" md="4" lg="3">
            <v-select v-model="patient_history.form.history_content.diseases.dtm2.active"
                :items="patient_history.select" item-text='text' item-value='value' outlined dense>
                <template v-slot:prepend>
                    <h4 class="my-auto text-h6 font-weight-bold">DMt2:</h4>
                </template>
            </v-select>
        </v-col>
        <template v-if="patient_history.form.history_content.diseases.dtm2.active">
            <v-col cols="6" md="4" lg="3">
                <label class="black--text font-weight-bold">Controlado:</label>
                <v-select v-model="patient_history.form.history_content.diseases.dtm2.controlled"
                    :items="patient_history.select" item-text='text' item-value='value'
                    @change="diagnosticDateCheck(patient_history.form.history_content.diseases.dtm2)" outlined dense>
                </v-select>
            </v-col>
            <v-col cols="6" md="4" lg="3">
                <label class="black--text font-weight-bold">Diagnóstico previo:</label>
                <v-select v-model="patient_history.form.history_content.diseases.dtm2.detected_previously"
                    :items="patient_history.select" item-text='text' item-value='value'
                    @change="diagnosticDateCheck(patient_history.form.history_content.diseases.dtm2)" outlined dense>
                </v-select>
            </v-col>
            <v-col cols="6" md="4" lg="3" v-if="patient_history.form.history_content.diseases.dtm2.detected_previously">
                <label class="black--text font-weight-bold">Tiempo de diagnóstico:</label>
                <v-select v-model="patient_history.form.history_content.diseases.dtm2.diagnostic_date"
                    :items="patient_history.interval_times" item-text='text' item-value='value' outlined dense>
                </v-select>
            </v-col>
            <v-col cols="6" md="4" lg="3" v-else>
                <label class="black--text font-weight-bold">fecha de diagnóstico:
                    {{ patient_history.form.history_content.diseases.dtm2.diagnostic_date }}
            </v-col>
        </template>
    </v-row>
</v-col>