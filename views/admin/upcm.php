<!-- START AFTER THIS-->
<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
        <v-row>
            <?php echo new Template('admin/parts/sidebar') ?>
            <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('components/snackbar') ?>
                <h2>Unidades de Prevención Cardio Metabólica</h2>
                <v-row class="mt-6">
                    <v-col cols="12">
                        <v-data-table :headers="headers" :items="upcms" sort-by="upcm_name" class="elevation-1">
                            <template #top>
                                <v-toolbar flat>
                                    <v-spacer></v-spacer>
                                    <v-dialog v-model="viewDialog" max-width="1200px">
                                        <v-card>
                                            <v-toolbar elevation="0">
                                                <v-toolbar-title>Detalles de la UPCM</v-toolbar-title>
                                                <v-spacer></v-spacer>
                                                <v-toolbar-items>
                                                    <v-btn icon dark @click="viewDialog = false">
                                                        <v-icon color="grey">mdi-close</v-icon>
                                                    </v-btn>
                                                </v-toolbar-items>
                                            </v-toolbar>

                                            <v-divider></v-divider>

                                            <v-card-text>
                                                <v-container>
                                                    <v-row>
                                                        <v-col cols="12" md="4">
                                                            <span class="subtitle-1">Nombre de la upcm:
                                                                <b>{{ editedItem.upcm_name }}</b> </span>
                                                        </v-col>
                                                        <v-col cols="12" md="4" v-if="editedItem.upcm_email != null && editedItem.upcm_email != ''">
                                                            <span class="subtitle-1">Correo electrónico:
                                                                <b>{{ editedItem.upcm_email }}</b> </span>
                                                        </v-col>
                                                        <v-col cols="12" md="4" v-if="editedItem.upcm_address != null && editedItem.upcm_address != ''">
                                                            <span class="subtitle-1">Dirección:
                                                                <b>{{ editedItem.upcm_address }}</b> </span>
                                                        </v-col>
                                                        <v-col cols="12" sm="6" md="4">
                                                            <span class="subtitle-1">País:
                                                                <b>{{ editedItem.upcm_country }}</b></span>
                                                        </v-col>
                                                        <v-col cols="12" sm="6" md="4">
                                                            <span class="subtitle-1">Provincia o ciudad:
                                                                <b>{{ editedItem.upcm_state }}</b></span>
                                                        </v-col>
                                                        <v-col cols="12" md="4" 
                                                        v-if="editedItem.meta.instagram != '' 
                                                        || editedItem.meta.twitter != '' || editedItem.meta.facebook != ''">
                                                            <v-row class="px-0">
                                                                <v-col class="mt-n4" cols="12">
                                                                    <span class="subtitle-1 text-center">Redes sociales:
                                                                        <v-btn :href="editedItem.meta.instagram"
                                                                            color="#E1306C" v-if="editedItem.meta.instagram != ''" text small fab>
                                                                            <v-icon>mdi-instagram</v-icon>
                                                                        </v-btn>
                                                                        <v-btn :href="editedItem.meta.twitter"
                                                                            color="#00acee" v-if="editedItem.meta.twitter != ''" text small fab>
                                                                            <v-icon>mdi-twitter</v-icon>
                                                                        </v-btn>
                                                                        <v-btn :href="editedItem.meta.facebook"
                                                                            color="#3b5998" v-if="editedItem.meta.facebook != ''" text small fab>
                                                                            <v-icon>mdi-facebook</v-icon>
                                                                        </v-btn>
                                                                    </span>
                                                                </v-col>
                                                            </v-row>
                                                        </v-col>
                                                        <v-col cols="12" md="4">
                                                            <span class="subtitle-1">Clave de certificación:
                                                                <b>{{ editedItem.upcm_key }}</b>
                                                            </span>
                                                        </v-col>
                                                        <v-col cols="12" md="4" v-if="1 == 2">
                                                            <span class="subtitle-1">Clave de coordinador:
                                                                <b>{{ editedItem.upcm_coordinator_key }}</b> </span>
                                                        </v-col>
                                                        <?php echo new Template('admin/parts/upcm_invitations') ?>
                                                    </v-row>
                                                </v-container>
                                            </v-card-text>
                                        </v-card>
                                    </v-dialog>
                                    <v-dialog v-model="dialog" max-width="1200px">
                                        <template #activator="{ on, attrs }">
                                            <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on"
                                                @click="editedItem = Object.assign({}, defaultItem);">
                                                <v-icon>mdi-plus</v-icon>
                                                Añadir UPCM
                                            </v-btn>
                                        </template>
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
                                                <v-container>
                                                    <v-row>
                                                        <v-col class="d-flex justify-center" cols="12">
                                                            <v-row class="d-flex justify-center">
                                                                <v-col class="d-flex justify-center" cols="9">
                                                                    <v-icon
                                                                        class="d-flex justify-content-center px-2 logo-icon grey--text text--lighten-1"
                                                                        v-if="editedItem.upcm_logo == null || editedItem.upcm_logo == '' && upcm_image == null ">
                                                                        mdi-image
                                                                    </v-icon>
                                                                    <img :src="'<?php echo SITE_URL ?>/public/img/upcms-logo/' + editedItem.upcm_logo"
                                                                        v-else-if="editedItem.upcm_logo != null && upcm_image == null"
                                                                        width="100%" style="max-width: 250px">
                                                                    <img :src="preview_image" width="100%"
                                                                        v-else-if="upcm_image != null"
                                                                        style="max-width: 250px">
                                                                </v-col>
                                                                <v-col class="mt-n8" cols="12">
                                                                    <v-row class="d-flex justify-center">
                                                                        <v-col cols="12" md="3">
                                                                            <label for="upcm_logo">
                                                                                <p
                                                                                    class="primary white--text py-2 px-2 rounded-pill cursor-pointer text-center">
                                                                                    <v-icon class="white--text" left>
                                                                                        mdi-upload</v-icon>Añadir logo
                                                                                </p>
                                                                                <input type="file" name="upcm_logo"
                                                                                    accept="image/*" id="upcm_logo"
                                                                                    class="d-none"
                                                                                    @change="prevImage" />
                                                                            </label>
                                                                        </v-col>
                                                                    </v-row>
                                                                </v-col>
                                                            </v-row>
                                                        </v-col>
                                                        <v-col cols="12" md="6">
                                                            <label>Nombre de la upcm</label>
                                                            <v-text-field class="mt-3" v-model="editedItem.upcm_name"
                                                                outlined></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12" md="6">
                                                            <label>Correo electrónico</label>
                                                            <v-text-field class="mt-3" v-model="editedItem.upcm_email"
                                                                outlined></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12" md="6">
                                                            <label>Dirección</label>
                                                            <v-text-field class="mt-3" v-model="editedItem.upcm_address"
                                                                outlined></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12" sm="6" md="6">
                                                            <label>País</label>
                                                            <v-select class="mt-3" v-model="editedItem.country_selected"
                                                                :items="countries" item-text="name" item-value="id"
                                                                @change="filterStates" outlined></v-select>
                                                        </v-col>
                                                        <v-col cols="12" sm="6" md="6">
                                                            <label>Provincia o ciudad</label>
                                                            <v-select class="mt-3" v-model="editedItem.state_selected"
                                                                :items="country_states" item-text="name" item-value="id"
                                                                @change='getLocation' outlined></v-select>
                                                        </v-col>
                                                        <v-col cols="12" md="6">
                                                            <label>Clave de certificación</label>
                                                            <v-text-field class="mt-3" v-model="editedItem.upcm_key"
                                                                outlined></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12">
                                                            <v-row>
                                                                <v-col cols="12">
                                                                    <h4 class="text-h5 text-center">Redes Sociales</h4>
                                                                </v-col>
                                                                <v-col cols="6" md="4">
                                                                    <v-text-field v-model="editedItem.meta.instagram"
                                                                        prepend-icon="mdi-instagram"
                                                                        placeholder="https://www.instagram.com/user/"
                                                                        hint="Link de cuenta de Instagram"
                                                                        persistent-hint clearable outlined>
                                                                    </v-text-field>
                                                                </v-col>

                                                                <v-col cols="6" md="4">
                                                                    <v-text-field v-model="editedItem.meta.twitter"
                                                                        prepend-icon="mdi-twitter"
                                                                        placeholder="https://twitter.com/user"
                                                                        hint="Link de cuenta de Twitter" persistent-hint
                                                                        clearable outlined></v-text-field>
                                                                </v-col>

                                                                <v-col cols="6" md="4">
                                                                    <v-text-field v-model="editedItem.meta.facebook"
                                                                        prepend-icon="mdi-facebook"
                                                                        placeholder="https://facebook.com/user"
                                                                        hint="Link de cuenta de Facebook"
                                                                        persistent-hint clearable outlined>
                                                                    </v-text-field>
                                                                </v-col>
                                                            </v-row>
                                                        </v-col>
                                                        <v-col cols="12" v-if="1 == 2">
                                                            <label>Clave de coordinador</label>
                                                            <v-text-field class="mt-3"
                                                                v-model="editedItem.upcm_coordinator_key" outlined solo>
                                                            </v-text-field>
                                                        </v-col>
                                                    </v-row>
                                                </v-container>
                                            </v-card-text>

                                            <v-card-actions class="px-8">
                                                <v-spacer></v-spacer>
                                                <v-btn color="secondary white--text" block @click="save"
                                                    :loading="save_loading">
                                                    Guardar
                                                </v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                    <v-dialog v-model="dialogDelete" max-width="1200px">
                                        <v-card>
                                            <v-card-title class="headline">¿Estás seguro de que quieres eliminar esta
                                                unidad?</v-card-title>
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                                                <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar
                                                </v-btn>
                                                <v-spacer></v-spacer>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                </v-toolbar>
                            </template>
                            <template #item.actions="{ item }">
                                <v-icon md class="mr-1"
                                    @click="viewItem(item);loadInvitations(); preview_image = null; upcm_image = null;"
                                    color="primary">
                                    mdi-eye
                                </v-icon>
                                <v-icon md class="mr-1"
                                    @click="editItem(item); preview_image = null; upcm_image = null;" color="#00BFA5">
                                    mdi-pencil
                                </v-icon>
                                <v-icon md @click="deleteItem(item)" color="#F44336">
                                    mdi-delete
                                </v-icon>
                            </template>
                            <template #item.location="{ item }">
                                {{ item.upcm_state }}, {{ item.upcm_country }}
                            </template>
                            <template #item.upcm_registered="{ item }">
                                {{ formatDate(item.upcm_registered) }}
                            </template>
                            <template #no-data>
                                No se encontraron UPCMS registradas
                            </template>
                        </v-data-table>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</v-main>