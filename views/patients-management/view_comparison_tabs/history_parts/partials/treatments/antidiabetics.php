<v-card class="px-4">
    <v-row class="mb-10" v-if="comparison.history.<?= $item ?>.hasOwnProperty('history_content')">
        <v-col cols="12">
            <h3 class="text-h5">ANTIDIABÉTICOS</h3>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Metformina</h3>
                    <span class="black--text font-weight-bold">
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.metformin.active">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template
                    v-if="
                    comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.metformin.active
                    &&
                    comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                    &&
                    comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.metformin.ative">

                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Dosis diarias:
                            {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.metformin.dosis}}</span>
                        <template
                            v-if="comparison.history.<?= ($item == 'current_patient') ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('history_content')">
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
                            {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.metformin.frecuency }}</span>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Reacciones adversas:
                            <template
                                v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col class="mt-n4" cols="12"
                        v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                        <span class="black--text font-weight-bold">Tipo de reacción:
                            {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.metformin.secondary_effects }}</span>
                    </v-col>
                </template>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Insulina</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin.treatment }}</span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin.dosis}}
                        UI </span>
                    <template v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.insulin.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'insulin'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'insulin'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin.secondary_effects }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Análogos de insulina</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.a_insulin.treatment }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.a_insulin.dosis}}
                    </span>
                    <template v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.a_insulin.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.a_insulin.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'a_insulin'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'a_insulin'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.a_insulin.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.a_insulin.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.a_insulin.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.a_insulin.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Mezclas de insulina</h3>
                    <p class="font-weight-bold black--text text-center"
                        v-for="item in comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.insulin_mixtures.selected">
                        {{ item }}
                    </p>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Sulfonilúreas</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.sulfonylureas.treatment }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.sulfonylureas.dosis}}</span>
                    <template v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.sulfonylureas.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.sulfonylureas.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history',
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'sulfonylureas'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric))
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'sulfonylureas'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.sulfonylureas.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.sulfonylureas.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.sulfonylureas.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.sulfonylureas.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Glinidas</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.glinidas.treatment }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.glinidas.dosis}}</span>
                    <template v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.glinidas.dosis != '' 
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.glinidas.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'glinidas'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric))
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'glinidas'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.glinidas.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.glinidas.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.glinidas.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.glinidas.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Pioglitazona</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.pioglitazona.treatment }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.pioglitazona.dosis}}</span>
                    <template v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.pioglitazona.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.pioglitazona.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'pioglitazona'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history',
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'pioglitazona'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.pioglitazona.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.pioglitazona.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.pioglitazona.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.pioglitazona.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">I DPP-4</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.inh_dpp.treatment }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.inh_dpp.dosis}}</span>
                    <template v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.inh_dpp.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.inh_dpp.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history',
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'inh_dpp'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric))
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'inh_dpp'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.inh_dpp.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.inh_dpp.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.inh_dpp.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.inh_dpp.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">I SLGT-2</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.i_slgt2.treatment }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.i_slgt2.dosis}}</span>
                    <template v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.i_slgt2.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.i_slgt2.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'i_slgt2'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric))
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'i_slgt2'}, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.i_slgt2.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.i_slgt2.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.i_slgt2.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.i_slgt2.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Ag Rec GLP-1</h3>
                    <span class="black--text font-weight-bold">
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.gl.treatment }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.gl.dosis}}</span>
                    <template v-if="
                        comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.gl.dosis != ''
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.hasOwnProperty('history_content')
                        &&
                        comparison.history.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>.history_content.treatments.antidiabetics.gl.dosis != ''
                        ">
                        <v-badge class="badge-na" color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'gl' }, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.numeric))
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', 
                            {dosis: true, treatment: {group: 'antidiabetics', treatment: 'gl' }, patient_to_compare: <?= $patient_to_compare ?>}, true).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.gl.frecuency }}
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.gl.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.gl.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.gl.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="12">
                    <v-col cols="12">
                        <h3 class="font-weight-bold black--text text-center">
                            <template
                                v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.fdc.active">
                                El paciente tiene indicada una combinación fija de los medicamentos seleccionados
                            </template>
                            <template v-else>
                                El paciente no tiene indicada una combinación fija de los medicamentos seleccionados
                            </template>
                        </h3>
                    </v-col>
                    <v-col cols="12"
                        v-if="comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.fdc.active">
                        <h3 class="font-weight-bold black--text text-center">Combinaciones a dosis fijas</h3>
                        <p class="font-weight-bold black--text text-center"
                            v-for="item in comparison.history.<?= $item ?>.history_content.treatments.antidiabetics.fdc.selected">
                            {{ item }}
                        </p>
                    </v-col>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="px-4 py-4" v-else>
        <p class="text-center">No se encontró información</p>
    </v-row>
</v-card>