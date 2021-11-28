<template v-if="viewPatientsComparisonDialog">
    <v-row class="full-width">
        
        <?= new Template('patients-management/view_comparison_tabs/risk-factors/partials/treatments/view_dialog') ?>

        <template v-if="comparison.diagnostics.loading">
            <?= new Template('patients-management/view_comparison_tabs/partials/loader') ?>
        </template>

        <template v-else>
            <v-col cols="6">
                <?= new Template(
                    'patients-management/view_comparison_tabs/risk-factors/layout', [
                            'item' => 'current_patient',
                            'patient_to_compare' => 'false'
                        ]
                )?>
            </v-col>

            <v-col cols="6">
                <?= new Template(
                    'patients-management/view_comparison_tabs/risk-factors/layout', [
                            'item' => 'patient_to_compare',
                            'patient_to_compare' => 'true'
                        ]
                )?>
            </v-col>
        </template>

    </v-row>
</template>