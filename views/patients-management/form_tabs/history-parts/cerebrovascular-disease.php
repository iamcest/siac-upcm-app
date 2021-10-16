<v-container class="px-0">
    <v-card>
        <v-col cols="12">
            <h3 class="black--text text-h5 text-center">Enfermedad cerebrovascular</h3>
        </v-col>
        <v-col cols="12" :md="patient_history.form.history_content.cerebrovascular_disease.active ? 6 : 12">
            <label class="font-weight-bold black--text">Padece esta enfermedad:</label>
            <v-select v-model="patient_history.form.history_content.cerebrovascular_disease.active"
                :items="patient_history.select" outlined dense></v-select>
        </v-col>
        <template v-if="patient_history.form.history_content.cerebrovascular_disease.active">
            <v-col cols="12" md="6">
                <label class="font-weight-bold black--text">Año:</label>
                <v-dialog ref="cv_disease_year_modal" v-model="cv_disease_year_modal" width="290px">
                    <template #activator="{ on, attrs }">
                        <v-text-field
                            :value="getOnlyYear(patient_history.form.history_content.cerebrovascular_disease.year)"
                            append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined dense>
                        </v-text-field>
                    </template>
                    <v-date-picker ref="cv_disease_year_datepicker"
                        v-model="patient_history.form.history_content.cerebrovascular_disease.year"
                        @input="$refs.cv_disease_year_modal.save(patient_history.form.history_content.cerebrovascular_disease.year)"
                        locale="es" reactive no-title scrollable>
                    </v-date-picker>
                </v-dialog>
            </v-col>
            <v-col cols="12" md="6" class="mt-n4">
                <label class="font-weight-bold black--text">Tipo:</label>
                <v-select v-model="patient_history.form.history_content.cerebrovascular_disease.type"
                    :items="['', 'Isquémico', 'Hemorrágico']" outlined dense></v-select>
            </v-col>
            <v-col cols="12" md="6" class="mt-n4"
                v-if="patient_history.form.history_content.cerebrovascular_disease.type == 'Isquémico'">
                <label class="font-weight-bold black--text">Seleccione una opción:</label>
                <v-select v-model="patient_history.form.history_content.cerebrovascular_disease.ischemic_type"
                    :items="['', 'Ataque isquémico transitorio', 'ACV isquémico establecido', 'Infarto cerebral']"
                    outlined dense></v-select>
            </v-col>
        </template>
    </v-card>
</v-container>