<v-row class="px-4" v-if="comparison.physical_exams.<?= $item ?>.hasOwnProperty('content')">
    <v-col class="mb-n10" cols="12">
        <v-row>
            <v-col cols="2">
                <h4 class="text-h6 black--text">Aspecto General</h4>
            </v-col>
            <v-col cols="6">
                {{ comparison.physical_exams.<?= $item ?>.content.general_aspect }}
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <?= new Template('patients-management/view_comparison_tabs/physical-exam/partials/pvy', $data) ?>
    <?= new Template('patients-management/view_comparison_tabs/physical-exam/partials/carotid-beats', $data) ?>
    <?= new Template('patients-management/view_comparison_tabs/physical-exam/partials/apex', $data) ?>
    <?= new Template('patients-management/view_comparison_tabs/physical-exam/partials/auscultation', $data) ?>
    <?= new Template('patients-management/view_comparison_tabs/physical-exam/partials/peripheral-pulses', $data) ?>
    <?= new Template('patients-management/view_comparison_tabs/physical-exam/partials/edema', $data) ?>
    <?= new Template('patients-management/view_comparison_tabs/physical-exam/partials/ankle-arm-index', $data) ?>

</v-row>
<v-row v-else>

    <v-col cols="12">
        <p class="text-center">No se encontró información</p>
    </v-col>

</v-row>