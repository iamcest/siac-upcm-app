
<v-col cols="12">
  <v-data-table :headers="recipes.headers" :items="recipes.items" sort-by="date" class="elevation-1 full-width">
    <template v-slot:top>
      <v-toolbar flat>
        <v-toolbar-title>Récipes</v-toolbar-title>
        <v-spacer></v-spacer>           
        <v-dialog v-model="recipes.dialog" max-width="90%" :retain-focus="false">
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on" @click="recipes.editedItem = {
                appointment_date: getCurrentDate(),
                diagnostics: [],
                instructions: [],
                comments: '',
                next_appointment: '',
              };loadDiagnosticsToRecipe()">
              <v-icon>mdi-plus</v-icon>
              Añadir récipe
            </v-btn>
          </template>
          <v-card>
            <v-toolbar elevation="0">
              <v-toolbar-title>{{ RecipesFormTitle }}</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-toolbar-items>
              <v-btn icon dark @click="recipes.dialog = false">
                <v-icon color="grey">mdi-close</v-icon>
              </v-btn>
              </v-toolbar-items>
            </v-toolbar>
            
            <v-divider></v-divider>
            <?php echo new Template('patients-management/recipes_and_reports/parts/recipe_form') ?>
            <v-card-actions class="px-8">
              <v-spacer></v-spacer>
              <v-btn color="secondary white--text" @click="saveRecipe" :loading="recipes.add_loading" block>
                Guardar
              </v-btn>
            </v-card-actions>
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
