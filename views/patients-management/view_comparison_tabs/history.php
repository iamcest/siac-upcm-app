<template v-if="viewPatientsComparisonDialog">
    <v-row class="full-width">
        <v-col class="px-4" cols="6">
            <v-row>
                <v-col cols="12">
                    <h3 class="text-center text-h5 mb-4">
                        <template v-if="viewPatientsAverageComparisonDialog">
                            Pacientes de la Unidad
                        </template>

                        <template v-else>
                            Paciente:
                            {{ comparison.patient_selected.full_name }}
                        </template>
                    </h3>
                </v-col>
                <v-col cols="12"
                    v-if="comparison.history.current_patient !== undefined && comparison.history.current_patient.history_content !== undefined">
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/hta'); ?>
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/dtm2'); ?>
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/pre_dtm2'); ?>
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/dyslipidemia'); ?>
                    <v-row>
                        <v-col class="factor-risk-container px-4 py-4" cols="5">
                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                                descompensación de la PA - Emergencia hipertensiva</h5>
                            <template v-if="comparison.history.current_patient.history_content.emergency_hta_history">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </v-col>
                        <v-col cols="2"></v-col>
                        <v-col class="factor-risk-container px-4 py-4" cols="5">
                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                                descompensación de la Diabetes <br><br></h5>
                            <template
                                v-if="comparison.history.current_patient.history_content.emergency_diabetes_history">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Antecedentes de Enfermedades Cardiovasculares
                            </h3>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/cardiovascular_diseases/ischemic_cardiopathy') ?>
                        </v-col>
                        <v-col class="pr-6 pl-3 col col-8" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/cardiovascular_diseases/arritmia') ?>
                        </v-col>

                    </v-row>

                    <v-row>
                        <v-col class="pr-6" cols="12" md="6">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/cardiovascular_diseases/heart_failure') ?>
                        </v-col>

                        <v-col class="pl-6" cols="12" md="6">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/cardiovascular_diseases/peripheral_artery') ?>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" md="6" offset-md="3">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/cardiovascular_diseases/cronic_kidney_disease') ?>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Tratamientos</h3>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/treatments/polipildora') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/treatments/hta') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/treatments/dtm2') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/treatments/antithrombotics') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/current_patient/treatments/dyslipidemia') ?>
                        </v-col>
                    </v-row>

                </v-col>
                <v-col cols="12" v-else>
                    <p class="text-center">No se encontró información</p>
                </v-col>
            </v-row>
        </v-col>
        <v-col class="px-4" cols="6">
            <v-row>
                <v-col cols="12">
                    <h3 class="text-center text-h5 mb-4">
                        <template v-if="viewPatientsAverageComparisonDialog">
                            Pacientes de otras unidades
                        </template>

                        <template v-else>
                            Paciente:
                            {{ comparison.patient_to_compare.full_name }}
                        </template>
                    </h3>
                </v-col>
                <v-col cols="12"
                    v-if="comparison.history.patient_to_compare !== undefined && comparison.history.patient_to_compare.history_content !== undefined">
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/hta'); ?>
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/dtm2'); ?>
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/pre_dtm2'); ?>
                    <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/dyslipidemia'); ?>
                    <v-row>
                        <v-col class="factor-risk-container px-4 py-4" cols="5">
                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                                descompensación de la PA - Emergencia hipertensiva</h5>
                            <template
                                v-if="comparison.history.patient_to_compare.history_content.emergency_hta_history">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </v-col>
                        <v-col cols="2"></v-col>
                        <v-col class="factor-risk-container px-4 py-4" cols="5">
                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                                descompensación de la Diabetes <br><br></h5>
                            <template
                                v-if="comparison.history.patient_to_compare.history_content.emergency_diabetes_history">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Antecedentes de Enfermedades Cardiovasculares
                            </h3>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/cardiovascular_diseases/ischemic_cardiopathy') ?>
                        </v-col>
                        <v-col class="pr-6 pl-3 col col-8" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/cardiovascular_diseases/arritmia') ?>
                        </v-col>

                    </v-row>

                    <v-row>
                        <v-col class="pr-6" cols="12" md="6">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/cardiovascular_diseases/heart_failure') ?>
                        </v-col>

                        <v-col class="pl-6" cols="12" md="6">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/cardiovascular_diseases/peripheral_artery') ?>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" md="6" offset-md="3">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/cardiovascular_diseases/cronic_kidney_disease') ?>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Tratamientos</h3>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/treatments/polipildora') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/treatments/hta') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/treatments/dtm2') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/treatments/antithrombotics') ?>
                        </v-col>
                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_comparison_tabs/history_parts/patient_to_compare/treatments/dyslipidemia') ?>
                        </v-col>
                    </v-row>

                </v-col>
                <v-col cols="12" v-else>
                    <p class="text-center">No se encontró información</p>
                </v-col>
            </v-row>
        </v-col>
    </v-row>

</template>