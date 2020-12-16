
        <v-col cols="12" md="3" lg="2" class="pt-6 pl-0 pr-0">
          <v-row class="profile-container ml-0">
            <v-col cols="12" class="py-6 text-center">Perfil</v-col>
          </v-row>
          <v-row class="ml-0">
            <v-col cols="12" class="d-flex justify-center"><v-icon class="avatar-profile">mdi-account-circle</v-icon></v-col>
            <v-col cols="12" class="text-center mt-n4">
              <p class="font-weight-bold">John Doe</p>
              <p class="mt-n4 subtitle-1 grey--text">Cardiólogo</p>
            </v-col>
            <v-col class="mt-n5" cols="12"><p>Email: <span class="grey--text">prueba@prueba.com</span></p></v-col>
            <v-col class="mt-n5" cols="12"><p>Teléfono: <span class="grey--text">(XXX) XXX XXXX</span></p></v-col>
            <v-col class="files_container" cols="12" class="pl-0 mr-0 pr-0">
              <v-tabs class="px-0 files-tabs" v-model="tab" fixed-tabs>
                <v-tab class="text-capitalize" href="#files">
                  Archivos
                </v-tab>

                <v-tab class="text-capitalize" href="#my-files">
                  Mis archivos 
                </v-tab>
              </v-tabs>
              <v-tabs-items class="pr-0 mr-0" v-model="tab">
                <v-tab-item v-for="i in ['files', 'my-files']" transition="scroll-y-reverse-transition" :value="i"> 
                  <v-row class="ml-0 mr-0 pr-0" v-for="file in files">
                    <v-col cols="2"><v-icon x-large>mdi-pdf-box</v-icon></v-col>
                    <v-col cols="10">
                      <p class="file-description">{{ file.name }}</p>
                      <p class="mt-n3 file-description"><span class="primary--text">{{ file.user }}</span> {{ file.timedate }}</p>
                    </v-col>
                  </v-row>
                </v-tab-item>
              </v-tabs-items>
            </v-col>
          </v-row>
        </v-col>