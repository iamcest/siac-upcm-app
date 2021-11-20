<v-dialog v-model="appointment_calendar.create_dialog" max-width="90%">
    <v-card v-if="appointment_calendar.create_dialog">
        <v-toolbar elevation="0">
            <v-toolbar-title class="font-weight-bold">{{ appointment_calendar.FormTitle }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="appointment_calendar.create_dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-form>
                    <v-row>
                        <v-col cols="12" sm="6" v-if="appointment_calendar.form.appointment_id == ''">
                            <label>Seleccione el paciente</label>
                            <v-select class="mt-3" v-model="appointment_calendar.form.patient_id"
                                :search-input.sync="appointment_calendar.search" :items="appointment_calendar.patients"
                                item-text="full_name" item-value="patient_id" outlined>
                                <template #prepend-item>
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-text-field v-model="appointment_calendar.search"
                                                placeholder="Buscar paciente"
                                                @input="appointment_calendar.searchPatients" outlined></v-text-field>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['create']) ) : ?>
                                    <v-btn class="mt-n6" color="primary" text
                                        @click="appointment_calendar.patient_dialog = true">
                                        <v-icon>mdi-plus-circle</v-icon>
                                        Añadir paciente
                                    </v-btn>
                                    <?php endif ?>
                                    <v-divider class="mt-2"></v-divider>
                                </template>
                            </v-select>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Seleccione el especialista</label>
                            <v-select class="mt-3" v-model="appointment_calendar.form.user_id"
                                :search-input.sync="appointment_calendar.search" :items="appointment_calendar.doctors"
                                item-text="full_name" item-value="user_id" outlined>
                            </v-select>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Motivo de la cita</label>
                            <v-text-field class="mt-3" v-model="appointment_calendar.form.appointment_reason" outlined>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Tipo de cita</label>
                            <v-select class="mt-3" v-model="appointment_calendar.form.appointment_type"
                                :items="appointment_calendar.appointment_types" outlined>
                            </v-select>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Fecha de la cita</label>

                            <v-dialog ref="appointment_date_dialog"
                                v-model="appointment_calendar.appointment_date_modal"
                                :return-value.sync="appointment_calendar.form.appointment_date" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="appointment_calendar.form.appointment_date"
                                        readonly v-bind="attrs" v-on="on" outlined>
                                        <template #append>
                                            <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                                        </template>
                                    </v-text-field>
                                </template>
                                <v-date-picker v-model="appointment_calendar.form.appointment_date" locale="es"
                                    scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary"
                                        @click="appointment_calendar.appointment_date_modal = false">
                                        Cancel
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.appointment_date_dialog.save(appointment_calendar.form.appointment_date)">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Hora de la cita</label>
                            <v-dialog ref="appointment_time_dialog"
                                v-model="appointment_calendar.appointment_time_modal"
                                :return-value.sync="appointment_calendar.form.appointment_time" persistent
                                width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="appointment_calendar.form.appointment_time"
                                        append-icon="mdi-clock-time-four-outline" readonly v-bind="attrs" v-on="on"
                                        outlined></v-text-field>
                                </template>
                                <v-time-picker v-if="appointment_calendar.appointment_time_modal"
                                    v-model="appointment_calendar.form.appointment_time" full-width>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary"
                                        @click="appointment_calendar.appointment_time_modal = false">
                                        Cancelar
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.appointment_time_dialog.save(appointment_calendar.form.appointment_time)">
                                        OK
                                    </v-btn>
                                </v-time-picker>
                            </v-dialog>
                        </v-col>

                        <v-col cols="12">
                            <v-btn color="secondary white--text" @click="appointment_calendar.saveAppointment()"
                                :loading="appointment_calendar.loading_form" block>
                                Guardar
                            </v-btn>
                        </v-col>
                    </v-row>

                </v-form>
            </v-container>
        </v-card-text>

    </v-card>
</v-dialog>