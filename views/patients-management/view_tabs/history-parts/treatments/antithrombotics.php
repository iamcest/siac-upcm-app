<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">ANTITROMBÓTICOS</h3>
        </v-col>
        <v-col cols="6" md="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Antiagregantes plaquetarios</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.frecuency }}</span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.diseases.dtm2.antiplatelet_agents.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Anticoagulantes Orales</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.diseases.dtm2.oral_anticoagulants.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>