    <v-row class="full-width px-4">
        <template
            v-if="viewPatientsComparisonDialog && comparison.anthropometry.current_patient.hasOwnProperty('patient_id')">

            <v-col cols="6" id="anthropometry_cp">
                <?= new Template(
                    'patients-management/view_comparison_tabs/anthropometry/layout', 
                    [
                        'patient_to_compare' => 'false',
                        'item' => 'current_patient'
                    ]
                )?>
            </v-col>
            <v-col cols="6" id="anthropometry_ptc">
                <?= new Template(
                    'patients-management/view_comparison_tabs/anthropometry/layout', 
                    [
                        'patient_to_compare' => 'true',
                        'item' => 'patient_to_compare'
                    ]
                )?>
            </v-col>
        </template>
    </v-row>