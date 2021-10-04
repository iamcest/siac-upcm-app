<v-dialog v-model="historic_records_dialog" max-width="95%">       
  <v-card>
    <v-toolbar elevation="0">
      <v-toolbar-title>Resumen hj</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
      <v-btn icon dark @click="historic_records_dialog = false">
        <v-icon color="grey">mdi-close</v-icon>
      </v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-divider></v-divider>
    <v-container fluid>
      <v-row class="px-3">
        <v-col cols="12">
            <v-data-table :headers="recipes.headers" :items="recipes.items" sort-by="date" class="elevation-1 full-width">
              <template v-slot:top>
                <v-toolbar flat>
                  <v-toolbar-title>Récipes</v-toolbar-title>
                  <v-spacer></v-spacer>           
                  <v-dialog v-model="recipes.dialog" max-width="90%" :retain-focus="false">
                    <v-card>
                      <v-toolbar elevation="0">
                        <v-toolbar-title>Información detallada</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                        <v-btn icon dark @click="recipes.dialog = false">
                          <v-icon color="grey">mdi-close</v-icon>
                        </v-btn>
                        </v-toolbar-items>
                      </v-toolbar>
                      
                      <v-divider></v-divider>
                      <?php echo new Template('patients-management/recipes_and_reports/parts/recipe_form') ?>
                    </v-card>
                  </v-dialog>
                  <v-dialog v-model="recipes.dialogDelete" max-width="1200px">
                    <v-card>
                      <v-card-title class="headline">Estás seguro de que quieres eliminar este récipe?</v-card-title>
                      <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" text @click="closeRecipeDelete">Cancelar</v-btn>
                        <v-btn color="blue darken-1" text @click="deleteRecipeItemConfirm">Continuar</v-btn>
                        <v-spacer></v-spacer>
                      </v-card-actions>
                    </v-card>
                  </v-dialog>
                </v-toolbar>
              </template>
              <template v-slot:item.actions="{ item }">

                <v-row justify="center" align="center">
                  <v-icon md @click="downloadRecipe(item)" color="primary">
                    mdi-download
                  </v-icon>
                  <v-icon md @click="editRecipeItem(item)" color="#00BFA5">
                    mdi-pencil
                  </v-icon>
                  <v-icon md @click="deleteRecipeItem(item)" color="#F44336">
                    mdi-delete
                  </v-icon>
                </v-row>

              </template>
              <template v-slot:no-data>
                <v-btn color="primary" @click="initializeRecipes" >
                  Recargar
                </v-btn>
              </template>
            </v-data-table>
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</v-dialog>