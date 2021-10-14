<v-row class="factor-risk-container mb-10">
    <v-col cols="12">
        <h3 class="text-h5 text-center black--text">Polipíldora</h3>
    </v-col>
    <v-col cols="12">
        <v-row class="d-flex justify-center">
            <v-col cols="6" md="6" lg="4">
                <v-row>
                    <v-col cols="12">
                        <h3 class="font-weight-bold black--text text-center">Es candidato</h3>
                        <label class="white--text font-weight-bold">.</label>
                        <v-select
                            v-model="patient_history.form.history_content.diseases.dyslipidemia.polipildora.active"
                            :items="patient_history.select" class="mt-3"
                            hint="¿Este paciente califica para la indicación de Polipíldora?" persistent-hint outlined
                            dense>
                        </v-select>
                    </v-col>
                    <template v-if="patient_history.form.history_content.diseases.dyslipidemia.polipildora.active">
                        <v-col class="mt-n6" cols="12">
                            <v-select ref="polipildora_select"
                                v-model="patient_history.form.history_content.diseases.dyslipidemia.polipildora.selected"
                                :items="patient_history.form.history_content.diseases.dyslipidemia.treatments_list.polipildora"
                                class="mt-3" multiple outlined dense>
                                <template #prepend-item>
                                    <v-row class="px-7">
                                        <v-btn color="secondary" @click="$refs.polipildora_select.blur()" block>Cerrar
                                        </v-btn>
                                    </v-row>
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-text-field ref="polipildora_treatment" placeholder="Incluir otro" dense
                                                outlined></v-text-field>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-btn class="mt-n6" color="primary" text
                                        @click="addItemToArray($refs.polipildora_treatment.internalValue, patient_history.form.history_content.diseases.dyslipidemia.treatments_list.polipildora)">
                                        <v-icon>mdi-plus-circle</v-icon>
                                        Añadir
                                    </v-btn>
                                    <v-divider class="mt-2"></v-divider>
                                </template>
                            </v-select>
                        </v-col>
                        <v-col class="mt-n6" cols="12">
                            <label>Fecha de la cita</label>
                            <v-dialog ref="polipildora_date_dialog" v-model="ph_polipildora_date_modal"
                                :return-value.sync="patient_history.form.history_content.diseases.dyslipidemia.polipildora.date" width="290px">
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field class="mt-3"
                                        v-model="patient_history.form.history_content.diseases.dyslipidemia.polipildora.date"
                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" dense outlined>
                                    </v-text-field>
                                </template>
                                <v-date-picker v-model="patient_history.form.history_content.diseases.dyslipidemia.polipildora.date" locale="es"
                                    scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="ph_polipildora_date_modal = false">
                                        Cancel
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.polipildora_date_dialog.save(patient_history.form.history_content.diseases.dyslipidemia.polipildora.date)">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col class="mt-n6" cols="12">
                            <label>Razón</label>
                            <v-select ref="polipildora_reason_select"
                                v-model="patient_history.form.history_content.diseases.dyslipidemia.polipildora.reason"
                                :items="patient_history.form.history_content.diseases.dyslipidemia.treatments_list.polipildora_reason"
                                class="mt-3" multiple outlined dense>
                                <template #prepend-item>
                                    <v-row class="px-7">
                                        <v-btn color="secondary" @click="$refs.polipildora_reason_select.blur()" block>
                                            Cerrar
                                        </v-btn>
                                    </v-row>
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-text-field ref="polipildora_reason" placeholder="Incluir otro" dense
                                                outlined></v-text-field>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-btn class="mt-n6" color="primary" text
                                        @click="addItemToArray($refs.polipildora_reason.internalValue, patient_history.form.history_content.diseases.dyslipidemia.treatments_list.polipildora_reason)">
                                        <v-icon>mdi-plus-circle</v-icon>
                                        Añadir
                                    </v-btn>
                                    <v-divider class="mt-2"></v-divider>
                                </template>
                            </v-select>
                        </v-col>
                        <v-col class="mt-n8" cols="12"
                            v-if="pregnancyAlert(patient_history.form.history_content.diseases.dyslipidemia.polipildora.selected) && patient_history.form.history_content.diseases.dyslipidemia.polipildora.active">
                            <v-alert border="bottom" type="warning" elevation="2" colored-border>
                                Asegúrese que la paciente no esté embarazada o no lo tiene planificado.
                            </v-alert>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
        </v-row>
    </v-col>
</v-row>