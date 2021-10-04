<v-col cols="12">
    <v-data-table :headers="upcm_invitations.headers" :items="upcm_invitations.items" class="elevation-1">
        <template #top>
            <v-toolbar flat>
                <v-toolbar-title>
                    Invitaciones enviadas
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-dialog v-model="upcmInvitationsDialog" max-width="1200px">
                    <template #activator="{ on, attrs }">
                        <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on">
                            <v-icon>mdi-plus</v-icon>
                            Enviar invitación
                        </v-btn>
                    </template>
                    <v-card>
                        <v-toolbar elevation="0">
                            <v-toolbar-title>
                                Enviar Invitación
                            </v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-toolbar-items>
                                <v-btn icon dark @click="upcmInvitationsDialog = false">
                                    <v-icon color="grey">
                                        mdi-close</v-icon>
                                </v-btn>
                            </v-toolbar-items>
                        </v-toolbar>

                        <v-divider></v-divider>

                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" md="6">
                                        <label>Nombre</label>
                                        <v-text-field class="mt-3" v-model="upcm_invitations.editedItem.first_name"
                                            outlined solo>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Apellido</label>
                                        <v-text-field class="mt-3" v-model="upcm_invitations.editedItem.last_name"
                                            outlined solo>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Correo electrónico</label>
                                        <v-text-field class="mt-3" v-model="upcm_invitations.editedItem.user_email"
                                            outlined solo>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Tipo de miembro</label>
                                        <v-select class="mt-3" v-model="upcm_invitations.editedItem.user_type"
                                            :items="['coordinador', 'miembro']" @change="filterAccessByRol" outlined>
                                        </v-select>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Rol</label>
                                        <v-select class="mt-3" v-model="upcm_invitations.editedItem.rol" :items="rols"
                                            @change="filterAccessByRol" outlined></v-select>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-row justify="center"
                                            v-if="upcm_invitations.editedItem.user_type == 'miembro'">
                                            <v-expansion-panels popout>
                                                <v-expansion-panel>
                                                    <v-expansion-panel-header><b>Control de Acceso</b>
                                                    </v-expansion-panel-header>
                                                    <v-expansion-panel-content>
                                                        <template
                                                            v-if="Object.keys(upcm_invitations.editedItem.access).length !== 0">
                                                            <?php echo new Template('admin/parts/upcm/access-sections/patient-management') ?>
                                                            <?php echo new Template('admin/parts/upcm/access-sections/calculations-and-algorithms') ?>
                                                            <?php echo new Template('admin/parts/upcm/access-sections/patient-material') ?>
                                                            <?php echo new Template('admin/parts/upcm/access-sections/notifications') ?>
                                                        </template>
                                                    </v-expansion-panel-content>
                                                </v-expansion-panel>
                                            </v-expansion-panels>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>

                        <v-card-actions class="px-8">
                            <v-spacer></v-spacer>
                            <v-btn color="secondary white--text" block @click="saveInvitation"
                                :loading="upcm_invitations.create_loading">
                                Guardar
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-toolbar>
        </template>
        <template #item.full_name="{ item }">
            {{ item.first_name + ' ' + item.last_name }}
        </template>
        <template #item.actions="{ item }">
            <v-tooltip top>
                <template #activator="{ on, attrs }">
                    <v-icon md class="mr-2"
                        @click="copyToClipboard('<?php echo SITE_URL?>/register/?invitation_code=' + item.invitation_code)"
                        color="primary" v-bind="attrs" v-on="on">
                        mdi-content-copy
                    </v-icon>
                </template>
                <span>Copiar invitación</span>
            </v-tooltip>
            <v-icon md class="mr-2" @click="deleteInvitation(item)" color="error">
                mdi-trash-can
            </v-icon>
        </template>
        <template #no-data>
            No se encontraron invitaciones enviadas
        </template>
    </v-data-table>
</v-col>