                
                <v-row class="d-flex justify-end">
                  <div class="rounded-lg grey lighten-2 py-4 pb-2 px-4" style="max-width:50%">
                    <p class="text-right">{{ msg.message }}</p>
                    <template v-if="msg.file !== '' && msg.file !== null && msg.file !== 'null'">
                      <v-row>
                        <v-col class="d-flex justify-end" cols="12" v-if="getExt(msg.file) === 'png' || getExt(msg.file) === 'jpg' || getExt(msg.file) === 'jpeg'">
                          <v-card color="transparent" elevation="0">
                            <v-img :src="'<?php echo SITE_URL ?>/public/media/chat/' + msg.file" class="white--text align-end zoom-in" @click="prevImage(msg.file, msg.message)" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)" width="200px" height="200px" v-if="private_chat">
                              <v-card-title class="body-2" v-text="msg.file"></v-card-title>
                            </v-img>
                            <v-img :src="'<?php echo SITE_URL ?>/public/media/group_chat/' + msg.file" class="white--text align-end zoom-in" @click="prevImage(msg.file, msg.message)" gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)" width="200px" height="200px" v-else>
                              <v-card-title class="body-2" v-text="msg.file"></v-card-title>
                            </v-img>
                          </v-card>
                        </v-col>
                        <v-col class="d-flex justify-end" cols="12" v-else>
                          <template v-if="private_chat">
                            <v-avatar class="mt-n3">
                              <a :href="'<?php echo SITE_URL ?>/public/media/chat/' + msg.file" download>
                                <v-icon x-large>mdi-file-{{ getExtIcon(msg.file) }}</v-icon>
                              </a>
                            </v-avatar>
                            <p class="ml-1 body-2">
                              <a class="secondary--text" :href="'<?php echo SITE_URL ?>/public/media/chat/' + msg.file" download>
                                {{ msg.file }}
                              </a>
                            </p>
                          </template>
                          <template v-else>
                            <v-avatar class="mt-n3">
                              <a :href="'<?php echo SITE_URL ?>/public/media/group_chat/' + msg.file" download>
                                <v-icon x-large>mdi-file-{{ getExtIcon(msg.file) }}</v-icon>
                              </a>
                            </v-avatar>
                            <p class="ml-1 body-2">
                              <a class="secondary--text" :href="'<?php echo SITE_URL ?>/public/media/group_chat/' + msg.file" download>
                                {{ msg.file }}
                              </a>
                            </p>
                          </template>
                        </v-col>
                      </v-row>
                    </template>
                    <p class="text-right grey--text text--darken-1">{{ getTimeHour(msg.message_date + " " + msg.message_time) }}</p>
                  </div>
                </v-row>
                