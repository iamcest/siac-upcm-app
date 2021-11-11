<v-row class="full-width">
    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
    <v-col class="d-flex justify-end" cols="12">
        <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-10'"
            dark>Editar</v-btn>
    </v-col>
    <?php endif ?>
    <template v-if="view_dialog">
        <?php echo new Template('patients-management/form_tabs/risk-factors/treatments/view_dialog') ?>

        <v-col cols="12" md="6">
            <v-data-table :headers="patient_risk_factors.headers" :items="patient_risk_factors.rf.risk_factors"
                sort-by="name" class="elevation-1 table_headers_lg">
                <template #item.comment='{ item }'>
                    {{ item.comment }}
                    <template
                        v-if="item.name == 'HTA' 
                    || item.name == 'Dislipidemia' || item.name == 'DMt2' 
                    || item.name == 'Cardiopatía Isquémica' || item.name == 'Insuficiencia Cardíaca'  || item.name == 'Pre DMt2'">
                        <template v-if="item.diagnostic == 'Sí' && item.has_treatment == 'Sí'">
                            <v-btn color="primary" @click="patient_risk_factors.rf.treatment_selected = item;
                            patient_risk_factors.rf.treatment_view_dialog = true">Ver
                            </v-btn>
                        </template>
                    </template>
                    <template
                        v-else-if="item.has_treatment && item.same_treatment != '' && patient_risk_factors.risk_factors_diagnostics.length > 0 && hasPreviousFRTreatment(item.name) ">
                        <br>
                        <span
                            class="subtitle-2">{{ previousFRTreatmentDescription(item.name, item.comment, true) }}</span>
                    </template>
                </template>
                <template #no-data>
                    <v-btn color="primary" @click="initializeFactorsRisk">
                        Recargar
                    </v-btn>
                </template>
            </v-data-table>
        </v-col>
        <v-col class="mb-6" cols="12" md="6">
            <v-data-table :headers="patient_risk_factors.risk_factor_headers" class="elevation-1 table_headers_lg"
                :items="patient_risk_factors.risk_factors_list.current_list">
                <template #item.results="{ item }">
                    <span class="d-block"> {{ item.results }} {{ item.nomenclature }}</span>
                    <template v-if="patient_risk_factors.risk_factors_list.previous_list.length > 0">
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
            <?php echo new Template('patients-management/view_tabs/risk-factors/rf-view-table') ?>
        </v-col>
    </template>
</v-row>