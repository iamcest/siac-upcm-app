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

                        <v-col cols="12" md="6" lg="5">
                            <?php if (!empty($can_manage_suite) || !empty($access['notifications_access']['publish']) ) : ?>
                            <v-btn class="rounded-pill secondary white--text py-6 mb-sm-4 mb-lg-0"
                                @click="editItem(defaultItem)">
                                <v-icon>mdi-plus</v-icon> Añadir anuncio
                            </v-btn>
                            <v-btn class="rounded-pill secondary white--text py-6"
                                @click="switchAnnouncenments(<?php echo $_SESSION['user_id'] ?>)">
                                {{ announcementBtnTitle }}</v-btn>
                            <?php endif ?>
                        </v-col>
                        <v-col cols="12" md="6" lg="5">
                            <h2>Publicaciones</h2>
                        </v-col>
                        <v-dialog v-model="viewDialog" max-width="1200px">
                            <v-card>
                                <v-toolbar elevation="0">
                                    <v-toolbar-title>Detalles del anuncio</v-toolbar-title>
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
                                            <v-col cols="12">
                                                <h3 class="text-h5 text-center">{{ editedItem.title }}</h3>
                                            </v-col>
                                            <v-col class="ql-editor" v-html="editedItem.content" cols="12">
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-divider></v-divider>

                                <v-card-actions class="pt-0 px-8">
                                    <v-row>
                                        <v-col cols="12">
                                            <h4 class="text-h6 text-center">Publicado por:</h4>
                                        </v-col>
                                        <v-col cols="12" md="12" class="py-3 mt-n3 d-flex justify-center align-center">
                                            <v-avatar class="mr-2" size="5vw">
                                                <img :src="'<?php echo SITE_URL ?>/public/img/avatars/'+author.avatar"
                                                    v-if="author.avatar != null">
                                                <v-icon style="font-size: 5vw" v-else>mdi-account-circle</v-icon>
                                            </v-avatar>
                                            <p>
                                                <b>{{ author.first_name }} {{ author.last_name }}</b>
                                                <br>
                                                {{ author.rol }}
                                            </p>
                                        </v-col>
                                        <v-col cols="12" md="12" class="py-3 mt-n3 d-flex justify-end">
                                            <v-icon class="grey--text grey-lighten-1">mdi-timer</v-icon><span
                                                class="body-1 grey--text grey-lighten-1">{{ fromNow(editedItem.published_at) }}</span>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-btn color="secondary" v-if="author.user_member == null" @click="joinChat"
                                                :loading="join_loading" block>
                                                Unirse a la discusión
                                            </v-btn>
                                            <v-btn class="white--text" color="#00BFA5" v-if="author.user_member == uid"
                                                block>
                                                Ya te has unido a esta discusión
                                            </v-btn>
                                        </v-col>
                                    </v-row>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialog" max-width="1200px">
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
                                            <v-col cols="12">
                                                <label>Título</label>
                                                <v-text-field class="mt-3" v-model="editedItem.title" outlined>
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <label>Contenido</label>
                                                <vue-editor class="mt-3" v-model="editedItem.content"
                                                    placeholder="Contenido del anuncio"></vue-editor>
                                            </v-col>
                                            <v-col cols="12">
                                                <label>Enviar a</label>
                                                <v-select class="mt-3" v-model="editedItem.send_to"
                                                    :items="send_to_options" @change="clearSendToInputs" outlined>
                                                </v-select>
                                            </v-col>
                                            <template v-if="parseInt(editedItem.send_to) == 2">
                                                <v-col cols="12">
                                                    <label>Seleccione los miembros</label>
                                                    <v-select class="mt-3" v-model="editedItem.members"
                                                        :items="my_upcm_members.items"
                                                        :loading="my_upcm_members.loading" multiple outlined>
                                                    </v-select>
                                                </v-col>
                                            </template>
                                            <template v-if="parseInt(editedItem.send_to) == 3">
                                                <v-col cols="12">
                                                    <label>Seleccione la unidad</label>
                                                    <v-select class="mt-3" v-model="editedItem.upcms"
                                                        :items="upcms.filtered_items" loading="upcms.loading" multiple
                                                        outlined>
                                                        <template #prepend-item>
                                                            <v-list-item>
                                                                <v-list-item-content>
                                                                    <v-text-field v-model="upcms.search"
                                                                        placeholder="Buscar unidad" @input="searchUPCMS"
                                                                        clearable outlined></v-text-field>
                                                                </v-list-item-content>
                                                            </v-list-item>
                                                            <v-divider class="mt-2"></v-divider>
                                                        </template>
                                                    </v-select>
                                                </v-col>
                                            </template>
                                            <template v-if="parseInt(editedItem.send_to) == 4">
                                                <v-col cols="12">
                                                    <label>Seleccione la unidad</label>
                                                    <v-select class="mt-3" v-model="editedItem.upcm_id"
                                                        :items="upcms.filtered_items" loading="upcms.loading"
                                                        @change="getExternalUPCMMembers" outlined>
                                                        <template #prepend-item>
                                                            <v-list-item>
                                                                <v-list-item-content>
                                                                    <v-text-field v-model="upcms.search"
                                                                        placeholder="Buscar unidad" @input="searchUPCMS"
                                                                        clearable outlined></v-text-field>
                                                                </v-list-item-content>
                                                            </v-list-item>
                                                            <v-divider class="mt-2"></v-divider>
                                                        </template>
                                                    </v-select>
                                                </v-col>
                                                <v-col cols="12" v-if="editedItem.upcm_id != ''">
                                                    <label>Seleccione los miembros</label>
                                                    <v-select class="mt-3" v-model="editedItem.members"
                                                        :items="external_upcm_members.items"
                                                        loading="external_upcm_members.loading" multiple outlined>
                                                    </v-select>
                                                </v-col>
                                            </template>
                                            <template></template>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions class="px-8">
                                    <v-spacer></v-spacer>
                                    <v-btn color="secondary white--text" block @click="save">
                                        Guardar
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialogDelete" max-width="1200px">
                            <v-card>
                                <v-card-title class="headline">¿Estás seguro de que quieres eliminar este anuncio?
                                </v-card-title>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                                    <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-row>

                    <v-row>
                        <v-col cols="12" md="4" v-for="(item, index) in filterByDate" :key="item.announcement_id">
                            <v-card class="flex d-flex flex-column" max-width="96%" outlined>
                                <v-card-title class="primary white--text d-block text-center">Anuncio</v-card-title>
                                <v-card-text class="pt-10">
                                    <h5 class="text-h6 text-center">{{ item.title }}</h5>
                                </v-card-text>

                                <v-card-actions class="mb-3">
                                    <v-btn class="mx-auto white--text subtitle-2 py-4 px-8" color="#c6c6c6"
                                        v-on:click="get_announcement(item)">
                                        Leer más
                                    </v-btn>
                                </v-card-actions>
                                <v-card-actions class="annoucement-info pb-1">
                                    <div class="px-2">
                                        <v-icon class="green--text"
                                            @click="editItem(item);parseInt(item.send_to) == 4 ? getExternalUPCMMembers() : '';"
                                            v-if="item.user_id == <?php echo $_SESSION['user_id'] ?>">mdi-pencil
                                        </v-icon>
                                        <v-icon class="red--text" @click="deleteItem(item)"
                                            v-if="item.user_id == <?php echo $_SESSION['user_id'] ?>">mdi-trash-can
                                        </v-icon>
                                        <span
                                            class="body-1 grey--text grey-lighten-1 float-right">{{ fromNow(item.published_at) }}</span>
                                    </div>
                                </v-card-actions>
                            </v-card>
                        </v-col>
                    </v-row>

                </v-col>
            </v-row>
        </v-container>
    </v-main>