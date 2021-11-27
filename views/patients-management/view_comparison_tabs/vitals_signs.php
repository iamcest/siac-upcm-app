<v-row class="full-width px-4">
    <v-col cols="6" id="vital_signs_cp">
        <?= new Template(
                    'patients-management/view_comparison_tabs/vital_signs/layout', 
                    [
                        'patient_to_compare' => 'false',
                        'item' => 'current_patient'
                    ]
                )?>
    </v-col>
    <v-col cols="6" id="vital_signs_ptc">
        <?= new Template(
                    'patients-management/view_comparison_tabs/vital_signs/layout', 
                    [
                        'patient_to_compare' => 'true',
                        'item' => 'patient_to_compare'
                    ]
                )?>
    </v-col>
</v-row>