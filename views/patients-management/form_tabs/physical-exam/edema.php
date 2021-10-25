<v-col class="mb-n10" cols="12" id="edema">
    <v-row class="d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text mt-n6">Edema miembros inferiores</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <v-col cols="6" v-if="!patient_physical_exam.content.edema.active">
                    <v-select v-model="patient_physical_exam.content.edema.active"
                        :items="patient_physical_exam.options.select" outlined dense>
                    </v-select>
                </v-col>
                <template v-else>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.edema.active"
                            :items="patient_physical_exam.options.select" outlined dense>
                        </v-select>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.edema.range" :items="[1,2,3,4]" outlined dense>
                        </v-select>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            <v-row class="d-flex justify-center mb-6">
                                <v-badge color="primary"
                                    :content="returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.percent)) + '%)'">
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