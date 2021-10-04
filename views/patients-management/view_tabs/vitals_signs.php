<?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
<v-col class="d-flex justify-end" cols="12">
    <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-5'" dark>
        Editar</v-btn>
</v-col>
<?php endif ?>
<v-col class="full-width px-0" cols="12">
    <v-row>
        <v-col class="font-weight-bold text-center" cols="8" offset="2">
            <v-row>
                <v-col cols="1"></v-col>
                <v-col cols="5">
                    <span class="font-weight-bold">Temperatura:
                        <span class="font-weight-light">
                            {{ patient_vital_signs.temperature }} °C
                        </span>
                    </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals').temperature.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals').temperature.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col cols="5">
                    <span class="font-weight-bold">SAT:
                        <span class="font-weight-light">
                            {{ patient_vital_signs.sat }}%
                        </span>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals').sat.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals').sat.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
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
                <v-col class="font-weight-bold text-center" cols="12" md="3">
                    <v-row>
                        <v-col cols="12">
                            <span class="font-weight-bold">Frecuencia respiratoria:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['breathing_rate'] }} rpm
                                </span>
                                <template
                                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.br.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.br.percent)) + '%)'">
                                    </v-badge>
                                </template>
                            </span>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col class="font-weight-bold text-center" cols="12" md="3">
                    <v-row>
                        <v-col cols="12">
                            <span class="font-weight-bold">Frecuencia Cardíaca:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['frc'] }} lat x min
                                </span>
                                <template
                                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.frc.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.frc.percent)) + '%)'">
                                    </v-badge>
                                </template>
                            </span>
                        </v-col>
                    </v-row>
                </v-col>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex align-center justify-center">
                <v-col cols="12" md="8">
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
                <v-col class="font-weight-bold text-center" cols="12" md="4">
                    <v-row
                        v-bind:class="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1 ? 'd-flex align-center' : ''">
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAS:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_right_arm1_average'] }} mmHg
                                </span>

                            </span>
                            <v-row class="mt-6 justify-center"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm1_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm1_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                        <v-col cols="2">/</v-col>
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAD:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_right_arm2_average'] }} mmHg
                                </span>
                            </span>
                            <v-row class="mt-6 justify-center"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm2_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm2_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col class="font-weight-bold text-center" cols="12" md="4">
                    <v-row
                        v-bind:class="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1 ? 'd-flex align-center' : ''">
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAS:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_left_arm1_average'] }} mmHg
                                </span>

                            </span>
                            <v-row class="mt-6 justify-center"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm1_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm1_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                        <v-col cols="2">/</v-col>
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAD:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_left_arm2_average'] }} mmHg
                                </span>

                            </span>
                            <v-row class="mt-6 justify-center"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_vital_signs.records.length > 1">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm2_average'}).take.arm.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm2_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col cols="12" v-if="1 == 2">* Luego de 5 minutos sentado el paciente</v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>

<v-col cols="12" v-if="1 == 2">

    <v-data-table :headers="patient_vital_signs.headers" :items="patient_vital_signs.records" sort-by="take_date"
        :sort-desc="true" class="elevation-1 full-width">
        <template slot="item" slot-scope="props">
            <tr class>
                <td class="border-right text-center font-weight-bold" rowspan="7">
                    {{ fromNow(props.item.take_date) }}</td>
            <tr>
                <td class="grey--text font-weight-bold">Sentado</td>
                <td class="text-center">{{ props.item.sitting.frc }} {{ props.item.sitting.frc_suffix}}
                </td>
                <td class="text-center">
                    S / D
                    <br>
                    {{ props.item.sitting.pa_right_arm1 }} / {{ props.item.sitting.pa_right_arm2 }}
                    {{ props.item.sitting.pa_suffix }}
                </td>
                <td class="text-center">
                    S / D
                    <br>
                    {{ props.item.sitting.pa_left_arm1 }} / {{ props.item.sitting.pa_left_arm2 }}
                    {{ props.item.sitting.pa_suffix }}
                </td>
                <td class="text-center">
                    {{ props.item.sitting.breathing_rate }} {{ props.item.sitting.br_suffix }}</td>
                <td class="text-center">{{ props.item.sitting.temperature }} C°</td>
                <td class="text-center">{{ props.item.standing.sat }} %</td>
            </tr>

            <tr>
                <td class="grey--text font-weight-bold">Acostado</td>
                <td class="text-center">{{ props.item.lying_down.frc }}
                    {{ props.item.sitting.frc_suffix}}</td>
                <td class="text-center">
                    S / D
                    <br>
                    {{ props.item.lying_down.pa_right_arm1 }} /
                    {{ props.item.lying_down.pa_right_arm2 }} {{ props.item.lying_down.pa_suffix }}
                </td>
                <td class="text-center">
                    S / D
                    <br>
                    {{ props.item.lying_down.pa_left_arm1 }} / {{ props.item.lying_down.pa_left_arm2 }}
                    {{ props.item.lying_down.pa_suffix }}
                </td>
                <td class="text-center">{{ props.item.lying_down.breathing_rate }}
                    {{ props.item.lying_down.br_suffix }}</td>
                <td class="text-center">{{ props.item.lying_down.temperature }} C°</td>
                <td class="text-center">{{ props.item.standing.sat }} %</td>
            </tr>
            <tr>
                <td class="grey--text font-weight-bold">De pie</td>
                <td class="text-center">{{ props.item.standing.frc }}
                    {{ props.item.sitting.frc_suffix}}</td>
                <td class="text-center">
                    S / D
                    <br>
                    {{ props.item.standing.pa_right_arm1 }} / {{ props.item.standing.pa_right_arm2 }}
                    {{ props.item.standing.pa_suffix }}
                </td>
                <td class="text-center">
                    S / D
                    <br>
                    {{ props.item.standing.pa_left_arm1 }} / {{ props.item.standing.pa_left_arm2 }}
                    {{ props.item.standing.pa_suffix }}
                </td>
                <td class="text-center">{{ props.item.standing.breathing_rate }}
                    {{ props.item.standing.br_suffix }}</td>
                <td class="text-center">{{ props.item.standing.temperature }} C°</td>
                <td class="text-center">{{ props.item.standing.sat }} %</td>
            </tr>
            <tr>
                <td class="grey--text font-weight-bold border-right" rowspan="2">Promedio</td>
                <td class="text-center"><span class="font-weight-bold">Frecuencia Cardiaca: </span>
                    <br>{{ getFRCAverage([props.item.standing.frc, props.item.sitting.frc, props.item.lying_down.frc]) }}
                    lat x min
                </td>
                <td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span>
                    <br>{{ getVitalSignalsAverage(props.item, 'right').pam }}
                    {{ props.item.sitting.pa_suffix }}
                    <br>
                    <b>S: </b>
                    {{ getSDverage([props.item.sitting.pa_right_arm1, props.item.lying_down.pa_right_arm1, props.item.standing.pa_right_arm1]) }}
                    <b>D: </b>
                    {{ getSDverage([props.item.sitting.pa_right_arm2, props.item.lying_down.pa_right_arm2, props.item.standing.pa_right_arm2]) }}
                </td>
                <td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span>
                    <br>{{ getVitalSignalsAverage(props.item, 'left').pam }}
                    {{ props.item.sitting.pa_suffix }}
                    <br>
                    <b>S: </b>
                    {{ getSDverage([props.item.sitting.pa_left_arm1, props.item.lying_down.pa_left_arm1, props.item.standing.pa_left_arm1]) }}
                    <b>D: </b>
                    {{ getSDverage([props.item.sitting.pa_left_arm2, props.item.lying_down.pa_left_arm2, props.item.standing.pa_left_arm2]) }}
                </td>
                <td></td>
                <td></td>
                <td></td>
            <tr>
                <td></td>
                <td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span>
                    <br>{{ getVitalSignalsAverage(props.item, 'right').pulse_pressure }}
                    {{ props.item.sitting.pa_suffix }}
                </td>
                <td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span>
                    <br>{{ getVitalSignalsAverage(props.item, 'left').pulse_pressure }}
                    {{ props.item.sitting.pa_suffix }}
                </td>
                <td></td>
                <td></td>
            </tr>
            </tr>
            </tr>
        </template>
        <template v-slot:no-data>
            <v-btn color="primary" @click="initializeVitalSigns">
                Recargar
            </v-btn>
        </template>
    </v-data-table>
</v-col>