    <!-- START AFTER THIS-->
    <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid white>
            <v-row>
                <?php echo new Template('parts/sidebar', $data) ?>
                <?php echo new Template('components/snackbar') ?>
                <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                    <v-row>
                        <v-col cols="12" md="12">
                            <h2 class="text-center">Mi Perfil</h2>
                        </v-col>

                        <v-col cols="12" md="12">
                            <div class="d-flex justify-center">
                                <v-form>
                                    <v-row class="d-flex justify-center">
                                        <v-avatar class="uploading-image d-block" v-if="!upload_button" size="7vw">
                                            <img :src="'<?php echo SITE_URL ?>/public/img/avatars/' + form.avatar">
                                        </v-avatar>
                                        <v-avatar class="uploading-image d-block" v-if="upload_button" size="7vw">
                                            <img :src="previewImage">
                                            <img :src="form.avatar">
                                        </v-avatar>
                                    </v-row>
                                    <v-row class="d-flex justify-center mt-2">
                                        <label class="d-flex justify-center" for="avatar">
                                            <p class="text-center cursor-pointer">
                                                <v-icon class="success--text">mdi-upload</v-icon>
                                                Subir foto de perfil
                                            </p>
                                            <input type="file" name="avatar" id="avatar" class="d-none"
                                                v-on:change="prevImage" />
                                        </label>
                                    </v-row>
                                    <v-row class="d-flex justify-center mt-4" v-if="upload_button">
                                        <v-btn class="primary white--text" v-on:click="uploadImage"
                                            :loading="image_loading" d-block>Subir</v-btn>

                                    </v-row>
                                </v-form>
                            </div>
                        </v-col>
                    </v-row>
                    <v-form>
                        <v-row class="px-16 mx-auto">

                            <v-col cols="12" md="4">
                                <label>Nombre</label>
                                <v-text-field type="text" name="first_name" v-model="form.first_name" class="mt-3"
                                    :counter="60" outlined required></v-text-field>
                            </v-col>
                            <v-col cols="12" md="4">
                                <label>Apellido</label>
                                <v-text-field type="text" v-model="form.last_name" class="mt-3" :counter="60" outlined
                                    required></v-text-field>
                            </v-col>
                            <v-col cols="12" md="4">
                                <label>Rol</label>
                                <v-text-field class="mt-3" hint="Este campo no puede ser modificado" :value="form.rol"
                                    persistent-hint outlined readonly required></v-text-field>
                            </v-col>

                            <v-col cols="12" md="6">
                                <label>Fecha de nacimiento</label>
                                <v-menu ref="menu" v-model="menu" :close-on-content-click="false"
                                    :return-value.sync="form.birthdate" transition="scale-transition" offset-y
                                    min-width="300px">
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field class="mt-3" outlined v-model="form.birthdate" outlined readonly
                                            v-bind="attrs" v-on="on"></v-text-field>
                                    </template>
                                    <v-date-picker v-model="form.birthdate" no-title scrollable>
                                        <v-spacer></v-spacer>
                                        <v-btn text color="primary" @click="menu = false">
                                            Cancelar
                                        </v-btn>
                                        <v-btn text color="primary" @click="$refs.menu.save(form.birthdate)">
                                            OK
                                        </v-btn>
                                    </v-date-picker>
                                </v-menu>
                            </v-col>

                            <v-col cols="12" md="6">
                                <label>Género</label>
                                <v-select class="mt-3" v-model="form.gender" :items="genders" item-text="gender"
                                    item-value="value" outlined></v-select>
                            </v-col>


                            <v-col cols="12" md="6">
                                <label>Correo electrónico</label>
                                <v-text-field type="email" name="email" v-model="form.email" class="mt-3" :counter="60"
                                    outlined required></v-text-field>
                            </v-col>
                            <v-col cols="12" md="6">
                                <label>Télefono</label>
                                <vue-tel-input-vuetify id="tel-input" class="mt-3" label="" v-model="form.telephone"
                                    mode="international" :inputoptions="{showDialCode: true}"
                                    placeholder="Ingresa un número de télefono" hint="Ej: +58 4245887477"
                                    persistent-hint @input="getTelephoneInput" outlined>
                                </vue-tel-input-vuetify>
                            </v-col>

                            <v-col cols="12" md="4">
                                <label>Plataformas de comunicación</label>
                                <v-row class="pt-0">
                                    <v-col cols="4" class="whatsapp-platform">
                                        <v-checkbox v-model="form.whatsapp" prepend-icon="mdi-whatsapp"></v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="telegram-platform">
                                        <v-checkbox v-model="form.telegram" prepend-icon="mdi-telegram"></v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="sms-platform">
                                        <v-checkbox v-model="form.sms" prepend-icon="mdi-comment-text"></v-checkbox>

                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col cols="12" md="4">
                                <label>Contraseña</label>
                                <v-text-field v-model="form.password" class="mt-3" :counter="20" outlined required>
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" md="4">
                                <label>Confirmar contraseña</label>
                                <v-text-field v-model="form.password_confirm" class="mt-3" :counter="20" outlined
                                    required></v-text-field>
                            </v-col>
                            <v-btn class="white--text secondary" :loading="loading" v-on:click="save" rounded block>
                                Actualizar información</v-btn>
                            <v-col cols="12">
                                <v-alert border="top" colored-border :color="alert_type" elevation="2" v-if="alert">
                                    {{ alert_message }}
                                </v-alert>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-col>
            </v-row>
        </v-container>