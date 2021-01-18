
	<!-- START AFTER THIS-->
	<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
    	<v-row>
	    	<?php echo new Template('admin/parts/sidebar') ?>
    		<v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
    			<h2>Artículos de SIAC Comunidad</h2>
            <v-row class="mt-6">
                <v-col cols="12">
                  <v-data-table :headers="headers" :items="articles" sort-by="title" class="elevation-1" >
                    <template v-slot:top>
                      <v-toolbar flat>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="1200px" >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on">
                                  <v-icon>mdi-plus</v-icon>
                                  Añadir artículo
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

                            <v-form ref="form" v-model="valid" lazy-validation>
                              <v-card-text>
                                <v-container>
                                    <v-row>
                                      <v-col cols="12">
                                        <label>Imágen del artículo</label>
                                          <v-file-input class="mt-3" v-model="editedItem.image" :rules="rules" accept="image/png, image/jpeg, image/bmp" placeholder="Escoge una imágen para el artículo" prepend-icon='mdi-image' hint="Solo archivos con extensión .jpg, .png, .bmp" persistent-hint outlined solo></v-file-input>
                                      </v-col>
                                      <v-col cols="12">
                                        <label>Título</label>
                                        <v-text-field class="mt-3" v-model="editedItem.title" outlined solo></v-text-field>
                                      </v-col>
                                      <v-col cols="12">
                                        <label>Descripción corta</label>
                                        <v-textarea class="mt-3" v-model="editedItem.description":counter="240" outlined solo></v-textarea>
                                      </v-col>
                                      <v-col cols="12">
                                        <label class="black--text">Contenido del artículo</label>
                                        <vue-editor class="mt-3" v-model="editedItem.content" placeholder="Contenido del artículo"/>
                                      </v-col>
                                    </v-row>
                                    
                                  </v-form>
                                </v-container>
                              </v-card-text>

                              <v-card-actions class="px-8">
                                <v-spacer></v-spacer>
                                <v-btn color="secondary white--text" block @click="save" :disabled="!valid">
                                  Guardar
                                </v-btn>
                              </v-card-actions>
                            </form>
                          </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialogDelete" max-width="1200px">
                          <v-card>
                            <v-card-title class="headline">¿Estás seguro de que quieres eliminar este artículo?</v-card-title>
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
                      <a :href="'<?php SITE_URL ?>/article/'+item.slug" target="_blank">
                        <v-icon md @click="editItem(item)" color="#76d7d7">
                          mdi-eye
                        </v-icon>
                      </a>
                      <v-icon md @click="editItem(item)" color="#00BFA5">
                        mdi-pencil
                      </v-icon>
                      <v-icon md @click="deleteItem(item)" color="#F44336">
                        mdi-delete
                      </v-icon>
                    </template>
                    <template v-slot:item.published_at="{ item }">
                      {{ formatDate(item.published_at) }}
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