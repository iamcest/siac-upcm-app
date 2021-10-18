<v-container class="px-0">
    <v-card>
        <v-row class="px-4">
            <v-col cols="12">
                <h3 class="black--text text-h5 text-center">Enfermedad cerebrovascular</h3>
            </v-col>
            <v-col cols="12">
                <label class="font-weight-bold black--text">Padece esta enfermedad:</label>
                <v-select v-model="patient_history.form.history_content.cerebrovascular_disease.active"
                    :items="patient_history.select" outlined dense></v-select>
            </v-col>
            <template v-if="patient_history.form.history_content.cerebrovascular_disease.active">
                <v-col cols="12" class="py-0"
                    v-for="(item, i) in patient_history.form.history_content.cerebrovascular_disease.items">
                    <v-row>
                        <v-col cols="12"
                            v-if="patient_history.form.history_content.cerebrovascular_disease.items.length > 1">
                            <v-divider></v-divider>
                        </v-col>
                        <v-col class="d-flex justify-end" cols="12"
                            v-if="patient_history.form.history_content.cerebrovascular_disease.items.length > 1">
                            <v-btn color="error"
                                @click="patient_history.form.history_content.cerebrovascular_disease.items.splice(i, 1)"
                                text>
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-col>
                        <v-col cols="12" md="6" class="mt-n4">
                            <label class="font-weight-bold black--text">Año:</label>
                            <v-dialog ref="cv_disease_year_modal" v-model="cv_disease_year_modal" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field
                                        :value="getOnlyYear(patient_history.form.history_content.cerebrovascular_disease.items[i].year)"
                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"
                                        @click="ref_index = i" outlined dense>
                                    </v-text-field>
                                </template>
                                <v-date-picker ref="cv_disease_year_datepicker"
                                    v-model="patient_history.form.history_content.cerebrovascular_disease.items[i].year"
                                    @input="$refs.cv_disease_year_modal[i].save(patient_history.form.history_content.cerebrovascular_disease.items[i].year)"
                                    locale="es" reactive no-title scrollable>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12" md="6" class="mt-n4">
                            <label class="font-weight-bold black--text">Tipo:</label>
                            <v-select
                                v-model="patient_history.form.history_content.cerebrovascular_disease.items[i].type"
                                :items="['', 'Isquémico', 'Hemorrágico']" outlined dense></v-select>
                        </v-col>
                        <v-col cols="12" md="6" class="mt-n4"
                            v-if="patient_history.form.history_content.cerebrovascular_disease.items[i].type == 'Isquémico'">
                            <label class="font-weight-bold black--text">Seleccione una opción:</label>
                            <v-select
                                v-model="patient_history.form.history_content.cerebrovascular_disease.items[i].ischemic_type"
                                :items="['', 'Ataque isquémico transitorio', 'ACV isquémico establecido', 'Infarto cerebral']"
                                outlined dense></v-select>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12">
                    <v-btn color="primary" @click="patient_history.form.history_content.cerebrovascular_disease.items.push({
                        year: '',
                        type: 'Isquémico',
                        ischemic_type: '',
                    })" block>
                        <v-icon>mdi-plus</v-icon>
                        Añadir evento
                    </v-btn>
                </v-col>
            </template>
        </v-row>
    </v-card>
</v-container>