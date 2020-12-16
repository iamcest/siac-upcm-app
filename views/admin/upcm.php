
	<!-- START AFTER THIS-->
	<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
    	<v-row>
	    	<?php echo new Template('admin/parts/sidebar') ?>
    		<v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
    			<h2>Unidades de Prevención Cardio Metabólica</h2>
            <v-row class="mt-6">
                <v-col cols="12">
                  <v-data-table :headers="headers" :items="upcms" sort-by="upcm_name" class="elevation-1" >
                    <template v-slot:top>
                      <v-toolbar flat>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="1200px" >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on">
                                  <v-icon>mdi-plus</v-icon>
                                  Añadir UPCM
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
                                    <label>Nombre de la upcm</label>
                                    <v-text-field class="mt-3" v-model="editedItem.upcm_name" outlined solo></v-text-field>
                                  </v-col>
                                  <v-col cols="12">
                                    <label>Clave de certificación</label>
                                    <v-text-field class="mt-3" v-model="editedItem.upcm_key" outlined solo></v-text-field>
                                  </v-col>
                                  <v-col cols="12">
                                    <label>Clave de coordinador</label>
                                    <v-text-field class="mt-3" v-model="editedItem.upcm_coordinator_key" outlined solo></v-text-field>
                                  </v-col>
                                  <v-col cols="12" sm="6" md="6">
                                    <label>País</label>
                                    <v-select class="mt-3" v-model="editedItem.country_selected" :items="countries" item-text="name" item-value="id" v-on:change="filterStates" outlined></v-select>
                                  </v-col>
                                  <v-col cols="12" sm="6" md="6">
                                    <label>Provincia</label>
                                    <v-select class="mt-3" v-model="editedItem.state_selected" :items="country_states" item-text="name" item-value="id" v-on:change='getLocation' outlined></v-select>
                                  </v-col>
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
                        <v-dialog v-model="dialogDelete" max-width="1200px">
                          <v-card>
                            <v-card-title class="headline">¿Estás seguro de que quieres eliminar esta unidad?</v-card-title>
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
                      <v-icon md class="mr-2" @click="editItem(item)" color="#00BFA5">
                        mdi-pencil
                      </v-icon>
                      <v-icon md @click="deleteItem(item)" color="#F44336">
                        mdi-delete
                      </v-icon>
                    </template>
                    <template v-slot:item.location="{ item }">
                      {{ item.upcm_state }}, {{ item.upcm_country }}
                    </template>
                    <template v-slot:item.upcm_registered="{ item }">
                      {{ formatDate(item.upcm_registered) }}
                    </template>
                    <template v-slot:no-data>
                      <v-btn color="primary" @click="initialize" >
                        Reset
                      </v-btn>
                    </template>
                  </v-data-table>
                </v-col>
            </v-row>
    		</v-col>
    	</v-row>
    </v-container>
  </v-main>