<v-col class="full-width px-0" cols="12">
    <v-row>
        <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
        <v-col class="d-flex justify-end" cols="12">
            <v-btn color="#00BFA5"
                @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-3'" dark>Editar
            </v-btn>
        </v-col>
        <?php endif ?>
        <v-col cols="12">
            <?php echo new Template('patients-management/view_tabs/history-parts/hta'); ?>
            <?php echo new Template('patients-management/view_tabs/history-parts/dtm2'); ?>
            <?php echo new Template('patients-management/view_tabs/history-parts/pre-dtm2'); ?>
            <?php echo new Template('patients-management/view_tabs/history-parts/dyslipidemia'); ?>
            <?php echo new Template('patients-management/view_tabs/history-parts/family-history'); ?>
            <v-row>
                <v-col class="py-4 pr-0 pr-md-3 pl-0" cols="12" md="6">
                    <v-card class="px-4 py-6">
                        <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez
                            hospitalizado por descompensación de la PA - Emergencia hipertensiva</h5>
                        <template v-if="patient_history.form.history_content.emergency_hta_history">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </v-card>
                </v-col>
                <v-col class="py-4 pl-0 pl-md-3 pr-0" cols="12" md="6">
                    <v-card class="px-4 py-6">
                        <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez
                            hospitalizado por descompensación de la Diabetes</h5>
                        <template v-if="patient_history.form.history_content.emergency_diabetes_history">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </v-card>
                </v-col>
            </v-row>

            <v-row class="my-8">
                <v-card width="100%" elevation="20">
                    <v-row>
                        <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Antecedentes de Enfermedades
                                Cardiovasculares</h3>
                        </v-col>

                        <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/view_tabs/history-parts/cardiovascular-diseases/ischemic-cardiopathy') ?>
                        </v-col>

                        <v-col class="pr-6 pl-3 col col-8" cols="12">
                            <?php echo new Template('patients-management/view_tabs/history-parts/cardiovascular-diseases/arritmia') ?>
                        </v-col>

                        <v-col cols="12" md="6">
                            <?php echo new Template('patients-management/view_tabs/history-parts/cardiovascular-diseases/heart-failure') ?>
                        </v-col>

                        <v-col cols="12" md="6">
                            <?php echo new Template('patients-management/view_tabs/history-parts/cardiovascular-diseases/peripheral-artery') ?>
                        </v-col>
                    </v-row>
                </v-card>
            </v-row>

            <v-row>
                <v-col class="pr-md-6 px-1" cols="12" md="6">
                    <?php echo new Template('patients-management/view_tabs/history-parts/cronic-kidney-disease') ?>
                </v-col>

                <v-col class="pl-md-6 px-1" cols="12" md="6">
                    <?php echo new Template('patients-management/view_tabs/history-parts/cerebrovascular-disease') ?>
                </v-col>
            </v-row>

            <v-row>
                <v-col class="mt-6" cols="12">
                    <h3 class="text-h5 text-center black--text">Tratamientos</h3>
                </v-col>
                <v-col class="pr-6" cols="12" md="6" offset-md="3">
                    <?php echo new Template('patients-management/view_tabs/history-parts/treatments/polipildora') ?>
                </v-col>
                <v-col class="pr-6" cols="12">
                    <?php echo new Template('patients-management/view_tabs/history-parts/treatments/hta') ?>
                </v-col>
                <v-col class="pr-6" cols="12">
                    <?php echo new Template('patients-management/view_tabs/history-parts/treatments/dtm2') ?>
                </v-col>
                <v-col class="pr-6" cols="12">
                    <?php echo new Template('patients-management/view_tabs/history-parts/treatments/antithrombotics') ?>
                </v-col>
                <v-col class="pr-6" cols="12">
                    <?php echo new Template('patients-management/view_tabs/history-parts/treatments/dyslipidemia') ?>
                </v-col>
            </v-row>

    </v-row>
</v-col>