<v-dialog v-model="viewPatientsStatisticsDialog" max-width="1400px">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Estadísticas de la UPCM</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="viewPatientsStatisticsDialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <?php echo new Template('patients-management/statistics/parts/patients_entries') ?>
                <?php echo new Template('patients-management/statistics/parts/general') ?>
                <?php echo new Template('patients-management/statistics/parts/anthropometry') ?>
                <?php echo new Template('patients-management/statistics/parts/diseases') ?>
                <?php echo new Template('patients-management/statistics/parts/laboratory_exams') ?>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>