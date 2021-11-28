<v-dialog v-model="comparison.diagnostics.treatment_view_dialog" max-width="98%">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Tratamientos de {{ comparison.diagnostics.treatment_selected.name }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="comparison.diagnostics.treatment_view_dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-row>
                    <template v-if="comparison.diagnostics.treatment_selected.name != ''">

                        <template
                            v-if="comparison.diagnostics.treatment_selected.name == 'HTA' || comparison.diagnostics.treatment_selected.name == 'Insuficiencia Cardíaca'">
                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_selected.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antihypertensives', 
                                    [
                                        'item' => 'current_patient',
                                        'patient_to_compare' => 'false'
                                    ]
                                ) ?>
                            </v-col>

                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_to_compare.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antihypertensives', 
                                    [
                                        'item' => 'patient_to_compare',
                                        'patient_to_compare' => 'true'
                                    ]
                                ) ?>
                            </v-col>
                        </template>
                        <template v-else-if="comparison.diagnostics.treatment_selected.name == 'Dislipidemia'">
                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_selected.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/hypolipidemic', 
                                    [
                                        'item' => 'current_patient',
                                        'patient_to_compare' => 'false'
                                    ]
                                ) ?>
                            </v-col>

                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_to_compare.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/hypolipidemic', 
                                    [
                                        'item' => 'patient_to_compare',
                                        'patient_to_compare' => 'true'
                                    ]
                                ) ?>
                            </v-col>
                        </template>
                        <template v-else-if="comparison.diagnostics.treatment_selected.name == 'DMt2'">
                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_selected.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antidiabetics', 
                                    [
                                        'item' => 'current_patient',
                                        'patient_to_compare' => 'false'
                                    ]
                                ) ?>
                            </v-col>

                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_to_compare.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antidiabetics', 
                                    [
                                        'item' => 'patient_to_compare',
                                        'patient_to_compare' => 'true'
                                    ]
                                ) ?>
                            </v-col>
                        </template>
                        <template v-else-if="comparison.diagnostics.treatment_selected.name == 'Pre DMt2'">
                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_selected.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/pre-dtm2', 
                                    [
                                        'item' => 'current_patient',
                                        'patient_to_compare' => 'false'
                                    ]
                                ) ?>
                            </v-col>

                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_to_compare.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/pre-dtm2', 
                                    [
                                        'item' => 'patient_to_compare',
                                        'patient_to_compare' => 'true'
                                    ]
                                ) ?>
                            </v-col>
                        </template>
                        <template v-else-if="comparison.diagnostics.treatment_selected.name == 'Cardiopatía Isquémica'">
                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_selected.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antithrombotics', 
                                    [
                                        'item' => 'current_patient',
                                        'patient_to_compare' => 'false'
                                    ]
                                ) ?>
                            </v-col>

                            <v-col cols="6">
                                <h4 class="text-h5 text-center"><b>Paciente:</b>
                                    {{ comparison.patient_to_compare.full_name }}
                                </h4>
                                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antithrombotics', 
                                    [
                                        'item' => 'patient_to_compare',
                                        'patient_to_compare' => 'true'
                                    ]
                                ) ?>
                            </v-col>
                        </template>

                    </template>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>