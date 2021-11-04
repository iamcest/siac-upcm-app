<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">ANTIDIABÉTICOS</h3>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Metformina</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.metformin.active"
                        :items="patient_history.select" class="mt-3" outlined dense>
                    </v-select>
                </v-col>
                <template v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.active">
                    <v-col class="mt-n4" cols="12">
                        <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.metformin.dosis"
                            class="mt-3" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="font-weight-bold">Dosis diarias:</span>
                            </template>
                        </v-text-field>
                        <v-row class="d-flex justify-center"
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin'  }}).dosis.percent)) + '%)'">
                            </v-badge>
                        </v-row>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <label class="black--text font-weight-bold mb-3">Frecuencia:</label>
                        <v-select :items="patient_history.options.treatment_frecuency"
                            v-model="patient_history.form.history_content.treatments.antidiabetics.metformin.frecuency"
                            class="black-text mt-3" outlined dense></v-select>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <label class="black--text font-weight-bold">Reacciones adversas:</label>
                        <v-select
                            v-model="patient_history.form.history_content.treatments.antidiabetics.metformin.has_secondary_effects"
                            class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                    </v-col>
                    <v-col class="mt-n4" cols="12"
                        v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                        <label class="black--text font-weight-bold">Tipo de reacción:</label>
                        <v-select
                            v-model="patient_history.form.history_content.treatments.antidiabetics.metformin.secondary_effects"
                            class="black-text mt-3"
                            :items="patient_history.form.history_content.treatments.antidiabetics.secondary_effects.metformin"
                            outlined dense>
                            <template #prepend-item>
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-text-field ref="dtm2_metorfmin_se" placeholder="Incluye otra" dense outlined>
                                        </v-text-field>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-btn class="mt-n6" color="primary" text
                                    @click="addItemToArray($refs.dtm2_metorfmin_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.metformin)">
                                    <v-icon>mdi-plus-circle</v-icon>
                                    Añadir
                                </v-btn>
                                <v-divider class="mt-2"></v-divider>
                            </template>
                        </v-select>
                    </v-col>
                </template>
            </v-row>
        </v-col>
    </v-row>
</v-card>