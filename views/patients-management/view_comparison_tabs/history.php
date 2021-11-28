<template v-if="viewPatientsComparisonDialog">
    <v-row class="full-width">
        
        <template v-if="comparison.history.loading">
            <?= new Template('patients-management/view_comparison_tabs/partials/loader') ?>
        </template>
        <template v-else>
            <v-col class="px-4" cols="6">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/layout', 
                    [
                        'item' => 'current_patient',
                        'patient_to_compare' => 'false'
                    ]
                ) ?>
            </v-col>

            <v-col class="px-4" cols="6">
                <?= new Template('patients-management/view_comparison_tabs/history_parts/layout', 
                    [
                        'item' => 'patient_to_compare',
                        'patient_to_compare' => 'true'
                    ]
                ) ?>
            </v-col>
        </template>

    </v-row>

</template>