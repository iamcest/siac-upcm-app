<v-dialog v-model="dialogAccess" max-width="1200px">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Editar Permisos</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container>
                <v-row>
                    <v-col cols="12" md="12">
                        <div class="d-flex justify-center">
                            <v-form>
                                <v-avatar class="uploading-image d-block" v-if="editedItem.avatar != null" size="7vw">
                                    <img :src="'<?php echo SITE_URL ?>/public/img/avatars/' + editedItem.avatar">
                                </v-avatar>
                                <v-col class="d-flex justify-center" v-if="editedItem.avatar == null" cols="12">
                                    <v-icon class="avatar-image">
                                        mdi-account-circle</v-icon>
                                </v-col>
                                <v-col cols="12">
                                    <h5 class="text-h5">{{ editedItem.first_name + ' ' + editedItem.last_name }}</h5>
                                </v-col>
                            </v-form>
                        </div>
                        <v-row>
                            <v-col cols="12">
                                <v-divider></v-divider>
                            </v-col>
                        </v-row>
                        <template v-if="Object.keys(editedItem.meta).length !== 0">
                            <?php echo new Template('suite-management/members/access-sections/patient-management') ?>
                            <?php echo new Template('suite-management/members/access-sections/calculations-and-algorithms') ?>
                            <?php echo new Template('suite-management/members/access-sections/patient-material') ?>
                            <?php echo new Template('suite-management/members/access-sections/notifications') ?>
                        </template>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>

        <v-card-actions class="px-8">
            <v-spacer></v-spacer>
            <v-btn color="secondary white--text" block @click="saveAccess" :loading="access.loading">
                Guardar
            </v-btn>
        </v-card-actions>
    </v-card>
</v-dialog>