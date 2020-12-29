
                                  <v-col cols="12">
                                      <v-row>
                                        <v-col cols="12" md="6">
                                          <v-data-table :headers="patient_laboratory_exams.headers" :items="patient_laboratory_exams.exams" class="elevation-1 full-width" :options="patient_laboratory_exams.table_options" hide-default-footer>
                                            <template v-slot:top>
                                              <v-dialog v-model="patient_laboratory_exams.dialogDelete" max-width="1200px">
                                                <v-card>
                                                  <v-card-title class="headline">Estás seguro de que quieres eliminar este exámen de laboratorio?</v-card-title>
                                                  <v-card-actions>
                                                    <v-spacer></v-spacer>
                                                    <v-btn color="blue darken-1" text @click="closeExamDelete">Cancelar</v-btn>
                                                    <v-btn color="blue darken-1" text @click="deleteExamItemConfirm">Continuar</v-btn>
                                                    <v-spacer></v-spacer>
                                                  </v-card-actions>
                                                </v-card>
                                              </v-dialog>
                                            </template>
                                            <template v-slot:item.action="{ item }">
                                              <v-row class="mx-auto">
                                                <v-icon large color="primary" @click="showExamResults(item)">
                                                  mdi-plus
                                                </v-icon>
                                              </v-row>

                                            </template>
                                            <template v-slot:no-data>
                                              <v-btn color="primary" @click="initialize" >
                                                Recargar
                                              </v-btn>
                                            </template>
                                          </v-data-table>
                                        </v-col>
                                        <v-col cols="12" md="6" v-if="patient_laboratory_exams.laboratory_exam">
                                          <h3 class="text-center text-h5 mb-4">Exámen de {{ patient_laboratory_exams.selectedExam.name }}</h3>
                                          <v-data-table :headers="patient_laboratory_exams.exam_headers" :items="patient_laboratory_exams.exam_results" sort-by="exam_date" class="elevation-1 full-width">
                                            <template v-slot:item.results="{ item }">
                                              {{ item.results }} {{ patient_laboratory_exams.selectedExam.nomenclature }}
                                            </template>
                                            <template v-slot:item.action="{ item }">
                                              <v-row class="mx-auto">
                                                <v-icon large color="red" @click="deleteExamItem(item)">
                                                  mdi-trash-can
                                                </v-icon>
                                              </v-row>
                                            </template>
                                            <template v-slot:body.append v-if="!patient_laboratory_exams.dialogDelete">
                                              <tr>
                                                <td class="py-6">
                                                  <v-dialog ref="exam_date_dialog" v-model="patient_laboratory_exams.modal" :return-value.sync="patient_laboratory_exams.editedItem.exam_date" width="290px">
                                                    <template v-slot:activator="{ on, attrs }">
                                                      <v-text-field v-model="patient_laboratory_exams.editedItem.exam_date" append-icon="mdi-calendar" label="Fecha de exámen" hint="Ingrese la fecha del exámen" readonly v-bind="attrs" v-on="on" dense></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="patient_laboratory_exams.editedItem.exam_date" locale="es" scrollable>
                                                      <v-spacer></v-spacer>
                                                      <v-btn text color="primary" @click="patient_laboratory_exams.modal = false">
                                                        Cancel
                                                      </v-btn>
                                                      <v-btn text color="primary" @click="$refs.exam_date_dialog.save(patient_laboratory_exams.editedItem.exam_date)">
                                                        OK
                                                      </v-btn>
                                                    </v-date-picker>
                                                  </v-dialog>
                                                </td>
                                                <td class="py-6">
                                                  <v-text-field v-model="patient_laboratory_exams.editedItem.results" label="Resultados del exámen" hint="Ingrese los resultados del exámen" :suffix="patient_laboratory_exams.selectedExam.nomenclature" dense></v-text-field>
                                                </td>
                                                <td class="py-6">
                                                  <v-btn class="secondary white--text" @click="saveExam">Añadir</v-btn>
                                                </td>
                                              </tr>
                                            </template>
                                            <template v-slot:no-data>
                                              No se encontraron resultados de exámenes
                                            </template>
                                          </v-data-table>
                                        </v-col>
                                      </v-row>
                                  </v-col> 
