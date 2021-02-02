   
   <v-snackbar v-model="barAlert" :timeout="barTimeout" outlined>
      {{ barMessage }}
      <template v-slot:action="{ attrs }">
        <v-btn color="primary" text v-bind="attrs" @click="barAlert = false">
          Cerrar
        </v-btn>
      </template>
    </v-snackbar>
