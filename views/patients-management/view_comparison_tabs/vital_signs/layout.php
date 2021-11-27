<v-col cols="12">
    <v-row>
        <v-col cols="12">
            <h4 class="text-h5"><b>Paciente:</b>
                {{ comparison.<?= $item == 'current_patient' ? 'patient_selected' : $item ?>.full_name }}
            </h4>
        </v-col>
        <template v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('takes')">
            <v-col class="font-weight-bold text-center" cols="12">
                <v-row>
                    <v-col cols="1"></v-col>
                    <v-col cols="5">
                        <span class="font-weight-bold">Temperatura:
                            <span class="font-weight-light">
                                {{ comparison.vital_signs.<?= $item ?>.temperature }} °C
                            </span>
                        </span>
                        <br>
                        <template v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {patient_to_compare: <?= $patient_to_compare ?>}, true).temperature.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {patient_to_compare: <?= $patient_to_compare ?>}, true).temperature.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </v-col>
                    <v-col cols="5">
                        <span class="font-weight-bold">SAT:
                            <span class="font-weight-light">
                                {{ comparison.vital_signs.<?= $item ?>.sat }}%
                            </span>
                            <br>
                            <template v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {patient_to_compare: <?= $patient_to_compare ?>}, true).sat.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {patient_to_compare: <?= $patient_to_compare ?>}, true).sat.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </span>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-row v-for="(item, index) in 3">
                    <v-col cols="12" md="12">
                        <h2 class="text-center">
                            <template v-if="index == 0">
                                Sentado
                            </template>
                            <template v-if="index == 1">
                                Acostado
                            </template>
                            <template v-if="index == 2">
                                De pie
                            </template>
                        </h2>
                    </v-col>
                    <v-col class="mb-n12" cols="12">
                        <v-row class="d-flex justify-center">
                            <v-col class="font-weight-bold text-center" cols="12" md="6">
                                <v-row>
                                    <v-col cols="12">
                                        <span class="font-weight-bold">Frecuencia respiratoria:
                                            <span class="font-weight-light">
                                                {{ comparison.vital_signs.<?= $item ?>.takes[index]['breathing_rate'] }}
                                                rpm
                                            </span>
                                            <br>
                                            <template
                                                v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                                                <v-badge color="primary"
                                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                                {index: index, patient_to_compare: <?= $patient_to_compare ?>}, true).take.br.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                                {index: index, patient_to_compare: <?= $patient_to_compare ?>}, true).take.br.percent)) + '%)'">
                                                </v-badge>
                                            </template>
                                        </span>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col class="font-weight-bold text-center" cols="12" md="6">
                                <v-row>
                                    <v-col cols="12">
                                        <span class="font-weight-bold">Frecuencia Cardíaca:
                                            <span class="font-weight-light">
                                                {{ comparison.vital_signs.<?= $item ?>.takes[index]['frc'] }} lat x min
                                            </span>
                                            <br>
                                            <template
                                                v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                                                <v-badge color="primary"
                                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                                {index: index, patient_to_compare: <?= $patient_to_compare ?>}, true).take.frc.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                                {index: index, patient_to_compare: <?= $patient_to_compare ?>}, true).take.frc.percent)) + '%)'">
                                                </v-badge>
                                            </template>
                                        </span>
                                    </v-col>
                                </v-row>
                            </v-col>
                    </v-col>
                    <v-col cols="12">
                        <v-row class="d-flex align-center justify-center">
                            <v-col cols="12">
                                <v-row>
                                    <v-col class="font-weight-bold text-center" cols="12" md="6">
                                        PA brazo derecho *
                                    </v-col>
                                    <v-col class="font-weight-bold text-center" cols="12" md="6">
                                        PA brazo izquierdo *
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                        <v-row class="d-flex align-center pt-0 mt-n10 justify-center">
                            <v-col class="font-weight-bold text-center" cols="12" md="6">
                                <v-row
                                    v-bind:class="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id') ? 'd-flex align-center' : ''">
                                    <v-col cols="5">
                                        <span class="font-weight-bold"> Promedio PAS:
                                            <span class="font-weight-light">
                                                {{ comparison.vital_signs.<?= $item ?>.takes[index]['pa_right_arm1_average'] }}
                                                mmHg
                                            </span>

                                        </span>
                                        <v-row class="mt-6 justify-center"
                                            v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                                            <v-badge class="ml-n10" color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_right_arm1_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.numeric)) 
                                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_right_arm1_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.percent)) + '%)'">
                                            </v-badge>
                                        </v-row>
                                    </v-col>
                                    <v-col cols="2">/</v-col>
                                    <v-col cols="5">
                                        <span class="font-weight-bold"> Promedio PAD:
                                            <span class="font-weight-light">
                                                {{ comparison.vital_signs.<?= $item ?>.takes[index]['pa_right_arm2_average'] }}
                                                mmHg
                                            </span>
                                        </span>
                                        <v-row class="mt-6 justify-center"
                                            v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                                            <v-badge class="ml-n10" color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_right_arm2_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.numeric)) 
                                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_right_arm2_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.percent)) + '%)'">
                                            </v-badge>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col class="font-weight-bold text-center" cols="12" md="6">
                                <v-row
                                    v-bind:class="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id') ? 'd-flex align-center' : ''">
                                    <v-col cols="5">
                                        <span class="font-weight-bold"> Promedio PAS:
                                            <span class="font-weight-light">
                                                {{ comparison.vital_signs.<?= $item ?>.takes[index]['pa_left_arm1_average'] }}
                                                mmHg
                                            </span>

                                        </span>
                                        <v-row class="mt-6 justify-center"
                                            v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                                            <v-badge class="ml-n10" color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_left_arm1_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.numeric)) 
                                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_left_arm1_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.percent)) + '%)'">
                                            </v-badge>
                                        </v-row>
                                    </v-col>
                                    <v-col cols="2">/</v-col>
                                    <v-col cols="5">
                                        <span class="font-weight-bold"> Promedio PAD:
                                            <span class="font-weight-light">
                                                {{ comparison.vital_signs.<?= $item ?>.takes[index]['pa_left_arm2_average'] }}
                                                mmHg
                                            </span>

                                        </span>
                                        <v-row class="mt-6 justify-center"
                                            v-if="comparison.vital_signs.<?= $item ?>.hasOwnProperty('patient_id')">
                                            <v-badge class="ml-n10" color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_left_arm2_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.numeric)) 
                                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', 
                                            {index: index, arm: 'pa_left_arm2_average', patient_to_compare: <?= $patient_to_compare ?>}, true).take.arm.percent)) + '%)'">
                                            </v-badge>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col cols="12">
                        <v-divider></v-divider>
                    </v-col>
                </v-row>
            </v-col>
        </template>
        <template v-else>
            <p class="text-center">No se encontró información</p>
        </template>
    </v-row>
</v-col>