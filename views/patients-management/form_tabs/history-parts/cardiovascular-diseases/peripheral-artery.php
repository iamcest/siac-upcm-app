<v-container>
    <v-card class="px-2 py-10" width="100%">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Enfermedad Arterial Periférica</h3>
            </v-col>
            <v-col class="px-4" cols="12">
                <v-row>
                    <v-col cols="12">
                        <label class="font-weight-bold black--text">Padece esta enfermedad:</label>
                        <v-select
                            v-model="patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.active"
                            :items="patient_history.select" class="mt-3" outlined dense>
                        </v-select>
                    </v-col>
                    <v-col cols="12"
                        v-if="patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.active">
                        <v-select
                            v-model="patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.territory"
                            :items="patient_history.options.peripheral_artery_disease.territory" class="mt-3" outlined
                            dense>
                            <template class="black-text" #prepend>
                                <span class="font-weight-bold">Territorio:</span>
                            </template>
                        </v-select>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-card>
</v-container>