
<v-row class="full-width">
  <v-col class="mb-n10" cols="12">
    <v-textarea v-model="patient_echocardiogram.content" placeholder="Redactar" outlined dense></v-textarea>
  </v-col>
  <v-col cols="12">
    <v-btn color="secondary white--text" @click="saveEchocardiogram" block>
      Guardar
    </v-btn>
  </v-col>
</v-row>
