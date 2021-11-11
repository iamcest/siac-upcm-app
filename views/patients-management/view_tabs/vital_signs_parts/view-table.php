<h5 class="text-h5 text-center black--text">Registros Anteriores</h5>
<v-data-table :headers="patient_vital_signs.headers" :items="patient_vital_signs.records" sort-by="take_date"
    :sort-desc="true" class="elevation-1 full-width">
    <template slot="item" slot-scope="props">
        <tr>
            <td class="border-right text-center font-weight-bold" rowspan="6">
                {{ fromNow(props.item.created_at) }}</td>
        <tr>
            <td class="grey--text font-weight-bold">
                Sentado
            </td>
            <td class="text-center">
                {{ props.item.sitting.frc }} {{ props.item.sitting.frc_suffix}}
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
                <br>
                <template v-if="patient_vital_signs.records.length > 0">
                    <v-badge class="badge-na my-2" color="primary"
                        :content="returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'}).averages.frc.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'}).averages.frc.percent)) + '%)'">
                    </v-badge>
                </template>
            </td>
            <td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span>
                <br>{{ getVitalSignalsAverage(props.item, 'right').pam }}
                {{ props.item.sitting.pa_suffix }}
                <template v-if="patient_vital_signs.records.length > 0">
                    <br>
                    <v-badge class="badge-na my-2" color="primary" :content="returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pam.right.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pam.right.percent)) + '%)'">
                    </v-badge>
                </template>
                <br>
                <b>S: </b>
                {{ getSDverage([props.item.sitting.pa_right_arm1, props.item.lying_down.pa_right_arm1, props.item.standing.pa_right_arm1]) }}
                <b>D: </b>
                {{ getSDverage([props.item.sitting.pa_right_arm2, props.item.lying_down.pa_right_arm2, props.item.standing.pa_right_arm2]) }}
            </td>
            <td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span>
                <br>{{ getVitalSignalsAverage(props.item, 'left').pam }}
                {{ props.item.sitting.pa_suffix }}
                <template v-if="patient_vital_signs.records.length > 0">
                    <br>
                    <v-badge class="badge-na my-2" color="primary" :content="returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pam.left.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pam.left.percent)) + '%)'">
                    </v-badge>
                </template>
                <br>
                <b>S: </b>
                {{ getSDverage([props.item.sitting.pa_left_arm1, props.item.lying_down.pa_left_arm1, props.item.standing.pa_left_arm1]) }}
                <b>D: </b>
                {{ getSDverage([props.item.sitting.pa_left_arm2, props.item.lying_down.pa_left_arm2, props.item.standing.pa_left_arm2]) }}
            </td>
            <td class="text-center">
                <template v-if="patient_vital_signs.records.length > 0">
                    <v-badge class="badge-na my-2" color="primary"
                        :content="returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'}).averages.br.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'}).averages.br.percent)) + '%)'">
                    </v-badge>
                </template>
            </td>
            <td class="text-center">
                <template v-if="patient_vital_signs.records.length > 0">
                    <v-badge class="badge-na" color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item}).temperature.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item}).temperature.percent)) + '%)'">
                    </v-badge>
                </template>
            </td>
            <td class="text-center">
                <template v-if="patient_vital_signs.records.length > 0">
                    <v-badge class="badge-na" color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item}).sat.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item}).sat.percent)) + '%)'">
                    </v-badge>
                </template>
            </td>
        </tr>

        <tr>
            <td></td>
            <td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span>
                <br>{{ getVitalSignalsAverage(props.item, 'right').pulse_pressure }}
                {{ props.item.sitting.pa_suffix }}
                <template v-if="patient_vital_signs.records.length > 0">
                    <br>
                    <v-badge class="badge-na my-2" color="primary" :content="returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pulse_pressure.right.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pulse_pressure.right.percent)) + '%)'">
                    </v-badge>
                </template>
            </td>
            <td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span>
                <br>{{ getVitalSignalsAverage(props.item, 'left').pulse_pressure }}
                {{ props.item.sitting.pa_suffix }}
                <template v-if="patient_vital_signs.records.length > 0">
                    <br>
                    <v-badge class="badge-na my-2" color="primary" :content="returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pulse_pressure.left.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {vital_signals: props.item, method: 'average'})
                            .averages.pulse_pressure.left.percent)) + '%)'">
                    </v-badge>
                </template>
            </td>
            <td class="text-center">
            </td>
            <td class="text-center">
            </td>
            <td class="text-center">
            </td>
        </tr>
        </tr>
    </template>
    <template #no-data>
        No se encontraron registros
    </template>
</v-data-table>