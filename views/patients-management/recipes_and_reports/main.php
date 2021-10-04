<v-dialog v-model="recipe_reports_dialog" max-width="95%">       
  <v-card>
    <v-toolbar elevation="0">
      <v-toolbar-title>Récipes e Informes</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
      <v-btn icon dark @click="recipe_reports_dialog = false">
        <v-icon color="grey">mdi-close</v-icon>
      </v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-divider></v-divider>
    <v-container fluid>
      
      <v-row class="px-3">
        <v-col cols="12" md="6">
          <?php echo new Template('patients-management/recipes_and_reports/recipes') ?>
        </v-col>
        <v-col cols="12" md="6">
          <template>
            <?php echo new Template('patients-management/recipes_and_reports/reports') ?>
          </template>
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</v-dialog>