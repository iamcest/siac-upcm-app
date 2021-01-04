    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <?php echo new Template('parts/upcm_logo') ?>
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="grey--text text--darken-1">Pacientes</h2>
            </v-col>
          </v-row>
          <v-row class="mt-6">
            <v-col cols="12">
              <v-data-table :headers="headers" :items="patients" sort-by="full_name" class="elevation-1" >
                <template v-slot:top>
                  <v-toolbar flat>     
                    <v-spacer></v-spacer>           
                    <v-dialog v-model="dialog" max-width="98%" >
                      <template v-slot:activator="{ on, attrs }">
                        <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on" @click="editedItem = defaultItem; general_save = true">
                          <v-icon>mdi-plus</v-icon>
                          Añadir paciente
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
                          <v-container fluid>
                            <v-row>
                              <v-col class="d-flex justify-center" cols="12">
                                  <v-icon class="avatar-image">mdi-account-circle</v-icon>
                                </v-col>
                                <v-col class="d-flex justify-center pt-0 my-0" cols="12">
                                  <v-icon large color="#00BFA5">mdi-upload</v-icon>
                              </v-col>
                            </v-row>
                            <v-row v-if="editedIndex === -1">
                              <?php echo new Template('patients-management/forms/new_patient') ?>
                            </v-row>
                            <v-row v-else>
                              <?php echo new Template('patients-management/forms/edit_patient', Template::patient_tabs()) ?>
                            </v-row>
                          </v-container>
                        </v-card-text>

                        <v-card-actions class="px-6" v-if="general_save">
                          <v-spacer></v-spacer>
                          <v-btn color="secondary white--text" block @click="save">
                            Guardar
                          </v-btn>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogDelete" max-width="1200px">
                      <v-card>
                        <v-card-title class="headline">Estás seguro de que quieres eliminar este paciente?</v-card-title>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                          <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar</v-btn>
                          <v-spacer></v-spacer>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                  <v-row justify="center" align="center">
                    <v-icon md class="" @click="editItem(item)" color="primary">
                      mdi-eye
                    </v-icon>
                    <v-icon md class="" @click="editItem(item)" color="#00BFA5">
                      mdi-pencil
                    </v-icon>
                    <v-icon md @click="deleteItem(item)" color="#F44336">
                      mdi-delete
                    </v-icon>
                  </v-row>

                </template>
                <template v-slot:item.full_name="{ item }">
                  {{ item.first_name }} {{ item.last_name }}
                </template>
                <template v-slot:no-data>
                  <v-btn color="primary" @click="initialize" >
                    Recargar
                  </v-btn>
                </template>
              </v-data-table>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-main>