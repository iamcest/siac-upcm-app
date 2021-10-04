    <!-- START AFTER THIS-->
    <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid white>
            <v-row>
                <?php echo new Template('parts/sidebar', $data) ?>
                <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                    <v-row>
                        <v-col cols="12" md="12">
                            <h2 class="text-center">Información de la UPCM</h2>
                        </v-col>

                    </v-row>
                    <v-form>
                        <v-row class="px-16 mx-auto">

                            <v-col cols="12" md="4" lg="2">

                                <v-form class="px-4">
                                    <v-icon
                                        class="d-flex justify-content-center px-2 logo-icon grey--text text--lighten-1"
                                        v-if="upcm.upcm_logo == null">mdi-image</v-icon>
                                    <v-row class="d-flex justify-center mb-4">
                                        <img :src="'<?php echo SITE_URL ?>/public/img/upcms-logo/' + upcm.upcm_logo"
                                            v-if="upcm.upcm_logo != null && !upload_button" width="100%">
                                        <div class="d-block" v-if="upload_button">
                                            <img :src="previewImage" width="100%">
                                        </div>
                                    </v-row>
                                    <v-row class="d-block">
                                        <label for="upcm_logo">
                                            <p
                                                class="secondary white--text py-2 px-2 rounded-pill cursor-pointer text-center">
                                                <v-icon class="white--text" left>mdi-upload</v-icon>Subir logo
                                            </p>
                                            <input type="file" name="upcm_logo" id="upcm_logo" class="d-none"
                                                @change="prevImage" />
                                        </label>
                                    </v-row>
                                    <v-row class="mt-2" v-if="upload_button">
                                        <v-btn class="primary white--text" @click="uploadImage" :loading="image_loading"
                                            block>Guardar logo</v-btn>
                                    </v-row>
                                </v-form>
                            </v-col>

                            <v-col cols="12" md="8" lg="10">
                                <v-row>
                                    <v-col cols="12" md="6">
                                        <p><span class="font-weight-bold">N° de miembros en la UPCM:</span>
                                            {{ upcm.members }}
                                        </p>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <p><span class="font-weight-bold">Clave de unidad certificada:</span>
                                            {{ upcm.upcm_key }}</p>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Nombre</label>
                                        <v-text-field class="mt-3 mb-4" v-model="upcm.upcm_name" outlined>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Correo electrónico</label>
                                        <v-text-field class="mt-3 mb-4" v-model="upcm.upcm_email" outlined>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Dirección</label>
                                        <v-text-field class="mt-3 mb-4" v-model="upcm.upcm_address" outlined>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="6">
                                        <label>País</label>
                                        <v-select class="mt-3" v-model="upcm.country_selected" :items="countries"
                                            item-text="name" item-value="id" @change="filterStates" outlined></v-select>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="6">
                                        <label>Provincia o ciudad</label>
                                        <v-select class="mt-3" v-model="upcm.state_selected"
                                            :items="country_states" item-text="name" item-value="id"
                                            @change='getLocation' outlined></v-select>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-row>
                                            <v-col cols="12">
                                                <h4 class="text-h5 text-center">Redes Sociales</h4>
                                            </v-col>
                                            <v-col cols="6" md="4">
                                                <v-text-field v-model="upcm.meta.instagram" prepend-icon="mdi-instagram"
                                                    placeholder="https://www.instagram.com/user/"
                                                    hint="Link de cuenta de Instagram" persistent-hint clearable
                                                    outlined>
                                                </v-text-field>
                                            </v-col>

                                            <v-col cols="6" md="4">
                                                <v-text-field v-model="upcm.meta.twitter" prepend-icon="mdi-twitter"
                                                    placeholder="https://twitter.com/user"
                                                    hint="Link de cuenta de Twitter" persistent-hint clearable outlined>
                                                </v-text-field>
                                            </v-col>

                                            <v-col cols="6" md="4">
                                                <v-text-field v-model="upcm.meta.facebook" prepend-icon="mdi-facebook"
                                                    placeholder="https://facebook.com/user"
                                                    hint="Link de cuenta de Facebook" persistent-hint clearable
                                                    outlined>
                                                </v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>

                            </v-col>

                            <v-col cols="12">
                                <v-btn class="secondary white--text" :loading="loading" @click="save" block
                                    rounded>Actualizar información</v-btn>
                                <?php echo new Template('components/alert') ?>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-col>
            </v-row>
        </v-container>
    </v-main>