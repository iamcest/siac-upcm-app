<v-row>
    <v-col cols="12">
        <h3 class="text-center text-h5 mb-4">
            <!-- 
                <template v-if="viewPatientsAverageComparisonDialog">
                    Pacientes de la Unidad
                </template>

                <template v-else>
                    Paciente:
                    {{ comparison.patient_selected.full_name }}
                </template>
            -->
            Paciente:
            {{ comparison.<?= $item == 'current_patient' ? 'patient_selected' : $item ?>.full_name }}
        </h3>
    </v-col>
    <v-col cols="12"
        v-if="comparison.history.<?= $item ?> !== undefined && comparison.history.<?= $item ?>.history_content !== undefined">
        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/hta', [
                'item' => $item,
                'patient_to_compare' => $patient_to_compare
            ]
        ) ?>
        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/dtm2', [
                'item' => $item,
                'patient_to_compare' => $patient_to_compare
            ]
        )  ?>
        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/pre-dtm2', [
                'item' => $item,
                'patient_to_compare' => $patient_to_compare
            ]
        )  ?>
        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/dyslipidemia', [
                'item' => $item,
                'patient_to_compare' => $patient_to_compare
            ]
        )  ?>
        <v-row>
            <v-col class="factor-risk-container px-4 py-4" cols="5">
                <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                    descompensación de la PA - Emergencia hipertensiva</h5>
                <template v-if="comparison.history.<?= $item ?>.history_content.emergency_hta_history">
                    Sí
                </template>
                <template v-else>
                    No
                </template>
            </v-col>
            <v-col cols="2"></v-col>
            <v-col class="factor-risk-container px-4 py-4" cols="5">
                <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                    descompensación de la Diabetes</h5>
                <template v-if="comparison.history.<?= $item ?>.history_content.emergency_diabetes_history">
                    Sí
                </template>
                <template v-else>
                    No
                </template>
            </v-col>
        </v-row>
        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/family-history', [
                'item' => $item,
                'patient_to_compare' => $patient_to_compare
            ]
        ) ?>
        <v-row class="my-8">
            <v-card width="100%" elevation="20">
                <v-row>
                    <v-col class="mt-6" cols="12">
                        <h3 class="text-h5 text-center black--text">Antecedentes de Enfermedades
                            Cardiovasculares</h3>
                    </v-col>

                    <v-col class="pr-6" cols="12">
                        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/cardiovascular-diseases/ischemic-cardiopathy', [
                                'item' => $item,
                                'patient_to_compare' => $patient_to_compare
                            ]
                        ) ?>
                    </v-col>

                    <v-col class="pr-6 pl-3 col col-8" cols="12">
                        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/cardiovascular-diseases/arritmia', [
                                'item' => $item,
                                'patient_to_compare' => $patient_to_compare
                            ]
                        ) ?>
                    </v-col>

                    <v-col cols="12" md="6">
                        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/cardiovascular-diseases/heart-failure', [
                                'item' => $item,
                                'patient_to_compare' => $patient_to_compare
                            ]
                        ) ?>
                    </v-col>

                    <v-col cols="12" md="6">
                        <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/cardiovascular-diseases/peripheral-artery', [
                                'item' => $item,
                                'patient_to_compare' => $patient_to_compare
                            ]
                        ) ?>
                    </v-col>
                </v-row>
            </v-card>
        </v-row>

        <v-row>
            <v-col class="pr-md-6 px-1" cols="12" md="6">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/cronic-kidney-disease', [
                        'item' => $item,
                        'patient_to_compare' => $patient_to_compare
                    ]
                ) ?>
            </v-col>

            <v-col class="pl-md-6 px-1" cols="12" md="6">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/cerebrovascular-disease', [
                        'item' => $item,
                        'patient_to_compare' => $patient_to_compare
                    ]
                ) ?>
            </v-col>
        </v-row>

        <v-row>
            <v-col class="mt-6" cols="12">
                <h3 class="text-h5 text-center black--text">Tratamientos</h3>
            </v-col>
            <v-col class="pr-6" cols="12">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/polipildora', [
                        'item' => $item,
                        'patient_to_compare' => $patient_to_compare
                    ]
                )  ?>
            </v-col>
            <v-col class="pr-6" cols="12">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antihypertensives', [
                        'item' => $item,
                        'patient_to_compare' => $patient_to_compare
                    ]
                )  ?>
            </v-col>
            <v-col class="pr-6" cols="12">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antidiabetics', [
                        'item' => $item,
                        'patient_to_compare' => $patient_to_compare
                    ]
                )  ?>
            </v-col>
            <v-col class="pr-6" cols="12">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/antithrombotics', [
                        'item' => $item,
                        'patient_to_compare' => $patient_to_compare
                    ]
                )  ?>
            </v-col>
            <v-col class="pr-6" cols="12">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/partials/treatments/hypolipidemic', [
                        'item' => $item,
                        'patient_to_compare' => $patient_to_compare
                    ]
                )  ?>
            </v-col>
        </v-row>

    </v-col>
    <v-col cols="12" v-else>
        <p class="text-center">No se encontró información</p>
    </v-col>
</v-row>