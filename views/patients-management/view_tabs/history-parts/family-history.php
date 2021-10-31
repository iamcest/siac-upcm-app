<v-col cols="12" v-if="patient_history.form.history_content.family_history.length > 0">
    <v-row>
        <v-col cols="12" class="px-0">
            <h3 class="text-h5 black--text">
                Antecedentes familiares
            </h3>
        </v-col>
        <?php echo new Template('patients-management/view_tabs/history-parts/family-history/family') ?>
    </v-row>
</v-col>