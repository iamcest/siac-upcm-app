<template>
    <v-row class="d-flex justify-center full-width">
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
    </v-row>
</template>