<v-col class="full-width px-0" cols="12">
    <v-row>
        <v-col cols="12">
            <?php echo new Template('patients-management/form_tabs/history-parts/hta'); ?>
            <?php echo new Template('patients-management/form_tabs/history-parts/dtm2'); ?>
            <?php echo new Template('patients-management/form_tabs/history-parts/pre-dtm2'); ?>
            <?php echo new Template('patients-management/form_tabs/history-parts/dyslipidemia'); ?>
            <v-row>
                <v-col class="py-4 pr-0 pr-md-3 pl-0" cols="12" md="6">
                    <v-card class="px-4">
                        <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                            descompensación de la PA - Emergencia hipertensiva</h5>
                        <v-select v-model="patient_history.form.history_content.emergency_hta_history"
                            :items="patient_history.select" class="mt-3" outlined>
                        </v-select>
                    </v-card>
                </v-col>
                <v-col class="py-4 pl-0 pl-md-3 pr-0" cols="12" md="6">
                    <v-card class="px-4">
                        <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por
                            descompensación de la Diabetes</h5>
                        <v-select v-model="patient_history.form.history_content.emergency_diabetes_history"
                            :items="patient_history.select" class="mt-3" outlined>
                        </v-select>
                    </v-card>
                </v-col>
            </v-row>
            <?php echo new Template('patients-management/form_tabs/history-parts/family-history'); ?>
            <v-row class="my-8">
                <v-card width="100%" elevation="20">
                    <v-row>
                        <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Antecedentes de Enfermedades Cardiovasculares
                            </h3>
                        </v-col>

                        <v-col cols="12">
                            <?php echo new Template('patients-management/form_tabs/history-parts/cardiovascular-diseases/ischemic-cardiopathy') ?>
                        </v-col>
                        <v-col cols="12">
                            <?php echo new Template('patients-management/form_tabs/history-parts/cardiovascular-diseases/arritmia') ?>
                        </v-col>

                        <v-col cols="12" md="6">
                            <?php echo new Template('patients-management/form_tabs/history-parts/cardiovascular-diseases/heart-failure') ?>
                        </v-col>

                        <v-col cols="12" md="6">
                            <?php echo new Template('patients-management/form_tabs/history-parts/cardiovascular-diseases/peripheral-artery') ?>
                        </v-col>
                    </v-row>
                </v-card>
            </v-row>

            <v-row>
                <v-col class="pr-md-6 px-1" cols="12" md="6">
                    <?php echo new Template('patients-management/form_tabs/history-parts/cronic-kidney-disease') ?>
                </v-col>
                <v-col class="pl-md-6 px-1" cols="12" md="6">
                    <?php echo new Template('patients-management/form_tabs/history-parts/cerebrovascular-disease') ?>
                </v-col>
            </v-row>

            <v-row>
                <v-col class="mt-6" cols="12">
                    <h3 class="text-h5 text-center black--text">Tratamientos</h3>
                </v-col>
                <v-col class="px-0" cols="12" md="6" offset-md="3">
                    <?php echo new Template('patients-management/form_tabs/history-parts/treatments/polipildora') ?>
                </v-col>
                <v-col class="px-0" cols="12">
                    <?php echo new Template('patients-management/form_tabs/history-parts/treatments/hta') ?>
                </v-col>
                <v-col class="px-0" cols="12">
                    <?php echo new Template('patients-management/form_tabs/history-parts/treatments/dtm2') ?>
                </v-col>
                <v-col class="px-0" cols="12">
                    <?php echo new Template('patients-management/form_tabs/history-parts/treatments/antithrombotics') ?>
                </v-col>
                <v-col class="px-0" cols="12">
                    <?php echo new Template('patients-management/form_tabs/history-parts/treatments/dyslipidemia') ?>
                </v-col>
            </v-row>

            <v-col cols="12">
                <v-btn color="secondary white--text" block @click="saveHistory" :loading="patient_history.loading">
                    Guardar
                </v-btn>
            </v-col>
    </v-row>
</v-col>