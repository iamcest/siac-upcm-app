<v-dialog v-model="patient_plan.treatment_edit_dialog" max-width="98%">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Editar tratamientos</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="patient_plan.treatment_edit_dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-row>
                    <v-col cols="12">
                        <?php echo new Template('patients-management/form_tabs/risk-factors/treatments/edit_dialog') ?>
                        <v-data-table :headers="patient_risk_factors.headers"
                            :items="patient_risk_factors.rf.risk_factors"
                            class="elevation-1 full-width table_headers_lg">
                            <template #item.comment='{ item }'>
                                <v-row class="d-flex align-center" v-if="item.diagnostic == 'Sí'">
                                    <v-col cols="6">
                                        {{ item.has_treatment }}
                                    </v-col>
                                    <v-col cols="6" v-if="item.has_treatment == 'Sí'">
                                        <template
                                            v-if="item.name == 'HTA' || item.name == 'Dislipidemia' || item.name == 'DMt2'">
                                            <v-btn color="primary" class="mt-6" @click="patient_risk_factors.rf.treatment_selected = item;
                            patient_risk_factors.rf.treatment_dialog = true">Editar
                                            </v-btn>
                                        </template>
                                        <template v-else>
                                            <template
                                                v-if="item.same_treatment == '' && patient_risk_factors.risk_factors_diagnostics.length > 0 && hasPreviousFRTreatment(item.name)">
                                            </template>
                                            <template v-else>
                                                <v-text-field class="mt-6" v-model="item.comment"
                                                    placeholder="especifique el tratamiento" hint="Tratamiento" persistent-hint outlined
                                                    dense></v-text-field>
                                            </template>
                                        </template>
                                    </v-col>
                                </v-row>
                            </template>
                            <template #body.append>
                                <td>

                                </td>
                                <td class="d-flex justify-center py-3">
                                    <v-btn class="secondary white--text" @click="saveFactorRiskDiagnostic(false)"
                                        :loading="patient_risk_factors.diagnostic_loading">Guardar cambios</v-btn>
                                </td>
                            </template>
                            <template #no-data>
                                <v-btn color="primary" @click="initializeFactorsRisk">
                                    Recargar
                                </v-btn>
                            </template>
                        </v-data-table>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>