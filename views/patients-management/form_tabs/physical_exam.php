<v-row class="factor-risk-container">
    <v-col class="mb-n10" cols="12">
        <v-row>
            <v-col cols="2">
                <h4 class="text-h6 black--text">Aspecto General</h4>
            </v-col>
            <v-col cols="6">
                <v-select v-model="patient_physical_exam.content.general_aspect"
                    :items="patient_physical_exam.options.general_aspect" outlined dense></v-select>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <?php echo new Template('patients-management/form_tabs/physical-exam/pvy') ?>
    <?php echo new Template('patients-management/form_tabs/physical-exam/carotid-beats') ?>
    <?php echo new Template('patients-management/form_tabs/physical-exam/apex') ?>
    <?php echo new Template('patients-management/form_tabs/physical-exam/auscultation') ?>
    <?php echo new Template('patients-management/form_tabs/physical-exam/peripheral-pulses') ?>
    <?php echo new Template('patients-management/form_tabs/physical-exam/edema') ?>
    <?php echo new Template('patients-management/form_tabs/physical-exam/ankle-arm-index') ?>

</v-row>
<v-row>
    <v-col cols="12">
        <v-btn color="secondary white--text" @click="savePhysicalExam" :loading="patient_physical_exam.loading" block>
            Guardar
        </v-btn>
    </v-col>
</v-row>