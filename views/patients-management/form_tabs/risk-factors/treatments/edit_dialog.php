<v-dialog v-model="patient_risk_factors.rf.treatment_dialog" max-width="98%">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Tratamientos de {{ patient_risk_factors.rf.treatment_selected.name }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="patient_risk_factors.rf.treatment_dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <template v-if="patient_risk_factors.rf.treatment_selected.name != ''">
                    <template v-if="patient_risk_factors.rf.treatment_selected.name == 'HTA'">
                        <?php echo new Template('patients-management/form_tabs/history-parts/treatments/hta') ?>
                    </template>
                    <template v-if="patient_risk_factors.rf.treatment_selected.name == 'Dislipidemia'">
                        <?php echo new Template('patients-management/form_tabs/history-parts/treatments/dyslipidemia') ?>
                    </template>
                    <template v-if="patient_risk_factors.rf.treatment_selected.name == 'DMt2'">
                        <?php echo new Template('patients-management/form_tabs/history-parts/treatments/dtm2') ?>
                    </template>
                    <v-col cols="12">
                        <v-btn color="secondary white--text" block @click="saveHistory(false)"
                            :loading="patient_history.loading">
                            Guardar
                        </v-btn>
                    </v-col>
                </template>

            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>