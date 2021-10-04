    <!-- START AFTER THIS-->
    <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid white>
            <v-row>
                <?php echo new Template('parts/sidebar', $data) ?>
                <v-col cols="12" md="9" lg="10" class="pt-16 px-md-8">
                    <?php echo new Template('parts/upcm_logo') ?>
                    <?php echo new Template('components/snackbar') ?>
                    <v-row>
                        <v-col cols="12">
                            <?php echo new Template('patient-material/parts/patient', $data) ?>
                        </v-col>
                        <?php echo new Template('patient-material/parts/templates', $data) ?>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </v-main>