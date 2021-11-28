<v-card class="px-4">
    <v-row class="mb-10" v-if="comparison.history.<?= $item ?>.hasOwnProperty('history_content')">
        <v-col cols="12">
            <h3 class="text-h5">ANTITROMBÓTICOS</h3>
        </v-col>
        <v-col cols="6" md="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Antiagregantes plaquetarios</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.dosis}}</span>
                    <template
                        v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antithrombotics', treatment: 'antiplatelet_agents' }, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric))
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antithrombotics', treatment: 'antiplatelet_agents' }, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.frecuency }}</span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.antiplatelet_agents.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Anticoagulantes Orales</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.dosis}}</span>
                    <template
                        v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antithrombotics', treatment: 'oral_anticoagulants' }, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antithrombotics', treatment: 'oral_anticoagulants' }, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antithrombotics.oral_anticoagulants.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="px-4 py-4" v-else>
        <p class="text-center">No se encontró información</p>
    </v-row>
</v-card>