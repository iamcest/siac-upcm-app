<v-form>
    <v-container fluid>
        <v-row>
            <v-col cols="6" md="6">
                <label>Fecha de la consulta</label>
                <v-dialog ref="reports_appointment_date_dialog" v-model="reports.date_modal"
                    :return-value.sync="reports.editedItem.appointment_date" width="290px">
                    <template #activator="{ on, attrs }">
                        <v-text-field class="mt-3" v-model="reports.editedItem.appointment_date"
                            append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                    </template>
                    <v-date-picker v-model="reports.editedItem.appointment_date" locale="es" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="reports.date_modal = false">
                            Cancelar
                        </v-btn>
                        <v-btn text color="primary"
                            @click="$refs.reports_appointment_date_dialog.save(reports.editedItem.appointment_date)">
                            OK
                        </v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
            <v-col cols="6" md="6">
                <label>Próxima cita</label>
                <v-dialog ref="report_next_next_appointment_dialog" v-model="reports.next_date_modal"
                    :return-value.sync="reports.editedItem.next_appointment" width="290px">
                    <template #activator="{ on, attrs }">
                        <v-text-field class="mt-3" v-model="reports.editedItem.next_appointment"
                            append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                    </template>
                    <v-date-picker v-model="reports.editedItem.next_appointment" locale="es" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="reports.next_date_modal = false">
                            Cancelar
                        </v-btn>
                        <v-btn text color="primary"
                            @click="$refs.report_next_next_appointment_dialog.save(reports.editedItem.next_appointment)">
                            OK
                        </v-btn>
                    </v-date-picker>
                </v-dialog>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
            <v-col cols="12">
                <v-row>
                    <v-col class="mt-n3" cols="12">
                        <h4 class="text-h5">Diagnósticos</h4>
                    </v-col>
                    <v-col cols="4" v-for="(diagnostic, i) in reports.editedItem.meta.diagnostics">
                        <v-text-field v-model="reports.editedItem.meta.diagnostics[i]"
                            placeholder="ingrese el diagnóstico" outlined dense>
                            <template #append>
                                <v-icon color="error" @click="reports.editedItem.meta.diagnostics.splice(i, 1)">
                                    mdi-close
                                </v-icon>
                            </template>
                        </v-text-field>
                    </v-col>
                    <v-col cols="4">
                        <v-btn color="secondary" class="mb-2" @click="reports.editedItem.meta.diagnostics.push('')"
                            block dark rounded>
                            <v-icon>mdi-plus</v-icon>
                            Añadir
                        </v-btn>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
            <v-col cols="6">
                <label>ECG</label>
                <v-textarea class="mt-3" v-model="reports.editedItem.ecg" rows="1" auto-grow outlined dense>
                </v-textarea>
            </v-col>
            <v-col cols="12">
                <h4 class="text-h5 text-center">Plan</h4>
                <?php echo new Template('patients-management/recipes_and_reports/parts/plan_form') ?>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
            <v-col cols="12">
                <v-data-table :headers="reports.treatments" :items="reports.editedItem.meta.treatments"
                    class="elevation-1">
                    <template #top>
                        <v-col class="d-flex justify-end mb-n6" cols="12">
                            <v-btn color="secondary" class="mb-2"
                                @click="reports.editedItem.meta.treatments.push({treatment: '', dosis: '', interval: ''})"
                                dark rounded>
                                <v-icon>mdi-plus</v-icon>
                                Añadir
                            </v-btn>
                        </v-col>
                    </template>
                    <template #item.treatment="props">
                        <v-text-field class="mt-4" v-model="props.item.treatment" placeholder="Redacte acá..." dense
                            outlined></v-text-field>
                    </template>
                    <template #item.dosis="props">
                        <v-text-field class="mt-4" v-model="props.item.dosis" placeholder="Redacte acá..." dense
                            outlined></v-text-field>
                    </template>
                    <template #item.interval="props">
                        <v-text-field class="mt-4" v-model="props.item.interval" placeholder="Redacte acá..." dense
                            outlined></v-text-field>
                    </template>
                    <template #item.action="{item, i}">
                        <v-icon class="mt-n2" color="error" @click="reports.editedItem.treatments.splice(i, 1)">
                            mdi-close</v-icon>
                    </template>
                    <template v-if="reports.editedIndex == -1" #footer>
                        <v-row>
                            <v-col class="d-flex justify-center" cols="12">
                                <span class="subtitle-1 grey--text">Se cargan automáticamente los tratamientos a partir del último récipe creado</span>
                            </v-col>
                        </v-row>
                    </template>
                </v-data-table>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>

            <v-col cols="12">
                <v-row>
                    <v-col cols="12">
                        <h4 class="text-h6">Seleccione lo que desea incluir en el informe</h4>
                    </v-col>
                    <v-col cols="6" md="3">
                        <v-checkbox label="Examen físico" color="primary"
                            v-model="reports.editedItem.meta.physical_exam.active" true-value="1" false-value="0">
                        </v-checkbox>
                    </v-col>
                    <v-col cols="6" md="3">
                        <v-checkbox label="Ecocardiograma" color="primary"
                            v-model="reports.editedItem.meta.echocardiogram.active" true-value="1" false-value="0">
                        </v-checkbox>
                    </v-col>
                    <v-col cols="6" md="3">
                        <v-checkbox label="Electrocardiograma" color="primary"
                            v-model="reports.editedItem.meta.electro_cardiogram.active" true-value="1" false-value="0">
                        </v-checkbox>
                    </v-col>
                    <v-col cols="6" md="3">
                        <v-checkbox label="Exámenes de Laboratorio" color="primary"
                            v-model="reports.editedItem.meta.laboratory_exam.active" true-value="1" false-value="0">
                        </v-checkbox>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</v-form>