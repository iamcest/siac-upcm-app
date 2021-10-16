<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">HIPOLIPEMIANTES</h3>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Estatinas</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.diseases.dyslipidemia.statins.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.statins.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.statins.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.diseases.dyslipidemia.statins.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.statins.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.statins.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">EZT</h3>
                    <span class="black--text font-weight-bold">
                        <template v-if="patient_history.form.history_content.diseases.dyslipidemia.ezt.active">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.ezt.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.ezt.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.diseases.dyslipidemia.ezt.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.ezt.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.ezt.secondary_effects }} </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Fibratos</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.diseases.dyslipidemia.fibratos.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.fibratos.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.fibratos.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.diseases.dyslipidemia.fibratos.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.fibratos.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.fibratos.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Omega 3</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.diseases.dyslipidemia.omega3.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.omega3.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.omega3.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.diseases.dyslipidemia.omega3.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.omega3.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.omega3.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="6" lg="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">IPCSK9</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.diseases.dyslipidemia.ipcsk9.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>