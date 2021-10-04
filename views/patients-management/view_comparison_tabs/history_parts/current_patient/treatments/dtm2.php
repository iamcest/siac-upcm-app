<v-row class="factor-risk-container mb-10">
    <v-col cols="12">
        <h3 class="text-h5">ANTIDIABÉTICOS</h3>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Metformina</h3>
                <span class="black--text font-weight-bold">
                    <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.metformin.active">

                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.metformin.dosis }}</span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.metformin.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'metformin'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'metformin'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.metformin.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.metformin.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.metformin.secondary_effects }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.metformin.daily_dosis }} </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.metformin.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'metformin'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'metformin'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold mb-3">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.metformin.frecuency }}</span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Insulina</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.insulin.treatment }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.insulin.dosis }} UI </span>
                <br>
                <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.insulin.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'insulin'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'insulin'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.insulin.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.insulin.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.insulin.secondary_effects }}
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.insulin.daily_dosis }} </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.insulin.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'insulin'}, patient_to_compare: false}, true).daily_dosis.numeric)) + 
                        ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'insulin'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.insulin.frecuency }} </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Análogos de insulina</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.treatment }} </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.dosis}} UI</span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'a_insulin'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'a_insulin'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.secondary_effects }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.daily_dosis }} </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'a_insulin'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'a_insulin'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.a_insulin.frecuency }} </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Mezclas de insulina</h3>
                <p class="font-weight-bold black--text text-center"
                    v-for="item in comparison.history.current_patient.history_content.diseases.dtm2.insulin_mixtures.selected">
                    {{ item }}
                </p>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Sulfonilúreas</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.treatment }}
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.dosis }} mg</span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'sulfonylureas'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'sulfonylureas'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.secondary_effects }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.daily_dosis }}
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'sulfonylureas'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'sulfonylureas'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12 ">
                <span class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.sulfonylureas.frecuency }}
                </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Glinidas</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.glinidas.treatment }} </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.glinidas.dosis }}</span>
                <br>
                <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.glinidas.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'glinidas'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'glinidas'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="comparison.history.current_patient.history_content.diseases.dtm2.glinidas.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.glinidas.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ comparison.history.current_patient.history_content.diseases.dtm2.glinidas.secondary_effects }}</span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ comparison.history.current_patient.history_content.diseases.dtm2.glinidas.daily_dosis }}
                    </span>
                    <br>
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.glinidas.daily_dosis !== ''">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'glinidas'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'glinidas'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ comparison.history.current_patient.history_content.diseases.dtm2.glinidas.frecuency }}
                    </span>
                </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Pioglitazona</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.treatment }}
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.dosis}}</span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'pioglitazona'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'pioglitazona'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.secondary_effects }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.daily_dosis }}
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'pioglitazona'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'pioglitazona'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12 ">
                <span class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.pioglitazona.frecuency }}
                </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Inh DPP-4</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.treatment }} </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.dosis}}</span>
                <br>
                <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'inh_dpp'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'inh_dpp'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.secondary_effects }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.daily_dosis}} </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'inh_dpp'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'inh_dpp'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.inh_dpp.frecuency }} </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">I SLGT2</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.treatment }} </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.dosis }}</span>
                <br>
                <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'i_slgt2'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'i_slgt2'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.secondary_effects }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.daily_dosis }} </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'i_slgt2'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'i_slgt2'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.i_slgt2.frecuency }} </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">GLP1</h3>
                <span class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.gl.treatment }} </span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.gl.dosis }}</span>
                <br>
                <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.gl.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'gl', patient_to_compare: false }}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'gl', patient_to_compare: false }}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dtm2.gl.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dtm2.gl.has_secondary_effects">
                <span class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.gl.secondary_effects }}</span>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.gl.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.gl.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'gl'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'gl'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dtm2.gl.frecuency }} </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="12">
        <v-row class="d-flex justify-center">
            <v-col cols="12" md="4" lg="3">
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">
                        <template v-if="comparison.history.current_patient.history_content.diseases.dtm2.fdc.active">
                            El paciente tiene indicada una combinación fija de los medicamentos seleccionados
                        </template>
                        <template v-else>
                            El paciente no tiene indicada una combinación fija de los medicamentos seleccionados
                        </template>
                    </h3>
                </v-col>
                <v-col cols="12" v-if="comparison.history.current_patient.history_content.diseases.dtm2.fdc.active">
                    <h3 class="font-weight-bold black--text text-center">Combinaciones a dosis fijas</h3>
                    <p class="font-weight-bold black--text text-center"
                        v-for="item in comparison.history.current_patient.history_content.diseases.dtm2.fdc.selected">
                        {{ item }}
                    </p>
                </v-col>
            </v-col>
        </v-row>
    </v-col>
</v-row>