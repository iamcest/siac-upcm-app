<v-col class="mb-n10" cols="12" id="PYI">
    <v-row class="d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text">PVY</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Morfología. Seno X:
                        <template v-if="patient_physical_exam.content.pvy.morphology_breastx">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">CVY:
                        <template v-if="patient_physical_exam.content.pvy.cvy">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>

                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Tope Oscilante:
                        {{ patient_physical_exam.content.pvy.swivel_stop }}
                    </span>
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.percent)) + '%)'"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                    </v-badge>
                </v-col>

                <v-col cols="6" lg="4" v-if="patient_physical_exam.content.pvy.other != ''">
                    <span class="black--text font-weight-bold">Otra:
                        {{ patient_physical_exam.content.pvy.other }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>