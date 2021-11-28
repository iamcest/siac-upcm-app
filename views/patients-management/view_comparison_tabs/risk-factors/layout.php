<v-row>
    <v-col cols="12">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{ comparison.<?= $item == 'current_patient' ? 'patient_selected' : $item ?>.full_name }}
        </h4>
    </v-col>

    <v-col cols="12">
        <?= new Template('patients-management/view_comparison_tabs/risk-factors/partials/diagnostics', $data) ?>
    </v-col>
    
    <v-col cols="12">
        <?= new Template('patients-management/view_comparison_tabs/risk-factors/partials/risk-factors', $data) ?>
    </v-col>
</v-row>