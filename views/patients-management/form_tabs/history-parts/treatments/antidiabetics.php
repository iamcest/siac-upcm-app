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
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Insulina</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.insulin.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.insulin" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_insulin_treatment" placeholder="Incluir otro" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_insulin_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.insulin)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.insulin.dosis" suffix="UI"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'insulin'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'insulin'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.insulin.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.insulin.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.insulin.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.insulin.secondary_effects"
                        class="black-text mt-3"
                        :items=" patient_history.form.history_content.treatments.antidiabetics.secondary_effects.insulin" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_insulin_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_insulin_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.insulin)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Análogos de insulina</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.a_insulin.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.a_insulin"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_a_insulin_treatment" placeholder="Incluir otro" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_a_insulin_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.a_insulin)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.a_insulin.dosis"
                        class="mt-3" suffix="UI" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'a_insulin'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'a_insulin'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.a_insulin.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antidiabetics.a_insulin.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.a_insulin.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.a_insulin.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antidiabetics.secondary_effects.a_insulin" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_a_insulin_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_a_insulin_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.a_insulin)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Mezclas de insulina</h3>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.insulin_mixtures.selected"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.insulin_mixtures"
                        class="mt-3" multiple outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_insulin_mixtures_treatment" placeholder="Incluir otra" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_insulin_mixtures_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.insulin_mixtures)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Sulfonilúreas</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.sulfonylureas"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_sulfonylureas_treatment" placeholder="Incluir otro" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_sulfonylureas_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.sulfonylureas)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'sulfonylureas'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'sulfonylureas'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antidiabetics.secondary_effects.sulfonylureas"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_sulfonylureas_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_sulfonylureas_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.sulfonylureas)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Glinidas</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.glinidas.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.glinidas"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_glinidas_treatment" placeholder="Incluir otro" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_glinidas_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.glinidas)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.glinidas.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'glinidas'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'glinidas'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.glinidas.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antidiabetics.glinidas.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.glinidas.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.glinidas.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antidiabetics.secondary_effects.glinidas" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_glinidas_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_glinidas_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.glinidas)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Pioglitazona</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.pioglitazona"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_pioglitazona_treatment" placeholder="Incluir otro" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_pioglitazona_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.pioglitazona)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'pioglitazona'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'pioglitazona'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antidiabetics.secondary_effects.pioglitazona"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_pioglitazona_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_pioglitazona_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.pioglitazona)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">I DPP-4</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.inh_dpp" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_inh_dpp_treatment" placeholder="Incluir otro" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_inh_dpp_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.inh_dpp)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field class="mt-3"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.dosis" class="black-text"
                        outlined dense>
                        <template #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'inh_dpp'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'inh_dpp'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.secondary_effects"
                        class="black-text mt-3"
                        :items=" patient_history.form.history_content.treatments.antidiabetics.secondary_effects.inh_dpp" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_inh_dpp_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_inh_dpp_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.inh_dpp)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">I SLGT-2</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.i_slgt2" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_i_slgt2_treatment" placeholder="Incluir otro" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_i_slgt2_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.i_slgt2)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n1" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.dosis"
                        class="black-text" class="mt-3" outlined dense>
                        <template #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'i_slgt2'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'i_slgt2'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.secondary_effects"
                        class="black-text mt-3"
                        :items=" patient_history.form.history_content.treatments.antidiabetics.secondary_effects.i_slgt2" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_i_slgt2_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_i_slgt2_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.i_slgt2)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Ag Rec GLP-1</h3>

                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.gl.treatment"
                        :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.gl" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_gl_treatment" placeholder="Incluir otro" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_gl_treatment.internalValue, patient_history.form.history_content.treatments.antidiabetics.treatments_list.gl)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antidiabetics.gl.dosis" class="mt-3"
                        outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'gl' }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'gl' }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antidiabetics.gl.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.gl.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.gl.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.gl.secondary_effects"
                        class="black-text mt-3"
                        :items=" patient_history.form.history_content.treatments.antidiabetics.secondary_effects.gl" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="dtm2_i_slgt2_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.dtm2_i_slgt2_se.internalValue, patient_history.form.history_content.treatments.antidiabetics.secondary_effects.gl)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="12" md="4" lg="3">
                    <v-col cols="12">
                        <h3 class="font-weight-bold black--text text-center">¿El paciente tiene indicada una combinación
                            fija de
                            los medicamentos seleccionados?</h3>
                        <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.fdc.active"
                            :items="patient_history.select" class="mt-3" outlined dense>
                        </v-select>
                    </v-col>
                    <v-col cols="12" v-if="patient_history.form.history_content.treatments.antidiabetics.fdc.active">
                        <label class="black--text font-weight-bold">Combinaciones a dosis fijas</label>
                        <v-select v-model="patient_history.form.history_content.treatments.antidiabetics.fdc.selected"
                            :items="patient_history.form.history_content.treatments.antidiabetics.treatments_list.fdc"
                            ref="dtm2_fdc_select" item-text="name" item-value="name" class="mt-3" multiple outlined
                            dense>

                            <template #prepend-item>
                                <v-row class="px-7">
                                    <v-btn color="secondary" @click="$refs.dtm2_fdc_select.blur()" block>Cerrar
                                    </v-btn>
                                </v-row>
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-text-field ref="dtm2_fdc_treatment" placeholder="Incluir otra" dense
                                            outlined>
                                        </v-text-field>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-btn class="mt-n6" color="primary" text
                                    @click="addItemToArray({name: $refs.dtm2_fdc_treatment.internalValue}, patient_history.form.history_content.treatments.antidiabetics.treatments_list.fdc)">
                                    <v-icon>mdi-plus-circle</v-icon>
                                    Añadir
                                </v-btn>
                                <v-divider class="mt-2"></v-divider>
                            </template>
                        </v-select>
                    </v-col>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>