<v-dialog v-model="create_dialog" max-width="90%">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title class="font-weight-bold">{{ FormTitle }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="create_dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-form>
                    <v-row>
                        <v-col cols="12" sm="6" v-if="form.appointment_id == ''">
                            <label>Seleccione el paciente</label>
                            <v-select class="mt-3" v-model="form.patient_id" :search-input.sync="search"
                                :items="patients" item-text="full_name" item-value="patient_id" outlined>
                                <template #prepend-item>
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-text-field v-model="search" placeholder="Buscar paciente"
                                                @input="searchPatients" outlined></v-text-field>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['create']) ) : ?>
                                    <v-btn class="mt-n6" color="primary" text @click="patient_dialog = true">
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
                            <v-select class="mt-3" v-model="form.user_id" :search-input.sync="search" :items="doctors"
                                item-text="full_name" item-value="user_id" outlined>
                            </v-select>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Motivo de la cita</label>
                            <v-text-field class="mt-3" v-model="form.appointment_reason" outlined>
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Tipo de cita</label>
                            <v-select class="mt-3" v-model="form.appointment_type" :items="appointment_types" outlined>
                            </v-select>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Fecha de la cita</label>

                            <v-dialog ref="appointment_date_dialog" v-model="appointment_date_modal"
                                :return-value.sync="form.appointment_date" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="form.appointment_date"
                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined>
                                    </v-text-field>
                                </template>
                                <v-date-picker v-model="form.appointment_date" locale="es" scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="appointment_date_modal = false">
                                        Cancel
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.appointment_date_dialog.save(form.appointment_date)">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <label>Hora de la cita</label>
                            <v-dialog ref="appointment_time_dialog" v-model="appointment_time_modal"
                                :return-value.sync="form.appointment_time" persistent width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="form.appointment_time"
                                        append-icon="mdi-clock-time-four-outline" readonly v-bind="attrs" v-on="on"
                                        outlined></v-text-field>
                                </template>
                                <v-time-picker v-if="appointment_time_modal" v-model="form.appointment_time" full-width>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="appointment_time_modal = false">
                                        Cancelar
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.appointment_time_dialog.save(form.appointment_time)">
                                        OK
                                    </v-btn>
                                </v-time-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12">
                            <v-btn color="secondary white--text" block @click="saveAppointment" :loading="loading_form">
                                Guardar
                            </v-btn>
                        </v-col>
                    </v-row>

                </v-form>
            </v-container>
        </v-card-text>

    </v-card>
</v-dialog>