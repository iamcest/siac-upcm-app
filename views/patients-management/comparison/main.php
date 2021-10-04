<v-dialog v-model="viewPatientsComparisonDialog">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Comparación entre pacientes</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="viewPatientsComparisonDialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-row v-if="patient_appointments.appointments.length > 0">
                    <v-col class="d-flex justify-end" col="12">
                        <v-btn-toggle>
                            <v-btn color="primary" @click="viewPatientsComparisonDialog = false; ComparisonPatientsDialog = true">Comparar otro</v-btn>
                        </v-btn-toggle>
                    </v-col>
                </v-row>
                <v-row>
                    <?php echo new Template('patients-management/forms/comparison_patient', Template::patient_tabs()) ?>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>