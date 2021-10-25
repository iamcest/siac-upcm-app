<v-col class="mb-n10" cols="12" id="peripheral_pulses">
    <v-row class=" d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text">Pulsos Periféricos</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold"> Simétricos:
                        <template v-if="patient_physical_exam.content.peripheral_pulses.symmetrical">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="6" lg="4" v-if="patient_physical_exam.content.peripheral_pulses.symmetrical">
                    <span class="black--text font-weight-bold"> MI:
                        {{ patient_physical_exam.content.peripheral_pulses.symmetrical_range }}
                    </span>
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.percent)) + '%)'"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                    </v-badge>
                </v-col>
                <template v-if="!patient_physical_exam.content.peripheral_pulses.symmetrical">
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> MID:
                            {{ patient_physical_exam.content.peripheral_pulses.mid }}
                        </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.percent)) + '%)'"
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                        </v-badge>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> MII:
                            {{ patient_physical_exam.content.peripheral_pulses.mii }}
                        </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.percent)) + '%)'"
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                        </v-badge>
                    </v-col>
                </template>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>