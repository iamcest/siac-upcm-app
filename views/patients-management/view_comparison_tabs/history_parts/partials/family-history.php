<v-col cols="12" v-if="comparison.history.<?php echo $item ?>.history_content.family_history.length > 0">
    <v-row>
        <v-col cols="12" class="px-0">
            <h3 class="text-h5 black--text">
                Antecedentes familiares
            </h3>
        </v-col>
        <?php echo new Template('patients-management/view_comparison_tabs/history_parts/partials/family-history/family', [
                'item' => $item,
                'patient_to_compare' => $patient_to_compare
            ]
        ) ?>
    </v-row>
</v-col>