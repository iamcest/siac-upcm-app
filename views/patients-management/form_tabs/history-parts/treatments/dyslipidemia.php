<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">HIPOLIPEMIANTES</h3>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Estatinas</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.diseases.dyslipidemia.statins.treatment"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.treatments_list.statins"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_statins_treatment" placeholder="Incluir otro" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_statins_treatment.internalValue, patient_history.form.history_content.diseases.dyslipidemia.treatments_list.statins)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.statins.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.statins.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.statins.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.statins.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.statins.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.statins"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_statins_se" placeholder="Incluye otra" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_statins_se.internalValue, patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.statins)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n8" cols="12" v-if="patient_history.form.history_content.diseases.dyslipidemia.statins.treatment !== '' && 
                patient_history.form.history_content.diseases.dyslipidemia.fibratos.treatment !== ''">
                    <v-alert border="bottom" type="warning" elevation="2" colored-border>
                        Aumenta el riesgo de rabdomiólisis.
                    </v-alert>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">EZT</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.diseases.dyslipidemia.ezt.active"
                        :items="patient_history.select" class="mt-3" outlined dense>
                    </v-select>
                </v-col>
                <template v-if="patient_history.form.history_content.diseases.dyslipidemia.ezt.active">
                    <v-col class="mt-n4" cols="12">
                        <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.ezt.dosis"
                            class="mt-3" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="font-weight-bold">Dosis diarias:</span>
                            </template>
                        </v-text-field>
                        <v-row class="d-flex justify-center"
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'  }}).dosis.percent)) + '%)'">
                            </v-badge>
                        </v-row>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <label class="black--text font-weight-bold">Frecuencia:</label>
                        <v-select :items="patient_history.options.treatment_frecuency"
                            v-model="patient_history.form.history_content.diseases.dyslipidemia.ezt.frecuency"
                            class="black-text mt-3" outlined dense></v-select>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <label class="black--text font-weight-bold">Reacciones adversas:</label>
                        <v-select
                            v-model="patient_history.form.history_content.diseases.dyslipidemia.ezt.has_secondary_effects"
                            class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                    </v-col>
                    <v-col class="mt-n4" cols="12"
                        v-if="patient_history.form.history_content.diseases.dyslipidemia.ezt.has_secondary_effects">
                        <label class="black--text font-weight-bold">Tipo de reacción:</label>
                        <v-select
                            v-model="patient_history.form.history_content.diseases.dyslipidemia.ezt.secondary_effects"
                            class="black-text mt-3"
                            :items="patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.ezt"
                            outlined dense>
                            <template #prepend-item>
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-text-field ref="dyslipidemia_statins_se" placeholder="Incluye otra" dense
                                            outlined>
                                        </v-text-field>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-btn class="mt-n6" color="primary" text
                                    @click="addItemToArray($refs.dyslipidemia_statins_se.internalValue, patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.ezt)">
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
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Fibratos</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.diseases.dyslipidemia.fibratos.treatment"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.treatments_list.fibratos"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_fibratos_treatment" placeholder="Incluir otro" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_fibratos_treatment.internalValue, patient_history.form.history_content.diseases.dyslipidemia.treatments_list.fibratos)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.fibratos.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.fibratos.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.fibratos.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.fibratos.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.fibratos.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.fibratos"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_fibratos_se" placeholder="Incluye otra" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_fibratos_se.internalValue, patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.fibratos)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n8" cols="12" v-if="patient_history.form.history_content.diseases.dyslipidemia.statins.treatment !== '' && 
                patient_history.form.history_content.diseases.dyslipidemia.fibratos.treatment !== ''">
                    <v-alert border="bottom" type="warning" elevation="2" colored-border>
                        Aumenta el riesgo de rabdomiólisis.
                    </v-alert>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Omega 3</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.diseases.dyslipidemia.omega3.treatment"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.treatments_list.omega3"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_omega3_treatment" placeholder="Incluir otro" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_omega3_treatment.internalValue, patient_history.form.history_content.diseases.dyslipidemia.treatments_list.omega3)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.omega3.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.omega3.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.omega3.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.omega3.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.omega3.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.omega3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_omega3_se" placeholder="Incluye otra" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_omega3_se.internalValue, patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.omega3)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">IPCSK9</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.treatment"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.treatments_list.ipcsk9"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_ipcsk9_treatment" placeholder="Incluir otro" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_ipcsk9_treatment.internalValue, patient_history.form.history_content.diseases.dyslipidemia.treatments_list.ipcsk9)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.omega3.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select
                        v-model="patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.ipcsk9"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dyslipidemia_ipcsk9_se" placeholder="Incluye otra" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dyslipidemia_ipcsk9_se.internalValue, patient_history.form.history_content.diseases.dyslipidemia.secondary_effects.ipcsk9)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>