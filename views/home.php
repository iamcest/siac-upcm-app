<!-- START AFTER THIS-->
<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
        <v-row>
            <?php echo new Template('parts/sidebar', $data) ?>
            <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('parts/upcm_logo') ?>
                <?php echo new Template('components/snackbar') ?>
                <h2>Inicio</h2>
                <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][1]['permissions']['create']) ) : ?>
                <v-col class="d-flex justify-end" cols="12">
                    <v-btn color="secondary" dark rounded class="mb-2" @click="create_dialog = true">
                        <v-icon>mdi-plus</v-icon>
                        Añadir cita
                    </v-btn>
                </v-col>
                <?php endif ?>
                <div id="calendar" class="px-4 mt-10"></div>
            </v-col>
        </v-row>
        <?php echo new Template('home/appointment-view') ?>
        <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][1]['permissions']['create']) ) : ?>
            <?php echo new Template('home/appointment-create', $data) ?>
        <?php endif ?>
        <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['create']) ) : ?>
            <?php echo new Template('home/patient-create') ?>
        <?php endif ?>
    </v-container>
</v-main>