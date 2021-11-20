<v-col cols="12">
    <?php echo new Template('patients-management/form_tabs/risk-factors/treatments/edit_dialog') ?>
    <?php echo new Template('patients-management/form_tabs/risk-factors/treatments/polipildora') ?>
    <v-data-table :headers="patient_risk_factors.headers" :items="patient_risk_factors.rf.risk_factors"
        :loading="patient_risk_factors.loading" class="elevation-1 full-width table_headers_lg">
        <template #top>
            <v-row>
                <v-col class="pl-7" cols="11">
                    <h5 class="text-h5 secondary--text p-2">Nuevos Diagnósticos</h5>
                </v-col>
            </v-row>
        </template>
        <template #item.diagnostic='{ item }'>
            <v-select class="mt-6" v-model="item.diagnostic" :items="['Sí', 'No']" outlined dense></v-select>
        </template>
        <template #item.comment='{ item }'>
            <v-row v-if="item.diagnostic == 'Sí'">
                <v-col cols="6">
                    <label><span class="text-center">¿Actualmente en tratamiento?</span></label>
                    <v-select :items="['Sí', 'No']" v-model="item.has_treatment" outlined dense>
                    </v-select>
                    <template v-if="item.has_treatment == 'Sí' && patient_risk_factors.risk_factors_diagnostics.length > 0 && hasPreviousFRTreatment(item.name)">
                    <label><span class="text-center">¿Desea mantener el mismo tratamiento?</span></label>
                        <v-select v-model="item.same_treatment" :items="['Sí', 'No']"
                            @change="item.same_treatment == 'Sí' ? item.comment = searchFRTreatment(item.name) : ''"
                            outlined dense reactive>
                        </v-select>
                    </template>
                </v-col>
                <v-col class="d-flex align-center" cols="6" v-if="item.has_treatment == 'Sí'">
                    <template
                        v-if="item.name == 'HTA' 
                    || item.name == 'Dislipidemia' || item.name == 'DMt2' 
                    || item.name == 'Cardiopatía Isquémica' || item.name == 'Insuficiencia Cardíaca'  || item.name == 'Pre DMt2'">
                        <template
                            v-if="patient_risk_factors.risk_factors_diagnostics.length > 0 || item.same_treatment == 'No'">
                            <v-btn color="primary" @click="patient_risk_factors.rf.treatment_selected = item;
                            patient_risk_factors.rf.treatment_dialog = true"
                                v-if="item.same_treatment == '' || item.same_treatment == 'No'">Editar</v-btn>
                        </template>
                        <template v-else>
                            <v-btn color="primary" @click="patient_risk_factors.rf.treatment_selected = item;
                            patient_risk_factors.rf.treatment_dialog = true">Editar</v-btn>
                        </template>
                    </template>
                    <template v-else>
                        <template
                            v-if="item.same_treatment == '' && patient_risk_factors.risk_factors_diagnostics.length > 0 && hasPreviousFRTreatment(item.name)">
                        </template>
                        <template v-else>
                            <v-text-field class="mt-6" v-model="item.comment" placeholder="especifique el tratamiento"
                                :hint="previousFRTreatmentDescription(item.name, item.comment)"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id')"
                                persistent-hint outlined dense></v-text-field>
                            <v-text-field class="mt-6" v-model="item.comment" placeholder="especifique el tratamiento"
                                persistent-hint outlined dense v-else></v-text-field>
                        </template>
                    </template>
                </v-col>
            </v-row>
        </template>
        <template #body.append>
            <td>

            </td>
            <td class="d-flex justify-center py-3">
                <v-btn class="secondary white--text" @click="saveFactorRiskDiagnostic"
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