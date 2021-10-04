    <v-row class="full-width px-4">
        <template
            v-if="viewPatientsComparisonDialog && comparison.anthropometry.current_patient.hasOwnProperty('patient_id')">
            <v-col cols="6" id="anthropometry_cp">
                <v-row>
                    <v-col cols="12">
                        <h4 class="text-h5"><b>Paciente:</b>
                            {{  comparison.patient_selected.full_name }}
                        </h4>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Peso:</strong>
                            <span class="font-weight-light">
                                {{ comparison.anthropometry.current_patient.weight }} kg
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.current_patient.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: false}, true).weight.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: false}, true).weight.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Talla:</strong>
                            <span class="font-weight-light">
                                {{ comparison.anthropometry.current_patient.height }} cm
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.current_patient.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: false}, true).height.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: false}, true).height.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Cintura abdominal:</strong>
                            <span
                                class="font-weight-light">{{ comparison.anthropometry.current_patient.abdominal_waist }}
                                cm</span>
                            <br>
                            <template v-if="comparison.anthropometry.current_patient.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: false}, true).abdominal_waist.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: false}, true).abdominal_waist.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>índice Masa Corporal:</strong>
                            <span class="font-weight-light">
                                {{ getBMI(comparison.anthropometry.current_patient.weight, comparison.anthropometry.current_patient.height) }}
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.current_patient.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: false}, true).bmi.numeric).toFixed(2))  + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: false}, true).bmi.percent).toFixed(2)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Superficie Corporal:</strong>
                            <span class="font-weight-light">
                                {{ getCS(comparison.anthropometry.current_patient.weight, comparison.anthropometry.current_patient.height) }}
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.current_patient.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: false}, true).cs.numeric).toFixed(2))  + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: false}, true).cs.percent).toFixed(2)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="6" id="anthropometry_ptc">
                <v-row>
                    <v-col cols="12">
                        <h4 class="text-h5"><b>Paciente:</b>
                            {{  comparison.patient_to_compare.full_name }}
                        </h4>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Peso:</strong>
                            <span class="font-weight-light">
                                {{ comparison.anthropometry.patient_to_compare.weight }} kg
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.patient_to_compare.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry',{patient_to_compare: true}, true).weight.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: true}, true).weight.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Talla:</strong>
                            <span class="font-weight-light">
                                {{ comparison.anthropometry.patient_to_compare.height }} cm
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.patient_to_compare.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: true}, true).height.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: true}, true).height.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Cintura abdominal:</strong>
                            <span
                                class="font-weight-light">{{ comparison.anthropometry.patient_to_compare.abdominal_waist }}
                                cm</span>
                            <br>
                            <template v-if="comparison.anthropometry.patient_to_compare.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: true}, true).abdominal_waist.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', {patient_to_compare: true}, true).abdominal_waist.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>índice Masa Corporal:</strong>
                            <span class="font-weight-light">
                                {{ getBMI(comparison.anthropometry.patient_to_compare.weight, comparison.anthropometry.patient_to_compare.height) }}
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.patient_to_compare.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: true}, true).bmi.numeric).toFixed(2))  + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: true}, true).bmi.percent).toFixed(2)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                    <v-col cols="12" md="6">
                        <p class="black--text text-h6"><strong>Superficie Corporal:</strong>
                            <span class="font-weight-light">
                                {{ getCS(comparison.anthropometry.patient_to_compare.weight, comparison.anthropometry.patient_to_compare.height) }}
                            </span>
                            <br>
                            <template v-if="comparison.anthropometry.patient_to_compare.hasOwnProperty('patient_id')">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: true}, true).cs.numeric).toFixed(2))  + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', {patient_to_compare: true}, true).cs.percent).toFixed(2)) + '%)'">
                                </v-badge>
                            </template>
                        </p>
                    </v-col>
                </v-row>
            </v-col>
        </template>
    </v-row>