<v-col class="mb-n10" cols="12" id="edema">
    <v-row class="d-flex align-center">
        <v-col cols="3">
            <h4 class="text-h6 black--text">Edema miembros inferiores</h4>
        </v-col>
        <v-col cols="8">
            <v-row>
                <template>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">
                            <template v-if="comparison.physical_exams.<?= $item ?>.content.edema.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> Rango:
                            {{ comparison.physical_exams.<?= $item ?>.content.edema.range }} </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {patient_to_compare: <?= $patient_to_compare ?>}, true).edema.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', 
                            {patient_to_compare: <?= $patient_to_compare ?>}, true).edema.percent)) + '%)'"
                            v-if="
                            comparison.physical_exams.<?= $item ?>.content.edema.range != '' &&
                            comparison.physical_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('content')">
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