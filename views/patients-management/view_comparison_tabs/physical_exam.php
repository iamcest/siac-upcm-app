<template v-if="viewPatientsComparisonDialog && comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{  comparison.patient_selected.full_name }}
        </h4>
    </v-col>
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{  comparison.patient_to_compare.full_name }}
        </h4>
    </v-col>
    <v-col cols="6" id="physical_exam_cp">
        <v-row class="factor-risk-container">

            <?= new Template(
                'patients-management/view_comparison_tabs/physical-exam/layout', [
                        'item' => 'current_patient',
                        'patient_to_compare' => 'false'
                    ]
                ) 
            ?>

        </v-row>
    </v-col>

    <v-col cols="6" id="physical_exam_ptc">
        <v-row class="factor-risk-container">
            
            <?= new Template(
                'patients-management/view_comparison_tabs/physical-exam/layout', [
                        'item' => 'patient_to_compare',
                        'patient_to_compare' => 'true'
                    ]
                ) 
            ?>

        </v-row>
    </v-col>
</template>