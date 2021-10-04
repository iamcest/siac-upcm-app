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
                                        <v-dialog v-model="dialog" max-width="98%"
                                            @click:outside="patient_vital_signs.show_results = false; resetPatientInformation()">
                                            <v-card>
                                                <v-toolbar elevation="0">
                                                    <v-toolbar-title>{{ formTitle }}</v-toolbar-title>
                                                    <v-spacer></v-spacer>
                                                    <v-toolbar-items>
                                                        <v-btn icon dark @click="dialog = false">
                                                            <v-icon color="grey">mdi-close</v-icon>
                                                        </v-btn>
                                                    </v-toolbar-items>
                                                </v-toolbar>

                                                <v-divider></v-divider>

                                                <v-card-text>
                                                    <v-container fluid>
                                                        <v-row v-if="patient_appointments.appointments.length > 0">
                                                            <v-col class="d-flex justify-start" cols="4">
                                                                Cita de seguimiento seleccionada:
                                                                {{ patient_appointments.current_appointment.appointment_reason + ' ' + patient_appointments.current_appointment.appointment_date }}
                                                            </v-col>
                                                            <v-col class="d-flex justify-end" col="8"
                                                                v-if="editedIndex != -1">
                                                                <v-btn-toggle active-class="top-patient-buttons">
                                                                    <v-btn color="secondary"
                                                                        @click="ComparisonPatientsDialog = true">
                                                                        Comparar pacientes</v-btn>
                                                                    <?php if (!empty($can_manage_suite)
                                                                    || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])
                                                                    ): ?>
                                                                    <v-btn color="primary"
                                                                        @click="recipe_reports_dialog = true;initializeRecipes();initializeReports();initializeFactorsRisk(false);">
                                                                        Informes y Récipes</v-btn>
                                                                    <v-btn color="info"
                                                                        @click="FollowUpAppointmentsDialog = true"
                                                                        light>Seguimiento</v-btn>
                                                                    <?php endif ?>
                                                                </v-btn-toggle>
                                                            </v-col>
                                                        </v-row>
                                                        <v-row class="d-flex justify-center">
                                                            <v-form>
                                                                <v-avatar class="uploading-image d-block"
                                                                    v-if="editedItem.avatar != null && !upload_button"
                                                                    size="7vw">
                                                                    <img
                                                                        :src="'<?php echo SITE_URL ?>/public/img/avatars/' + editedItem.avatar">
                                                                </v-avatar>
                                                                <v-col class="d-flex justify-center"
                                                                    v-if="editedItem.avatar == null" cols="12">
                                                                    <v-icon class="avatar-image">
                                                                        mdi-account-circle</v-icon>
                                                                </v-col>
                                                                <v-avatar class="uploading-image d-block"
                                                                    v-if="upload_button" size="7vw">
                                                                    <img :src="previewImage">
                                                                    <img :src="editedItem.avatar">
                                                                </v-avatar>
                                                                <v-row class="d-flex justify-center">
                                                                    <label for="avatar">
                                                                        <p class="text-center cursor-pointer mt-2">
                                                                            <v-icon color="#00BFA5">mdi-upload
                                                                            </v-icon>
                                                                            Subir foto de perfil
                                                                        </p>
                                                                        <input type="file" name="avatar" id="avatar"
                                                                            class="d-none" accept="image/*"
                                                                            v-on:change="prevImage" />
                                                                    </label>
                                                                </v-row>
                                                                <v-row class="d-flex justify-center mt-1 mb-2"
                                                                    v-if="upload_button">
                                                                    <v-btn class="primary white--text"
                                                                        v-on:click="uploadImage"
                                                                        :loading="image_loading" d-block>Subir
                                                                    </v-btn>
                                                                </v-row>
                                                            </v-form>
                                                        </v-row>
                                                        <v-row v-if="editedIndex === -1">
                                                            <?php echo new Template('patients-management/forms/new_patient') ?>
                                                        </v-row>
                                                        <v-row v-else>
                                                            <?php echo new Template(
                                                                'patients-management/forms/edit_patient', 
                                                                ['tabs' => Template::patient_tabs(), 'access' => $access]
                                                            ) ?>
                                                        </v-row>
                                                    </v-container>
                                                </v-card-text>

                                        </v-dialog>
                                        <v-dialog v-model="view_dialog" max-width="98%"
                                            @click:outside="resetPatientInformation()">
                                            <v-card>
                                                <v-toolbar elevation="0">
                                                    <v-toolbar-title>Ficha del paciente</v-toolbar-title>
                                                    <v-spacer></v-spacer>
                                                    <v-toolbar-items>
                                                        <v-btn icon dark
                                                            @click="closeView();resetPatientInformation();">
                                                            <v-icon color="grey">mdi-close</v-icon>
                                                        </v-btn>
                                                    </v-toolbar-items>
                                                </v-toolbar>

                                                <v-divider></v-divider>

                                                <v-card-text>
                                                    <v-container fluid>
                                                        <v-row v-if="patient_appointments.appointments.length > 0">
                                                            <v-col class="d-flex justify-start" cols="4">
                                                                Cita de seguimiento seleccionada:
                                                                {{ patient_appointments.current_appointment.appointment_reason + ' ' + patient_appointments.current_appointment.appointment_date }}
                                                            </v-col>
                                                            <v-col class="d-flex justify-end" col="12">
                                                                <v-btn-toggle>
                                                                    <v-btn color="secondary"
                                                                        @click="ComparisonPatientsDialog = true">
                                                                        Comparar pacientes</v-btn>
                                                                    <?php if (!empty($can_manage_suite)
                                                                    || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])
                                                                    ): ?>
                                                                    <v-btn color="primary"
                                                                        @click="recipe_reports_dialog = true;initializeRecipes();initializeFactorsRisk(false);">
                                                                        Informes y Récipes</v-btn>
                                                                    <v-btn color="info"
                                                                        @click="FollowUpAppointmentsDialog = true"
                                                                        light>Seguimiento</v-btn>
                                                                    <?php endif?>
                                                                </v-btn-toggle>
                                                            </v-col>
                                                        </v-row>
                                                        <v-row>
                                                            <v-col class="d-flex justify-center" cols="12">
                                                                <v-icon class="avatar-image">mdi-account-circle
                                                                </v-icon>
                                                            </v-col>
                                                            <v-col class="mt-n5" cols="12">
                                                                <h5 class="text-center black--text text-h6">
                                                                    {{ editedItem.first_name }}
                                                                    {{ editedItem.last_name }}</h5>
                                                            </v-col>
                                                        </v-row>
                                                        <v-row>
                                                            <?php echo new Template(
                                                                'patients-management/forms/view_patient', 
                                                                ['tabs' => Template::patient_tabs(), 'access' => $access]
                                                            ) ?>
                                                        </v-row>
                                                    </v-container>
                                                </v-card-text>
                                            </v-card>
                                        </v-dialog>
                                        <v-dialog v-model="dialogDelete" max-width="1200px">
                                            <v-card>
                                                <v-card-title class="headline">Estás seguro de que quieres
                                                    eliminar este paciente?</v-card-title>
                                                <v-card-actions>
                                                    <v-spacer></v-spacer>
                                                    <v-btn color="blue darken-1" text @click="closeDelete">
                                                        Cancelar</v-btn>
                                                    <v-btn color="blue darken-1" text @click="deleteItemConfirm">
                                                        Continuar</v-btn>
                                                    <v-spacer></v-spacer>
                                                </v-card-actions>
                                            </v-card>
                                        </v-dialog>
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