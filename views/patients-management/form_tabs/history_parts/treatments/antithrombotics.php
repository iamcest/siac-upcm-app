<v-row class="factor-risk-container mb-10">
    <v-col cols="12">
        <h3 class="text-h5">ANTITROMBÓTICOS</h3>
    </v-col>
    <v-col cols="6" md="4">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Antiagregantes plaquetarios</h3>
                <label class="black--text font-weight-bold">Tratamiento:</label>
                <v-select v-model="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.treatment"
                    :items="patient_history.form.history_content.diseases.dtm2.treatments_list.antiplatelet_agents"
                    class="mt-3" 
                    @change=" () => patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.treatment == 'Ticagrelor' ?
                    patient_history.form.history_content.diseases.dtm2.secondary_effects.antiplatelet_agents.push('Disneas', 'Pausas') : patient_history.form.history_content.diseases.dtm2.secondary_effects.antiplatelet_agents = [
                        'Alergias',
                        'Hemorragias digestivas',
                        'Hematomas',    
                    ]" 
                    outlined dense>
                    <template #prepend-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field ref="dtm2_antiplatelet_agents_treatment" placeholder="Incluir otro" dense
                                    outlined></v-text-field>
                            </v-list-item-content>
                        </v-list-item>
                        <v-btn class="mt-n6" color="primary" text
                            @click="addItemToArray($refs.dtm2_antiplatelet_agents_treatment.internalValue, patient_history.form.history_content.diseases.dtm2.treatments_list.antiplatelet_agents)">
                            <v-icon>mdi-plus-circle</v-icon>
                            Añadir
                        </v-btn>
                        <v-divider class="mt-2"></v-divider>
                    </template>
                </v-select>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.dosis"
                    class="mt-3" outlined dense>
                    <template class="black-text" #prepend>
                        <span class="font-weight-bold">Dosis diarias:</span>
                    </template>
                </v-text-field>
                <v-row class="d-flex justify-center"
                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'  }}).dosis.percent)) + '%)'">
                    </v-badge>
                </v-row>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:</label>
                <v-select :items="patient_history.options.treatment_frecuency"
                    v-model="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.frecuency"
                    class="black-text mt-3" outlined dense></v-select>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:</label>
                <v-select
                    v-model="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.has_secondary_effects"
                    class="black-text mt-3" :items="patient_history.select" item-text='text' item-value='value' outlined
                    dense></v-select>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:</label>
                <v-select
                    v-model="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.secondary_effects"
                    class="black-text mt-3"
                    :items="patient_history.form.history_content.diseases.dtm2.secondary_effects.antiplatelet_agents"
                    outlined dense>
                    <template #prepend-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field ref="dtm2_antiplatelet_agents_se" placeholder="Incluye otra" dense
                                    outlined></v-text-field>
                            </v-list-item-content>
                        </v-list-item>
                        <v-btn class="mt-n6" color="primary" text
                            @click="addItemToArray($refs.dtm2_antiplatelet_agents_se.internalValue, patient_history.form.history_content.diseases.dtm2.secondary_effects.antiplatelet_agents)">
                            <v-icon>mdi-plus-circle</v-icon>
                            Añadir
                        </v-btn>
                        <v-divider class="mt-2"></v-divider>
                    </template>
                </v-select>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Anticoagulantes Orales</h3>
                <label class="black--text font-weight-bold">Tratamiento:</label>
                <v-select v-model="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.treatment"
                    :items="patient_history.form.history_content.diseases.dtm2.treatments_list.oral_anticoagulants"
                    class="mt-3" outlined dense>
                    <template #prepend-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field ref="dtm2_oral_anticoagulants_treatment" placeholder="Incluir otro" dense
                                    outlined></v-text-field>
                            </v-list-item-content>
                        </v-list-item>
                        <v-btn class="mt-n6" color="primary" text
                            @click="addItemToArray($refs.dtm2_oral_anticoagulants_treatment.internalValue, patient_history.form.history_content.diseases.dtm2.treatments_list.oral_anticoagulants)">
                            <v-icon>mdi-plus-circle</v-icon>
                            Añadir
                        </v-btn>
                        <v-divider class="mt-2"></v-divider>
                    </template>
                </v-select>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.dosis"
                    class="mt-3" outlined dense>
                    <template class="black-text" #prepend>
                        <span class="font-weight-bold">Dosis diarias:</span>
                    </template>
                </v-text-field>
                <v-row class="d-flex justify-center"
                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'  }}).dosis.percent)) + '%)'">
                    </v-badge>
                </v-row>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:</label>
                <v-select :items="patient_history.options.treatment_frecuency"
                    v-model="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.frecuency"
                    class="black-text mt-3" outlined dense></v-select>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:</label>
                <v-select
                    v-model="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.has_secondary_effects"
                    class="black-text mt-3" :items="patient_history.select" item-text='text' item-value='value' outlined
                    dense></v-select>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:</label>
                <v-select
                    v-model="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.secondary_effects"
                    class="black-text mt-3"
                    :items=" patient_history.form.history_content.diseases.dtm2.secondary_effects.oral_anticoagulants"
                    outlined dense>
                    <template #prepend-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field ref="dtm2_oral_anticoagulants_se" placeholder="Incluye otra" dense
                                    outlined></v-text-field>
                            </v-list-item-content>
                        </v-list-item>
                        <v-btn class="mt-n6" color="primary" text
                            @click="addItemToArray($refs.dtm2_oral_anticoagulants_se.internalValue, patient_history.form.history_content.diseases.dtm2.secondary_effects.oral_anticoagulants)">
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