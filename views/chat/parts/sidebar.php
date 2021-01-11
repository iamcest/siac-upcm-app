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
			    <v-list-item v-for="i in upcm_chats" @click="openChat(i)" v-if="i.user_id != uid">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text"><v-icon x-large v-if="i.avatar == '' || i.avatar == null">mdi-account-circle</v-icon> <v-avatar size="40" v-else><v-img :src="'<?php ECHO SITE_URL ?>/public/img/avatars/' + i.avatar"></v-img></v-avatar> {{ i.first_name }} {{ i.last_name }}</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-badge color="primary"></v-badge>
             </v-list-item-action>
			    </v-list-item>	

			    <v-list-item>
			      <v-list-item-content>
			        <v-list-item-title class="text-h6">Miembros de otras unidades</v-list-item-title>
			      </v-list-item-content>
			      <!--
			      <v-list-item-action>
              <v-icon large class="primary--text">mdi-plus</v-icon>
            </v-list-item-action>
          -->
			    </v-list-item>	
			    <v-list-item v-for="i in external_chats" @click="openChat(i)">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text"><v-icon x-large v-if="i.avatar == '' || i.avatar == null">mdi-account-circle</v-icon> <v-avatar size="40" v-else><v-img :src="'<?php ECHO SITE_URL ?>/public/img/avatars/' + i.avatar"></v-img></v-avatar> {{ i.first_name }} {{ i.last_name }}</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-badge color="primary"></v-badge>
            </v-list-item-action>
			    </v-list-item>			
    		</v-col>