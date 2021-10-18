<v-container>
    <v-card class="px-2 py-10" width="100%">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Insuficiencia Cardíaca</h3>
            </v-col>
            <v-col class="px-4" cols="12">
                <v-row>
                    <v-col cols="12">
                    <label class="font-weight-bold black--text">Padece esta enfermedad:</label>
                        <v-select
                            v-model="patient_history.form.history_content.cardiovascular_diseases.heart_failure.active"
                            :items="patient_history.select" placeholder="Seleccione una opción" class="mt-3" outlined
                            dense>
                        </v-select>
                    </v-col>
                    <template v-if="patient_history.form.history_content.cardiovascular_diseases.heart_failure.active">
                        <v-col cols="12">
                            <v-dialog ref="cd_heart_failure_dx_year_modal" v-model="ph_cd_heart_failure_dx_year_modal"
                                width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field
                                        :value="getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.heart_failure.dx_age)"
                                        append-icon="mdi-calendar" class="mt-3" readonly v-bind="attrs" v-on="on"
                                        outlined dense>
                                        <template class="black-text" #prepend>
                                            <span class="font-weight-bold">Dx año:</span>
                                        </template>
                                    </v-text-field>
                                </template>
                                <v-date-picker ref="cd_heart_failure_datepicker"
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.heart_failure.dx_age"
                                    @input="$refs.cd_heart_failure_dx_year_modal.save(patient_history.form.history_content.cardiovascular_diseases.heart_failure.dx_age)"
                                    locale="es" reactive no-title scrollable>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12">
                            <v-select
                                v-model="patient_history.form.history_content.cardiovascular_diseases.heart_failure.functional_class"
                                :items="['', 1,2,3,4]" class="mt-3" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="font-weight-bold">Clase funcional NYHA:</span>
                                </template>
                            </v-select>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
        </v-row>
    </v-card>
</v-container>