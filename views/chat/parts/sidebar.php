	  <!-- SIDEBAR -->
    		<v-col cols="12" md="3" lg="2" class="chat_sidebar pl-4 pr-2 mt-5">
    			<v-list-item class="mt-5" href="<?php SITE_URL ?>/suite/" link>
		        <v-list-item-content>
		          <v-list-item-title>
		          	<v-icon class="primary--text">mdi-home</v-icon>
		            Regresar a la Suite
		          </v-list-item-title>
		        </v-list-item-content>
		      </v-list-item>
			    <v-list-item>
			      <v-list-item-content>
			        <v-list-item-title class="text-h6">Grupos</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-icon large class="primary--text" @click="group_dialog = true">mdi-plus</v-icon>
			        <v-dialog v-model="group_dialog" max-width="70%" >
			          <v-card>
			            <v-toolbar elevation="0">
			              <v-toolbar-title>Crear grupo</v-toolbar-title>
			              <v-spacer></v-spacer>
			              <v-toolbar-items>
			              <v-btn icon dark @click="group_dialog = false">
			                <v-icon color="grey">mdi-close</v-icon>
			              </v-btn>
			              </v-toolbar-items>
			            </v-toolbar>
			            
			            <v-divider></v-divider>
			            <v-form class="dialog_form">
			              <v-row class="px-8">
			                <v-col cols="12" sm="6">
			                  <label>Nombre del grupo</label>
			                  <v-text-field class="mt-3" v-model="group_form.group_name" outlined>
			                  </v-text-field>
			                </v-col>
			                <v-col cols="12" sm="6">
			                  <label>Seleccione los miembros de la unidad</label>
			                  <v-select class="mt-3" v-model="group_form.members" :search-input.sync="search_member" :items="upcm_members" item-text="full_name" item-value="user_id" return-object multiple outlined>
			                    <template v-slot:prepend-item>
			                      <v-list-item>
			                        <v-list-item-content>
			                          <v-text-field v-model="search_member" placeholder="Buscar miembro" @input="searchMembers" outlined></v-text-field>
			                        </v-list-item-content>
			                      </v-list-item>
			                    </template>
			                  </v-select>
			                </v-col>
			              </v-row>
			            </v-form>
			            <v-card-actions class="px-8">
			              <v-spacer></v-spacer>
			              <v-btn color="secondary white--text" block @click="saveGroup" :loading="group_loading">
			                Crear
			              </v-btn>
			            </v-card-actions>
			          </v-card>
			        </v-dialog>
             </v-list-item-action>
			    </v-list-item>	
			    <v-list-item v-for="i in group_chats" @click="openGroupChat(i)">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text">{{ i.group_name }}</v-list-item-title>
			      </v-list-item-content>
			    </v-list-item>

			    <v-list-item>
			      <v-list-item-content>
			        <v-list-item-title class="text-h6">Miembros de la unidad</v-list-item-title>
			      </v-list-item-content>			    
			    </v-list-item>	
			    <v-list-item v-for="(i, index) in upcm_chats" @click="openChat(i)" v-on:click="upcm_chats[index].messages_unread = '0'" v-if="i.user_id != uid">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text"><v-icon x-large v-if="i.avatar == '' || i.avatar == null">mdi-account-circle</v-icon> <v-avatar size="40" v-else><v-img :src="'<?php ECHO SITE_URL ?>/public/img/avatars/' + i.avatar"></v-img></v-avatar> {{ i.first_name }} {{ i.last_name }}</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action v-if="i.messages_unread > 0">
              <v-badge color="primary" :content="i.messages_unread"></v-badge>
            </v-list-item-action>
			    </v-list-item>	

			    <v-list-item>
			      <v-list-item-content>
			        <v-list-item-title class="text-h6">Miembros de otras unidades</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-icon large class="primary--text" @click="getAllMembers">mdi-plus</v-icon>
				      <v-dialog v-model="dialog_add_external_member" max-width="65%">
			          <v-card>
			            <v-toolbar elevation="0">
			              <v-toolbar-title>Iniciar conversación con un miembro de una unidad externa</v-toolbar-title>
			              <v-spacer></v-spacer>
			              <v-toolbar-items>
			              <v-btn icon dark @click="dialog_add_external_member = false">
			                <v-icon color="grey">mdi-close</v-icon>
			              </v-btn>
			              </v-toolbar-items>
			            </v-toolbar>
			            
			            <v-divider></v-divider>
			            <v-form class="px-6">
		                <v-col cols="12">
		                  <label>Seleccionar miembro</label>
		                  <v-select class="mt-3" v-model="external_selected_member" :search-input.sync="search_external_member" :items="upcm_external_members" item-text="full_name" item-value="user_id" no-data-text="No se encontraron datos" return-object outlined>
		                    <template v-slot:prepend-item>
		                      <v-list-item>
		                        <v-list-item-content>
		                          <v-text-field v-model="search_external_member" placeholder="Buscar miembro" @input="searchExternalMembers" outlined></v-text-field>
		                        </v-list-item-content>
		                      </v-list-item>
		                    </template>
		                  </v-select>
		                </v-col>
			            </v-form>
			            <v-card-actions class="px-8">
			              <v-spacer></v-spacer>
			              <v-btn color="secondary white--text" block @click="openChat(external_selected_member)">
			                Iniciar conversación
			              </v-btn>
			            </v-card-actions>
			          </v-card>
				      </v-dialog>
            </v-list-item-action>
			    </v-list-item>	
			    <v-list-item v-for="i in external_chats" @click="openChat(i)">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text"><v-icon x-large v-if="i.avatar == '' || i.avatar == null">mdi-account-circle</v-icon> <v-avatar size="40" v-else><v-img :src="'<?php ECHO SITE_URL ?>/public/img/avatars/' + i.avatar"></v-img></v-avatar> {{ i.first_name }} {{ i.last_name }}</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action v-if="i.messages_unread > 0">
              <v-badge color="primary" :content="i.messages_unread"></v-badge>
            </v-list-item-action>
			    </v-list-item>			
    		</v-col>