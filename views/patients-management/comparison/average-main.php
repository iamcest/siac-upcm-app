<v-dialog v-model="viewPatientsAverageComparisonDialog">
    <v-card v-if="viewPatientsAverageComparisonDialog">
        <v-toolbar elevation="0">
            <v-toolbar-title>Comparación entre pacientes</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="viewPatientsAverageComparisonDialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-row v-if="comparison.external_loading">
                    <v-col class="d-flex justify-center" col="12">
                        <img src="<?php echo SITE_URL ?>/views/assets/animations/loader.svg" width="6%">
                    </v-col>
                </v-row>
                <v-row v-else>
                    <?php echo new Template('patients-management/forms/comparison_patient', Template::patient_tabs()) ?>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>