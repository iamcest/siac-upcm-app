<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">ANTIDIABÉTICOS</h3>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Metformina</h3>
                    <span class="black--text font-weight-bold">
                        <template v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.active">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.active">
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Dosis diarias:
                            {{ patient_history.form.history_content.treatments.antidiabetics.metformin.dosis}}</span>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin'  }}).dosis.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold mb-3">Frecuencia:
                            {{ patient_history.form.history_content.treatments.antidiabetics.metformin.frecuency }}</span>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Reacciones adversas:
                            <template
                                v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col class="mt-n4" cols="12"
                        v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                        <span class="black--text font-weight-bold">Tipo de reacción:
                            {{ patient_history.form.history_content.treatments.antidiabetics.metformin.secondary_effects }}</span>
                    </v-col>
                </template>
            </v-row>
        </v-col>
    </v-row>
</v-card>