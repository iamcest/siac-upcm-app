<!-- START AFTER THIS-->
<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
        <v-row>
            <?php echo new Template('parts/sidebar', $data) ?>
            <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('parts/upcm_logo') ?>
                <?php echo new Template('components/snackbar') ?>
                <h2><?php echo $title ?></h2>
                <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][1]['permissions']['create'])) : ?>
                <v-col class="d-flex justify-end" cols="12">
                    <v-btn color="secondary" dark rounded class="mb-2"
                        @click="appointment_calendar.create_dialog = true;appointment_calendar.resetAppointmentForm()">
                        <v-icon>mdi-plus</v-icon>
                        Añadir cita
                    </v-btn>
                </v-col>
                <?php endif ?>
                <div id="calendar" class="px-4 mt-10"></div>
            </v-col>
        </v-row>

        <?php echo new Template('patients-management/recipes_and_reports/main') ?>
        <?php echo new Template('patients-management/dialogs/follow-ups_appointments') ?>
        <?php echo new Template('patients-management/dialogs/compare-patients') ?>
        <?php echo new Template('patients-management/dialogs/edit', $data) ?>

        <?php echo new Template('home/appointment-view', $data) ?>
        <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][1]['permissions']['create']) ) : ?>
        <?php echo new Template('home/appointment-create', $data) ?>
        <?php endif ?>
        <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['create']) ) : ?>
        <?php echo new Template('home/patient-create') ?>
        <?php endif ?>
    </v-container>
</v-main>