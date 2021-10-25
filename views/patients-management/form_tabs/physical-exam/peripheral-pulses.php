<v-col class="mb-n10" cols="12" id="peripheral_pulses">
    <v-row class=" d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text">Pulsos Periféricos</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <v-col cols="6" lg="4">
                    <v-select v-model="patient_physical_exam.content.peripheral_pulses.symmetrical"
                        :items="patient_physical_exam.options.select" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold"> Simétricos</span>
                        </template>
                    </v-select>
                </v-col>
                <v-col cols="6" lg="4" v-if="patient_physical_exam.content.peripheral_pulses.symmetrical">
                    <v-select v-model="patient_physical_exam.content.peripheral_pulses.symmetrical_range"
                        :items="[1,2,3,4,5,6]" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold">MI</span>
                        </template>
                    </v-select>
                    <v-row class="d-flex justify-center">
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </v-row>
                </v-col>
                <template v-if="!patient_physical_exam.content.peripheral_pulses.symmetrical">
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.peripheral_pulses.mid" :items="[1,2,3,4,5,6]"
                            outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold"> MID</span>
                            </template>
                        </v-select>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            <v-row class="d-flex justify-center">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </template>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.peripheral_pulses.mii" :items="[1,2,3,4,5,6]"
                            outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold"> MII</span>
                            </template>
                        </v-select>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            <v-row class="d-flex justify-center">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </template>
                    </v-col>
                </template>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>