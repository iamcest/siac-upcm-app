<v-row>
    <v-col cols="12">
        <v-data-table :headers="patient_risk_factors.comparison_risk_factor_headers" class="elevation-1 table_headers_lg"
            :items="comparison.diagnostics.risk_factors.<?= $item ?>">
            <template #item.results="{ item }">
                <span class="d-block"> {{ item.results }} {{ item.nomenclature }}</span>
                <template v-if="comparison.diagnostics.risk_factors.patient_to_compare.length > 0">
                    <v-badge color="primary" v-if="item.name != 'Riesgo OMS/OPS'"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', 
                        {item: item, patient_to_compare: <?= $patient_to_compare ?>}, true).calc.numeric).toFixed(2))  
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('risk-factor-calc-list', 
                        {item: item, patient_to_compare: <?= $patient_to_compare ?>}, true).calc.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #no-data>
                No se encontraron resultados
            </template>
        </v-data-table>
    </v-col>
</v-row>