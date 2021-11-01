    <!-- START AFTER THIS-->
    <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid white>
            <v-row>
                <?php echo new Template('parts/sidebar', $data) ?>
                <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">

                    <?php echo new Template('parts/upcm_logo') ?>
                    <?php echo new Template('components/snackbar') ?>
                    <?php echo new Template('patients-management/form_tabs/new_appointment') ?>
                    <?php echo new Template('patients-management/recipes_and_reports/main') ?>
                    <?php echo new Template('patients-management/dialogs/follow-ups_appointments') ?>
                    <?php echo new Template('patients-management/dialogs/compare-patients') ?>
                    <?php echo new Template('patients-management/statistics/main') ?>
                    <?php /* echo new Template('patients-management/comparison/main') */?>
                    <?php /* echo new Template('patients-management/comparison/average-main') */?>

                    <v-row>
                        <v-col cols="12" md="12">
                            <h2 class="grey--text text--darken-1">Pacientes</h2>
                        </v-col>
                    </v-row>
                    <v-row class="mt-6">
                        <v-col cols="12">
                            <v-data-table :headers="headers" :items="patients" :search="patients_search"
                                sort-by="full_name" class="elevation-1">

                                <template #top>
                                    <v-row>
                                        <v-col cols="12" md="4" lg="6" xl="8">
                                            <v-text-field class="mx-4 v-normal-input" label="Buscar paciente"
                                                v-model="patients_search" append-icon="mdi-magnify" clearable outlined
                                                single-line hide-details></v-text-field>
                                        </v-col>
                                        <v-col cols="12" md="6" lg="6" xl="4">
                                            <v-toolbar class="d-flex justify-center" flat>
                                                <v-btn class="mr-1" color="primary"
                                                    @click="viewPatientsStatisticsDialog = true; initializeBasicStatistics();"
                                                    v-if="patients.length > 0" dark rounded>
                                                    <v-icon>mdi-poll</v-icon>
                                                    Estádisticas Básicas
                                                </v-btn>
                                                <v-btn class="mr-1" color="primary"
                                                    @click="viewPatientsAverageComparisonDialog = true"
                                                    v-if="patients.length > 0 && 1 == 2" dark rounded>
                                                    <v-icon>mdi-plus</v-icon>
                                                    Comparar pacientes
                                                </v-btn>
                                                <?php if (!empty($can_manage_suite)
                                                    || !empty($access['patient_management_access']['sections'][0]['permissions']['create'])
                                                ): ?>
                                                <v-btn color="secondary"
                                                    @click="dialog = true;editedItem = Object.assign({}, defaultItem); general_save = true; patient_vital_signs.show_results = false"
                                                    dark rounded>
                                                    <v-icon>mdi-plus</v-icon>
                                                    Añadir paciente
                                                </v-btn>
                                                <?php endif ?>
                                            </v-toolbar>
                                        </v-col>

                                        <?php echo new Template('patients-management/dialogs/edit', $data) ?>
                                        <?php echo new Template('patients-management/dialogs/view', $data) ?>
                                        <?php echo new Template('patients-management/dialogs/delete') ?>

                                    </v-row>

                                </template>
                                <template #item.actions="{ item }">
                                    <v-row justify="center" align="center">
                                        <v-icon md @click="showItem(item);initializeAppointments()" color="primary">
                                            mdi-eye
                                        </v-icon>
                                        <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][1]['permissions']['update']) ) : ?>
                                        <v-icon md @click="openExternalAppointmentForm(item)" color="#00BFA5">
                                            mdi-calendar-plus
                                        </v-icon>
                                        <?php endif?>
                                        <?php if (!empty($can_manage_suite)
                                        || !empty($access['patient_management_access']['sections'][1]['permissions']['update'])
                                        || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])
                                        ): ?>
                                        <v-icon md @click="editItem(item); tab = 'tab-1';initializeAppointments()"
                                            color="#00BFA5">
                                            mdi-pencil
                                        </v-icon>
                                        <?php endif?>
                                        <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['delete'])): ?>
                                        <v-icon md @click="deleteItem(item)" color="#F44336">
                                            mdi-delete
                                        </v-icon>
                                        <?php endif ?>
                                    </v-row>

                                </template>
                                <template #no-data>
                                    <v-btn color="primary" @click="initialize">
                                        Recargar
                                    </v-btn>
                                </template>
                            </v-data-table>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </v-main>