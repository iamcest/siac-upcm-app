<v-dialog v-model="dialog" max-width="1200px">
    <template #activator="{ on, attrs }">
        <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on"
            @click="editedItem.meta = Object.assign({}, access.defaultItem)">
            <v-icon>mdi-plus</v-icon>
            Añadir miembro
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
                    <v-col cols="12">
                        <label>Tipo de miembro</label>
                        <v-select class="mt-3" v-model="editedItem.user_type" :items="user_types"
                            @change="filterAccessByRol" outlined></v-select>
                    </v-col>
                    <v-col cols="12" sm="12" md="6"
                        v-if="editedItem.user_type == 'coordinador' || editedItem.user_type == 'miembro'">
                        <label>UPCM</label>
                        <v-select class="mt-3" v-model="editedItem.upcm_id" :items="upcms" item-text="upcm_name"
                            item-value="upcm_id" outlined></v-select>
                    </v-col>
                    <v-col cols="12" sm="12" md="6"
                        v-if="editedItem.user_type == 'coordinador' || editedItem.user_type == 'miembro'">
                        <label>Rol</label>
                        <v-select class="mt-3" v-model="editedItem.rol" :items="rols" @change="filterAccessByRol"
                            outlined></v-select>
                    </v-col>
                    <v-col cols="12" sm="12" md="4">
                        <label>Nombre</label>
                        <v-text-field name="first_name" class="mt-3" v-model="editedItem.first_name" outlined solo>
                        </v-text-field>
                    </v-col>
                    <v-col cols="12" sm="12" md="4">
                        <label>Apellido</label>
                        <v-text-field name="last_name" class="mt-3" v-model="editedItem.last_name" outlined solo>
                        </v-text-field>
                    </v-col>
                    <v-col cols="12" sm="12" md="4">
                        <label>Correo electrónico</label>
                        <v-text-field name="email" class="mt-3" v-model="editedItem.email" outlined solo></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="12" md="6">
                        <label>Teléfono</label>
                        <vue-tel-input-vuetify id="tel-input" class="mt-3" label="" v-model="editedItem.telephone"
                            mode="international" :inputoptions="{showDialCode: true}"
                            placeholder="Ingresa un número de télefono" hint="Ej: +58 4245887477" persistent-hint
                            @input="getTelephoneInput" outlined>
                        </vue-tel-input-vuetify>
                    </v-col>
                    <v-col cols="12" md="6">
                        <label>Plataformas de comunicación</label>
                        <v-row class="pt-0">
                            <v-col cols="4" class="whatsapp-platform">
                                <v-checkbox v-model="editedItem.whatsapp" :checked="editedItem.whatsapp == 1"
                                    true-value="1" false-value="0" prepend-icon="mdi-whatsapp"></v-checkbox>
                            </v-col>
                            <v-col cols="4" class="telegram-platform">
                                <v-checkbox v-model="editedItem.telegram" :checked="editedItem.telegram == 1"
                                    true-value="1" false-value="0" prepend-icon="mdi-telegram"></v-checkbox>
                            </v-col>
                            <v-col cols="4" class="sms-platform">
                                <v-checkbox v-model="editedItem.sms" :checked="editedItem.sms == 1" true-value="1"
                                    false-value="0" prepend-icon="mdi-comment-text">
                                </v-checkbox>

                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col cols="12" sm="12" md="6">
                        <label>Género</label>
                        <v-select class="mt-3" v-model="editedItem.gender" :items="genders" item-text="name"
                            item-value="gender" outlined solo></v-select>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <label>Fecha de nacimiento</label>
                        <v-dialog ref="birthdateDialog" v-model="modal" :return-value.sync="editedItem.birthdate"
                            width="290px">
                            <template #activator="{ on, attrs }">
                                <v-text-field name="birthdate" class="mt-3" v-model="editedItem.birthdate"
                                    readonly v-bind="attrs" v-on="on" outlined>
                                    <template #append>
                                        <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                                    </template>
                                </v-text-field>
                            </template>
                            <v-date-picker v-model="editedItem.birthdate" locale="es" scrollable>
                                <v-spacer></v-spacer>
                                <v-btn text color="primary" @click="modal = false">
                                    Cancel
                                </v-btn>
                                <v-btn text color="primary" @click="$refs.birthdateDialog.save(editedItem.birthdate)">
                                    OK
                                </v-btn>
                            </v-date-picker>
                        </v-dialog>
                    </v-col>
                    <v-col cols="12" sm="12" md="6">
                        <label>Contraseña</label>
                        <v-text-field type="password" class="mt-3" v-model="editedItem.password" outlined solo>
                        </v-text-field>
                    </v-col>
                    <v-col cols="12" sm="12" md="6">
                        <label>Confirmar contraseña</label>
                        <v-text-field type="password" class="mt-3" v-model="editedItem.password_confirm" outlined solo>
                        </v-text-field>
                    </v-col>
                    <v-row justify="center" v-if="editedItem.user_type == 'miembro'">
                        <v-expansion-panels popout>
                            <v-expansion-panel>
                                <v-expansion-panel-header><b>Control de Acceso</b>
                                </v-expansion-panel-header>
                                <v-expansion-panel-content>
                                    <template v-if="Object.keys(editedItem.meta).length !== 0">
                                        <?php echo new Template('suite-management/members/access-sections/patient-management') ?>
                                        <?php echo new Template('suite-management/members/access-sections/calculations-and-algorithms') ?>
                                        <?php echo new Template('suite-management/members/access-sections/patient-material') ?>
                                        <?php echo new Template('suite-management/members/access-sections/notifications') ?>
                                    </template>
                                </v-expansion-panel-content>
                            </v-expansion-panel>
                        </v-expansion-panels>
                    </v-row>
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