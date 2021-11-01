<v-dialog v-model="view_dialog" max-width="98%" @click:outside="resetPatientInformation()">

    <v-card v-if="view_dialog">
        <v-toolbar elevation="0">
            <v-toolbar-title>Ficha del paciente</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="closeView();resetPatientInformation();">
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
                            <v-btn color="secondary" @click="ComparisonPatientsDialog = true">
                                Comparar pacientes</v-btn>
                            <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])) : ?>
                            <v-btn color="primary"
                                @click="recipe_reports_dialog = true;initializeRecipes();initializeFactorsRisk(false);">
                                Informes y Récipes</v-btn>
                            <v-btn color="info" @click="FollowUpAppointmentsDialog = true" light>Seguimiento</v-btn>
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