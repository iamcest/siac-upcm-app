<v-col class="mb-n10" cols="12" id="PYI">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">PVY</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.pvy.morphology_breastx"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Seno X</span>
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.pvy.cvy"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">CVY</span>
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.pvy.swivel_stop"
                            :items="[1,2,3,4,5,6,7,8,9,10]" suffix="cm" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Tope Oscilante</span>
                            </template>
                        </v-select>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            <v-row class="d-flex justify-center">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </template>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <v-text-field v-model="patient_physical_exam.content.pvy.other" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Otra</span>
                            </template>
                        </v-text-field>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>