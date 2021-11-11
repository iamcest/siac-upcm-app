<h3 class="text-h5 text-center black--text mb-4 mt-4">Registros anteriores</h3>
<v-data-table :headers="patient_risk_factors.risk_factor_headers" class="elevation-1 table_headers_lg"
    :items="getRiskFactorData(patient_risk_factors.detail_table_rf_selected.calc_name)" sort-by="created_at" sort-desc>
    <template v-if="view_dialog" #top>
        <v-col class="px-6" cols="12">
            <v-select v-model="patient_risk_factors.detail_table_rf_selected"
                :items="patient_risk_factors.form_risk_factors" item-text="calc_name"
                placeholder="Seleccione la fórmula para el cálculo de riesgo" return-object outlined dense></v-select>
        </v-col>
    </template>
    <template #item.results="{ item }">
        <span class="d-block"> {{ item.results }} {{ item.nomenclature }}</span>
        <template v-if="getRiskFactorData(patient_risk_factors.detail_table_rf_selected.calc_name).length > 1">
            <v-badge color="primary" v-if="item.name != 'Riesgo OMS/OPS'"
                :content=" returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', {item: item}).calc.numeric).toFixed(2)) 
                + ' (' + returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', {item: item}).calc.percent).toFixed(2)) + '%)'">
            </v-badge>
        </template>
    </template>
    <template #no-data>
        No se encontraron resultados
    </template>
</v-data-table>