<template v-if="viewPatientsComparisonDialog">
    <v-row class="d-flex justify-center full-width">
        
        <template v-if="comparison.echocardiogram.loading">
            <?= new Template('patients-management/view_comparison_tabs/partials/loader') ?>
        </template>
        <template v-else>
            <v-col cols="6">
                <?= new Template(
                'patients-management/view_comparison_tabs/echocardiogram/layout', 
                    [
                        'patient_to_compare' => 'false',
                        'item' => 'current_patient'
                    ]
                )?>
            </v-col>
            <v-col cols="6">
                <?= new Template(
                'patients-management/view_comparison_tabs/echocardiogram/layout', 
                    [
                        'patient_to_compare' => 'true',
                        'item' => 'patient_to_compare'
                    ]
                )?>
            </v-col>
        </template>

    </v-row>
</template>