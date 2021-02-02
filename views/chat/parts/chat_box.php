
          <v-col class="mb-n9 pt-0" cols="12">
            <v-form>
              <v-container>
                <v-row>
                  <v-col class="mt-4 px-0 ml-md-n2" cols="1" xs="2">
                    <v-btn text @click="upload_file = true"><v-icon class="grey--text text--lighten-1" large>mdi-file-plus</v-icon></v-btn>
                  </v-col>
                  <v-col class="px-0" cols="11" xs="10">
                    <v-textarea no-resize rows="1" v-model="message" clearable @keypress.enter="sendMessage" :disabled="loading" filled no-resize>
                      <template #append-outer v-if="private_chat">
                        <v-icon @click="sendMessage" v-if="!loading">mdi-send</v-icon>     
                        <v-btn v-if="loading" :loading="true" text></v-btn>
                      </template>
                      <template #append-outer v-else>
                        <v-icon @click="sendGroupMessage" v-if="!loading">mdi-send</v-icon>     
                        <v-btn v-if="loading" :loading="true" text></v-btn>
                      </template>
                    </v-textarea>
                    <v-file-input v-model="file_media" class="pr-8 mt-n6" label="Seleccione el archivo" prepend-icon="" v-if="upload_file">
                      <template #append-outer>
                        <v-icon @click="upload_file = false">mdi-close</v-icon>         
                      </template>
                    </v-file-input>
                  </v-col>
                </v-row>
              </v-container>
            </v-form>
          </v-col>
          