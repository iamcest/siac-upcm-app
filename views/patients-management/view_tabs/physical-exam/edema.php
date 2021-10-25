<v-col cols="12" id="edema">
    <v-row class="d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text">Edema miembros inferiores</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <template>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">
                            <template v-if="patient_physical_exam.content.edema.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> Rango:
                            {{ patient_physical_exam.content.edema.range }} </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.percent)) + '%)'"
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                        </v-badge>
                    </v-col>
                </template>
            </v-row>
        </v-col>
    </v-row>
</v-col>