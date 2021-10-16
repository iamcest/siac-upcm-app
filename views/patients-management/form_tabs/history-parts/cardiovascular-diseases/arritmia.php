<v-container>
    <v-card class="px-2 py-10" width="100%">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Arritmia</h3>
            </v-col>
            <v-col class="px-4" cols="12" md="6">
                <v-card class="px-2" outlined>
                    <v-row>
                        <v-col cols="12">
                            <v-select
                                v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.type"
                                :items="patient_history.options.arritmia.type" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="font-weight-bold">Tipo:</span>
                                </template>
                            </v-select>
                        </v-col>
                        <template
                            v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.type == 'FA'">

                            <v-col cols="12" lg="6">
                                <v-select
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation"
                                    :items="patient_history.select" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="font-weight-bold">Recibió ablación:</span>
                                    </template>
                                </v-select>
                            </v-col>
                            <v-col cols="12" lg="6"
                                v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation">
                                <v-text-field
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation_age"
                                    outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="font-weight-bold">Año:</span>
                                    </template>
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" lg="6">
                                <v-select
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_holder"
                                    :items="patient_history.select" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="font-weight-bold">Porta CDI:</span>
                                    </template>
                                </v-select>
                            </v-col>
                            <v-col cols="12" lg="6"
                                v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_holder">
                                <v-text-field
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_age"
                                    outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="font-weight-bold">Año:</span>
                                    </template>
                                </v-text-field>
                            </v-col>
                        </template>
                    </v-row>
                </v-card>

            </v-col>
            <v-col class="px-4" cols="12" md="6">
                <v-card class="px-2"  outlined>
                    <v-row>
                        <v-col cols="12" md="6">
                            <v-select
                                v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatment"
                                :items="patient_history.select" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="font-weight-bold">Tratamiento Médico:</span>
                                </template>
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="6"
                            v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatment"
                            v-for="(treatment, i) in patient_history.form.history_content.cardiovascular_diseases.arritmia.treatments">
                            <v-text-field
                                v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatments[i]"
                                outlined dense>
                                <template v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatments.length > 1
                && i !== 0" #append>
                                    <v-btn class="mr-n3 mt-n1" color="error"
                                        @click="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatments.splice(treatment, 1)"
                                        fab small text>
                                        <v-icon>mdi-close</v-icon>
                                    </v-btn>
                                </template>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" md="6"
                            v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatment">
                            <v-btn color="primary"
                                @click="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatments.push('')"
                                block>
                                <v-icon>mdi-plus</v-icon>
                                Añadir otro
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card>

            </v-col>
        </v-row>

    </v-card>
</v-container>