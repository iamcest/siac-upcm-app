<v-dialog v-model="appointment_calendar.dialog" max-width="90%">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title class="font-weight-bold">Detalles de la cita</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="appointment_calendar.dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text v-if="appointment_calendar.dialog">
            <v-container fluid>
                <v-row>
                    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][1]['permissions']['update'])) : ?>
                    <v-col class="d-flex justify-end" cols="12">
                        <v-btn color="#3DCEBB" @click="appointment_calendar.editDialog()" dark>
                            <v-icon>mdi-pencil</v-icon>
                            Editar
                        </v-btn>
                    </v-col>
                    <?php endif ?>
                    <v-col cols="12" sm="6">
                        <p class="black--text text-h6"><strong>N° de historia:</strong>
                            <span
                                class="font-weight-light">{{  appointment_calendar.appointment_selected.props.patient_id }}</span>
                        </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <p class="black--text text-h6"><strong>Paciente:</strong>
                            <span
                                class="font-weight-light">{{  appointment_calendar.appointment_selected.patient }}</span>
                        </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <p class="black--text text-h6"><strong>Especialista:</strong>
                            <span
                                class="font-weight-light">{{  appointment_calendar.appointment_selected.props.doctor }}</span>
                        </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <p class="black--text text-h6"><strong>Motivo de la cita:</strong>
                            <span
                                class="font-weight-light">{{  appointment_calendar.appointment_selected.props.appointment_reason }}</span>
                        </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <p class="black--text text-h6"><strong>Tipo de cita:</strong>
                            <span
                                class="font-weight-light">{{  appointment_calendar.appointment_selected.props.appointment_type }}</span>
                        </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <p class="black--text text-h6"><strong>Fecha:</strong>
                            <span
                                class="font-weight-light">{{  appointment_calendar.fromNow(appointment_calendar.appointment_selected.props.appointment_date) }}</span>
                        </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <p class="black--text text-h6"><strong>Hora:</strong>
                            <span
                                class="font-weight-light">{{  appointment_calendar.appointment_selected.props.appointment_time }}</span>
                        </p>
                    </v-col>
                </v-row>
                <v-divider></v-divider>
                <v-row>
                    <v-col cols="12">
                        <h4 class="text-h5 grey--text text-center">Citas anteriores</h4>
                    </v-col>
                    <v-col cols="12">
                        <v-data-table :headers="appointment_calendar.headers"
                            :items="appointment_calendar.patient_appointments" sort-by="appointment_date"
                            :sort-desc="true" class="elevation-1 full-width">
                            <template #no-data>
                                No se encontraron registros de citas anteriores
                            </template>
                            <template #item.actions="{ item }">
                                <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][1]['permissions']['update'])) : ?>
                                <v-icon md @click="
                                    editItem(patients.find(e => e.patient_id == appointment_calendar.appointment_selected.props.patient_id)); 
                                    tab = 'tab-2';initializeAppointments(item.appointment_id)" color="#00BFA5">
                                    mdi-pencil
                                </v-icon>
                                <?php endif?>
                            </template>
                        </v-data-table>
                    </v-col>
                </v-row>
            </v-container>
        </v-card-text>

    </v-card>
</v-dialog>