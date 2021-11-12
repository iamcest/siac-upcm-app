<v-col cols="12" md="10" lg="8" offset-md="1" offset-lg="2" v-if="patient_risk_factors.risk_factors_diagnostics.length > 1 
&& patient_appointments.previous_appointment.hasOwnProperty('appointment_id')">
    <template v-if="patient_risk_factors.rf.hasOwnProperty('created_at')">
        <v-data-table :headers="patient_risk_factors.headers"
            :items="
    patient_risk_factors.risk_factors_diagnostics[patient_risk_factors.risk_factors_diagnostics.length - 2].risk_factors" class="elevation-1 table_headers_lg">
            <template #top>
                <v-row>
                    <v-col class="pl-7" cols="11">
                        <h5 class="text-h5 secondary--text p-2">Diagnósticos previos  <span class="text-h6 secondary--text">(cita pasada)</span></h5>
                    </v-col>
                </v-row>
            </template>
            <template #no-data>
                <v-btn color="primary" @click="initializeFactorsRisk">
                    Recargar
                </v-btn>
            </template>
        </v-data-table>
    </template>
    <template v-else>
        <v-data-table :headers="patient_risk_factors.headers"
            :items="patient_risk_factors.risk_factors_diagnostics[patient_risk_factors.risk_factors_diagnostics.length - 1].risk_factors"
            class="elevation-1 table_headers_lg">
            <template #top>
                <v-row>
                    <v-col class="pl-7" cols="11">
                        <h5 class="text-h5 secondary--text p-2">Diagnósticos previos <span class="text-h6 secondary--text">(cita pasada)</span></h5>
                    </v-col>
                </v-row>
            </template>
            <template #no-data>
                <v-btn color="primary" @click="initializeFactorsRisk">
                    Recargar
                </v-btn>
            </template>
        </v-data-table>
    </template>
</v-col>