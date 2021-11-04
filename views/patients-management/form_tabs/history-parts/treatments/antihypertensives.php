<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">ANTIHIPERTENSIVOS</h3>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">IECAS</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.iecas.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.iecas" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_iecas_treatment" placeholder="Incluir otro" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_iecas_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.iecas)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antihypertensives.iecas.dosis" class="mt-3"
                        outlined dense>
                        <template #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'iecas'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'iecas'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.iecas.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.iecas.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.iecas.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.iecas.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.iecas" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_iecas_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_iecas_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.iecas)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n8" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.iecas.treatment !== '' && editedItem.gender == 'F'">
                    <v-alert border="bottom" type="warning" elevation="2" colored-border>
                        Asegúrese que la paciente no esté embarazada o no lo tiene planificado.
                    </v-alert>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">BRA</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.bra.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.bra" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_bra_treatment" placeholder="Incluir otro" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_bra_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.bra)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antihypertensives.bra.dosis"
                        class="black-text mt-3" outlined dense>
                        <template #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'bra'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'bra'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.bra.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.bra.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.bra.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.bra.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.bra" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_bra_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_bra_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.bra)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n8" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.bra.treatment !== '' && editedItem.gender == 'F'">
                    <v-alert border="bottom" type="warning" elevation="2" colored-border>
                        Asegúrese que la paciente no esté embarazada o no lo tiene planificado.
                    </v-alert>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Ca antagonista</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.ca.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.ca" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_ca_treatment" placeholder="Incluir otro" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_ca_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.ca)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antihypertensives.ca.dosis" class="mt-3"
                        outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ca'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ca'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.ca.frecuency" class="black-text mt-3"
                        outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.ca.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ca.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.ca.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.ca" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_ca_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_ca_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.ca)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Diurético</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.diuretic.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.diuretic"
                        item-text="name" item-value="name" class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_diuretic_treatment" placeholder="Incluir otro" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addObjectToArray($refs.hta_diuretic_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.diuretic)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                        <template slot="item" slot-scope="data">
                            <template v-if="typeof data.item !== 'object'">
                                <v-list-content v-text="data.item" />
                            </template>
                            <template v-else>
                                <v-list-item-content>
                                    <v-list-item-title v-html="data.item.name" />
                                    <v-list-item-subtitle v-html="data.item.group" />
                                </v-list-item-content>
                            </template>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antihypertensives.diuretic.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'diuretic'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'diuretic'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.diuretic.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.diuretic.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.diuretic.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.diuretic.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.diuretic" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_diuretic_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_diuretic_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.diuretic)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Inhibidores Renina</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.ir.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.ir" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_ca_treatment" placeholder="Incluir otro" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_ir_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.ir)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antihypertensives.ir.dosis" class="mt-3"
                        outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ir'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ir'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.ir.frecuency" class="black-text mt-3"
                        outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.ir.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ir.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.ir.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.ir" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_ir_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_ir_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.ir)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n8" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ir.treatment !== '' && editedItem.gender == 'F'">
                    <v-alert border="bottom" type="warning" elevation="2" colored-border>
                        Asegúrese que la paciente no esté embarazada o no lo tiene planificado.
                    </v-alert>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Beta bloq</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.block_beta.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.block_beta"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_block_beta_treatment" placeholder="Incluir otro" dense
                                        outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_block_beta_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.block_beta)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antihypertensives.block_beta.dosis"
                        class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'block_beta'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'block_beta'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.block_beta.frecuency" class="mt-3"
                        outlined dense>
                        </v-text-field>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antihypertensives.block_beta.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.block_beta.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.block_beta.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.block_beta" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_block_beta_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_block_beta_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.block_beta)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">ARNI</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.arni.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.arni" class="mt-3"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_arni_treatment" placeholder="Incluir otro" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_arni_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.arni)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field v-model="patient_history.form.history_content.treatments.antihypertensives.arni.dosis" class="mt-3"
                        outlined dense>
                        <template #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'arni'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'arni'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.arni.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.arni.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.arni.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.arni.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.arni" outlined
                        dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_arni_se" placeholder="Incluye otra" dense outlined>
                                    </v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_arni_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.arni)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n8" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.arni.treatment !== '' && editedItem.gender == 'F'">
                    <v-alert border="bottom" type="warning" elevation="2" colored-border>
                        Asegúrese que la paciente no esté embarazada o no lo tiene planificado.
                    </v-alert>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Ant. MINERALOCORTICOIDES</h3>
                    <label class="black--text font-weight-bold">Tratamiento:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.treatment"
                        :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.ant_mineralocorticoids"
                        class="mt-3" outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_ant_mineralocorticoids_treatment" placeholder="Incluir otro"
                                        dense outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_ant_mineralocorticoids_treatment.internalValue, patient_history.form.history_content.treatments.antihypertensives.treatments_list.ant_mineralocorticoids)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <v-text-field
                        v-model="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.dosis"
                        class="mt-3" outlined dense>
                        <template #prepend>
                            <span class="font-weight-bold">Dosis diarias:</span>
                        </template>
                    </v-text-field>
                    <v-row class="d-flex justify-center"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ant_mineralocorticoids'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ant_mineralocorticoids'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </v-row>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:</label>
                    <v-select :items="patient_history.options.treatment_frecuency"
                        v-model="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.frecuency"
                        class="black-text mt-3" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.has_secondary_effects"
                        class="black-text mt-3" :items="patient_history.select" outlined dense></v-select>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:</label>
                    <v-select
                        v-model="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.secondary_effects"
                        class="black-text mt-3"
                        :items="patient_history.form.history_content.treatments.antihypertensives.secondary_effects.ant_mineralocorticoids"
                        outlined dense>
                        <template #prepend-item>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-text-field ref="hta_ant_mineralocorticoids_se" placeholder="Incluye otra" dense
                                        outlined></v-text-field>
                                </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text
                                @click="addItemToArray($refs.hta_ant_mineralocorticoids_se.internalValue, patient_history.form.history_content.treatments.antihypertensives.secondary_effects.ant_mineralocorticoids)">
                                <v-icon>mdi-plus-circle</v-icon>
                                Añadir
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                        </template>
                    </v-select>
                </v-col>
                <v-col class="mt-n8" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.treatment !== '' && editedItem.gender == 'F'">
                    <v-alert border="bottom" type="warning" elevation="2" colored-border>
                        Asegúrese que la paciente no esté embarazada o no lo tiene planificado.
                    </v-alert>
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
                        <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.fdc.active"
                            :items="patient_history.select" class="mt-3" outlined dense>
                        </v-select>
                    </v-col>
                    <v-col cols="12" v-if="patient_history.form.history_content.treatments.antihypertensives.fdc.active">
                        <label class="black--text font-weight-bold">Combinaciones a dosis fijas</label>
                        <v-select v-model="patient_history.form.history_content.treatments.antihypertensives.fdc.selected"
                            :items="patient_history.form.history_content.treatments.antihypertensives.treatments_list.fdc"
                            ref="hta_fdc_select" item-text="name" item-value="name" class="mt-3" multiple outlined
                            dense>
                            <template #prepend-item>
                                <v-row class="px-7">
                                    <v-btn color="secondary" @click="$refs.hta_fdc_select.blur()" block>Cerrar
                                    </v-btn>
                                </v-row>
                                <v-list-item>
                                    <v-list-item-content>
                                        <v-text-field ref="hta_fdc_treatment" placeholder="Incluir otra" dense outlined>
                                        </v-text-field>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-btn class="mt-n6" color="primary" text
                                    @click="addItemToArray({name: $refs.hta_fdc_treatment.internalValue}, patient_history.form.history_content.treatments.antihypertensives.treatments_list.fdc)">
                                    <v-icon>mdi-plus-circle</v-icon>
                                    Añadir
                                </v-btn>
                                <v-divider class="mt-2"></v-divider>
                            </template>
                            <template slot="item" slot-scope="data">
                                <template v-if="typeof data.item !== 'object'">
                                    <v-list-content v-text="data.item" />
                                </template>
                                <template v-else>
                                    <v-list-item-content>
                                        <v-list-item-title v-html="data.item.name" />
                                        <v-list-item-subtitle v-html="data.item.group" />
                                    </v-list-item-content>
                                </template>
                            </template>
                        </v-select>
                    </v-col>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>