<template
    v-if="viewPatientsComparisonDialog && comparison.electro_cardiogram.current_patient.hasOwnProperty('content')">
    <v-col class="px-4" cols="6" id="electro_cardiogram_cp">
        <?= new Template('patients-management/view_comparison_tabs/electro-cardiogram/layout', 
            [
                'item' => 'current_patient',
                'patient_to_compare' => 'false'
            ]
        ) ?>
    </v-col>
    <v-col class="px-4" cols="6" id="electro_cardiogram_ptc">
        <?= new Template('patients-management/view_comparison_tabs/electro-cardiogram/layout', 
            [
                'item' => 'patient_to_compare',
                'patient_to_compare' => 'true'
            ]
        ) ?>
    </v-col>
</template>