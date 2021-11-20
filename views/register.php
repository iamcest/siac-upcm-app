<!-- Sizes your content based upon application components -->
<v-main class="login-container">

    <!-- Provides the application the proper gutter -->
    <v-container fluid>

        <v-row no-gutters class="align-center login-form-container">
            <v-col cols="12" md="8" lg="7" xl="6" class="mx-auto mt-auto pb-12">
                <v-sheet>
                    <div class="d-flex flex-column justify-space-between align-center mt-5">
                        <v-img width="40%" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/public/img/Logo.png">
                        </v-img>
                    </div>
                    <template v-if="invitation_loading">
                        <v-row>
                            <v-col cols="12">
                                <v-btn color="primary" :loading="invitation_loading" text block></v-btn>
                            </v-col>
                        </v-row>
                    </template>
                    <template v-else>
                        <template v-if="isInvitationInvalid">
                            <h4 class="text-h5 py-8 text-center">{{ invitation_message }}</h4>
                        </template>
                        <template v-else>
                            <h1 class="text-center text-h5 mt-4">Registro</h1>
                            <v-form class="px-10">

                                <v-row>
                                    <v-col class="text-center" cols="12">
                                        <span class="subtitle-1 font-weight-bold">Rol: {{ invitation.rol }} </span>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <span>Nombre</span>
                                        <v-text-field type="text" name="first_name" v-model="register.first_name"
                                            outlined required>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <span>Apellido</span>
                                        <v-text-field type="text" name="last_name" v-model="register.last_name" outlined
                                            required>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <span>email</span>
                                        <v-text-field type="email" name="email" v-model="register.email" outlined
                                            required>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <span>Teléfono</span>
                                        <vue-tel-input-vuetify id="tel-input" label="" v-model="register.telephone"
                                            mode="international" :inputoptions="{showDialCode: true}"
                                            placeholder="Ingresa un número de télefono" hint="Ej: +58 4245887477"
                                            persistent-hint @input="getTelephoneInput" outlined>
                                        </vue-tel-input-vuetify>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Plataformas de comunicación</label>
                                        <v-row class="pt-0">
                                            <v-col md="4" class="whatsapp-platform">
                                                <v-checkbox v-model="register.whatsapp"
                                                    :checked="register.whatsapp == 1" true-value="1" false-value="0"
                                                    prepend-icon="mdi-whatsapp"></v-checkbox>
                                            </v-col>
                                            <v-col md="4" class="telegram-platform">
                                                <v-checkbox v-model="register.telegram"
                                                    :checked="register.telegram == 1" true-value="1" false-value="0"
                                                    prepend-icon="mdi-telegram"></v-checkbox>
                                            </v-col>
                                            <v-col md="4" class="sms-platform">
                                                <v-checkbox v-model="register.sms" :checked="register.sms == 1"
                                                    true-value="1" false-value="0" prepend-icon="mdi-comment-text">
                                                </v-checkbox>

                                            </v-col>
                                        </v-row>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Género</label>
                                        <v-select class="mt-3" v-model="register.gender" :items="genders" outlined solo>
                                        </v-select>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Fecha de nacimiento</label>
                                        <v-dialog ref="birthdateDialog" v-model="modal"
                                            :return-value.sync="register.birthdate" width="290px">
                                            <template #activator="{ on, attrs }">
                                                <v-text-field name="birthdate" class="mt-3" v-model="register.birthdate"
                                                    readonly v-bind="attrs" v-on="on" outlined>
                                                    <template #append>
                                                        <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                                                    </template>
                                                </v-text-field>
                                            </template>
                                            <v-date-picker v-model="register.birthdate" locale="es" scrollable>
                                                <v-spacer></v-spacer>
                                                <v-btn text color="primary" @click="modal = false">
                                                    Cancel
                                                </v-btn>
                                                <v-btn text color="primary"
                                                    @click="$refs.birthdateDialog.save(register.birthdate)">
                                                    OK
                                                </v-btn>
                                            </v-date-picker>
                                        </v-dialog>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Contraseña</label>
                                        <v-text-field type="password" class="mt-3" v-model="register.password" outlined
                                            solo>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="6">
                                        <label>Confirmar contraseña</label>
                                        <v-text-field type="password" class="mt-3" v-model="register.password_confirm"
                                            outlined solo></v-text-field>
                                    </v-col>

                                    <v-col cols="12" v-if="invitation.user_type == 'coordinador'">
                                        <?php echo new Template('register/upcm_invitations') ?>
                                    </v-col>

                                    <v-col cols="12">
                                        <div class="d-flex flex-column justify-space-between align-center mb-5">
                                            <v-btn class="grey white--text py-5" :loading="loading"
                                                :disabled="register.email == '' || register.password == ''"
                                                @click="processRegister" rounded>
                                                Registrarse
                                            </v-btn>
                                        </div>
                                        <?php echo new Template('components/alert') ?>
                                    </v-col>

                                </v-row>

                            </v-form>
                        </template>

                    </template>
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</v-main>