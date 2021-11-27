<v-col class="mb-n10" cols="12" id="auscultation">
    <v-row class="d-flex align-center">
        <v-col cols="3">
            <h4 class="text-h6 black--text">Auscultación</h4>
        </v-col>
        <v-col cols="8">
            <v-row>
                <v-col cols="4">
                    <span class="black--text font-weight-bold">Regulares:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.auscultation.regular">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="4">
                    <span class="black--text font-weight-bold">R1:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.auscultation.unfolded_r1">
                            Sí ({{ comparison.physical_exams.<?= $item ?>.content.auscultation.r1_type }})
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="4">
                    <span class="black--text font-weight-bold">
                        R2:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.auscultation.unfolded_r2">
                            Sí ({{ comparison.physical_exams.<?= $item ?>.content.auscultation.r2_type }})
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="4">
                    <span class="black--text font-weight-bold">R3:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.auscultation.unfolded_r3">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="4">
                    <span class="black--text font-weight-bold">
                        R4:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.auscultation.unfolded_r4">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template
                    v-if="comparison.physical_exams.<?= $item ?>.content.auscultation.soplo.items.length == 1">
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">Ritmo de galope:
                            <template
                                v-if="
                                comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('content') &&
                                comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.content.auscultation.gallop_rhythm">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                </template>
                <v-col cols="4">
                    <span class="black--text font-weight-bold">Soplo:
                        <template v-if="
                        comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('content') &&
                        comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.content.auscultation.soplo.active">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template
                    v-for="(soplo, index) in comparison.physical_exams.<?= $item ?>.content.auscultation.soplo.items"
                    v-if="comparison.physical_exams.<?= $item ?>.content.auscultation.soplo.active">
                    <v-col cols="12">
                        <h5 class="text-h5">Soplo {{ index + 1 }}</h5>
                    </v-col>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">{{ soplo.type }}</span>
                    </v-col>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">Foco: {{ soplo.foco }} </span>
                    </v-col>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">Intensidad:
                            {{ soplo.intensity_foco }}
                        </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {soplo: soplo, i: index, patient_to_compare: <?= $patient_to_compare ?>}, true).auscultation.soplo.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {soplo: soplo, i: index, patient_to_compare: <?= $patient_to_compare ?>}, true).auscultation.soplo.percent)) + '%)'"
                            v-if="
                            soplo.intensity_foco != '' &&
                            comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.content.auscultation.soplo.items[index] != undefined">
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