    <!-- START AFTER THIS-->
    <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid white>
            <v-row>
                <?php echo new Template('parts/sidebar', $data) ?>
                <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                    <?php echo new Template('parts/upcm_logo') ?>
                    <?php echo new Template('components/snackbar') ?>
                    <v-row>
                        <v-col cols="12" md="12">
                            <h2 class="grey--text text--darken-1">Miembros de la UPCM</h2>
                        </v-col>

                    </v-row>
                    <v-row class="mt-6">
                        <v-col cols="12">
                            <v-data-table :headers="headers" :items="members" sort-by="full_name" class="elevation-1">
                                <template #top>
                                    <v-toolbar flat>
                                      <v-spacer></v-spacer>
                                      <?php echo new Template('suite-management/members/dialog') ?>
                                      <?php echo new Template('suite-management/members/access-dialog') ?>
                                      <?php echo new Template('suite-management/members/delete-dialog') ?>
                                    </v-toolbar>
                                </template>
                                <template #item.actions="{ item }">
                                    <v-icon md class="mr-2" @click="editItem(item)" color="#00BFA5">
                                        mdi-pencil
                                    </v-icon>
                                    <v-icon md class="mr-2" @click="editAccessItem(item)" color="primary">
                                        mdi-account-key
                                    </v-icon>
                                    <v-icon md @click="deleteItem(item)" color="#F44336">
                                        mdi-delete
                                    </v-icon>
                                </template>
                                <template #item.full_name="{ item }">
                                    {{ item.first_name }} {{ item.last_name }}
                                </template>
                                <template #no-data>
                                    <v-btn color="primary" @click="initialize">
                                        Reset
                                    </v-btn>
                                </template>

                        </v-col>
                        <v-col class="px-0" cols="12">
                            <?php echo new Template('suite-management/members/upcm-invitations') ?>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </v-main>