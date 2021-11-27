<v-col class="mb-n10" cols="12" id="peripheral_pulses">
    <v-row class=" d-flex align-center">
        <v-col cols="3">
            <h4 class="text-h6 black--text">Pulsos Periféricos</h4>
        </v-col>
        <v-col cols="8">
            <v-row>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold"> Simétricos:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.peripheral_pulses.symmetrical">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="6" lg="4"
                    v-if="comparison.physical_exams.<?= $item ?>.content.peripheral_pulses.symmetrical">
                    <span class="black--text font-weight-bold"> MI:
                        {{ comparison.physical_exams.<?= $item ?>.content.peripheral_pulses.symmetrical_range }}
                    </span>
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                        {pp: true, patient_to_compare: <?= $patient_to_compare ?>}, true).pp.symmetrical_range.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                        {pp: true, patient_to_compare: <?= $patient_to_compare ?>}, true).pp.symmetrical_range.percent)) + '%)'"
                        v-if="comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('content')">
                    </v-badge>
                </v-col>
                <template v-if="!comparison.physical_exams.<?= $item ?>.content.peripheral_pulses.symmetrical">
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> MID:
                            <template v-if="comparison.physical_exams.<?= $item ?>.content.peripheral_pulses.mid">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {pp: true, patient_to_compare: <?= $patient_to_compare ?>}, true).pp.mid.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {pp: true, patient_to_compare: <?= $patient_to_compare ?>}, true).pp.mid.percent)) + '%)'"
                            v-if="comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('content')">
                        </v-badge>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> MII:
                            {{ comparison.physical_exams.<?= $item ?>.content.peripheral_pulses.mii }}
                        </span>
                        <v-badge color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {pp: true, patient_to_compare: <?= $patient_to_compare ?>}, true).pp.mii.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {pp: true, patient_to_compare: <?= $patient_to_compare ?>}, true).pp.mii.percent)) + '%)'"
                            v-if="comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('content')">
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