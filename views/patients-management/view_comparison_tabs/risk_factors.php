<v-row class="full-width">
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{  comparison.patient_selected.full_name }}
        </h4>
    </v-col>
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{  comparison.patient_to_compare.full_name }}
        </h4>
    </v-col>
    <v-col cols="12" md="6">
        <v-data-table :headers="patient_risk_factors.headers" :items="comparison.diagnostics.items.current_patient"
            sort-by="name" class="elevation-1 table_headers_lg">
            <template #no-data>
                No se encontraron resultados
            </template>
        </v-data-table>
    </v-col>
    <v-col cols="12" md="6">
        <v-data-table :headers="patient_risk_factors.headers" :items="comparison.diagnostics.items.patient_to_compare"
            sort-by="name" class="elevation-1 table_headers_lg">
            <template #no-data>
                No se encontraron resultados
            </template>
        </v-data-table>
    </v-col>
    <v-col class="mb-6" cols="12" md="6">
        <v-data-table :headers="patient_risk_factors.risk_factor_headers" class="elevation-1 table_headers_lg"
            :items="comparison.diagnostics.risk_factors.current_patient">
            <template #item.results="{ item }">
                <span class="d-block"> {{ item.results }} {{ item.nomenclature }}</span>
                <template v-if="comparison.diagnostics.risk_factors.patient_to_compare.length > 0">
                    <v-badge color="primary" v-if="item.name != 'Riesgo OMS/OPS'"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', {item: item, patient_to_compare: false}, true).calc.numeric).toFixed(2))  
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', {item: item, patient_to_compare: false}, true).calc.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #no-data>
                No se encontraron resultados
            </template>
        </v-data-table>
    </v-col>
    <v-col class="mb-6" cols="12" md="6">
        <v-data-table :headers="patient_risk_factors.risk_factor_headers" class="elevation-1 table_headers_lg"
            :items="comparison.diagnostics.risk_factors.patient_to_compare">
            <template #item.results="{ item }">
                <span class="d-block"> {{ item.results }} {{ item.nomenclature }}</span>
                <template v-if="comparison.diagnostics.risk_factors.current_patient.length > 0">
                    <v-badge color="primary" v-if="item.name != 'Riesgo OMS/OPS'"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', {item: item, patient_to_compare: true}, true).calc.numeric).toFixed(2))  
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', {item: item, patient_to_compare: true}, true).calc.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #no-data>
                No se encontraron resultados
            </template>
        </v-data-table>
    </v-col>
    </row>