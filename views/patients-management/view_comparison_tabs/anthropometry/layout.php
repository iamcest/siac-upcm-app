<v-col cols="12">
    <v-row>
        <v-col cols="12">
            <h4 class="text-h5"><b>Paciente:</b>
                {{ comparison.<?= $item == 'current_patient' ? 'patient_selected' : $item ?>.full_name }}
            </h4>
        </v-col>
        <v-col cols="12" md="6">
            <p class="black--text text-h6"><strong>Peso:</strong>
                <span class="font-weight-light">
                    {{ comparison.anthropometry.<?= $item ?>.weight }} kg
                </span>
                <br>
                <template v-if="comparison.anthropometry.<?= $item ?>.hasOwnProperty('patient_id')">
                    <v-badge color="primary" :content="returnNumberSign(Math.round(getPercentDifference('anthropometry', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).weight.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).weight.percent)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" md="6">
            <p class="black--text text-h6"><strong>Talla:</strong>
                <span class="font-weight-light">
                    {{ comparison.anthropometry.<?= $item ?>.height }} cm
                </span>
                <br>
                <template v-if="comparison.anthropometry.<?= $item ?>.hasOwnProperty('patient_id')">
                    <v-badge color="primary" :content="returnNumberSign(Math.round(getPercentDifference('anthropometry', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).height.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).height.percent)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" md="6">
            <p class="black--text text-h6"><strong>Cintura abdominal:</strong>
                <span class="font-weight-light">{{ comparison.anthropometry.<?= $item ?>.abdominal_waist }}
                    cm</span>
                <br>
                <template v-if="comparison.anthropometry.<?= $item ?>.hasOwnProperty('patient_id')">
                    <v-badge color="primary" :content="returnNumberSign(Math.round(getPercentDifference('anthropometry', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).abdominal_waist.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry',
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).abdominal_waist.percent)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" md="6">
            <p class="black--text text-h6"><strong>índice Masa Corporal:</strong>
                <span class="font-weight-light">
                    {{ getBMI(comparison.anthropometry.<?= $item ?>.weight, comparison.anthropometry.<?= $item ?>.height) }}
                </span>
                <br>
                <template v-if="comparison.anthropometry.<?= $item ?>.hasOwnProperty('patient_id')">
                    <v-badge color="primary" :content="returnNumberSign(parseFloat(getPercentDifference('anthropometry',
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).bmi.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).bmi.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" md="6">
            <p class="black--text text-h6"><strong>Superficie Corporal:</strong>
                <span class="font-weight-light">
                    {{ getCS(comparison.anthropometry.<?= $item ?>.weight, comparison.anthropometry.<?= $item ?>.height) }}
                </span>
                <br>
                <template v-if="comparison.anthropometry.<?= $item ?>.hasOwnProperty('patient_id')">
                    <v-badge color="primary" :content="returnNumberSign(parseFloat(getPercentDifference('anthropometry', 
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).cs.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry',
                        {patient_to_compare: <?= $patient_to_compare ?>}, true).cs.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
    </v-row>
</v-col>