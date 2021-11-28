<v-card class="px-4">
    <v-row class="mb-10" v-if="comparison.history.<?php echo $item ?>.hasOwnProperty('history_content')">
        <v-col cols="12">
            <h3 class="text-h5">ANTIDIABÉTICOS</h3>
        </v-col>
        <v-col cols="6">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Metformina</h3>
                    <span class="black--text font-weight-bold">
                        <template
                            v-if="comparison.history.<?php echo $item ?>.history_content.treatments.antidiabetics.metformin.active">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template
                    v-if="comparison.history.<?php echo $item ?>.history_content.treatments.antidiabetics.metformin.active">
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Dosis diarias:
                            {{ comparison.history.<?php echo $item ?>.history_content.treatments.antidiabetics.metformin.dosis}}</span>
                        <template
                            v-if="comparison.history.<?php echo ($item == 'current_patient') ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('history_content')">
                            <v-badge class="badge-na" color="primary" :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                                {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin', 
                                    }, patient_to_compare: <?= $patient_to_compare ?> }, true).dosis.numeric)) 
                                    
                                + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                                {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin', 
                                     }, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold mb-3">Frecuencia:
                            {{ comparison.history.<?php echo $item ?>.history_content.treatments.antidiabetics.metformin.frecuency }}</span>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Reacciones adversas:
                            <template
                                v-if="comparison.history.<?php echo $item ?>.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col class="mt-n4" cols="12"
                        v-if="comparison.history.<?php echo $item ?>.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                        <span class="black--text font-weight-bold">Tipo de reacción:
                            {{ comparison.history.<?php echo $item ?>.history_content.treatments.antidiabetics.metformin.secondary_effects }}</span>
                    </v-col>
                </template>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="px-4 py-4" v-else>
        <p class="text-center">No se encontró información</p>
    </v-row>
</v-card>