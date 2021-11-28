<v-row class="full-width">
    <?= new Template('patients-management/view_comparison_tabs/risk-factors/partials/treatments/view_dialog') ?>
    <v-col cols="6">
        <?= new Template(
            'patients-management/view_comparison_tabs/risk-factors/layout', [
                    'item' => 'current_patient',
                    'patient_to_compare' => 'false'
                ]
            ) 
        ?>
    </v-col>

    <v-col cols="6">
        <?= new Template(
            'patients-management/view_comparison_tabs/risk-factors/layout', [
                    'item' => 'patient_to_compare',
                    'patient_to_compare' => 'true'
                ]
            ) 
        ?>
    </v-col>
</v-row>