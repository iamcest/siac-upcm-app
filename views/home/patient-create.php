<v-dialog v-model="appointment_calendar.patient_dialog" max-width="90%">
    <v-card v-if="appointment_calendar.patient_dialog">
        <v-toolbar elevation="0">
            <v-toolbar-title class="font-weight-bold">Añadir Paciente</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="appointment_calendar.patient_dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-form>
                    <v-row>
                        <v-col cols="12" sm="6">
                            <label>Nombre</label>
                            <v-text-field class="mt-3" v-model="appointment_calendar.patient.first_name" outlined>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Apellido</label>
                            <v-text-field class="mt-3" v-model="appointment_calendar.patient.last_name" outlined>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Documento de identidad</label>
                            <v-select class="mt-3" v-model="appointment_calendar.patient.document_type"
                                :items="document_types" item-text="text" item-value="value" outlined></v-select>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>N° de identificación</label>
                            <v-text-field class="mt-3" v-model="appointment_calendar.patient.document_id" outlined>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Fecha de nacimiento</label>
                            <v-dialog ref="birthdate_dialog" v-model="appointment_calendar.birthdate_modal"
                                :return-value.sync="appointment_calendar.patient.birthdate" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="appointment_calendar.patient.birthdate" readonly
                                        v-bind="attrs" v-on="on" outlined>
                                        <template #append>
                                            <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                                        </template>
                                    </v-text-field>
                                </template>
                                <v-date-picker v-model="appointment_calendar.patient.birthdate" locale="es" scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="appointment_calendar.birthdate_modal = false">
                                        Cancel
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.birthdate_dialog.save(appointment_calendar.patient.birthdate)">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Género</label>
                            <v-select class="mt-3" v-model="appointment_calendar.patient.gender" :items="genders"
                                item-text="appointment_calendar.name" item-value="appointment_calendar.gender" outlined>
                            </v-select>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Dirección</label>
                            <v-text-field class="mt-3" v-model="appointment_calendar.patient.address" outlined>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Correo electrónico</label>
                            <v-text-field class="mt-3" v-model="appointment_calendar.patient.email" outlined>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                            <label>Teléfono</label>
                            <vue-tel-input-vuetify id="tel-input" class="mt-3" label=""
                                v-model="appointment_calendar.patient.telephone" mode="international"
                                :inputoptions="{showDialCode: true}" placeholder="Ingresa un número de télefono"
                                hint="Ej: +58 4245887477" persistent-hint
                                @input="appointment_calendar.getTelephoneInput" outlined>
                            </vue-tel-input-vuetify>
                        </v-col>
                        <v-col cols="12" md="4">
                            <label>Plataformas de comunicación</label>
                            <v-row class="pt-0">
                                <v-col cols="4" class="whatsapp-platform">
                                    <v-checkbox v-model="appointment_calendar.patient.whatsapp"
                                        :true-value="parseInt(1)" :false-value="parseInt(0)"
                                        prepend-icon="mdi-whatsapp"></v-checkbox>
                                </v-col>
                                <v-col cols="4" class="telegram-platform">
                                    <v-checkbox v-model="appointment_calendar.patient.telegram"
                                        :true-value="parseInt(1)" :false-value="parseInt(0)"
                                        prepend-icon="mdi-telegram"></v-checkbox>
                                </v-col>
                                <v-col cols="4" class="sms-platform">
                                    <v-checkbox v-model="appointment_calendar.patient.sms" :true-value="parseInt(1)"
                                        :false-value="parseInt(0)" prepend-icon="mdi-comment-text">
                                    </v-checkbox>

                                </v-col>
                            </v-row>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                            <label>Fecha de ingreso</label>
                            <v-dialog ref="entry_date_dialog" v-model="appointment_calendar.entry_date_modal"
                                :return-value.sync="appointment_calendar.patient.entry_date" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="appointment_calendar.patient.entry_date"
                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined>
                                    </v-text-field>
                                </template>
                                <v-date-picker v-model="appointment_calendar.patient.entry_date" locale="es" scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="appointment_calendar.entry_date_modal = false">
                                        Cancel
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.entry_date_dialog.save(appointment_calendar.patient.entry_date)">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12">
                            <v-btn class="secondary white--text" @click="appointment_calendar.savePatient"
                                :loading="appointment_calendar.patient_create_loading" block>Guardar</v-btn>
                        </v-col>
                    </v-row>

                </v-form>
            </v-container>
        </v-card-text>

    </v-card>
</v-dialog>