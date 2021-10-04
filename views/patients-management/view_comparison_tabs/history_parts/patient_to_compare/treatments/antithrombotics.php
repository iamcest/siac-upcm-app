<v-row class="factor-risk-container mb-10">
    <v-col cols="12">
        <h3 class="text-h5">ANTITROMBÓTICOS</h3>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Antiagregantes plaquetarios</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.treatment }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.dosis }}
                   </span>
                <br>
                <template
                    v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.secondary_effects }}</label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.daily_dosis }}
                </span>
                <template
                    v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'antiplatelet_agents'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.antiplatelet_agents.frecuency }}</label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Anticoagulantes Orales</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.treatment }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.dosis}}
                   </span>
                <template
                    v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.secondary_effects }}</label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.daily_dosis}}
                </span>
                <template
                    v-if="comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dtm2', treatment: 'oral_anticoagulants'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.dtm2.oral_anticoagulants.frecuency }}
                </label>
            </v-col>
        </v-row>
    </v-col>
</v-row>