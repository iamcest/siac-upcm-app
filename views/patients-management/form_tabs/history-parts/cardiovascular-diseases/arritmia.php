<v-container>
    <v-card class="px-2 py-10" width="100%">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Arritmia</h3>
            </v-col>
            <v-col cols="12" md="6" lg="4" offset-md="3" offset-lg="4">
                <label class="font-weight-bold">Padeció alguna</label>
                <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.active"
                    :items="patient_history.select" outlined dense>
                </v-select>
            </v-col>
            <template v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.active"
                v-for="(item, i) in patient_history.form.history_content.cardiovascular_diseases.arritmia.items">
                <v-col class="d-flex justify-end" cols="12"
                    v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items.length > 1">
                    <v-btn color="error"
                        @click="patient_history.form.history_content.cardiovascular_diseases.arritmia.items.splice(i, 1)"
                        text>
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-col>
                <v-col class="px-4" cols="12" md="6">
                    <v-card class="px-2" outlined>
                        <v-row>
                            <v-col cols="12"
                                :lg="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].type != '' ? 6 : 12">
                                <label class="font-weight-bold black--text">Tipo:</label>
                                <v-select
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].type"
                                    :items="patient_history.options.arritmia.type" outlined dense>
                                </v-select>
                            </v-col>
                            <template
                                v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].type != ''">
                                <v-col cols="12" lg="6">
                                    <label class="font-weight-bold black--text">Año:</label>
                                    <v-dialog ref="arritmia_year_modal" v-model="arritmia_year_modal" width="290px">
                                        <template #activator="{ on, attrs }">
                                            <v-text-field
                                                :value="getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].year)"
                                                readonly v-bind="attrs" v-on="on"
                                                @click="ref_index = i" outlined dense>
                                                <template #append>
                                                    <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                                                </template>
                                            </v-text-field>
                                        </template>
                                        <v-date-picker ref="arritmia_year_datepicker"
                                            v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].year"
                                            @input="$refs.arritmia_year_modal[i].save(patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].year)"
                                            locale="es" reactive no-title scrollable>
                                        </v-date-picker>
                                    </v-dialog>
                                </v-col>
                            </template>
                            <template
                                v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].type == 'FA'">

                                <v-col cols="12" lg="6">
                                    <v-select
                                        v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].ablation"
                                        :items="patient_history.select" outlined dense>
                                        <template class="black-text" #prepend>
                                            <span class="font-weight-bold">Recibió ablación:</span>
                                        </template>
                                    </v-select>
                                </v-col>
                                <v-col cols="12" lg="6"
                                    v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].ablation">
                                    <v-text-field
                                        v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].ablation_age"
                                        outlined dense>
                                        <template class="black-text" #prepend>
                                            <span class="font-weight-bold">Año:</span>
                                        </template>
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" lg="6">
                                    <v-select
                                        v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].cdi_holder"
                                        :items="patient_history.select" outlined dense>
                                        <template class="black-text" #prepend>
                                            <span class="font-weight-bold">Porta CDI:</span>
                                        </template>
                                    </v-select>
                                </v-col>
                                <v-col cols="12" lg="6"
                                    v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].cdi_holder">
                                    <v-text-field
                                        v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].cdi_age"
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
                    <v-card class="px-2" outlined>
                        <v-row>
                            <v-col cols="12" md="6">
                                <label class="font-weight-bold">Tratamiento Médico:</label>
                                <v-select
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatment"
                                    :items="patient_history.select" outlined dense>
                                </v-select>
                            </v-col>
                            <v-col cols="12" md="6"
                                v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatment"
                                v-for="(treatment, it) in patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatments">
                                <label class="font-weight-bold">Indique el tratamiento:</label>
                                <v-text-field
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatments[it]"
                                    outlined dense>
                                    <template v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatments.length > 1
                    && it !== 0" #append>
                                        <v-btn class="mr-n3 mt-n1" color="error"
                                            @click="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatments.splice(treatment, 1)"
                                            fab small text>
                                            <v-icon>mdi-close</v-icon>
                                        </v-btn>
                                    </template>
                                </v-text-field>
                            </v-col>
                            <v-col class="d-flex align-center" cols="12" md="6"
                                v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatment">
                                <v-btn color="primary"
                                    @click="patient_history.form.history_content.cardiovascular_diseases.arritmia.items[i].treatments.push('')"
                                    block>
                                    <v-icon>mdi-plus</v-icon>
                                    Añadir otro
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-card>

                </v-col>
                <v-col cols="12"
                    v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.items.length > 1">
                    <v-divider></v-divider>
                </v-col>
            </template>

            <v-col class="d-flex justify-center" cols="12"
                v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.active">
                <v-btn color="primary" @click="patient_history.form.history_content.cardiovascular_diseases.arritmia.items.push({
                    type: '',
                    treatment: 0,
                    treatment_type: '',
                    treatments: [''],
                    dosis: '',
                    daily_dosis: '',
                    ablation: 0,
                    ablation_age: '',
                    cdi_holder: 0,
                    cdi_age: '',
                })">Añadir evento</v-btn>
            </v-col>
        </v-row>

    </v-card>
</v-container>