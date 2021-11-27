<v-col class="mb-n10" cols="12" id="PYI">
    <v-row class="d-flex align-center">
        <v-col cols="3">
            <h4 class="text-h6 black--text">PVY</h4>
        </v-col>
        <v-col cols="8">
            <v-row>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Morfología. Seno X:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.pvy.morphology_breastx">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">CVY:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.pvy.cvy">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>

                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Tope Oscilante:
                        {{ comparison.physical_exams.<?= $item ?>.content.pvy.swivel_stop }}
                    </span>
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).pvy.swivel_stop.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).pvy.swivel_stop.percent)) + '%)'"
                        v-if="
                        comparison.physical_exams.<?= $item ?>.content.pvy.swivel_stop != '' &&
                        comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('patient_id')">
                    </v-badge>
                </v-col>

                <v-col cols="6" lg="4" v-if="comparison.physical_exams.<?= $item ?>.content.pvy.other != ''">
                    <span class="black--text font-weight-bold">Otra:
                        {{ comparison.physical_exams.<?= $item ?>.content.pvy.other }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>