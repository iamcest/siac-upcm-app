<v-dialog v-model="dialog" max-width="98%"
    @click:outside="patient_vital_signs.show_results = false; resetPatientInformation()">
    
    <v-card v-if="dialog">
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
                    <v-col class="d-flex justify-end" col="8" v-if="editedIndex != -1">
                        <v-btn-toggle active-class="top-patient-buttons">
                            <v-btn color="secondary" @click="ComparisonPatientsDialog = true">
                                Comparar pacientes</v-btn>
                            <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])) : ?>
                            <v-btn color="primary"
                                @click="recipe_reports_dialog = true;initializeRecipes();initializeReports();initializeFactorsRisk(false);">
                                Informes y Récipes</v-btn>
                            <v-btn color="info" @click="FollowUpAppointmentsDialog = true" light>Seguimiento</v-btn>
                            <?php endif ?>
                        </v-btn-toggle>
                    </v-col>
                </v-row>
                <v-row class="d-flex justify-center">
                    <v-form>
                        <v-avatar class="uploading-image d-block" v-if="editedItem.avatar != null && !upload_button"
                            size="7vw">
                            <img :src="'<?php echo SITE_URL ?>/public/img/avatars/' + editedItem.avatar">
                        </v-avatar>
                        <v-col class="d-flex justify-center" v-if="editedItem.avatar == null" cols="12">
                            <v-icon class="avatar-image">
                                mdi-account-circle</v-icon>
                        </v-col>
                        <v-avatar class="uploading-image d-block" v-if="upload_button" size="7vw">
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
                                <input type="file" name="avatar" id="avatar" class="d-none" accept="image/*"
                                    @change="prevImage" />
                            </label>
                        </v-row>
                        <v-row class="d-flex justify-center mt-1 mb-2" v-if="upload_button">
                            <v-btn class="primary white--text" @click="uploadImage" :loading="image_loading"
                                d-block>Subir
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