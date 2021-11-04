<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">ANTIHIPERTENSIVOS</h3>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">IECAS</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.iecas.treatment }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.iecas.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'iecas'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'iecas'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.iecas.frecuency }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template v-if="patient_history.form.history_content.treatments.antihypertensives.iecas.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.iecas.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.iecas.secondary_effects }} </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">BRA</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.bra.treatment }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.bra.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'bra'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'bra'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.bra.frecuency }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template v-if="patient_history.form.history_content.treatments.antihypertensives.bra.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.bra.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.bra.secondary_effects }} </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Ca antagonista</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.ca.treatment }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ca.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ca'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ca'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ca.frecuency }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template v-if="patient_history.form.history_content.treatments.antihypertensives.ca.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ca.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ca.secondary_effects }} </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Diurético</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.diuretic.treatment }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.diuretic.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'diuretic'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'diuretic'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.diuretic.frecuency }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antihypertensives.diuretic.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.diuretic.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.diuretic.secondary_effects }} </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Inhibidores Renina</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.ir.treatment }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ir.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ir'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ir'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ir.frecuency }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template v-if="patient_history.form.history_content.treatments.antihypertensives.ir.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ir.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ir.secondary_effects }} </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Beta bloq</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.block_beta.treatment }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.block_beta.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'block_beta'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'block_beta'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.block_beta.frecuency }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antihypertensives.block_beta.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.block_beta.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.block_beta.secondary_effects }} </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">ARNI</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.arni.treatment }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.arni.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'arni'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'arni'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.arni.frecuency }} </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template v-if="patient_history.form.history_content.treatments.antihypertensives.arni.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.arni.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.arni.secondary_effects }} </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Ant. MINERALOCORTICOIDES</h3>
                    <label class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.treatment }}
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ant_mineralocorticoids'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antihypertensives', treatment: 'ant_mineralocorticoids'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.frecuency }}
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <label class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.has_secondary_effects">
                    <label class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antihypertensives.ant_mineralocorticoids.secondary_effects }}
                    </label>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="12" md="4" lg="3">
                    <v-col cols="12">
                        <h3 class="font-weight-bold black--text text-center">
                            <template v-if="patient_history.form.history_content.treatments.antihypertensives.fdc.active">
                                El paciente tiene indicada una combinación fija de los medicamentos seleccionados
                            </template>
                            <template v-else>
                                El paciente no tiene indicada una combinación fija de los medicamentos seleccionados
                            </template>
                        </h3>
                    </v-col>
                    <v-col cols="12" v-if="patient_history.form.history_content.treatments.antihypertensives.fdc.active">
                        <h3 class="font-weight-bold black--text text-center">Combinaciones a dosis fijas</h3>
                        <p class="font-weight-bold black--text text-center"
                            v-for="item in patient_history.form.history_content.treatments.antihypertensives.fdc.selected">
                            {{ item }}
                        </p>
                    </v-col>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>