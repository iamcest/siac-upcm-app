    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="5">
              <v-btn class="rounded-pill secondary white--text py-6" v-on:click="editItem(defaultItem)"><v-icon>mdi-plus</v-icon> Añadir anuncio</v-btn>
              <v-btn class="rounded-pill secondary white--text py-6">Todos los anuncios</v-btn>
            </v-col>
            <v-col cols="12" md="3">
              <h2 class="text-center">Notificaciones</h2>
            </v-col>
            <v-dialog v-model="dialog" max-width="1200px" >
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
                        <label>Título</label>
                        <v-text-field class="mt-3" v-model="editedItem.title"outlined ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <label>Contenido</label>
                        <vue-editor class="mt-3" v-model="editedItem.content" placeholder="Contenido del anuncio"/>
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
                <v-card-title class="headline">¿Estás seguro de que quieres eliminar este anuncio?</v-card-title>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                  <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar</v-btn>
                  <v-spacer></v-spacer>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-row>

          <v-row>
            <v-col cols="12" md="4" v-for="(item, index) in announcements" :key="item.announcement_id">
              <v-card max-width="400" outlined >
                <v-card-title class="primary white--text d-block text-center">Anuncio</v-card-title>
                <v-card-text class="pt-10">
                  <h5 class="text-h6 text-center">{{ item.title }}</h5>
                </v-card-text>

                <v-card-actions class="mb-6">
                  <v-btn class="mx-auto white--text subtitle-2 py-4 px-8" color="#c6c6c6">
                    Leer más
                  </v-btn>
                </v-card-actions>
                <div class="px-2 mb-4">
                  <v-icon class="green--text" v-on:click="editItem(item)">mdi-pencil</v-icon>
                  <v-icon class="red--text" v-on:click="deleteItem(item)">mdi-trash-can</v-icon>
                  <span class="body-1 grey--text grey-lighten-1 d-inline-block float-right">{{ fromNow(item.published_at) }}</span>
                </div>
              </v-card>
            </v-col>
          </v-row>

        </v-col>
      </v-row>
    </v-container>
  </v-main>