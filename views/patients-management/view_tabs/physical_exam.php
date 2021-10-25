<?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
    <v-col class="d-flex justify-end" cols="12">
    <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-6'" dark>
        Editar</v-btn>
</v-col>
<?php endif ?>
<v-row class="factor-risk-container">
    <v-col class="mb-n10" cols="12">
        <v-row>
            <v-col cols="2">
                <h4 class="text-h6 black--text">Aspecto General</h4>
            </v-col>
            <v-col cols="6">
                {{ patient_physical_exam.content.general_aspect }}
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <?php echo new Template('patients-management/view_tabs/physical-exam/pvy') ?>
    <?php echo new Template('patients-management/view_tabs/physical-exam/carotid-beats') ?>
    <?php echo new Template('patients-management/view_tabs/physical-exam/apex') ?>
    <?php echo new Template('patients-management/view_tabs/physical-exam/auscultation') ?>
    <?php echo new Template('patients-management/view_tabs/physical-exam/peripheral-pulses') ?>
    <?php echo new Template('patients-management/view_tabs/physical-exam/edema') ?>
    <?php echo new Template('patients-management/view_tabs/physical-exam/ankle-arm-index') ?>

</v-row>