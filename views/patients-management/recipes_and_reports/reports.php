<v-col cols="12">
    <v-data-table :headers="reports.headers" :items="reports.items" sort-by="date" class="elevation-1 full-width">
        <template #top>
            <v-toolbar flat>
                <v-toolbar-title>Informes</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-dialog v-model="reports.dialog" max-width="90%">
                    <template #activator="{ on, attrs }">
                        <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on" @click="reports.editedIndex = -1;reports.editedItem = {
                          appointment_date: getCurrentDate(),
                          next_appointment: '',
                          ecg: '',
                          meta: {
                            diagnostics: [],
                            plan: {},
                            treatments: [],
                            anthropometry: {
                              active: '1',
                              item: {},
                            },
                            physical_exam: {
                              active: '0'
                            },
                            echocardiogram: {
                              active: '0',
                              item: '',
                            },
                            electro_cardiogram: {
                              active: '0',
                              item: {},
                            },
                            laboratory_exam: {
                              active: '0',
                              items: [],
                            },
                            vital_signs: {
                                active: '1',
                                items: {},
                            },
                          }
                        };loadExtrasToReport()">
                            <v-icon>mdi-plus</v-icon>
                            Añadir informe
                        </v-btn>
                    </template>
                    <v-card>
                        <v-toolbar elevation="0">
                            <v-toolbar-title>{{ ReportsFormTitle }}</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-toolbar-items>
                                <v-btn icon dark @click="reports.dialog = false">
                                    <v-icon color="grey">mdi-close</v-icon>
                                </v-btn>
                            </v-toolbar-items>
                        </v-toolbar>

                        <v-divider></v-divider>
                        <?php echo new Template('patients-management/recipes_and_reports/parts/report_form') ?>
                        <v-card-actions class="px-8">
                            <v-spacer></v-spacer>
                            <v-btn color="secondary white--text" block @click="saveReport">
                                Guardar
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
                <v-dialog v-model="reports.dialogDelete" max-width="1200px">
                    <v-card>
                        <v-card-title class="headline">Estás seguro de que quieres eliminar este informe?</v-card-title>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="closeReportDelete">Cancelar</v-btn>
                            <v-btn color="blue darken-1" text @click="deleteReportItemConfirm">Continuar</v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-toolbar>
        </template>
        <template #item.actions="{ item }">

            <v-row justify="center" align="center">
                <v-icon md @click="downloadReport(item)" color="primary">
                    mdi-download
                </v-icon>
                <v-icon md @click="editReportItem(item)" color="#00BFA5">
                    mdi-pencil
                </v-icon>
                <v-icon md @click="deleteReportItem(item)" color="#F44336">
                    mdi-delete
                </v-icon>
            </v-row>

        </template>
        <template #no-data>
            <v-btn color="primary" @click="initializeReports">
                Recargar
            </v-btn>
        </template>
    </v-data-table>
</v-col>